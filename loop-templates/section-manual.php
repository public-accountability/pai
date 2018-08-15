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
$text = get_sub_field( 'text', false, false );
$link_tag = sprintf( '<a href="%s" title="%s" rel="bookmark>%s</a>"',
	( isset( $link['url'] ) && !empty( $link['url'] ) ) ? esc_url( $link['url'] ) : '',
	esc_attr( $heading ),
	( isset( $link['title'] ) && !empty( $link['title'] ) ) ? esc_html( $link['title'] ) : ''
);
$image = get_sub_field( 'image' );
$background_image = ( $image ) ? 'style="background-image: url(' . esc_url( $image['sizes']['thumbnail'] ) . ')"' : '';
$section_id = get_sub_field( 'section_id' );
?>

<div class="grid-item">

	<article class="home-section-item hentry" <?php echo $background_image; ?>>

		<div class="entry-heading"></div><!-- .entry-heading -->

		<?php if( $link ) : ?>
			<?php echo sprintf( '<a href="%s" title="%s" rel="bookmark"%s>',
				esc_url( $link['url'] ),
				esc_attr( $text ),
				( $link['target'] ) ? ' target="' . esc_attr( $link['target'] ) . '"' : ''
			); ?>
		<?php endif; ?>

		<div class="entry-content">

			<?php if( $heading ) : ?>

				<div class="entry-meta">
					<div class="entry-terms">
						<?php echo wp_kses( $heading ); ?>
					</div>
				</div>

			<?php endif; ?>

			<?php if( $text ) : ?>

				<h3 class="entry-title"><?php echo wp_kses( $text ); ?></h3>

			<?php endif; ?>

			<?php if( $shortcode = get_sub_field( 'shortcode' ) ) : ?>
				<div class="entry-shortcode">
					<?php echo do_shortcode( esc_attr( $shortcode ) ); ?>
				</div>
			<?php endif; ?>

		</div><!-- .entry-content -->

		<div class="entry-footer">

			<?php if( isset( $link['title'] ) ) : ?>

				<?php echo apply_filters( 'the_title', esc_attr( $link['title'] ) ); ?>

			<?php endif; ?>

		</div><!-- .entry-footer -->

		<?php if( $link ) : ?>
		</a>
		<?php endif; ?>

	</article><!-- #post-## -->

</div><!-- .grid-item -->
