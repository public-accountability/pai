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

		<section id="<?php echo ( $section_id = get_sub_field( 'section_id' ) ) ? esc_attr( $section_id ) : uniqid(); ?>" class="home-section row">

			<?php if( $section_heading = get_sub_field( 'section_heading' ) ) : ?>

				<header class="section-header col-12">
					<h2 class="section-heading"><?php echo apply_filters( 'the_title', $section_heading ); ?></h2>
				</header>

			<?php endif; ?>

			<?php if( have_rows( 'section_items' ) ): ?>

				<?php while( have_rows( 'section_items' ) ) : the_row(); // start individual section loop  ?>

					<?php get_template_part( 'loop-templates/content', 'section' ); ?>

				<?php endwhile; // end individual section loop ?>

			<?php endif; ?>

		</section>

	<?php endwhile; // end sections loop ?>

<?php endif; ?>
