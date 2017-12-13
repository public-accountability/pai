<?php
/**
 * Post list partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php if( is_category( 'press-mention' ) && ( $source_url = get_post_meta( $post->ID, 'source_url', true ) ) ) : ?>

			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark" target="_blank">', esc_url( $source_url ) ),
			'</a></h4>' ); ?>

		<?php else : ?>

			<?php the_title( sprintf( '<h4 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink( $post->ID ) ) ),
			'</a></h4>' ); ?>

		<?php endif; ?>

	</header><!-- .entry-header -->

	<?php if( $excerpt = $post->post_excerpt ) : ?>

		<div class="entry-excerpt">

			<?php esc_html_e( $excerpt, 'pai' ); ?>

		</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-footer">

		<?php if( is_category( 'press-mention' ) && ( $publication = get_post_meta( $post->ID, 'publication', true ) ) ) : ?>

			<div class="entry-meta source-publication">
				<?php esc_html_e( $publication ); ?>
			</div>

		<?php endif; ?>

		<div class="entry-meta post-date">

			<?php pai_published_date(); ?>

		</div><!-- .entry-meta -->

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
