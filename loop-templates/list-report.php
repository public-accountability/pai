<?php
/**
 * Widget post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<div class="entry-meta">

			<?php echo get_the_term_list( $post->ID, 'category', '<ul class="categories"><li>', ',</li><li>', '</li></ul>' ); ?>

		</div><!-- .entry-meta -->

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink( $post->ID ) ) ),
		'</a></h3>' ); ?>

	</header><!-- .entry-header -->

	<?php if( $excerpt = $post->post_excerpt ) : ?>

		<div class="entry-excerpt">

			<?php esc_html_e( $excerpt, 'pai' ); ?>

		</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-footer">

		<div class="entry-meta post-date">

			<?php pai_published_date(); ?>

		</div><!-- .entry-meta -->

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
