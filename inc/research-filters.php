<?php
/**
 * PAI Research Filters
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

 /**
  * Enqueue Research Filter Scripts
  *
  * @since 0.1.0
  *
  * @uses wp_localize_script()
  *
  * @return void
  */
  function pai_research_filters_enqueue_scripts() {
   /**
    * Frontend AJAX requests.
    */
    if( is_post_type_archive( 'report' ) ) {
      wp_deregister_script( 'jquery-slim' );
      wp_enqueue_script( 'pai-research-filters', get_stylesheet_directory_uri() . '/js/research-filters.js', array( 'jquery' ), null, true );
      wp_localize_script( 'pai-research-filters', 'research_filters',
        array(
          'nonce'         => wp_create_nonce( 'pai_research_filters' ),
          'ajax_url'      => admin_url( 'admin-ajax.php' ),
        )
      );
    }
  }
  add_action( 'wp_enqueue_scripts', 'pai_research_filters_enqueue_scripts' );

 /**
  * Get Posts
  * Get $_POST values and return content
  *
  * @since 0.1.0
  *
  * @uses do_taxonomy_filters action
  * @uses wp_ajax_ action hook
  * @uses WP_Query()
  * @uses wp_verify_nonce()
  *
  * @link https://codex.wordpress.org/Class_Reference/WP_Query
  * @link https://codex.wordpress.org/Plugin_API/Action_Reference/wp_ajax_(action)
  *
  * @return void
  */
  function pai_filter_posts() {

    if( !isset( $_POST['nonce'] ) || !wp_verify_nonce( $_POST['nonce'], 'pai_research_filters' ) ) {
      die( 'Permission denied' );
    }

    $args = array(
      'post_type'    => 'report'
    );

    if( $_POST['args']['s'] ) {
      $args['s'] = sanitize_text_field( $_POST['args']['s'] );
    }

    if( $_POST['args']['category'] ) {
      $args['cat'] = absint( $_POST['args']['category'] );
    }

    if( $_POST['args']['series'] ) {
      $args['tax_query'][] = array(
        'taxonomy'      => 'series',
        'field'         => 'id',
        'terms'         => array( absint( $_POST['args']['series'] ) )
      );
    }

    if( $_POST['args']['year'] ) {
      if( $url = parse_url( sanitize_text_field( $_POST['args']['year'] ) ) ) {
        $args['year'] = absint( basename( $url['path'] ) );
      }
    }

    $posts_query = new WP_Query( $args );

    ob_start();

    if( $posts_query->have_posts() ) {

      while( $posts_query->have_posts() ) :
        $posts_query->the_post(); ?>

        <div class="grid-item">

          <?php get_template_part( 'loop-templates/list', 'report' ); ?>

        </div><!-- .grid-item -->

      <?php
      endwhile;

    } else {

      get_template_part( 'loop-templates/content', 'none' );

    }

    $response = array(
      'content'         => ob_get_clean(),
      'posts_found'     => intval( $posts_query->found_posts ),
    );

    wp_send_json( $response );

    die();

  }
  add_action( 'wp_ajax_do_research_filters', 'pai_filter_posts' ); // part after `wp_ajax_` corresponds to action called in JS
  add_action( 'wp_ajax_nopriv_do_research_filters', 'pai_filter_posts' ); // part after `wp_ajax_nopriv_` corresponds to action called in JS
