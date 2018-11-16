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

		<?php if( $content = get_post_meta( $post->ID, 'related_content', true ) ) : ?>
			<aside class="related-reports">

				<h2 class="widget-title"><?php esc_html_e( 'Related Content', 'pai' ); ?></h2>

				<?php
					$args = array(
						'post_type'		=> array( 'post', 'report' ),
						'post__in'		=> $content
					);
					$query = new WP_Query( $args );

					if( $query->have_posts() ) :
							while( $query->have_posts() ) : $query->the_post(); ?>

						<ul class="post-list">

							<?php get_template_part( 'loop-templates/content', 'sidebar-post' ) ?>

						</ul>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

			</aside>
		<?php else : ?>

			<?php if( class_exists( 'Jetpack_RelatedPosts' ) ) : ?>
				<?php echo do_shortcode( '[jetpack-related-posts]' ); ?>
			<?php endif; ?>

		<?php endif; ?>

		<?php if( $press = get_post_meta( $post->ID, 'related_press', true ) ) : ?>
			<aside class="press-mentions">

				<h2 class="widget-title"><?php esc_html_e( 'In the Press', 'pai' ); ?></h2>

				<?php
					$args = array(
						'post_type'		=> array( 'post', 'report' ),
						'post__in'		=> $press
					);
					$query = new WP_Query( $args );

					if( $query->have_posts() ) :
							while( $query->have_posts() ) : $query->the_post(); ?>

						<ul class="post-list">

							<?php get_template_part( 'loop-templates/content', 'sidebar-post' ) ?>

						</ul>

					<?php endwhile; ?>

					<?php wp_reset_postdata(); ?>

				<?php endif; ?>

			</aside>
		<?php endif; ?>

	</div>

</div><!-- #secondary -->
