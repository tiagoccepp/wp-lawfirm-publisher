<?php
/**
 * Empty-loop fallback.
 *
 * @package Lawfirm_Publisher
 */
?>

<div class="nothing-found">
	<p class="eyebrow"><?php esc_html_e( 'Sin resultados', 'lawfirm-publisher' ); ?></p>
	<h2><?php esc_html_e( 'Aún no hay publicaciones aquí.', 'lawfirm-publisher' ); ?></h2>
	<p><?php esc_html_e( 'Vuelva pronto o agende una consulta directa.', 'lawfirm-publisher' ); ?></p>
	<p><a class="btn btn-solid" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Agendar consulta', 'lawfirm-publisher' ); ?></a></p>
</div>
