(function($) {

  /**
   * Variables
   */
  var contentEl = $( '.js-results' );

  var searchForm = $( '.js-filter-form' );
  var searchSubmit = $( '.js-search-submit' );
  var filterEl = $( '.js-filter-form select' );

  var searchField = $( '.js-search-field' );

  var page = 1;
  var args = {};

  /**
   * Search
   */
  searchSubmit.click(function(event) {
    event.preventDefault();

    args['s'] = searchField.val();

    $(this).each( function( i, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    get_posts(args);

  });

  /**
   * Filter Event
   */
  filterEl.change(function(event) {
    event.preventDefault();

    args['s'] = searchField.val();

    $(this).each( function( index, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    get_posts(args);

  });

  /**
   * Get Posts
   * @param  obj args
   * @return obj response
   */
  function get_posts(args) {

    $.ajax({
      url: research_filters.ajax_url,
      data: {
        action: 'do_research_filters',
        /* Action corresponds to `wp_ajax_do_` and `wp_ajax_nopriv_` actions */
        nonce: research_filters.nonce,
        args: args
      },
      type: 'POST'
    })
    .success(function(response, textStatus, XMLHttpRequest) {

      // console.log( response );

      contentEl.html( response.content );

    })
    .error(function(response) {
      //console.log('error', response);
    })
    .complete(function(response) {
      //console.log(response);
    });

  }

})(jQuery);
