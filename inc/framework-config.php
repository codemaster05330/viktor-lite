<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "viktor_lite";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Viktor Options', 'viktor-lite' ),
        'page_title'           => esc_html__( 'Viktor Options', 'viktor-lite' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'viktor_lite_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,
 
    );

   
    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'viktor-lite' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'viktor-lite' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'viktor-lite' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'viktor-lite' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'viktor-lite' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'viktor-lite' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'viktor-lite' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'viktor-lite' );
    Redux::setHelpSidebar( $opt_name, $content );



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider Area', 'viktor-lite' ),
        'id'         => 'slider-area',
        'icon'  => 'el el-cog',
        'fields'     => array( 
            array(
                'id'       => 'front-pg-slider',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Front Page', 'viktor-lite' ), 
                'options'  => array(
                    '1' => esc_html__( 'Slider', 'viktor-lite' ), 
                    '0' => esc_html__( 'Banner', 'viktor-lite' ) 
                ),
                'default'  => '1'
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider Item', 'viktor-lite' ),
        'id'         => 'slider-item',
        'desc'  => esc_html__( 'Maximum 4 slide item is available.', 'viktor-lite' ),
        'icon'  => 'el el-cog',
        'subsection' => true,
        'fields'     => array( 
            array(
                'id'       => 'slide_img_1',
                'type'     => 'media', 
                'title'    => esc_html__( 'Slide Image 1', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Upload slide image from here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_title_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Title 1', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_subtitle_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide SubTitle 1', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btntitle_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Label 1', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide button label here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btnurl_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Url 1', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Insert slide button url here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_img_2',
                'type'     => 'media', 
                'title'    => esc_html__( 'Slide Image 2', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Upload slide image from here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_title_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Title 2', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_subtitle_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide SubTitle 2', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btntitle_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Label 2', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide button label here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btnurl_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Url 2', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Insert slide button url here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_img_3',
                'type'     => 'media', 
                'title'    => esc_html__( 'Slide Image 3', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Upload slide image from here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_title_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Title 3', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_subtitle_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide SubTitle 3', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btntitle_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Label 3', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide button label here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btnurl_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Url 3', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Insert slide button url here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_img_4',
                'type'     => 'media', 
                'title'    => esc_html__( 'Slide Image 4', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Upload slide image from here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_title_4',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Title 4', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_subtitle_4',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide SubTitle 4', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btntitle_4',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Label 4', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Write slide button label here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide_btnurl_4',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slide Button Url 4', 'viktor-lite' ),  
                'desc'  => esc_html__( 'Insert slide button url here.', 'viktor-lite' )
            ),
        )
    ) );
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Slider Settings', 'viktor-lite' ),
        'id'         => 'slider-seting',
        'icon'      => 'el el-cog',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'slide-number',
                'type'     => 'text', 
                'title'    => esc_html__( 'Number of Slide to Show', 'viktor-lite' ), 
                'default'  => -1,
                'desc'  => esc_html__( 'Put a numeric value here', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide-autoplay',  
                'type'     => 'switch',
                'title'    => esc_html__( 'Autoplay', 'viktor-lite' ), 
                'default'  => 1,
                'on'       => 'On',
                'off'      => 'Off',
            ),
            array(
                'id'       => 'slide-speed',
                'type'     => 'text', 
                'title'    => esc_html__( 'Animation Speed', 'viktor-lite' ), 
                'default'  => '500',
                'desc'  => esc_html__( 'Put a numeric value Like 100, 200, 300, 400, 500, 600, 700, 800, 900, 1000, 1500, 2000 etc ', 'viktor-lite' )
            ),
            array(
                'id'       => 'sslide-speed',
                'type'     => 'text', 
                'title'    => esc_html__( 'Slider Speed', 'viktor-lite' ), 
                'default'  => '5000',
                'desc'  => esc_html__( 'Put a numeric value Like 1000, 1500, 2000, 2500, 3000, 3500, 4000, 5000 etc ', 'viktor-lite' )
            ),
            array(
                'id'       => 'slide-effect',
                'type'     => 'text', 
                'title'    => esc_html__( 'Effect', 'viktor-lite' ), 
                'desc'  => esc_html__( 'Animation Example: sliceDown, sliceDownLeft, sliceUp, sliceUpLeft, sliceUpDownLeft, fold, fade, random, slideInRight, slideInLeft, boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse', 'viktor-lite' ), 
                'default'  => 'slideInLeft',
            ), 
            array(
                'id'       => 'slide-font-size',
                'type'     => 'text', 
                'title'    => esc_html__( 'Title Font Size', 'viktor-lite' ), 
                'default'  => '72px',
                'desc'  => 'Put numeric value with pixel value. Such As: 72px',
            )
        )
    ) );
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Services Area', 'viktor-lite' ),
        'id'         => 'services-seting',
        'icon'      => 'el el-cog', 
        'fields'     => array(
            array(
                'id'       => 'serv_icon_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Icon Class 1', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert font-awesome/flaticon/custom icon class here', 'viktor-lite' )
            ),
            array(
                'id'       => 'serv_title_1',  
                'type'     => 'text',
                'title'    => esc_html__( 'Service Title 1', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_text_1',  
                'type'     => 'textarea',
                'title'    => esc_html__( 'Service Text 1', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtn_1',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Text 1', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtnurl_1',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Url 1', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_icon_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Icon Class 2', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert font-awesome/flaticon/custom icon class here', 'viktor-lite' )
            ),
            array(
                'id'       => 'serv_title_2',  
                'type'     => 'text',
                'title'    => esc_html__( 'Service Title 2', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_text_2',  
                'type'     => 'textarea',
                'title'    => esc_html__( 'Service Text 2', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtn_2',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Text 2', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtnurl_2',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Url 2', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_icon_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Icon Class 3', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert font-awesome/flaticon/custom icon class here', 'viktor-lite' )
            ),
            array(
                'id'       => 'serv_title_3',  
                'type'     => 'text',
                'title'    => esc_html__( 'Service Title 3', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_text_3',  
                'type'     => 'textarea',
                'title'    => esc_html__( 'Service Text 3', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtn_3',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Text 3', 'viktor-lite' ), 
                'default'  => '', 
            ),
            array(
                'id'       => 'serv_readbtnurl_3',  
                'type'     => 'text',
                'title'    => esc_html__( 'Readmore Url 3', 'viktor-lite' ), 
                'default'  => '', 
            ),
        )
    ) );
 
 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Counter Area', 'viktor-lite' ),
        'id'         => 'counter-seting',
        'icon'      => 'el el-cog', 
        'fields'     => array(
            array(
                'id'       => 'coun_bg',
                'type'     => 'media', 
                'title'    => esc_html__( 'Background Image', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Upload background image from here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_title',
                'type'     => 'text', 
                'title'    => esc_html__( 'Title', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_subtitle',
                'type'     => 'textarea', 
                'title'    => esc_html__( 'SubTitle', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_num_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Number 1', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert countable number here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_txt_1',
                'type'     => 'text', 
                'title'    => esc_html__( 'Text 1', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write text here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_num_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Number 2', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert countable number here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_txt_2',
                'type'     => 'text', 
                'title'    => esc_html__( 'Text 2', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write text here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_num_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Number 3', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert countable number here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'coun_txt_3',
                'type'     => 'text', 
                'title'    => esc_html__( 'Text 3', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write text here.', 'viktor-lite' )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Area', 'viktor-lite' ),
        'id'         => 'blog-seting',
        'icon'      => 'el el-cog', 
        'fields'     => array(
            array(
                'id'       => 'blog_sec_title',
                'type'     => 'text', 
                'title'    => esc_html__( 'Section Title', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write section title here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'blog_sub_title',
                'type'     => 'textarea', 
                'title'    => esc_html__( 'Section SubTitle', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Write section subtitle here.', 'viktor-lite' )
            ),
            array(
                'id'       => 'blog_number',
                'type'     => 'text', 
                'title'    => esc_html__( 'Number of Post to Show', 'viktor-lite' ), 
                'default'  => '',
                'desc'  => esc_html__( 'Insert numerice value here.', 'viktor-lite' )
            )
        )
    ) );

    /*
     * <--- END SECTIONS
     */
