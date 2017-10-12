<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class( 'carousel-item' ); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<header class="entry-header">

		<div class="entry-meta">

			<?php pai_featured_post_meta(); ?>

		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_excerpt(); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
