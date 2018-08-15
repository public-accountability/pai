<?php
/**
 * Post list partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
	$url = get_post_meta( $post->ID, 'source_url', true );
	$publication = get_post_meta( $post->ID, 'publication', true )
	?>

	<?php echo sprintf( '<a class="block-link" href="%s" title="View %s" target="_blank">',
	( $url ) ? esc_url( $url ) : esc_url( get_permalink() ),
	( $publication ) ? esc_attr( $publication ) : esc_attr( $post->post_title )
 ); ?>

		<header class="entry-header">

				<div class="entry-meta">

						<?php if( $publication ) : ?>

							<span class="source-publication">
								<?php esc_html_e( $publication ); ?>
							</span>

						<?php endif; ?>

						<?php pai_published_date(); ?>

				</div>

			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		</header><!-- .entry-header -->

		<?php if( $excerpt = $post->post_excerpt ) : ?>

			<div class="entry-content">

				<?php esc_html_e( $excerpt, 'pai' ); ?>

			</div><!-- .entry-content -->

		<?php endif; ?>

		<footer class="entry-footer"></footer><!-- .entry-footer -->

	</a>

</article><!-- #post-## -->
