(function ($) {
 "use strict";

    // sticky header
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 50) {
            $('header').addClass('fixed-header'); 
        }
        else {
            $('header').removeClass('fixed-header');
        }
    });

    if ( $('.masonry-loop').length ) {
        //set the container that Masonry will be inside of in a var
        var container = document.querySelector('.masonry-loop');
        //create empty var msnry
        var msnry;
        // initialize Masonry after all images have loaded
        imagesLoaded( container, function() {
            msnry = new Masonry( container, {
                itemSelector: '.masonry-entry'
            });
        });
    }

    $(".single-post .single-news-page .post-navigation .nav-links .nav-previous").prepend('<span class="meta-nav" aria-hidden="true">Previous Post: </span>');
    $(".single-post .single-news-page .post-navigation .nav-links .nav-next").prepend('<span class="meta-nav" aria-hidden="true">Next Post: </span>');
    // pagination 
    $(".pagination-area .nav-links").unwrap();
    $(".screen-reader-text").remove();

    // comment form
    $(".leave-comments-area .comment-respond form.comment-form p").wrapAll("<fieldset></fieldset>");
    $(".leave-comments-area .comment-respond form.comment-form p.comment-form-author").wrapAll("<div class=\"col-sm-6\"></div>");
    $(".leave-comments-area .comment-respond form.comment-form p.comment-form-email").wrapAll("<div class=\"col-sm-6\"></div>");
    $(".leave-comments-area .comment-respond form.comment-form p.comment-form-comment").wrapAll("<div class=\"col-sm-12\"></div>");
    $(".leave-comments-area .comment-respond form.comment-form p.form-submit").wrapAll("<div class=\"col-sm-12\"></div>");

    $(".comment-reply-link").click(function(){
    	$(".author-comment .about-author-comment ul div.comment-respond").wrap("<div class=\"leave-comments-area\"></div>");
    });

    $(".leave-comments-area .comment-respond form.comment-form p.form-submit .submit").addClass("btn-send");
     

    // search widget prepend icon
    $(".sidebar-area .widget_search .search-form").append('<i class="fa fa-search"></i>');
    $(".sidebar-area .widget_tag_cloud .tagcloud a").wrap("<li></li>");
    $(".sidebar-area .widget_tag_cloud .tagcloud li").wrapAll("<ul></ul>");

    /*----------------------------
     jQuery MeanMenu
    ------------------------------ */
    jQuery('nav#dropdown').meanmenu();	
    	   
     /*--------------------------
     scrollUp
    ---------------------------- */ 
    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

})(jQuery); 