<?php
/**
 * Custom Search
 *
 * @package understrap
 * @subpackage pai
 */

?>

<div id="search">
    <button type="button" class="close"><?php _e( '×', 'pai' ); ?> </button>
    <form role="search" method="get" id="searchform" class="searchform" action="<?php home_url( '/' ); ?> ">
			<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'pai' ); ?></label>
      <div class="search-group">
        <input type="search" value="<?php get_search_query(); ?> " name="s" id="s" placeholder="<?php _e( 'Search', 'pai' ); ?>" />
  			<button type="submit"><span class="fa fa-search"></span><span class="screen-reader-text"><?php _e( 'Search', 'pai' ); ?></span></button>
      </div>
    </form>
</div>
