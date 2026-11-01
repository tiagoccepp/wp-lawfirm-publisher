/* Varela & Ledesma — progressive enhancement only. No framework, no CDN. */
(function () {
  "use strict";

  /* Preloader -> hero assembly */
  function ready() {
    document.body.classList.add("ready");
    var veil = document.getElementById("veil");
    if (veil) {
      veil.classList.add("done");
      setTimeout(function () { veil.remove(); }, 600);
    }
  }
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", function () { setTimeout(ready, 350); });
  } else {
    setTimeout(ready, 350);
  }
  /* Safety: never trap content behind the veil */
  setTimeout(ready, 1500);

  /* Scroll reveals */
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add("in"); io.unobserve(e.target); }
    });
  }, { threshold: 0.12 });
  document.querySelectorAll(".reveal").forEach(function (el) { io.observe(el); });

  /* Mobile nav */
  var toggle = document.querySelector(".nav-toggle");
  var nav = document.getElementById("site-nav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }

  /* TOC scrollspy */
  var tocLinks = document.querySelectorAll(".toc a[href^='#']");
  if (tocLinks.length) {
    var map = {};
    tocLinks.forEach(function (a) { map[a.getAttribute("href").slice(1)] = a; });
    var spy = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        var link = map[e.target.id];
        if (!link) return;
        if (e.isIntersecting) {
          tocLinks.forEach(function (a) { a.removeAttribute("aria-current"); });
          link.setAttribute("aria-current", "true");
        }
      });
    }, { rootMargin: "-30% 0px -60% 0px" });
    Object.keys(map).forEach(function (id) {
      var h = document.getElementById(id);
      if (h) spy.observe(h);
    });
  }

  /* Contact form: honest front-end validation (demo: no backend) */
  var form = document.getElementById("consult-form");
  if (form) {
    form.addEventListener("submit", function (ev) {
      var ok = true;
      form.querySelectorAll("[required]").forEach(function (field) {
        var err = field.closest("div").querySelector(".error");
        var bad = !field.value.trim() ||
          (field.type === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value));
        if (err) err.style.display = bad ? "block" : "none";
        field.setAttribute("aria-invalid", bad ? "true" : "false");
        if (bad) ok = false;
      });
      if (!ok) {
        ev.preventDefault();
        var first = form.querySelector('[aria-invalid="true"]');
        if (first) first.focus();
      }
    });
  }
})();
