<?php
/**
 * Blog index / archive.
 *
 * @package Lawfirm_Publisher
 */

get_header();
?>

<div class="wrap">
	<header class="archive-head">
		<p class="eyebrow"><?php esc_html_e( 'Publicaciones', 'lawfirm-publisher' ); ?></p>
		<h1>
			<?php
			if ( is_archive() ) {
				the_archive_title();
			} else {
				esc_html_e( 'Publicaciones del estudio', 'lawfirm-publisher' );
			}
			?>
		</h1>
		<?php the_archive_description( '<p>', '</p>' ); ?>
	</header>

	<div class="teasers" style="padding-bottom:4rem">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', 'teaser' );
			endwhile;
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>

	<?php
	the_posts_pagination(
		array(
			'prev_text' => __( 'Anterior', 'lawfirm-publisher' ),
			'next_text' => __( 'Siguiente', 'lawfirm-publisher' ),
		)
	);
	?>
	<div style="padding-bottom:3rem"></div>
</div>

<?php
get_footer();
