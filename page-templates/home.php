<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a static homepage
 *
 * @package understrap
 * @subpackage pai
 * @since 0.0.1
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'global-templates/hero', 'static' ); ?>

<?php get_template_part( 'global-templates/hero', 'none' ); ?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'home' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php if ( is_active_sidebar( 'home-1' ) ) : ?>

	<div class="wrapper" id="wrapper-home-1">

		<div class="container">
			<?php dynamic_sidebar( 'home-1' ); ?>
		</div>

	</div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'home-2' ) ) : ?>

	<div class="wrapper" id="wrapper-home-2">

		<div class="container">
			<?php dynamic_sidebar( 'home-2' ); ?>
		</div>

	</div>

<?php endif; ?>

<?php if ( is_active_sidebar( 'home-3' ) ) : ?>

	<div class="wrapper" id="wrapper-home-3">

		<div class="container">
			<?php dynamic_sidebar( 'home-3' ); ?>
		</div>

	</div>

<?php endif; ?>

<?php get_footer(); ?>
