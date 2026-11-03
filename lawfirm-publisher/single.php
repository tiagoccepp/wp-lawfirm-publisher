<?php
/**
 * Single post: ACF hero + sticky TOC + citations slot + author box.
 *
 * ACF fields (see acf-json/article-hero.json): kicker, hero_image, toc_toggle.
 * Falls back gracefully when ACF is inactive.
 *
 * @package Lawfirm_Publisher
 */

get_header();

while ( have_posts() ) :
	the_post();
	$kicker    = function_exists( 'get_field' ) ? get_field( 'kicker' ) : '';
	$hero      = function_exists( 'get_field' ) ? get_field( 'hero_image' ) : null;
	$show_toc  = function_exists( 'get_field' ) ? (bool) get_field( 'toc_toggle' ) : true;
	$toc_items = $show_toc ? lawfirm_toc_items( get_the_content() ) : array();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		get_template_part(
			'template-parts/hero',
			'article',
			array(
				'kicker' => $kicker,
				'hero'   => $hero,
			)
		);
		?>

		<div class="wrap article-layout">
			<?php if ( ! empty( $toc_items ) ) : ?>
				<nav class="toc reveal" aria-label="<?php esc_attr_e( 'Índice del artículo', 'lawfirm-publisher' ); ?>">
					<h2><?php esc_html_e( 'En este artículo', 'lawfirm-publisher' ); ?></h2>
					<ol>
						<?php foreach ( $toc_items as $item ) : ?>
							<li><a href="#<?php echo esc_attr( $item['id'] ); ?>"><?php echo esc_html( $item['text'] ); ?></a></li>
						<?php endforeach; ?>
					</ol>
				</nav>
			<?php endif; ?>

			<div class="prose reveal">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="post-nav"><span>' . __( 'Páginas:', 'lawfirm-publisher' ) . '</span> ',
						'after'  => '</nav>',
					)
				);
				?>

				<div class="author-box">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 144 ); ?>
					<div>
						<p class="role"><?php esc_html_e( 'Autor', 'lawfirm-publisher' ); ?></p>
						<p><strong><?php the_author(); ?></strong> — <?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>

				<nav class="post-nav" aria-label="<?php esc_attr_e( 'Navegación de artículos', 'lawfirm-publisher' ); ?>">
					<span><?php previous_post_link( '%link', __( '← Anterior', 'lawfirm-publisher' ) ); ?></span>
					<span><?php next_post_link( '%link', __( 'Siguiente →', 'lawfirm-publisher' ) ); ?></span>
				</nav>

				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</div>
	</article>

<?php endwhile;

get_footer();
