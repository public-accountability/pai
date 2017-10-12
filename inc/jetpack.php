<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.me/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

/**
 * Don't concatenate JetPack styles
 *
 * @since 0.1.0
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

/**
 * Has Featured Posts
 *
 * @since 0.1.0
 *
 * @param integer $minimum
 * @return boolval true | false
 */
function pai_has_featured_posts( $minimum = 1 ) {
  if( is_paged() ) {
    return false;
  }

  $minimum = absint( $minimum );

  $featured_posts = apply_filters( 'pai_get_featured_posts', array() );

  if( !is_array( $featured_posts ) ) {
    return false;
  }

  if( $minimum > count( $featured_posts ) ) {
    return false;
  }

  return true;

}

/**
 * Get Featured pai_get_featured_posts
 *
 * @since 0.1.0
 *
 * @return array
 */
function pai_get_featured_posts() {
  return apply_filters( 'pai_get_featured_posts', array() );
}

function pai_get_featured_tag() {
  if( class_exists( 'Featured_Content' ) && current_theme_supports( 'featured-content' ) ) {
    $settings = Featured_Content::get_setting();

    if( !empty( $settings ) ) {
      $tag = get_term_by( 'id', $settings['tag-id'], 'post_tag' );
      return $tag->name;
    }
  }
  return false;
}
