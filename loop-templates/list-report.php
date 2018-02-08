<?php
/**
 * Report post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">

			<div class="entry-meta entry-categories">

				<?php echo get_the_term_list( $post->ID, 'topic', '<ul class="categories"><li>', ',</li><li>', '</li></ul>' ); ?>

			</div><!-- .entry-meta -->

			<?php the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" class="block-link" title="%s" rel="bookmark">',
				 esc_url( get_permalink( $post->ID ) ),
				 esc_attr( $post->post_title )
				),
			'</a></h2>' ); ?>

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
