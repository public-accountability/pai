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
 * @since 0.1.0
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

add_filter( 'wp_nav_menu_objects', 'pai_section_wp_nav_menu_objects', 10, 2 );
/**
 * Second-level Navigation
 * Display the second level nav items for current page
 *
 * @since 0.1.0
 *
 * @uses wp_nav_menu_objects filter
 * @link https://developer.wordpress.org/reference/hooks/wp_nav_menu_objects/
 *
 * @usage add `'sub_menu' => true` to your `wp_nav_menu()` arguments array
 *
 * @param array $sorted_menu_items
 * @param array $args
 * @return array $sorted_menu_items
 */
function pai_section_wp_nav_menu_objects( $sorted_menu_items, $args ) {
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;

    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the `root_id` based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }

    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          }
        }
      }
    }

    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init `menu_item_parents`
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;

      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }

    return $sorted_menu_items;
  } else {
    return $sorted_menu_items;
  }
}
