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
  $featured_tag = pai_get_featured_tag();
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

  if( 'report' === get_post_type() ) {
    $featured_label = esc_attr( 'Report' );
  } else {
    $category = get_the_category();
    $featured_label = ( 'uncategorized' !== $category[0]->slug ) ? $category[0]->slug : '';
  }

	echo '<span class="featured-category">' . $featured_tag . ' ' . $featured_label. '</span><span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
}

/**
 * Displays Publish Date
 *
 * @since 0.1.0
 *
 * @return void
 */
function pai_published_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	echo '<span class="posted-on">' . $time_string . '</span>'; // WPCS: XSS OK.
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
  //$text = apply_filters( 'get_the_excerpt', $text );

  /* Readd excerpt filters added by parent theme */
  add_filter( 'wp_trim_excerpt', 'all_excerpts_get_more_link' );
  add_filter( 'excerpt_more', 'custom_excerpt_more' );

  echo $text;
}

/**
 * Display Authors
 *
 * @uses coauthors_posts_links
 *
 * @return void
 */
function pai_the_author_posts_link() {
  if ( function_exists( 'coauthors_posts_links' ) ) {
    coauthors_posts_links();
  } else {
    the_author_posts_link();
  }
}

/**
 * Display Page Nav
 *
 * @return void
 */
function understrap_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );
  $in_same_term = ( has_category( array( 'jobs' ) ) ) ? true : false;

  if ( ! $next && ! $previous ) {
    return;
  }
  ?>
      <nav class="navigation post-navigation container">
        <h2 class="sr-only"><?php _e( 'Post navigation', 'understrap' ); ?></h2>
        <div class="row nav-links">

          <div class="grid-item previous col-md-6">
          <?php
            if ( get_previous_post_link() ) {
              previous_post_link( '<div class="nav-previous">%link</div>', _x( '<i class="fa fa-caret-left"></i>&nbsp;%title', 'Previous post link', 'understrap' ), $in_same_term );
            }
          ?>
          </div>
          <div class="grid-item next col-md-6">
          <?php
            if ( get_next_post_link() ) {
              next_post_link( '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<i class="fa fa-caret-right"></i>', 'Next post link', 'understrap' ), $in_same_term );
            }
          ?>
          </div>

        </div><!-- .nav-links -->
      </nav><!-- .navigation -->

  <?php
}

/**
 * Display Default Image
 *
 * @uses get_theme_mod() @link https://developer.wordpress.org/reference/functions/get_theme_mod/
 * @uses wp_get_attachment_image() @link https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
 *
 * @param  string $image_size
 * @param  array  $image_class
 * @return void
 */
function pai_default_featured_image( $image_size = 'thumbnail', $image_class = array( 'class' => 'wp-post-image' ) ) {
  if( $default = get_theme_mod( 'default_featured_image' ) ) {

    echo wp_get_attachment_image( $default, $image_size, '', $image_class );

  } else { ?>

    <img src="<?php echo trailingslashit( get_stylesheet_directory_uri() ) . 'images/default-featured-image.jpg' ?> " alt="" class="<?php echo $image_class['class']; ?> ">

  <?php
  }
}
