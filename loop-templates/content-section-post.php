<?php
/**
 * Template for rendering a post within a section
 *
 * @package understrap
 * @subpackage pai
 */
?>

<?php
$image = get_the_post_thumbnail_url( '', 'thumbnail' );
$background_image = ( $image ) ? 'style="background-image: url(' . esc_url( $image ) . ')"' : '';
$source_url = get_post_meta( get_the_id(), 'source_url', true );
?>

<article <?php post_class( 'home-section-item' ); ?> id="post-<?php the_ID(); ?>" <?php echo $background_image; ?>>

	<header class="entry-header">

		<?php if ( $publication = get_post_meta( get_the_id(), 'publication', true ) ) : ?>

			<div class="entry-meta">
				<span class="entry-terms"> <?php echo  wp_strip_all_tags( $publication, true ); ?></span><!-- .entry-meta -->
				<span class="entry-date"><?php echo get_the_date(); ?></span><!-- .entry-meta -->
			</div>

		<?php endif; ?>

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h3>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">


	</div><!-- .entry-content -->

	<footer class="entry-footer">


	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
