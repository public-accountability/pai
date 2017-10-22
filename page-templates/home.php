<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a static homepage
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
<?php if( function_exists( 'have_rows' ) && have_rows( 'hero' ) ) : ?>
	<?php get_template_part( 'global-templates/hero', 'static' ); ?>
<?php endif; ?>

<?php if ( pai_has_featured_posts() ) : ?>

	<?php// get_template_part( 'global-templates/hero', 'slider' ); ?>

<?php endif; ?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php get_template_part( 'global-templates/section' ); ?>

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
