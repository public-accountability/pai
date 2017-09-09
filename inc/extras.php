<?php
/**
 * PAI Custom Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */


/**
 * Override Parent Post Excerpt
 *
 * @since 0.1.0
 *
 * @param  string $post_excerpt
 * @return string $post_excerpt
 */
 function pai_excerpts_get_more_link( $post_excerpt ) {

   return $post_excerpt . ' ...<p><a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More <span>&rarr;</span>',
   'pai' ) . '</a></p>';
 }

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
// add_action( 'loop_start', 'pai_jetpack_remove_share' );

/**
 * Modify Default Archive title
 *
 * @since 0.0.1
 *
 * @uses get_the_archive_title filter hook
 * @link https://developer.wordpress.org/reference/hooks/get_the_archive_title/
 *
 * @param  string $title
 * @return string $title
 */
function pai_get_the_archive_title( $title ) {
  if( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_post_type_archive() ) {
    $title = post_type_archive_title( '', false );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'pai_get_the_archive_title' );

/**
 * Add Class to Menu Items
 *
 * @since 0.0.1
 *
 * @param array $classes
 * @param obj $item
 * @param array $args
 * @param int $depth
 *
 * @return array $classes
 */
// function pai_menu_item_classes( $classes, $item, $args, $depth ) {
//     $classes[] = 'nav-item';
//     return $classes;
// }
// add_filter( 'nav_menu_css_class', 'menu_item_classes', 10, 4 );
