<?php
/**
 * Hero setup.
 *
 * @package understrap
 * @subpackage pai
 */

?>

<?php if( function_exists( 'have_rows' ) && have_rows( 'hero' ) ) : ?>

	<div class="wrapper" id="wrapper-statichero">

		<div class="container">

			<?php while( have_rows( 'hero' ) ) : the_row(); ?>

				<?php get_template_part( 'loop-templates/content', 'hero' ); ?>

			<?php endwhile; ?>

		</div>

	</div>

<?php endif; ?>
