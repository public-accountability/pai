<?php
/**
 * Slide partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class( 'carousel-item' ); ?> id="post-<?php the_ID(); ?>">

	<?php echo sprintf( '<a class="block-link" href="%s" rel="bookmark" title="%s">',
		esc_url( get_permalink() ),
		esc_attr( $post->post_title )
	); ?>

		<?php if( has_post_thumbnail( $post ) ) : ?>

			<?php the_post_thumbnail( 'slide', array( 'class' => 'slider-image' ) ); ?>

		<?php else : ?>

			<?php pai_default_featured_image( 'slide', array( 'class' => 'slider-image wp-post-image' ) ); ?>

		<?php endif; ?>

		<header class="entry-header">

			<div class="entry-meta">

				<?php pai_featured_post_meta(); ?>

			</div><!-- .entry-meta -->

			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

			<div class="entry-excerpt">
				<?php pai_featured_the_excerpt( 20 ); ?>
			</div>

		</header><!-- .entry-header -->

	</a>

</article><!-- #post-## -->
