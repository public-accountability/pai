<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php $extended = get_extended( $post->post_content ); ?>

		<div class="entry-body">

			<?php if( isset( $extended['extended'] ) && !empty( $extended['extended'] ) ) : ?>
				<?php echo apply_filters( 'the_excerpt', $extended['main'] ); ?>
			<?php else : ?>
				<?php the_content(); ?>
			<?php endif; ?>

		</div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'pai' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<div class="entry-main">

			<?php if( isset( $extended['extended'] ) && !empty( $extended['extended'] ) ) : ?>
				<?php echo apply_filters( 'the_content', $extended['extended'] ); ?>
			<?php else : ?>
				<?php the_content(); ?>
			<?php endif; ?>

		</div>

		<?php edit_post_link( __( 'Edit', 'pai' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
