/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// hexa to rgb
	function vhex2rgb (hex) {
	    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
	    return result ? {
	        r: parseInt(result[1], 16),
	        g: parseInt(result[2], 16),
	        b: parseInt(result[3], 16),
	        rgb: parseInt(result[1], 16) + ", " + parseInt(result[2], 16) + ", " + parseInt(result[3], 16)
	    } : null;
	} 

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// logo 
	wp.customize( 'custom_logo', function( value ) {
		value.bind( function( to ) {
			$( '.logo-area a img' ).attr( 'src',to );
		} );
	} );

	// copyright text
	wp.customize( 'v_copyright_text', function( value ) {
	  value.bind( function( to ) {
	    $( '.footer-bottom-area p' ).html( to );
	  } );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			var cl = '#'+to;
		
			$( '.inner-page-header .header-page-title h2' ).css( 'color', cl ); 
			
		} );
	} );
 	// brand color
	wp.customize( 'brand_color', function( value ) {
		value.bind( function( to ) {
			$( 'a.redmor,.calendar_wrap a,.inner-page-header .header-page-locator ul li,.news-page-area .news-main-content .single-news-area ul li span,.sidebar-area .widget_search .search-form i.fa-search,.footer-bottom-area a,.single-news-page-area .single-news-page ul li span' ).css( 'color', to );

		    var style, el;

		    style = '<style class="hover-styles">.sidebar-area .single-sidebar ul li a:hover,.sidebar-area .single-sidebar ul li a:before,.main-header-area .main-menu ul li:hover a,.news-page-area .news-main-content .single-news-area h3 a:hover,.sidebar-area .product-categories li a:before, .sidebar-area .widget_archive ul li a:before, .sidebar-area .widget_nav_menu ul li a:before, .sidebar-area .widget_pages ul li a:before, .sidebar-area .widget_categories ul li a:before, .sidebar-area .widget_meta ul li a:before, .sidebar-area .widget_recent_comments #recentcomments li:before, .sidebar-area .widget_recent_entries ul li a:before,.news-page-area .author-comment .single-author-comment .media .media-body h4.media-heading, .single-news-page-area .author-comment .single-author-comment .media .media-body h4.media-heading,.news-page-area .author-comment .single-author-comment .media .media-body ul li.right i, .single-news-page-area .author-comment .single-author-comment .media .media-body ul li.right i { color: ' + to + '; } .news-page-area .sidebar-area .single-sidebar h2:after,.news-page-area .news-main-content .single-news-area .news-featured-image .date-area, .news-page-area .news-main-content .pagination-area .nav-links span.current,.news-page-area .news-main-content .pagination-area .nav-links a:hover,#scrollUp,.sidebar-area .widget_tag_cloud .tagcloud ul li:hover,.main-header-area .main-menu ul li ul li:hover,.single-news-page-area .single-news-page h3 a:after,.single-news-page-area .leave-comments-area fieldset .btn-send,.single-news-page-area .leave-comments-area fieldset .btn-send:hover{ background: ' + to +'; } .news-page-area .news-main-content .pagination-area .nav-links a,.news-page-area .news-main-content .pagination-area .nav-links span,#scrollUp,.sidebar-area .widget_tag_cloud .tagcloud ul li:hover { border-color: ' + to + ';} #scrollUp:hover,.no-results .search-form .search-submit, #post-1168 .single-blog-content input[type="submit"]{ background: rgba('+vhex2rgb(to).rgb+',1);border-color: rgba('+vhex2rgb(to).rgb+',1); }</style>'; // build the style element
		    el =  $( '.hover-styles' ); // look for a matching style element that might already be there

		    // add the style element into the DOM or replace the matching style element that is already there
		    if ( el.length ) {
		        el.replaceWith( style ); // style element already exists, so replace it
		    } else {
		        $( 'head' ).append( style ); // style element doesn't exist so add it
		    }
		} );
	} );
 	
 	// footer background color
	wp.customize( 'footer_bg_color', function( value ) {
		value.bind( function( to ) { 
		    var style, el;

		    style = '<style class="hover-styles2">footer .footer-bottom-area{ background: ' + to + ';}</style>'; // build the style element
		    el =  $( '.hover-styles2' ); // look for a matching style element that might already be there

		    // add the style element into the DOM or replace the matching style element that is already there
		    if ( el.length ) {
		        el.replaceWith( style ); // style element already exists, so replace it
		    } else {
		        $( 'head' ).append( style ); // style element doesn't exist so add it
		    }
		} );
	} );
  
 

} )( jQuery );
