<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php $secondary_content = get_field( 'secondary_content' ); ?>

	<div class="entry-content page-content<?php echo ( function_exists( 'get_field' ) && ( !empty( $secondary_content['title'] ) || !empty( $secondary_content['content'] ) ) ) ? ' has-secondary-content' : '' ; ?>">

		<div class="intro">

			<?php the_content(); ?>

		</div>

		<?php if( function_exists( 'get_field' ) && ( !empty( $secondary_content['title'] ) || !empty( $secondary_content['content'] ) ) ) : ?>

			<div class="secondary-content">

				<?php if( $secondary_content['title'] ) : ?>
					<?php printf( '<h2 class="section-heading"><span>%s</span></h2>',
						esc_html__( $secondary_content['title'], 'pai' )
				 	); ?>
				<?php endif; ?>
				
				<?php if( $secondary_content['content'] ) : ?>
					<?php echo apply_filters( 'the_content', $secondary_content['content'] ); ?>
				<?php endif; ?>
			</div>

		<?php endif; ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
