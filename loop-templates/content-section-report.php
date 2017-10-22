<?php
/**
 * Template for rendering a report within a section
 *
 * @package understrap
 * @subpackage pai
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h3>' ); ?>

	</header><!-- .entry-header -->

	<?php if( $featured_image = get_sub_field( 'display_featured_image' ) ) : ?>

		<?php the_post_thumbnail( $post->ID, 'thumbnail' ); ?>

	<?php endif; ?>

	<div class="entry-content">

		<?php
		the_excerpt();
		?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
