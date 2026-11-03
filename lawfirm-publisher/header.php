<?php
/**
 * Header template.
 *
 * @package Lawfirm_Publisher
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="veil" aria-hidden="true"><span class="mono">V&amp;L</span></div>
<a class="skip" href="#contenido" style="position:absolute;left:-9999px"><?php esc_html_e( 'Saltar al contenido', 'lawfirm-publisher' ); ?></a>

<header class="site-header">
	<div class="wrap bar">
		<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php bloginfo( 'name' ); ?>">
			<span class="mark" aria-hidden="true">V</span>
			<span><span class="name"><?php bloginfo( 'name' ); ?></span><br><span class="sub"><?php bloginfo( 'description' ); ?></span></span>
		</a>
		<button class="nav-toggle" aria-expanded="false" aria-controls="site-nav"><?php esc_html_e( 'Menú', 'lawfirm-publisher' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => 'nav',
				'container_id'   => 'site-nav',
				'container_class' => 'site-nav',
				'container_aria_label' => __( 'Navegación principal', 'lawfirm-publisher' ),
				'items_wrap'     => '<nav id="%1$s" class="%2$s" aria-label="' . esc_attr__( 'Navegación principal', 'lawfirm-publisher' ) . '">%3$s<a class="btn btn-solid" href="' . esc_url( home_url( '/contacto/' ) ) . '">' . esc_html__( 'Agendar consulta', 'lawfirm-publisher' ) . '</a></nav>',
			)
		);
		?>
	</div>
</header>

<main id="contenido">
