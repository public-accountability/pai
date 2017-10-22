<?php
/**
 * Single post partial template.
 *
 * @package understrap
 * @subpackage pai
 */

?>
<?php
$featured_image = get_sub_field( 'display_featured_image' );
?>

<?php
$args = array();

if( $post_type = get_sub_field( 'post_type' ) ) {
	$args['post_type'] = $post_type;
}
if( $posts_per_page = get_sub_field( 'posts_per_page' ) ) {
	$args['posts_per_page'] = (int) $posts_per_page;
}
if( ( $category = get_sub_field( 'category' ) )  ) {
	$args['category__in'] = $category;
}
if( $tag = get_sub_field( 'post_tag' ) ) {
	$args['tag__in'] = $tag;
}
if( $series = get_sub_field( 'series' ) ) {
	$args['tax_query'] = array(
		array(
            'taxonomy' => 'series',
            'field'    => 'id',
            'terms'    => $series,
        ),
	);
}

$section_query = new WP_Query( $args );
?>

<div class="wrapper" id="wrapper-hero">

	<!-- ******************* Featured Content ******************* -->

	<div id="carouselControls" class="carousel slide featured-content" data-ride="carousel">

		<div class="carousel-inner" role="listbox">

			<?php if( $section_query->have_posts() ) : ?>

				<?php
				while( $section_query->have_posts() ) : $section_query->the_post();

				get_template_part( 'loop-templates/content', 'slide' );

				endwhile;

				wp_reset_postdata();
				wp_reset_query();

			endif;
			?>

		</div>

		 <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">

		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>

		    <span class="sr-only screen-reader-text">Previous</span>

		 </a>

		 <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">

		    <span class="carousel-control-next-icon" aria-hidden="true"></span>

		    <span class="sr-only screen-reader-text">Next</span>

		</a>

	</div><!-- .carousel -->

</div>

<script>
jQuery( ".carousel-item" ).first().addClass( "active" );
</script>
