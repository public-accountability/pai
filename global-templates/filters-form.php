<?php
/**
 * Custom Search
 *
 * @package understrap
 * @subpackage pai
 */

?>

<?php
$cat_args = array(
  'show_option_all'    => __( 'All Categories', 'pai' ),
  'hide_if_empty'      => true,
  'name'               => 'category',
  'post_type'          => array( 'report' )
);
$series_args = array(
  'show_option_all'    => __( 'All Series', 'pai' ),
  'hide_if_empty'      => true,
  'taxonomy'           => 'series',
  'name'               => 'series',
  'post_type'          => array( 'report' )
);
$archive_args = array(
  'type'               => 'yearly',
  'post_type'          => 'report',
  'format'             => 'option',
);
?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php home_url( '/' ); ?> ">
	<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'pai' ); ?></label>
  <div class="search-group">
    <input type="search" value="<?php get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search', 'pai' ); ?>" />
		<button type="submit"><span class="fa fa-long-arrow-right"></span><span class="screen-reader-text"><?php _e( 'Search', 'pai' ); ?></span></button>
  </div>
  <?php wp_dropdown_categories( $cat_args ); ?>
  <?php wp_dropdown_categories( $series_args ); ?>
  <select id="year" name="year" class="postform">
    <option value="0"><?php echo esc_attr( __( 'All Years', 'pai' ) ); ?></option>
    <?php wp_get_archives( $archive_args ); ?>
  </select>
</form>
