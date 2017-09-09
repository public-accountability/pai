<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">

		<?php the_content(); ?>

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

<?php
$terms = get_terms( array(
    'taxonomy' 		=> 'series',
    'hide_empty' 	=> true,
) );
?>

<div class="grid-list">

	<?php if( !empty( $terms ) ) : ?>

		<?php foreach( $terms as $term ) : ?>

			<article class="term" id="term-<?php echo $term->term_id; ?>">

				<header class="entry-header">

					<h2 class="entry-title"><a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark"><?php echo esc_attr( $term->name ); ?></a></h2>

				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php echo $term->description; ?>

				</div><!-- .entry-content -->

				<footer class="entry-footer">

					<p><a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark" class="understrap-read-more-link"><?php _e( 'View the Series', 'pai' ); ?></a></p>

				</footer><!-- .entry-footer -->

			</article><!-- #post-## -->

		<?php endforeach; ?>

	<?php endif; ?>

</div><!-- .grid-list -->
