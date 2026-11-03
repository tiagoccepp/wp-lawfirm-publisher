<?php
/**
 * Lawfirm Publisher — theme setup.
 *
 * @package Lawfirm_Publisher
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LAWFIRM_VERSION', '1.0.0' );

function lawfirm_setup() {
	load_theme_textdomain( 'lawfirm-publisher', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/main.css' );
	add_image_size( 'lawfirm-hero', 1600, 800, true );

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'lawfirm-publisher' ),
			'footer-areas' => __( 'Footer: practice areas', 'lawfirm-publisher' ),
			'footer-studio' => __( 'Footer: studio', 'lawfirm-publisher' ),
		)
	);
}
add_action( 'after_setup_theme', 'lawfirm_setup' );

function lawfirm_scripts() {
	wp_enqueue_style( 'lawfirm-main', get_template_directory_uri() . '/assets/css/main.css', array(), LAWFIRM_VERSION );
	wp_enqueue_script( 'lawfirm-main', get_template_directory_uri() . '/assets/js/main.js', array(), LAWFIRM_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lawfirm_scripts' );

/**
 * Customizer: accent color (brass) with per-surface dark variant.
 */
function lawfirm_customize( $wp_customize ) {
	$wp_customize->add_setting(
		'lawfirm_accent',
		array(
			'default'           => '#6e531a',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'refresh',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'lawfirm_accent',
			array(
				'label'   => __( 'Accent color (on paper)', 'lawfirm-publisher' ),
				'section' => 'colors',
			)
		)
	);
}
add_action( 'customize_register', 'lawfirm_customize' );

function lawfirm_accent_css() {
	$accent = get_theme_mod( 'lawfirm_accent', '#6e531a' );
	if ( '#6e531a' === strtolower( $accent ) ) {
		return;
	}
	wp_add_inline_style( 'lawfirm-main', sprintf( ':root{--accent:%s;}', esc_attr( $accent ) ) );
}
add_action( 'wp_enqueue_scripts', 'lawfirm_accent_css', 20 );

/**
 * Excerpts: length + plain "Seguir leyendo" link (no arrows on every CTA).
 */
function lawfirm_excerpt_length() {
	return 28;
}
add_filter( 'excerpt_length', 'lawfirm_excerpt_length' );

function lawfirm_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return ' &hellip; <a class="read-more" href="' . esc_url( get_permalink() ) . '">' . __( 'Seguir leyendo', 'lawfirm-publisher' ) . '</a>';
}
add_filter( 'excerpt_more', 'lawfirm_excerpt_more' );

/**
 * Reading time (words / 200 wpm, rounded up).
 */
function lawfirm_reading_time( $post_id = null ) {
	$content = get_post_field( 'post_content', $post_id );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	return max( 1, (int) ceil( $words / 200 ) );
}

/**
 * Build a TOC list from h2s in the post content. Returns array of [id, text].
 */
function lawfirm_toc_items( $content ) {
	$items = array();
	if ( preg_match_all( '/<h2[^>]*>(.*?)<\/h2>/i', $content, $m ) ) {
		foreach ( $m[1] as $i => $html ) {
			$text = trim( wp_strip_all_tags( $html ) );
			if ( '' === $text ) {
				continue;
			}
			$items[] = array(
				'id'   => 'seccion-' . ( $i + 1 ),
				'text' => $text,
			);
		}
	}
	return $items;
}

/**
 * Inject ids into h2s so the TOC anchors work with Gutenberg output.
 */
function lawfirm_toc_anchors( $content ) {
	if ( ! is_singular( 'post' ) ) {
		return $content;
	}
	$i = 0;
	return preg_replace_callback(
		'/<h2([^>]*)>/i',
		function ( $m ) use ( &$i ) {
			++$i;
			if ( false !== strpos( $m[1], 'id=' ) ) {
				return $m[0];
			}
			return '<h2 id="seccion-' . $i . '"' . $m[1] . '>';
		},
		$content
	);
}
add_filter( 'the_content', 'lawfirm_toc_anchors', 9 );

/**
 * ACF: load field groups from acf-json (version-controlled).
 */
function lawfirm_acf_json_load( $paths ) {
	$paths[] = get_template_directory() . '/acf-json';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'lawfirm_acf_json_load' );
