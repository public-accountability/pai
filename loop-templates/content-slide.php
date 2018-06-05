<?php
/**
 * Slide partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class( 'carousel-item' ); ?> id="post-<?php the_ID(); ?>">

	<?php if( has_post_thumbnail( $post ) ) : ?>

		<?php the_post_thumbnail( 'slide', array( 'class' => 'slider-image' ) ); ?>

	<?php else : ?>

		<?php pai_default_featured_image( 'slide', array( 'class' => 'slider-image wp-post-image' ) ); ?>

	<?php endif; ?>

	<header class="entry-header">

		<div class="entry-meta">

			<?php pai_featured_post_meta(); ?>

		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h3>' ); ?>

		<?php pai_custom_excerpt( 20 ) ?>

	</header><!-- .entry-header -->

</article><!-- #post-## -->
