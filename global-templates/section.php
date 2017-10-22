<?php
/**
 * Hero setup.
 *
 * @package understrap
 * @subpackage pai
 */

?>

<?php if( function_exists( 'have_rows' ) && have_rows( 'sections' ) ) : ?>

	<?php while( have_rows( 'sections' ) ) : the_row();  // start sections loop ?>

		<section id="<?php echo ( $section_id = get_sub_field( 'section_id' ) ) ? esc_attr( $section_id ) : get_row_index(); ?>" class="home-section row">

			<?php if( $section_heading = get_sub_field( 'section_heading' ) ) : ?>

				<header class="section-header col-12">
					<h2 class="section-heading"><span><?php echo apply_filters( 'the_title', $section_heading ); ?></span></h2>
				</header>

			<?php endif; ?>

			<?php $field_type = get_sub_field( 'section_type' ); ?>
			<?php $display = get_sub_field( 'display' ); ?>

			<?php if( have_rows( 'section_items' ) ): ?>

				<?php while( have_rows( 'section_items' ) ) : the_row(); // start individual section loop  ?>

					<?php if( 'slide' === $display ) : ?>

						<?php get_template_part( 'loop-templates/content', 'section-slide' ); ?>

					<?php elseif( 'manual' === $field_type ) : ?>

						<?php get_template_part( 'loop-templates/content', 'section-manual' ); ?>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'section-dynamic' ); ?>

					<?php endif; ?>

				<?php endwhile; // end individual section loop ?>

			<?php endif; ?>

		</section>

	<?php endwhile; // end sections loop ?>

<?php endif; ?>
