<?php
/**
 * Single post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class( 'carousel-item' ); ?> id="post-<?php the_ID(); ?>">

	<?php the_post_thumbnail( get_the_id(), 'slide' ); ?>

	<header class="entry-header">

		<div class="entry-meta">

			<?php pai_featured_post_meta(); ?>

		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h3>' ); ?>

		<?php pai_featured_the_excerpt(); ?>

	</header><!-- .entry-header -->

</article><!-- #post-## -->
