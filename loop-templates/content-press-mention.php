<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 * @subpackage pai
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<div class="entry-meta">
			<?php if( $publication = get_post_meta( get_the_id(), 'publication', true ) ) : ?>
				<span class="entry-terms"><?php echo wp_strip_all_tags( $publication, true ); ?></span>
			<?php endif; ?>
			<?php pai_published_date(); ?>
		</div><!-- .entry-meta -->

		<?php if( $url = get_post_meta( get_the_id(), 'source_url', true ) ) : ?>

			<?php printf( '<h2 class="entry-title"><a href="%s" title="%s" rel="bookmark" target="_blank">%s</a></h2>',
				esc_url( $url ),
				wp_strip_all_tags( get_the_title(), true ),
				get_the_title()
			); ?>

		<?php else : ?>

			<h2 class="entry-title"><?php the_title(); ?></h2>
			
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
