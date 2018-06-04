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
  } elseif ( is_tax() ) {
    $title = single_term_title( '', false );
  } elseif ( is_post_type_archive() ) {
    $title = post_type_archive_title( '', false );
  }
  return $title;
}
add_filter( 'get_the_archive_title', 'pai_get_the_archive_title' );

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
add_filter( 'wp_nav_menu_objects', 'pai_section_wp_nav_menu_objects', 10, 2 );

/**
 * Add Search Menu Item
 *
 * @since 0.1.0
 *
 * @uses wp_nav_menu_items filter
 * @param array $items
 * @param array $args
 */
function pai_add_search_menu( $items, $args ) {
  if( 'primary' === $args->theme_location ) {
    $items .= sprintf( '<li class="menu-item search-menu"><a id="search-link" href="%s" title="%s" rel="search"><span class="search-icon fa fa-search"></span><span class="screen-reader-text">%s</span></a></li>',
      esc_attr( '#search' ),
      esc_attr( __( 'Click to Search Site', 'pai' ) ),
      esc_attr( __( 'Search', 'pai' ) )
    );
  }
  return $items;
}
add_filter( 'wp_nav_menu_items', 'pai_add_search_menu', 10, 2 );

/**
 * Set up Custom Search
 *
 * @since 0.1.0
 *
 * @uses get_search_form filter
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 *
 * @param string $form
 * @return string $form modified HTML
 */
function pai_custom_search_form( $form ) {

  ob_start();

  include( get_stylesheet_directory() .'/global-templates/custom-search.php' );

  $form = ob_get_clean();

  return $form;
}
add_filter( 'get_search_form', 'pai_custom_search_form' );

/**
 * Filter Get Terms
 * Filter the terms clauses to accept post type
 * This is specifically used to allow the post_type argument in `wp_dropdown_categories()`
 *
 * @since 0.1.0
 *
 * @uses term_clauses filter hook
 * @link https://developer.wordpress.org/reference/hooks/terms_clauses/
 *
 * @param array $clauses
 * @param string $taxonomy
 * @param array $args
 * @return array $clauses
 */
function pai_terms_clauses( $clauses, $taxonomy, $args ) {
  global $wpdb;

  if ( isset( $args['post_type'] ) && !empty( $args['post_type'] ) ) {
    $post_types = $args['post_type'];

    if ( is_array( $args['post_type'] ) ) {
      $post_types = implode( "','", $args['post_type'] );
    }
    $clauses['join'] .= " INNER JOIN $wpdb->term_relationships AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN $wpdb->posts AS p ON p.ID = r.object_id";
    $clauses['where'] .= " AND p.post_type IN ('". esc_sql( $post_types ). "') GROUP BY t.term_id";
  }

  return $clauses;
}
add_filter( 'terms_clauses', 'pai_terms_clauses', 99999, 3 );

/**
 * Include Reports on Author Pages
 *
 * @since 0.1.0
 *
 * @param  obj $query [description]
 * @return void
 */
function pai_pre_get_posts( $query ) {
  if( is_admin() || ! $query->is_main_query() ) {
    return;
  }

  if( $query->is_author() ) {
    $query->set( 'post_type', array( 'report' ) );
  }
}
add_action( 'pre_get_posts', 'pai_pre_get_posts' );
