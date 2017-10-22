<?php
/**
 * PAI Set-up Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

/**
 * Basic Theme Set-up
 *
 * @since 0.1.0
 *
 * @return void
 */
function pai_setup() {

    load_theme_textdomain( 'pai', get_template_directory() . '/languages' );
    set_post_thumbnail_size( 350, 260, true );

    /**
     * Add Jetpack Featured Content Support
     *
     * @since 0.1.0
     *
     * @return void
     */
    add_theme_support( 'featured-content', array(
        'filter'     => 'pai_get_featured_posts',
        'max_posts'  => 5,
        'post_types' => array( 'report' ),
    ) );

}
add_action( 'after_setup_theme', 'pai_setup', 20 );

/**
 * Set Image Sizes
 *
 * @since 0.1.0
 */
update_option( 'thumbnail_size_w', 550 );
update_option( 'thumbnail_size_h', 550 );
update_option( 'thumbnail_crop', 1 );
update_option( 'medium_size_w', 600 );
update_option( 'medium_size_h', 600 );
update_option( 'large_size_w', 1200 );
add_image_size( 'slide', 1200, 600, true );

/**
 * Register Widget Areas
 *
 * @since 0.1.0
 *
 * @uses register_sidebar()
 * @uses widgets_init action hook
 *
 * @return void
 */
function pai_widgets(){
  register_sidebar( array(
    'name'          => __( 'Section Navigation', 'pai' ),
    'id'            => 'section-nav',
    'description'   => __( 'Section navigation, which appears under the main nav when subpages exist.', 'pai' ),
    'before_widget' => '<nav id="section-menu" class="section-navigation navbar-nav %2$s">',
    'after_widget'  => '</nav>',
    'before_title'  => '<h3 class="widget-title screen-reader-text">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Home Widget 1', 'pai' ),
    'id'            => 'home-1',
    'description'   => __( 'Home page widget area 1.', 'pai' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Home Widget 2', 'pai' ),
    'id'            => 'home-2',
    'description'   => __( 'Home page widget area 2.', 'pai' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Site Info', 'pai' ),
    'id'            => 'site-info',
    'description'   => __( 'Site info that appears in footer. Could be used for copyright information or terms.', 'pai' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'pai_widgets' );

/**
 * Add Filters to `meta_content`
 * Ensures that `meta_content` is return like `the_content`
 *
 * @since 0.1.0
 */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'widget_text', 'do_shortcode' );
