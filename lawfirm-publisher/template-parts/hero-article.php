<?php
/**
 * Article hero: kicker + title + standfirst + byline + hero image.
 * Expects $args['kicker'] and $args['hero'] (ACF image array or null).
 *
 * @package Lawfirm_Publisher
 */

$kicker = isset( $args['kicker'] ) ? $args['kicker'] : '';
$hero   = isset( $args['hero'] ) ? $args['hero'] : null;
?>

<header class="article-hero wrap">
	<p class="eyebrow rise d1">
		<?php
		if ( $kicker ) {
			echo esc_html( $kicker ) . ' · ';
		} else {
			the_category( ', ' );
			echo ' · ';
		}
		echo esc_html( get_the_date() ) . ' · ';
		/* translators: %d: reading time in minutes */
		printf( esc_html__( '%d min de lectura', 'lawfirm-publisher' ), (int) lawfirm_reading_time() );
		?>
	</p>
	<h1 class="rise d2"><?php the_title(); ?></h1>
	<?php if ( has_excerpt() ) : ?>
		<p class="standfirst rise d3"><?php the_excerpt(); ?></p>
	<?php endif; ?>
	<div class="byline rise d4">
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 96 ); ?>
		<div>
			<p class="who"><?php the_author(); ?></p>
			<p class="role"><?php the_author_meta( 'description' ); ?></p>
		</div>
	</div>
	<?php if ( $hero && ! empty( $hero['url'] ) ) : ?>
		<figure class="rise d4">
			<img src="<?php echo esc_url( $hero['sizes']['lawfirm-hero'] ?? $hero['url'] ); ?>" alt="<?php echo esc_attr( $hero['alt'] ); ?>" width="1600" height="800" fetchpriority="high">
			<?php if ( ! empty( $hero['caption'] ) ) : ?>
				<figcaption><?php echo esc_html( $hero['caption'] ); ?></figcaption>
			<?php endif; ?>
		</figure>
	<?php elseif ( has_post_thumbnail() ) : ?>
		<figure class="rise d4">
			<?php the_post_thumbnail( 'lawfirm-hero', array( 'fetchpriority' => 'high' ) ); ?>
		</figure>
	<?php endif; ?>
</header>
