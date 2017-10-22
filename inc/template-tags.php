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
 * @since 0.1.0
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
 * Displays Post Meta for Featured Posts
 *
 * @since 0.1.0
 *
 * @return void
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
		esc_html_x( 'Posted on %s', 'post date', 'pai' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	echo '<span class="featured-category">' . $category . '</span><span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}

/**
 * Display Custom Excerpt
 *
 * @uses all_excerpts_get_more_link()
 * @uses custom_excerpt_more()
 *
 * @param string $text
 * @return void
 */
function pai_featured_the_excerpt( $text = null ) {
  /* Remove excerpt filters added by parent theme */
  remove_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );
  remove_filter( 'excerpt_more', 'custom_excerpt_more' );

  $text = ( !empty( $text ) ) ? $text : get_the_excerpt();
  $excerpt_length = apply_filters( 'excerpt_length',15 );
  $excerpt_more = apply_filters( 'excerpt_more', '...' );
  $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  $text = apply_filters( 'get_the_excerpt', $text );

  /* Readd excerpt filters added by parent theme */
  add_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );
  add_filter( 'excerpt_more', 'custom_excerpt_more' );

  echo $text;
}
