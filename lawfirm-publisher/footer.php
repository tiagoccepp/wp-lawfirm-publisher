<?php
/**
 * Footer template.
 *
 * @package Lawfirm_Publisher
 */
?>
</main>

<footer class="site-footer">
	<div class="wrap">
		<div class="cols">
			<div>
				<h2><?php bloginfo( 'name' ); ?></h2>
				<address>
					<?php esc_html_e( 'Plaza Cagancha 1335, Of. 901', 'lawfirm-publisher' ); ?><br>
					<?php esc_html_e( '11100 Montevideo, Uruguay', 'lawfirm-publisher' ); ?><br>
					<a href="tel:+59829010203">+598 2901 0203</a><br>
					<a href="mailto:contacto@varelayledesma.uy">contacto@varelayledesma.uy</a><br>
					<?php esc_html_e( 'Lun–Vie, 9:00–18:00', 'lawfirm-publisher' ); ?>
				</address>
			</div>
			<nav aria-label="<?php esc_attr_e( 'Áreas en el pie', 'lawfirm-publisher' ); ?>">
				<h3><?php esc_html_e( 'Áreas', 'lawfirm-publisher' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-areas',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
			<nav aria-label="<?php esc_attr_e( 'Estudio en el pie', 'lawfirm-publisher' ); ?>">
				<h3><?php esc_html_e( 'Estudio', 'lawfirm-publisher' ); ?></h3>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-studio',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</nav>
		</div>
		<div class="colophon">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?></span>
			<span><?php esc_html_e( 'Montevideo, Uruguay', 'lawfirm-publisher' ); ?></span>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
