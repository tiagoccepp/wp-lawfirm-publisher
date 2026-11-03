<?php
/**
 * Front page: hero + practice index + manifesto + latest posts + CTA.
 *
 * @package Lawfirm_Publisher
 */

get_header();
?>

<section class="hero wrap" aria-labelledby="hero-h1">
	<div class="grid">
		<div>
			<p class="eyebrow rise d1"><?php esc_html_e( '§ Estudio jurídico — Montevideo, desde 1998', 'lawfirm-publisher' ); ?></p>
			<h1 id="hero-h1" class="rise d2"><?php esc_html_e( 'Defendemos lo que su empresa', 'lawfirm-publisher' ); ?> <em><?php esc_html_e( 'vale', 'lawfirm-publisher' ); ?>.</em></h1>
			<p class="lede rise d3"><?php esc_html_e( 'Societario, laboral, inmobiliario y litigios. Un equipo chico, senior y de respuesta rápida para decisiones que no admiten letra chica.', 'lawfirm-publisher' ); ?></p>
			<div class="cta-row rise d4">
				<a class="btn btn-solid" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Agendar consulta', 'lawfirm-publisher' ); ?></a>
				<a class="btn btn-ghost" href="#areas"><?php esc_html_e( 'Ver áreas de práctica', 'lawfirm-publisher' ); ?></a>
			</div>
		</div>
		<div class="meta-col rise d4">
			<dl>
				<div><dt><?php esc_html_e( 'Trayectoria', 'lawfirm-publisher' ); ?></dt><dd><?php esc_html_e( '27 años', 'lawfirm-publisher' ); ?></dd></div>
				<div><dt><?php esc_html_e( 'Áreas', 'lawfirm-publisher' ); ?></dt><dd><?php esc_html_e( '4 prácticas', 'lawfirm-publisher' ); ?></dd></div>
				<div><dt><?php esc_html_e( 'Respuesta', 'lawfirm-publisher' ); ?></dt><dd>&lt; 24 h</dd></div>
			</dl>
			<img class="emblem" src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/emblem.svg' ); ?>" alt="<?php esc_attr_e( 'Emblema del estudio: balanza de la justicia en trazo ocre', 'lawfirm-publisher' ); ?>" width="240" height="240">
		</div>
	</div>
</section>

<section class="band wrap reveal" id="areas" aria-labelledby="areas-h2">
	<div class="sec-head">
		<p class="eyebrow">§ 01</p>
		<h2 id="areas-h2"><?php esc_html_e( 'Áreas de práctica', 'lawfirm-publisher' ); ?></h2>
		<a class="more" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Consultar por su caso', 'lawfirm-publisher' ); ?></a>
	</div>
	<ul class="practice-index">
		<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><span class="num">/ 01</span><span><h3><?php esc_html_e( 'Societario y contratos', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Constitución de SAS y SRL, acuerdos de socios, M&A y contratación comercial redactada para cerrarse, no para discutirse.', 'lawfirm-publisher' ); ?></p></span><span class="tag"><?php esc_html_e( 'Empresas', 'lawfirm-publisher' ); ?></span></a></li>
		<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><span class="num">/ 02</span><span><h3><?php esc_html_e( 'Laboral', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Contratación, desvinculaciones, reglamentos internos y defensa ante reclamos. Prevención antes que juicio.', 'lawfirm-publisher' ); ?></p></span><span class="tag"><?php esc_html_e( 'Empleadores', 'lawfirm-publisher' ); ?></span></a></li>
		<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><span class="num">/ 03</span><span><h3><?php esc_html_e( 'Inmobiliario y notarial', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Compraventas, due diligence registral, arrendamientos y desarrollos. Coordinación directa con su escribano.', 'lawfirm-publisher' ); ?></p></span><span class="tag"><?php esc_html_e( 'Inversores', 'lawfirm-publisher' ); ?></span></a></li>
		<li><a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><span class="num">/ 04</span><span><h3><?php esc_html_e( 'Litigios y arbitraje', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Contencioso civil y comercial, mediación y arbitraje. Le decimos cuándo pelear y cuándo transar.', 'lawfirm-publisher' ); ?></p></span><span class="tag"><?php esc_html_e( 'Conflictos', 'lawfirm-publisher' ); ?></span></a></li>
	</ul>
</section>

<section class="band manifesto reveal" id="codigo" aria-labelledby="codigo-h2">
	<div class="wrap">
		<div class="sec-head">
			<p class="eyebrow">§ 02</p>
			<h2 id="codigo-h2"><?php esc_html_e( 'El código de la casa', 'lawfirm-publisher' ); ?></h2>
		</div>
		<ol>
			<li><div><h3><?php esc_html_e( 'Lo atiende un socio, no un pasante.', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Quien firma su escrito es quien estudió su caso. Sin intermediarios ni sorpresas en la factura.', 'lawfirm-publisher' ); ?></p></div></li>
			<li><div><h3><?php esc_html_e( 'Honorarios por escrito, antes de empezar.', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Presupuesto cerrado o tramo claro por etapa. Usted aprueba cada peso antes de que se gaste.', 'lawfirm-publisher' ); ?></p></div></li>
			<li><div><h3><?php esc_html_e( 'Respuesta en menos de 24 horas.', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Aunque sea para decirle "lo estamos estudiando, volvemos el jueves". El silencio no es una estrategia.', 'lawfirm-publisher' ); ?></p></div></li>
			<li><div><h3><?php esc_html_e( 'Castellano primero, latín después.', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Cada informe trae un resumen ejecutivo que su gerente entiende sin diccionario jurídico.', 'lawfirm-publisher' ); ?></p></div></li>
			<li><div><h3><?php esc_html_e( 'Si su caso no lo necesita, se lo decimos.', 'lawfirm-publisher' ); ?></h3><p><?php esc_html_e( 'Hemos desaconsejado juicios ganables porque el costo superaba el beneficio. Esa es la firma que somos.', 'lawfirm-publisher' ); ?></p></div></li>
		</ol>
	</div>
</section>

<section class="band wrap reveal" aria-labelledby="pub-h2">
	<div class="sec-head">
		<p class="eyebrow">§ 03</p>
		<h2 id="pub-h2"><?php esc_html_e( 'Publicaciones', 'lawfirm-publisher' ); ?></h2>
		<a class="more" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Ver todas', 'lawfirm-publisher' ); ?></a>
	</div>
	<div class="teasers">
		<?php
		$latest = new WP_Query(
			array(
				'posts_per_page' => 3,
				'post_status'    => 'publish',
			)
		);
		if ( $latest->have_posts() ) :
			while ( $latest->have_posts() ) :
				$latest->the_post();
				get_template_part( 'template-parts/content', 'teaser' );
			endwhile;
			wp_reset_postdata();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</section>

<section class="band cta-band reveal" aria-labelledby="cta-h2">
	<div class="wrap">
		<p class="eyebrow"><?php esc_html_e( 'Primera consulta sin cargo', 'lawfirm-publisher' ); ?></p>
		<h2 id="cta-h2"><?php esc_html_e( 'Cuéntenos su caso. Le respondemos en 24 horas.', 'lawfirm-publisher' ); ?></h2>
		<p><?php esc_html_e( 'Treinta minutos con un socio del estudio, por videollamada o en nuestras oficinas de Plaza Cagancha.', 'lawfirm-publisher' ); ?></p>
		<a class="btn btn-solid" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>"><?php esc_html_e( 'Agendar consulta', 'lawfirm-publisher' ); ?></a>
	</div>
</section>

<?php
get_footer();
