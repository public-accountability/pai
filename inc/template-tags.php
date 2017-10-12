<?php
/**
 * PAI Template Tags
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

/**
 * JetPack Share Template Tag
 *
 * @since 0.0.9
 *
 * @return void
 */
function pai_jetpack_share() {
  if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
  }

  if ( class_exists( 'Jetpack_Likes' ) ) {
    $custom_likes = new Jetpack_Likes;
    echo $custom_likes->post_likes( '' );
  }
}

/**
 * [understrap_posted_on description]
 */
function pai_featured_post_meta() {
  $category = pai_get_featured_tag();
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'understrap' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<span class="featured-category">' . $featured_category . '</span><span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}
