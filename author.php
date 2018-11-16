<?php
/**
 * The template for displaying author pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 * @subpackage pai
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = 'none';
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<?php $author = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) ); ?>

				<?php
				global $wp_query;
				$author = $wp_query->get_queried_object();
				?>

				<header class="page-header author-header">

					<?php if( $display_name = $author->display_name ) : ?>
						<h1 class="page-title"><?php echo apply_filters( 'the_title', $display_name ); ?></h1>
					<?php else : ?>
						<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
					<?php endif; ?>

					<?php if( $description = $author->description ) : ?>
						<div class="taxonomy-description"><?php echo apply_filters( 'the_content', $description ); ?></div>
					<?php else : ?>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
					<?php endif; ?>

				</header><!-- .page-header -->

					<!-- The Loop -->
					<?php if ( have_posts() ) : ?>

						<section class="list-view row js-results">

							<?php while ( have_posts() ) : the_post(); ?>

								<div class="grid-item">

								<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'loop-templates/entry', 'report' );
								?>

							</div>

							<?php endwhile; ?>

						</div>

					<?php else : ?>

						<?php get_template_part( 'loop-templates/content', 'none' ); ?>

					<?php endif; ?>

					<!-- End Loop -->

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php understrap_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
