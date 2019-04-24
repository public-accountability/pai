<?php
/**
 * Single post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>

<?php
$link = get_sub_field( 'link' );
$heading = get_sub_field( 'heading', false, false );
$link_tag = sprintf( '<a href="%s" title="%s" rel="bookmark>%s</a>"',
	esc_url( $link['url'] ),
	esc_attr( esc_attr( $heading ) ),
	wp_strip_all_tags( $link['title'] )
);
$image = get_sub_field( 'image' );
$background_image = ( $image ) ? 'style="background-image: url(' . esc_url( $image['sizes']['thumbnail'] ) . ')"' : '';
?>

<article <?php post_class( 'home-section-item' ); ?> <?php echo $background_image; ?>>

	<div class="entry-content">

		<?php if( $heading ) : ?>

			<div class="entry-meta">
				<?php echo wp_strip_all_tags( $heading ); ?>
			</div>

		<?php endif; ?>

		<?php if( $text = get_sub_field( 'text', false, false ) ) : ?>

			<?php echo sprintf( '<h3 class="entry-title"><a href="%s" title="%s" rel="bookmark">%s</a></h3>',
				esc_url( $link['url'] ),
				wp_strip_all_tags( esc_attr( $heading ) ),
				wp_strip_all_tags( $text )
			); ?>

		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
