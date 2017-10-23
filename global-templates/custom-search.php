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

<script type="text/javascript">

  // var searchButton = jQuery('a[href="#search"]');
  // var searchForm = jQuery('#search');
  //
  // searchButton.on('click', function(event) {
  //     event.preventDefault();
  //     console.log(event);
  //     searchForm.addClass('open');
  //     jQuery('#search > form > input[type="search"]').focus();
  // });
  //
  // jQuery('#search, #search button.close').on('click keyup', function(event) {
  //     if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
  //         jQuery(this).removeClass('open');
  //     }
  // });
</script>
