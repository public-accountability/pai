<?php
/**
 * Template Name: Team Page Template
 *
 *
 * @package understrap
 * @subpackage pai
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );

?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">

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
				/* ACF Must Exist */
				if( function_exists( 'get_fields' ) && ( $fields = get_fields() ) ) : ?>
					<?php
					$team_array = get_field( 'team_members' );

					/* Get Array Categories */
					$field = get_field_object( 'field_category' );
					$categories = $field['choices'];
					?>

					<?php if( !empty( $categories ) ) : ?>

						<section class="team-list">

							<?php foreach( $categories as $value => $label ) : ?>

							<h2 class="team-category"><?php echo apply_filters( 'the_title', $label ); ?></h2>

								<?php foreach( $team_array as $person ) : ?>

									<?php if( !empty( $person['category']['value'] ) && $value === $person['category']['value'] ) : ?>

										<article class="hentry type-team-member row">

											<figure class="entry-image col-sm-4">
												<?php if( !empty( $person['image'] ) ) : ?>
													<?php echo sprintf( '<img src="%s" alt="%s" title="%s" height="%s" width="%s" />',
														esc_url( $person['image']['sizes']['medium'] ),
														esc_attr( $person['name']),
														esc_attr( $person['name']),
														esc_attr( $person['image']['sizes']['medium-height'] ),
														esc_attr( $person['image']['sizes']['medium-width'] )
													); ?>
												<?php else : ?>
													<img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ) . 'images/default-person.png' ; ?>" alt="" height="300" width="300" />
												<?php endif; ?>
											</figure>

											<div class="entry-body col-sm-8">

												<header class="entry-header">
													<h3 class="entry-title"><?php esc_html_e( $person['name'], 'pai' ) ?></h3>
													<h4 class="entry-role h5"><?php esc_html_e( $person['role'], 'pai' ) ?></h4>
												</header>
												<div class="entry-content">
													<?php echo apply_filters( 'the_content', $person['description'] ); ?>
												</div>
												<?php if( !empty( $person['email'] ) ) : ?>
													<footer class="entry-footer">
														<?php echo sprintf( '<a href="mailto:%s" class="btn btn-secondary understrap-read-more" title="Email %s" rel="nofollow">%s</a>',
															sanitize_email( $person['email'] ),
															esc_attr( $person['name'] ),
															esc_html__( 'Contact', 'pai' )
													 	); ?>
													</footer>
												<?php endif; ?>

											</div>

										</article>

									<?php endif; ?>

								<?php endforeach; ?>

							<?php endforeach; ?>

						</section>

					<?php endif; ?>

				<?php endif; ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
