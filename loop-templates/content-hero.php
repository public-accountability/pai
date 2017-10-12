<?php
/**
 * Single post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>

<article <?php post_class( 'hero-content jumbotron' ); ?> id="home-hero">

	<?php if( $heading = get_sub_field( 'heading' ) ) : ?>

		<header class="entry-header">

			<?php echo sprintf( '<h1 class="entry-title display-3">%s</h1>',
				esc_html( $heading )
		  ); ?>

		</header><!-- .entry-header -->

	<?php endif; ?>

	<div class="entry-content">

		<?php if( $text = get_sub_field( 'text' ) ) : ?>

			<?php echo sprintf( '<p class="lead">%s</p>',
				esc_html( $text )
		  ); ?>

		<?php endif; ?>

		<?php if( $link = get_sub_field( 'link' ) ) : ?>

			<a href="<?php echo $link['url']; ?>" <?php echo ( !empty( $link['target'] ) ) ? 'target="' . esc_attr( $link['target'] ) . '"' : '';?> rel="bookmark" class="btn btn-primary"><?php echo ( $link['title'] ) ? esc_attr( $link['title'] ) : __( 'Learn More', 'pia' ); ?></a>

		<?php endif; ?>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
