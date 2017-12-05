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
 * Enable email social link
 *
 * @since 0.1.0
 */
add_filter( 'sharing_services_email', '_return_true' );

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

/**
 * Modify related posts
 *
 * @since 0.0.1
 *
 * @link https://jetpack.com/support/related-posts/customize-related-posts/
 *
 * @return void
 */
function pai_modify_related_posts() {
  if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
    $related_posts = Jetpack_RelatedPosts::init();
    $callback = array( $related_posts, 'filter_add_target_to_dom' );
    remove_filter( 'the_content', $callback, 40 );
  }
}
add_filter( 'wp', 'pai_modify_related_posts', 20 );

/**
 * Remove JetPack Share Links from Content and Excerpt
 *
 * @since 0.0.9
 *
 * @link https://jetpack.com/2013/06/10/moving-sharing-icons/
 *
 * @return void
 */
function pai_jetpack_remove_share() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );

    if ( class_exists( 'Jetpack_Likes' ) ) {
        remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
    }
}
add_action( 'loop_start', 'pai_jetpack_remove_share' );
