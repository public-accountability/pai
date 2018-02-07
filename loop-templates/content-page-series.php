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

	<div class="entry-content page-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'pai' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'pai' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->

<?php
$terms = get_terms( array(
    'taxonomy' 		=> 'series',
    'hide_empty' 	=> true,
) );
?>

<section id="report-series-section" class="list-view reports-list row">

	<?php if( !empty( $terms ) ) : ?>

		<?php foreach( $terms as $term ) : ?>

			<div class="grid-item">

				<article class="series" id="series-<?php echo $term->slug; ?>">

					<a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark">

					<header class="entry-header">

						<h2 class="entry-title"><?php echo esc_attr( $term->name ); ?></h2>

					</header><!-- .entry-header -->

					<div class="entry-content">

						<?php echo apply_filters( 'the_content', $term->description ); ?>

					</div><!-- .entry-content -->

					<footer class="entry-footer"></footer><!-- .entry-footer -->

					</a>

				</article><!-- #post-## -->

			</div><!-- .grid-item -->

		<?php endforeach; ?>

	<?php endif; ?>

</section><!-- .list-view -->
