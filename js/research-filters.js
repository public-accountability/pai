(function($) {

  /**
   * Variables
   */
  var contentEl = $( '.js-results' );

  var filterEl = $( '.js-filter-form select' ),
      searchForm = $( '.js-filter-form' ),
      searchField = $( '.js-search-field' ),
      searchSubmit = $( '.js-search-submit' );

  var $paginationEl = $( '.js-page-pagination .pagination' ),
      $pagerEl = $( '.js-page-pagination a' ),
      $numberPages = $pagerEl.size(),
      $currentPage = $( '.js-page-pagination .current' );

  var args = {};

  /**
   * Built Pager Row for Each Page
   *
   * @param  {int} number
   * @param  {string} pagerItem
   * @return {string} output
   */
  function buildPager( number, current ) {
    var i;
    var output = '';

    if( number > 1 ) {
      for( i = 0; i < number; i++ ) {
        var pageNumber = i + 1;
        var currentClass = ( pageNumber === current ) ? ' current' : '';
        console.log( currentClass );
        output += '<li class="page-item"><a href="page/' + pageNumber + '/" class="page-link' + currentClass + '" data-page="' + pageNumber + '">' + pageNumber + '</a></li>\n';
      }
    }

    return output;
  }

  /**
   * Fetch Page Number from Pagination
   *
   * @param  {obj} element
   * @return {int} $page
   */
  function findPageNumber( element ) {
		var $page = element.data('page');
		return parseInt( $page );
  }

  /**
   * Search
   */
  searchSubmit.click(function(event) {
    event.preventDefault();

    args['s'] = searchField.val();
    args['paged'] = 1;

    /* UI State Changes */
    $( '.js-page-pagination li' ).removeClass( 'disabled' );
    $( '.js-page-pagination .current' ).removeClass( 'current' );
    $( '.js-page-pagination a' ).first().addClass( 'current' );
    $( '.js-page-pagination li' ).first().addClass( 'active' );

    $(this).each( function( i, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    getPosts(args);

  });

  /**
   * Filter Event
   */
  filterEl.change(function(event) {
    event.preventDefault();

    args['s'] = searchField.val();
    args['paged'] = 1;

    /* UI State Changes */
    $( '.js-page-pagination li' ).removeClass( 'disabled' );
    $( '.js-page-pagination .current' ).removeClass( 'current' );
    $( '.js-page-pagination a' ).first().addClass( 'current' );
    $( '.js-page-pagination li' ).first().addClass( 'active' );

    $(this).each( function( index, value ) {
      var value = $(this).val();
      if( value.length !== 0 ) {
        args[$(this).closest('select').attr('name')] = value;
      }

    } );

    getPosts(args);

  });

  /**
   * Pagination Event
   */
   $pagerEl.click(function(event) {
     event.preventDefault();

     args['s'] = searchField.val();
     args['paged'] = findPageNumber( $(this).clone() );

     /* UI State Changes */
     $( '.js-page-pagination li' ).removeClass( 'disabled' ).removeClass( 'active' );
     $( '.js-page-pagination .current' ).removeClass( 'current' );
     $(this).addClass( 'current' );
     $(this).closest( 'li' ).addClass( 'active' );

     $(this).each( function( index, value ) {
       var value = $(this).val();
       if( value.length !== 0 ) {
         args[$(this).closest('select').attr('name')] = value;
       }

     } );

     getPosts(args);

   });

  /**
   * Get Posts
   * @param  obj args
   * @return obj response
   */
  function getPosts(args) {

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

      contentEl.html( response.content );

      if( 1 === response.query.max_num_pages ) {
        $paginationEl.addClass( 'hidden' );
      } else {
        $paginationEl.removeClass( 'hidden' );
      }

      if( $numberPages > response.query.max_num_pages ) {
        var extra = $numberPages - response.query.max_num_pages;
        $( '.js-page-pagination li:gt(-' + ( extra + 1 ) + ')' ).addClass( 'disabled' );
      }

    })
    .error(function(response) {
      //console.log('error', response);
    })
    .complete(function(response) {
      //console.log(response);
    });

  }

})(jQuery);
