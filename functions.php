<?php
/**
 * DCSF_viktor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @version 1.2.9
 * @package Viktor_lite
 */
define("VIKTOR_LITE_CSS", get_template_directory_uri() . "/css/" );
define("VIKTOR_LITE_INC", get_template_directory_uri() . "/inc/" );
define("VIKTOR_LITE_DURI", get_template_directory_uri() ."/" );
define("VIKTOR_LITE_JS", get_template_directory_uri() . "/js/" );


if ( ! function_exists( 'viktor_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function viktor_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on viktor, use a find and replace
	 * to change 'viktor-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'viktor-lite', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
 
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Declare Thumbnal Size
	add_image_size( 'viktor-lite-blog', 394, 237, true );
	add_image_size( 'viktor-lite-single-blog', 848, 414, true ); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => esc_html__( 'Main Menu', 'viktor-lite' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) ); 

	/*
	 * Custom Logo
	 */ 
  	add_theme_support( 'custom-logo', array(
	   'height'      => 39,
	   'width'       => 139,
	   'flex-width'  => true,
       'flex-height' => true,'header-text' => array( 'logo-area' ),
	) );

	add_theme_support( 'custom-header', array(
		'flex-width'    => true, 
		'flex-height'    => true, 
		'default-image' => get_template_directory_uri() . '/img/bennar.jpg',
	) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', viktor_lite_fonts_url() ) );
 

}
endif;
add_action( 'after_setup_theme', 'viktor_lite_setup' );
 

/**
 *	Register Fonts
 */
function viktor_lite_fonts_url() {
    $viktor_lite_font = '';
     
	$droid_sans = _x( 'on', 'Droid Sans font: on or off', 'viktor-lite' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'viktor-lite' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'viktor-lite' );
	 
	if ( 'off' !== $open_sans || 'off' !== $raleway ) {
		$font_families = array();
 
		if ( 'off' !== $raleway ) {
		$font_families[] = 'Raleway:400,100,200,300,500,600,700,800,900';
		}
		 
		if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open Sans:400,300,600,700,800';
		}
		 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);

		$viktor_lite_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    return esc_url_raw( $viktor_lite_font );
}

/**
 * DCSF_viktor nav menu
 */ 
function viktor_lite_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 3,
		'container'         => false,
		'menu_id'        	=> '',
		'menu_class'        => 'viktor-main-menu',
		'fallback_cb'       => 'viktor_lite_default_menu'
	));
}


/**
 * menu fallback
 */ 
if(is_user_logged_in()):
	function viktor_lite_default_menu() {
		?>
	    <ul>                  
	    	<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'viktor-lite' ); ?></a></li>
		</ul>
		<?php
	}
endif;

 

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viktor_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'viktor_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'viktor_lite_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function viktor_lite_scripts() { 
	$viktor_lite_option = new Viktor_Lite_Options();
	// LOAD FONTS
	 wp_enqueue_style( 'viktor-fonts', viktor_lite_fonts_url(), array(), '1.0.0' );

	// LOAD CSS 
	wp_enqueue_style( 'bootstrap', VIKTOR_LITE_CSS . 'bootstrap.css' ); 
	wp_enqueue_style( 'meanmenu', VIKTOR_LITE_CSS . 'meanmenu.css' );  
	wp_enqueue_style( 'flaticon', VIKTOR_LITE_CSS . 'flaticon.css' ); 
	wp_enqueue_style( 'font-awesome', VIKTOR_LITE_CSS . 'font-awesome.css' ); 
	wp_enqueue_style( 'viktor-style', get_stylesheet_uri() );  
	wp_enqueue_style( 'viktor-responsive', VIKTOR_LITE_CSS . 'responsive.css' ); 

	// LOAD JS
	wp_enqueue_script( 'modernizr', VIKTOR_LITE_JS. 'modernizr-2.8.3.js', array(), '20151215', false );
	wp_enqueue_script( 'bootstrap', VIKTOR_LITE_JS. 'bootstrap.js', array('jquery','masonry'), '20151215', true ); 
	wp_enqueue_script( 'meanmenu', VIKTOR_LITE_JS. 'jquery.meanmenu.js', array(), '20151215', true );  
	wp_enqueue_script( 'viktor-plugins', VIKTOR_LITE_JS. 'plugins.js', array(), '20151215', true );  
	wp_enqueue_script( 'viktor-main', VIKTOR_LITE_JS . 'main.js', array(), '20151215', true );
	wp_enqueue_script( 'viktor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'viktor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
 
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'viktor_lite_scripts' );


/**
 * Includes All Files.
 */ 
// Load Viktor Framework Functions .  
require get_template_directory() . '/inc/viktor-framework-functions.php';  
// Implement the Custom Header feature.
require get_template_directory() . '/inc/custom-header.php';
// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';
// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';
// Customizer additions. 
require get_template_directory() . '/inc/customizer.php';
// Load Jetpack compatibility file. 
require get_template_directory() . '/inc/jetpack.php';
// Load banner file. 
require get_template_directory() . '/inc/banner.php'; 
// Load Register Widgets.
require get_template_directory() . '/inc/widgets/register-widgets.php';   


/**
 * DCSF_viktor comment list modify
 */ 
function viktor_lite_comments($comment, $args, $depth) {
    ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	    <div class="single-author-comment">
	        <div class="media">
	          <a class="pull-left" href="#">
	            <?php echo get_avatar( $comment, 120 ); ?>
	          </a>
	          <div class="media-body">
	            <h4 class="media-heading"><?php comment_author_link() ?></h4>
	            <ul class="cl">
	                <li><?php  
					/* translators: 1: post date, 2: post time */
	                printf( esc_html__( '%1$s @ %2$s','viktor-lite' ), get_comment_date( '', $comment ), get_comment_time() ); 
	                ?></li>
	                <?php if($depth<=4): ?>
		                <li class="right"><i class="fa fa-share" aria-hidden="true"></i><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></li>
		            <?php endif; ?>
	            </ul>
				<?php if ($comment->comment_approved == '0') : ?>
					<p><em><?php esc_html_e('Your comment is awaiting moderation.','viktor-lite'); ?></em></p>
				<?php endif; ?>
		    	<?php comment_text() ?>
	          </div>
	        </div>
	    </div>
<?php } 

/**
 * Comment box title change
 */   
add_filter( 'comment_form_defaults', 'viktor_lite_comment_form_allowed_tags' );
function viktor_lite_comment_form_allowed_tags( $defaults ) { 

	$defaults['title_reply'] =  esc_html__( 'Leave Comments','viktor-lite' );
	$defaults['comment_notes_before'] =  '';
	$defaults['title_reply_before'] =  '<h4>';
	$defaults['title_reply_after'] =  '</h4>';
    $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Send','viktor-lite' ); 
	return $defaults;

}

/**
 * Comment form field order
 */   
add_action( 'comment_form_after_fields', 'viktor_lite_add_textarea' );
add_action( 'comment_form_logged_in_after', 'viktor_lite_add_textarea' );
function viktor_lite_add_textarea()
{
    echo '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Your Comment" cols="45" rows="8" maxlength="65525"  required="required"></textarea></p>';
}


/**
 * remove comment fields
 */  
function viktor_lite_remove_comment_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

    unset($fields['url']);

    $fields['author'] = '<p class="comment-form-author"> <input id="author" placeholder="Name*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email"><input id="email" placeholder="Email*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    return $fields;
}
add_filter('comment_form_default_fields','viktor_lite_remove_comment_fields');


/**
 *  banner title
 */ 

function viktor_lite_banner_title(){ 
    global $data, $post,$viktor;
	  
	$viktor_lite_banr_ttl =  esc_html__('Blog', 'viktor-lite');
	 
 
    $params['link_none'] = '';
 
	if (is_archive()) {
	    if (is_category()) {
	    	$viktor_lite_cat_ttl = single_cat_title('', false);
	    	echo esc_html($viktor_lite_cat_ttl);
	    }elseif (is_tax()) {
	        $viktor_lite_cat_tzx = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
	        $viktor_lite_cat_tzx = $viktor_lite_cat_tzx->name;
	        echo esc_html($viktor_lite_cat_tzx);
	    }else{
		    echo esc_html(get_the_time('F, Y'));
		}
	}

    if (is_home()) { 
		echo esc_html($viktor_lite_banr_ttl);
    }
    if (is_page() && !is_front_page()) { 
        echo esc_html(get_the_title());
    }
    if (is_single() && !is_attachment()) { 
        echo esc_html(get_the_title());
    }
    if (is_tag()) {
        echo esc_html(single_tag_title('', false));
    }
    if (is_404()) {
        echo esc_html__("404 - Page not Found", 'viktor-lite');
    }
    if (is_search()) {
        echo esc_html__("Search", 'viktor-lite');
    }
    if (is_attachment()) { 
        echo esc_html(get_the_title());
    }
}

/**
 *  Breadcrumb
 */ 
function viktor_lite_breadcrumb(){

    global $data, $post;

    echo '<ul class="breadcrumbs">';

    echo '<li><a class="home" href="';
    echo esc_url(home_url());
    echo '">' . esc_html__('Home', 'viktor-lite');
    echo "</a></li>";

    $params['link_none'] = ''; 
	if (is_archive()) {
	    if (is_category()) { 
	        echo '<li>' .esc_html(single_cat_title('', false)) . '</li>';
	    }elseif (is_tax()) {
	        $viktor_lite_term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
	        echo '<li>' . esc_html($viktor_lite_term->name) . '</li>';
	    }else{
		    echo '<li>' . esc_html(get_the_time('F, Y')) . '</li>';
		}
	}
    if (is_home()) {
        echo '<li>' . esc_html__('Blog', 'viktor-lite') . '</li>';
    }
    if (is_page() && !is_front_page()) {
        $viktor_lite_parents = array();
        $parent_id = $post->post_parent;
        while ($parent_id) :
            $page = get_page($parent_id);
            if ($params["link_none"]) {
                $viktor_lite_parents[] = get_the_title($page->ID);
            } else {
                $viktor_lite_parents[] = '<li><a href="' . esc_url(get_permalink($page->ID)) . '" title="' . esc_attr(get_the_title($page->ID)) . '">' . esc_html(get_the_title($page->ID)) . '</a></li>';
            }
            $parent_id = $page->post_parent;
        endwhile;
        $viktor_lite_parents = array_reverse($viktor_lite_parents);
        $viktor_lite_parents = join(' ', $viktor_lite_parents);
        print $viktor_lite_parents;
        echo '<li>' . esc_html(get_the_title()) . '</li>';
    }
    if (is_single() && !is_attachment()) {
        $cat_1_line = '';
        $categories_1 = get_the_category($post->ID);
        if ($categories_1):
            foreach ($categories_1 as $cat_1):
                $cat_1_ids[] = $cat_1->term_id;
            endforeach;
            $cat_1_line = implode(',', $cat_1_ids);
        endif;
        $categories = get_categories(array(
            'include' => $cat_1_line,
            'orderby' => 'id'
        ));
        if ($categories) :
            foreach ($categories as $cat) :
                $viktor_lite_cats[] = '<li><a href="' . esc_url(get_category_link($cat->term_id)) . '" title="' . esc_attr($cat->name) . '">' . esc_html($cat->name) . '</a></li>';
            endforeach;
            $viktor_lite_cats = join(' ', $viktor_lite_cats);
            echo $viktor_lite_cats;
        endif;
        echo '<li>' . esc_html(get_the_title()) . '</li>';
    }
    if (is_tag()) {
        echo '<li>' . esc_html__( '"Tag: "','viktor-lite' ) . esc_html(single_tag_title('', false)) . '</li>';
    }
    if (is_404()) {
        echo '<li>' . esc_html__("404 - Page not Found", 'viktor-lite') . '</li>';
    }
    if (is_search()) {
        echo '<li>' . esc_html__("Search", 'viktor-lite') . '</li>';
    }

    if (is_attachment()) {
        if (!empty($post->post_parent)) {
            echo "<li><a href='" . esc_url(get_permalink($post->post_parent)) . "'>" . esc_html(get_the_title($post->post_parent)) . "</a></li>";
        }
        echo "<li>" . esc_html(get_the_title()) . "</li>";
    }

    echo "</ul>";
}
  

add_action( 'wp_head', 'viktor_lite_add_css' );
function viktor_lite_add_css() {
	global $post,$viktor_lite;
	$count_bg = isset($viktor_lite['coun_bg']['url']) ? $viktor_lite['coun_bg']['url'] : '';
	if($count_bg){
		echo '.home-counter-down-area {
			    padding:60px 0 !important;
			    background: url('.esc_url($count_bg).') no-repeat;
			    background-size: cover;
			    background-position: center;
			}';
	}

	if(is_page()){  
		$viktor_lite_hdr_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );
        $viktor_lite_hdr_img = $viktor_lite_hdr_img[0];
        if(empty($viktor_lite_hdr_img)){
        	$viktor_lite_hdr_img = get_header_image();
        }
	}else{ 
		$viktor_lite_hdr_img = get_header_image();
	}
    $logo = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $logo , 'full' ); 
 
    $hdrtxt = get_theme_mod( 'header_textcolor' );
    $value = get_theme_mod( 'brand_color' );
    $footer_bg_clr = get_theme_mod( 'footer_bg_color' );
    echo '<style type="text/css">.sidebar-area .single-sidebar ul li a:hover,.sidebar-area .single-sidebar ul li a:before,.main-header-area .main-menu ul li:hover a,.news-page-area .news-main-content .single-news-area h3 a:hover,.sidebar-area .product-categories li a:before, .sidebar-area .widget_archive ul li a:before, .sidebar-area .widget_nav_menu ul li a:before, .sidebar-area .widget_pages ul li a:before, .sidebar-area .widget_categories ul li a:before, .sidebar-area .widget_meta ul li a:before, .sidebar-area .widget_recent_comments #recentcomments li:before, .sidebar-area .widget_recent_entries ul li a:before,a.redmor,.calendar_wrap a,.inner-page-header .header-page-locator ul li,.news-page-area .news-main-content .single-news-area ul li span,.sidebar-area .widget_search .search-form i.fa-search,footer .footer-bottom-area p a,.single-news-page-area .single-news-page ul li span,.news-page-area .author-comment .single-author-comment .media .media-body h4.media-heading, .single-news-page-area .author-comment .single-author-comment .media .media-body h4.media-heading,.news-page-area .author-comment .single-author-comment .media .media-body ul li.right i, .single-news-page-area .author-comment .single-author-comment .media .media-body ul li.right i { color: '.esc_attr($value).'; } .news-page-area .sidebar-area .single-sidebar h2:after,.news-page-area .news-main-content .single-news-area .news-featured-image .date-area, .news-page-area .news-main-content .pagination-area .nav-links span.current,.news-page-area .news-main-content .pagination-area .nav-links a:hover,#scrollUp,.sidebar-area .widget_tag_cloud .tagcloud ul li:hover,.main-header-area .main-menu ul li ul li:hover,.single-news-page-area .single-news-page h3 a:after,.single-news-page-area .leave-comments-area fieldset .btn-send,.single-news-page-area .leave-comments-area fieldset .btn-send:hover{ background: '.esc_attr($value).'; } .news-page-area .news-main-content .pagination-area .nav-links a,.news-page-area .news-main-content .pagination-area .nav-links span,#scrollUp,.sidebar-area .widget_tag_cloud .tagcloud ul li:hover { border-color: '.esc_attr($value).';} #scrollUp:hover,.no-results .search-form .search-submit, #post-1168 .single-blog-content input[type="submit"]{ background: '.esc_attr($value).';border-color: '.esc_attr($value).'; } footer .footer-bottom-area{ background: '.esc_attr($footer_bg_clr).';} .inner-page-header .header-page-title h2{ color: #'.esc_attr($hdrtxt).';}
		.inner-page-header {
			    background: url('.esc_url($viktor_lite_hdr_img).') no-repeat; 
			    background-position: center center !important;
			    background-size: cover !important;
			}
		.mean-container .mean-bar::after{
			background: transparent url('. esc_url($image[0]).') no-repeat scroll 0 0;
		}
    </style>';
}

/**
 *  remove shortcode from cntent
 */ 
function viktor_lite_short_text_remove_shortcode($start=0,$end=90){
	global $post;
	/* Get Post congtent */
	$content = $post->post_content;
	/* Remove visual composer shortcode like [vc_row] link that */
	$viktor_lite_desc = strip_tags(do_shortcode($post->post_content));
	/* Remove empty spaces */
	$viktor_lite_desc = trim(preg_replace('/\s+/',' ', $viktor_lite_desc ));
	/* Get content with limit */
	$viktor_lite_desc = mb_strimwidth($viktor_lite_desc, $start, $end, '');
	$viktor_lite_desc_cut = strrpos($viktor_lite_desc,' ');
	$viktor_lite_desc = substr($viktor_lite_desc,0,$viktor_lite_desc_cut);
	echo esc_html($viktor_lite_desc);
}

