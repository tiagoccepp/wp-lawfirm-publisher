<?php
/**
 * Static page.
 *
 * @package Lawfirm_Publisher
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="article-hero wrap">
			<p class="eyebrow"><?php bloginfo( 'name' ); ?></p>
			<h1><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="standfirst"><?php the_excerpt(); ?></p>
			<?php endif; ?>
		</header>
		<div class="wrap">
			<div class="prose" style="padding-block:2.5rem 4rem">
				<?php
				the_content();
				wp_link_pages(
					array(
						'before' => '<nav class="post-nav"><span>' . __( 'Páginas:', 'lawfirm-publisher' ) . '</span> ',
						'after'  => '</nav>',
					)
				);
				?>
			</div>
		</div>
	</article>

<?php endwhile;

get_footer();
