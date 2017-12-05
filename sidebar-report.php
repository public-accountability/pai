<?php
/**
 * The right sidebar containing the main widget area.
 *
 * @package understrap
 * @subpackage pai
 */
?>

<div class="col-md-3 widget-area" id="right-sidebar" role="complementary">

	<?php if( function_exists( 'get_field' ) && $file = get_field( 'pdf_link' ) ) : ?>
		<aside class="button">
			<a href="<?php echo esc_url( $file['url'] ); ?>" class="btn btn-info" download="<?php esc_html_e( $file['filename'] ); ?>"><?php esc_html_e( 'Download PDf', 'pai' ); ?></a>
		</aside>
	<?php endif; ?>

	<aside class="toc">

		<?php the_widget(
	    'ezTOC_Widget',
			array(
				'title' => esc_html( 'Contents', 'pai' )
			),
		    array()
		); ?>

	</aside>

	<aside class="related-reports">
		<?php if( has_term( '', 'series' ) ) : ?>
			<?php the_widget(
		    'Series\Widgets\List_Related',
			    array(
						'title' => esc_html( 'Series', 'pai' )
					),
			    array()
			); ?>
		<?php else : ?>
			<?php if( function_exists( 'get_field' ) && $content = get_field( 'related_content' ) ) : ?>

				<ul class="post-list">

					<?php foreach( $content as $post ) : ?>
						<?php get_template_part( 'loop-templates/list', 'post' ) ?>
					<?php endforeach; ?>

				</ul>

			<?php endif; ?>
		<?php endif; ?>
	</aside>

	<?php if( function_exists( 'get_field' ) && $press = get_field( 'related_press' ) ) : ?>
		<aside class="press-mentions">

			<ul class="post-list">

				<?php foreach( $press as $post ) : ?>
					<?php get_template_part( 'loop-templates/list', 'post' ) ?>
				<?php endforeach; ?>

			</ul>

		</aside>
	<?php endif; ?>

</div><!-- #secondary -->
