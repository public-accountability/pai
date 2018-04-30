<?php
/**
 * Template Name: Research Page Template
 *
 * Template for displaying a list of series
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
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

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

				<?php
				$args = array(
					'post_type'					=> array( 'report' )
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : ?>

				<section id="press-posts" class="list-view press-posts row">
					<?php while( $query->have_posts() ) : $query->the_post(); ?>

					<div class="grid-item">
						<?php get_template_part( 'loop-templates/list', 'report' ); ?>
					</div>

					<?php endwhile; ?>
				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination( $query ); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
