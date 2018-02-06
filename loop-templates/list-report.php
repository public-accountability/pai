<?php
/**
 * Report post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<a href="<?php echo esc_url( get_permalink( $post->ID ) ); ?>" title="<?php echo esc_attr( $post->post_name ); ?>" rel="bookmark">

	<header class="entry-header">

		<div class="entry-meta entry-categories">

			<?php echo get_the_term_list( $post->ID, 'category', '<ul class="categories"><li>', ',</li><li>', '</li></ul>' ); ?>

		</div><!-- .entry-meta -->

		<h3 class="entry-title"><?php the_title(); ?></h3>

	</header><!-- .entry-header -->

	<?php if( $excerpt = $post->post_excerpt ) : ?>

		<div class="entry-excerpt">

			<?php echo apply_filters( 'the_excerpt', $excerpt ); ?>

		</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-footer">

		<div class="entry-meta post-date">

			<?php pai_published_date(); ?>

		</div><!-- .entry-meta -->

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
