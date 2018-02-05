<?php
/**
 * Template Name: Research Page Template
 *
 * The template for displaying the research page
 *
 * @package understrap
 * @subpackage pai
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page-research' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php if( function_exists( 'have_rows' ) && have_rows( 'subpages' ) ) : ?>

	<div class="research-sections-wrapper" class="wrapper">

		<div class="container">

			<div class="row">

				<section id="report-series" class="grid-list">

						<?php while( have_rows( 'subpages' ) ) :
							the_row(); ?>

							<?php if( $page = get_sub_field( 'page' ) ) : ?>

								<article class="page">

									<header class="entry-header">
										<?php echo sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">%s</a></h2>',
											esc_url( $page['url'] ),
											apply_filters( 'the_title', $page['title'] )
										 ); ?>
									</header>

									<?php if( $description = get_sub_field( 'page_description' ) ) : ?>
										<div class="entry-content">
											<?php echo apply_filters( 'the_excerpt', $description ); ?>
										</div>
									<?php endif; ?>

								</article>

							<?php endif; ?>

						<?php endwhile; ?>

				</section><!-- #report-series -->

			</div>

		</div>

	</div>

<?php endif; ?>

<?php get_footer(); ?>
