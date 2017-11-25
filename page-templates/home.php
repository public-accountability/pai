<?php
/**
 * Template Name: Home Page Template
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


					<?php if( is_active_sidebar( 'page' ) ) : ?>

						<section class="row page-section">

							<header class="section-header col-12">
								<h2 class="section-heading"><span><?php _e( 'What We Offer', 'pai' ); ?></span></h2>
							</header>

							<?php dynamic_sidebar( 'page' ) ?>

						</section>

					<?php endif; ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
