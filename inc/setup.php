<?php
/**
 * PAI Set-up Functions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package understrap
 * @subpackage pai
 * @since 0.0.1
 */

/**
 * Basic Theme Set-up
 *
 * @since 0.0.1
 *
 * @return void
 */
function pai_setup() {

    load_theme_textdomain( 'pai', get_template_directory() . '/languages' );
    set_post_thumbnail_size( 350, 260, true );
}
add_action( 'after_setup_theme', 'pai_setup', 20 );

/**
 * Register Widget Areas
 *
 * @since 0.0.1
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
    'name'          => __( 'Home 1', 'pai' ),
    'id'            => 'home-1',
    'description'   => __( 'Home page widget area 1.', 'pai' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Home 2', 'pai' ),
    'id'            => 'home-2',
    'description'   => __( 'Home page widget area 2.', 'pai' ),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Home 3', 'pai' ),
    'id'            => 'home-3',
    'description'   => __( 'Home page widget area 3.', 'pai' ),
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
 * @since 0.0.1
 */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'widget_text', 'do_shortcode' );
