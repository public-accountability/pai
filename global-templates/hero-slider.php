<?php
/**
 * Featured Content Slider
 *
 * @package understrap
 */

?>

<div class="wrapper" id="wrapper-hero">

	<!-- ******************* Featured Content ******************* -->

	<div id="carouselExampleControls" class="carousel slide featured-content" data-ride="carousel">

		<div class="carousel-inner" role="listbox">

			<?php $posts = pai_get_featured_posts(); ?>

			<?php if( !empty( $posts ) ) : ?>

				<?php foreach( $posts as $post ) : setup_postdata( $post ); ?>

					<?php get_template_part( 'loop-templates/content', 'slide' ); ?>

				<?php endforeach; ?>

				<?php wp_reset_postdata(); ?>

			<?php endif; ?>

		</div>

		 <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">

		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

		    <span class="sr-only screen-reader-text">Previous</span>

		 </a>

		 <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">

		    <span class="carousel-control-next-icon" aria-hidden="true"></span>

		    <span class="sr-only screen-reader-text">Next</span>

		</a>

	</div><!-- .carousel -->

</div>

<script>
jQuery( ".carousel-item" ).first().addClass( "active" );
</script>
