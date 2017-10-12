<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>

<?php
$link = get_sub_field( 'link' );
$heading = get_sub_field( 'heading' );
$link_tag = sprintf( '<a href="%s" title="%s" rel="bookmark>%s</a>"',
	esc_url( $link['url'] ),
	esc_attr( $heading ),
	esc_html( $link['title'] )
);
?>

<article <?php post_class( 'home-section-item col-sm-6 col-md-4' ); ?>>

	<?php if( $image = get_sub_field( 'image' ) ) : ?>

		<img src="<?php echo esc_url( $image['url'] ); ?>" alt="">

	<?php endif; ?>

	<div class="entry-content">

		<?php if( $heading ) : ?>

			<div class="entry-meta">
				<?php echo apply_filters( 'the_title', $heading ); ?>
			</div>

		<?php endif; ?>

		<?php if( $text = get_sub_field( 'text' ) ) : ?>

			<?php echo sprintf( '<h3 class="entry-title"><a href="%s" title="%s" rel="bookmark">%s</a></h3>',
				esc_url( $link['url'] ),
				esc_attr( $heading ),
				esc_html( $text )
			); ?>

			<?php// echo $title; ?>

		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
