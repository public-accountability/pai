(function($) {
  var minWidth = 768;
  var wrapper = $( '.site-main > article .entry-content' );
  var content = $( '.entry-content > .entry-body' );

  if( typeof wrapper !== 'undefined' && typeof content !== 'undefined' ) {

  	var contentHeight = $( content.outerHeight(true) );

  	if( $(this).width() >= minWidth ) {
  		wrapper.css( 'height', content.outerHeight(true) + 'px' );
  	} else {
  		wrapper.css( 'height', 'auto' );
  	}

  	$(window).on('resize', function(event) {
  		var wrapper = $( '.site-main > article .entry-content' );
  		var content = $( '.entry-content > .entry-body' );

  		if( $(this).width() > minWidth ) {
  			wrapper.css( 'height', content.outerHeight(true) + 'px' );
  		} else {
  			wrapper.css( 'height', 'auto' );
  		}
  	});

  }
})(jQuery);
