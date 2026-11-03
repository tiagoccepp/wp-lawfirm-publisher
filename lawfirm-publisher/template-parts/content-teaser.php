<?php
/**
 * Post teaser for index / front-page loops.
 *
 * @package Lawfirm_Publisher
 */

$kicker = function_exists( 'get_field' ) ? get_field( 'kicker' ) : '';
?>

<article class="teaser" id="post-<?php the_ID(); ?>">
	<p class="kicker">
		<?php
		echo $kicker ? esc_html( $kicker ) : esc_html( get_the_category_list( ', ' ) );
		echo ' · ';
		/* translators: %d: reading time in minutes */
		printf( esc_html__( '%d min', 'lawfirm-publisher' ), (int) lawfirm_reading_time() );
		?>
	</p>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<?php the_excerpt(); ?>
	<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
</article>
