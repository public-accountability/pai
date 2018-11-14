<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 * @subpackage pai
 */
?>

<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">

	<?php pai_jetpack_share(); ?>

	<div class="sticky">

		<?php if( function_exists( 'get_field' ) && $file = get_field( 'pdf_link' ) ) : ?>
			<aside class="button">
				<a href="<?php echo esc_url( $file['url'] ); ?>" class="btn btn-info" target="_blank"><?php esc_html_e( 'View PDF', 'pai' ); ?></a>
			</aside>
		<?php endif; ?>

		<?php dynamic_sidebar( 'right-sidebar' ); ?>

		<?php if( function_exists( 'get_field' ) && $content = get_field( 'related_content' ) ) : ?>
			<aside class="related-reports">

					<ul class="post-list">

						<?php foreach( $content as $post ) : ?>
							<?php get_template_part( 'loop-templates/list', 'post' ) ?>
						<?php endforeach; ?>

					</ul>

			</aside>
		<?php else : ?>

			<?php if( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
				<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
			<?php endif; ?>

		<?php endif; ?>

		<?php if( function_exists( 'get_field' ) && $press = get_field( 'related_press' ) ) : ?>
			<aside class="press-mentions">

				<h2 class="widget-title"><?php esc_html_e( 'In the Press', 'pai' ); ?></h2>

				<ul class="post-list">

					<?php foreach( $press as $post ) : ?>
						<?php get_template_part( 'loop-templates/content', 'sidebar-post' ) ?>
					<?php endforeach; ?>

				</ul>

			</aside>
		<?php endif; ?>

	</div>

</div><!-- #secondary -->
