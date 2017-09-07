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

function pai_setup() {

    load_theme_textdomain( 'pai', get_template_directory() . '/languages' );

    set_post_thumbnail_size( 350, 260, true );
}
add_action( 'after_setup_theme', 'pai_setup', 20 );

/**
 * Register Widget Areas
 *
 * @since 0.0.7
 *
 * @uses register_sidebar()
 * @uses widgets_init action hook
 *
 * @return void
 */
function pai_widgets(){
  register_sidebar( array(
    'name'          => __( 'Footer Info', 'pai' ),
    'id'            => 'footer-info',
    'description'   => 'Footer info area. Could be used for copyright information or terms.',
    'before_widget' => '<div id="%1$s" class="site-info %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'pai_widgets' );

/**
 * Add Filters to `meta_content`
 * Ensures that `meta_content` is return like `the_content`
 *
 * @since 0.1.8
 */
add_filter( 'meta_content', 'wptexturize'        );
add_filter( 'meta_content', 'convert_smilies'    );
add_filter( 'meta_content', 'convert_chars'      );
add_filter( 'meta_content', 'wpautop'            );
add_filter( 'meta_content', 'shortcode_unautop'  );
add_filter( 'widget_text', 'do_shortcode' );
