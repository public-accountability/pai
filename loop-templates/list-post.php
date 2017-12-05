<?php
/**
 * Widget post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink( $post->ID ) ) ),
		'</a></h4>' ); ?>

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

</li><!-- #post-## -->
