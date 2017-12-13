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

<div id="report-series-wrapper" class="wrapper">

	<div class="container">

		<div class="row">

			<?php
			$terms = get_terms( array(
					'taxonomy' 		=> 'series',
					'hide_empty' 	=> true,
			) );
			?>

			<section id="report-series">

				<?php if( !empty( $terms ) ) : ?>

					<?php if( $report_series_heading = get_post_meta( $post->ID, 'research_series_section_section_title', true ) ) : ?>
						<head class="section-heading">
							<h2 class="section-title"><?php echo esc_html_e( $report_series_heading, 'pai' ); ?></h2>

							<?php if( $report_series_description = get_post_meta( $post->ID, 'research_series_section_section_description', true ) ) : ?>

								<div class="section-description"><?php echo $report_series_description; ?></div>

							<?php endif; ?>
						</head>
					<?php endif; ?>

					<div class="grid-list">

					<?php foreach( $terms as $term ) : ?>

						<article class="term" id="term-<?php echo $term->term_id; ?>">

							<header class="entry-header">

								<h3 class="entry-title"><a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark"><?php echo esc_attr( $term->name ); ?></a></h3>

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php echo $term->description; ?>

							</div><!-- .entry-content -->

							<footer class="entry-footer">

								<p><a href="<?php echo esc_url( get_term_link( $term->term_id ) ); ?>" title="<?php echo esc_attr( $term->name ); ?>" rel="bookmark" class="understrap-read-more-link"><?php _e( 'View the Series', 'pai' ); ?></a></p>

							</footer><!-- .entry-footer -->

						</article><!-- #post-## -->

					<?php endforeach; ?>

					</div>

				<?php endif; ?>

			</section><!-- #report-series -->

		</div><!-- .row-->

	</div><!-- Container end -->

</div><!-- #report-series-wrapper -->

<div id="research-reports-wrapper" class="wrapper">

	<div class="container">

		<div class="row">

			<?php $report_args = array(
				'post_type'		=> 'report',
			); ?>
			<?php $report_query = new WP_Query( $report_args ); ?>

			<?php if( $report_query->have_posts() ) : ?>

				<section id="research-reports">

					<?php if( $research_reports_heading = get_post_meta( $post->ID, 'research_reports_section_section_title', true ) ) : ?>
						<head class="section-heading">
							<h2 class="section-title"><?php echo esc_html_e( $research_reports_heading, 'pai' ); ?></h2>

							<?php if( $research_reports_description = get_post_meta( $post->ID, 'research_reports_section_section_description', true ) ) : ?>

								<div class="section-description"><?php echo $research_reports_description; ?></div>

							<?php endif; ?>
						</head>
					<?php endif; ?>

					<div id="research-filters" class="post-filter">

						<?php get_template_part( 'global-templates/filters', 'form' ); ?>

					</div>

					<div id="research-posts" class="list-view">

					<?php $count = 1; ?>

					<?php while( $report_query->have_posts() ) : $report_query->the_post(); ?>

						<?php get_template_part( 'loop-templates/list', 'report' ); ?>

					<?php endwhile; ?>

					</div>

				</section><!-- #research-reports -->

			<?php endif; ?>

		</div><!-- .row-->

	</div><!-- Container end -->

</div><!-- #research-reports-wrapper -->

<?php get_footer(); ?>
