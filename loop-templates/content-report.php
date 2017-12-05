<?php
/**
 * Single report post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<div class="entry-meta">

			<?php echo get_the_term_list( $post->ID, 'category', '<ul class="categories"><li>', ',</li><li>', '</li></ul>' ); ?>

		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if( $excerpt = $post->post_excerpt ) : ?>
			<div class="entry-subtitle">
				<?php esc_html_e( $excerpt, 'pai' ); ?>
			</div>
		<?php endif; ?>

		<div class="entry-meta post-date">

			<?php pai_published_date(); ?>

		</div><!-- .entry-meta -->

		<div class="entry-meta authors">
			<span class="hr"></span>

			<?php pai_the_author_posts_link(); ?>

		</div>

	</header><!-- .entry-header -->

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

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
