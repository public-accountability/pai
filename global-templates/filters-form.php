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
  'show_option_all'    => __( 'All Topics', 'pai' ),
  'hide_if_empty'      => true,
  'taxonomy'           => 'topic',
);
$series_args = array(
  'show_option_all'    => __( 'All Series', 'pai' ),
  'hide_if_empty'      => true,
  'taxonomy'           => 'series',
  'name'               => 'series',
);
$archive_args = array(
  'type'               => 'yearly',
  'post_type'          => 'report',
  'format'             => 'option',
);
?>

<h3 class="form-title"><?php esc_html_e( 'Filter Reports', 'pai' ); ?></h3>

<form role="search" method="get" id="searchform" class="searchform search-filters js-filter-form" action="<?php home_url( '/' ); ?> ">
	<label for="s" class="search-fields">
    <span class="screen-reader-text"><?php esc_html_e( 'Search For', 'pai' ); ?></span>
    <div class="search-group">
      <input type="search" value="<?php get_search_query(); ?>" name="s" id="s" placeholder="<?php _e( 'Search', 'pai' ); ?>" class="js-search-field" /><button type="submit" class="js-search-submit"><span class="fa fa-long-arrow-right"></span><span class="screen-reader-text"><?php _e( 'Search', 'pai' ); ?></span></button>
    </div>
  </label>
  <label for="category" class="select-field js-category-fields">
    <span class="screen-reader-text"><?php esc_html_e( 'Select a Topic', 'pai' ); ?></span>
    <?php wp_dropdown_categories( $cat_args ); ?>
  </label>
  <label for="series" class="select-field js-series-fields">
    <span class="screen-reader-text"><?php esc_html_e( 'Select a Series', 'pai' ); ?></span>
    <?php wp_dropdown_categories( $series_args ); ?>
  </label>
  <label for="year" class="select-field js-year-fields">
    <span class="screen-reader-text"><?php esc_html_e( 'Select a Year', 'pai' ); ?></span>
    <select id="year" name="year" class="postform">
      <option value="0"><?php echo esc_attr( __( 'All Years', 'pai' ) ); ?></option>
      <?php wp_get_archives( $archive_args ); ?>
    </select>
</label>
</form>
