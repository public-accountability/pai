<?php
/**
 * Pagination Functions
 *
 * @package understrap
 * @subpackage pai
 * @since 0.1.0
 */

 /**
  * Numbered Pagination Links
  *
  * @todo Hook up to AJAX post filtering
  *
  * @param  obj $query
  * @return void
  */
 function pai_pagination_page_pagination( $query ) {
     $total_pages = $query->max_num_pages;

     if ( !empty( $total_pages ) && $total_pages > 1 ) {
         $current_page = max( 1, get_query_var( 'paged' ) );

         echo '<nav class="page-pagination" aria-label="Page navigation">';

         echo paginate_links( array(
             'base'    => get_pagenum_link( 1 ) . '%_%',
             'format'  => 'page/%#%',
             'current' => $current_page,
             'total'   => $total_pages,
             'type'    => 'list',
             'end_size' => 5,
             'prev_text' => '<span aria-hidden="true">&laquo;</span><span class="sr-only">Previous page</span>',
             'next_text' => '<span aria-hidden="true">&raquo;</span><span class="sr-only">Next page</span>',
             'show_all'   => false
         ));

         echo '</nav>';

     }
 }

/**
 * Output Custom Pagination
 * Pagination used by AJAX
 *
 * @param  obj $query
 * @return void
 */
function pai_ajax_pagination( $query ) {

  $max_pages = $query->max_num_pages;

  /** Stop execution if there's only 1 page */
  if( $max_pages <= 1 ) {
    return;
  }

  $paged = max( 1, get_query_var( 'paged' ) );

  $output = '<nav class="page-pagination js-page-pagination" aria-label="Page navigation"><ul class="pagination">';

  $slug = get_the_id();
  $current_url = get_home_url( null, $slug );

  for ( $i = 0; $i < $max_pages; $i++ ) {
    $current = ( $i + 1 );
    $output .= sprintf( '<li class="page-item%1$s"><a href="%4$s/page/%3$s/" class="page-link%2$s" data-page="%3$s">%3$s</a></li>',
      ( $current === $paged ) ? ' active' : '',
      ( $current === $paged ) ? ' current' : '',
      $current,
      esc_url( $current_url )
    );
  }

  $output .= '</ul></nav>';

  echo $output;
}
