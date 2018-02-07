<?php
/**
 * Post list partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<header class="entry-header">

			<?php if( is_category( 'press-mention' ) && ( $source_url = get_post_meta( $post->ID, 'source_url', true ) ) ) : ?>

				<?php the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" class="block-link" title="%s" rel="bookmark" target="_blank">',
					 esc_url( $source_url ),
					 esc_attr( $post->post_title )
					),
				'</a></h2>' ); ?>

			<?php else : ?>

				<?php the_title(
					sprintf( '<h2 class="entry-title"><a href="%s" class="block-link" title="%s" rel="bookmark">',
					 esc_url( get_permalink( $post->ID ) ),
					 esc_attr( $post->post_title )
					),
				'</a></h2>' ); ?>

			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php if( is_category( 'projects' ) ) : ?>

			<div class="entry-excerpt">

				<?php the_content(); ?>

			</div><!-- .entry-content -->

		<?php elseif( $excerpt = $post->post_excerpt ) : ?>

			<div class="entry-excerpt">

				<?php esc_html_e( $excerpt, 'pai' ); ?>

			</div><!-- .entry-content -->

		<?php endif; ?>

		<footer class="entry-footer">

			<?php if( has_category( 'press-mention' ) && ( $publication = get_post_meta( $post->ID, 'publication', true ) ) ) : ?>

				<?php if( $url = get_post_meta( $post->ID, 'source_url', true ) ) :  ?>

					<div class="entry-meta source-publication">
						<a href="<?php echo esc_url( $url ); ?>" title="View <?php echo esc_attr( $publication ); ?>" target="_blank"><?php esc_html_e( $publication ); ?></a>
					</div>

				<?php else : ?>

					<div class="entry-meta source-publication">
						<?php esc_html_e( $publication ); ?>
					</div>

				<?php endif; ?>

			<?php endif; ?>

			<div class="entry-meta post-date">

				<?php if( is_category( 'projects' ) ) : ?>

					<?php the_post_thumbnail( 'medium', array( 'class' => 'project-logo img-fluid' ) ); ?>

				<?php else : ?>

					<?php pai_published_date(); ?>

				<?php endif; ?>

			</div><!-- .entry-meta -->

		</footer><!-- .entry-footer -->

</article><!-- #post-## -->
