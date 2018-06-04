<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>

		<?php if( !has_category( 'projects' ) && !has_category( 'project' ) ) : ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php if( has_category( 'projects', 'project' ) ) : ?>

			<?php the_content(); ?>

			<?php if( $url = get_post_meta( $post->ID, 'url', true ) ) : ?>

				<?php echo sprintf( '<a href="%s" rel="bookmark" class="btn btn-secondary understrap-read-more" target="_blank">%s</a>',
					esc_url( $url ),
					esc_html( 'Learn More' )
				); ?>

			<?php endif; ?>

		<?php else : ?>

			<?php pai_custom_excerpt(); ?>

		<?php endif; ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'pai' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
