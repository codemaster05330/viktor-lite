<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @version 1.2.9
 * @package Viktor_lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php  
$viktor_lite_option = new Viktor_Lite_Options();
wp_head(); ?>

</head> 
<body <?php body_class(); ?>>
<div id="page" class="site">
<?php  
 ?>
    <header <?php echo (is_user_logged_in()) ? 'class="t32"' : ''; ?>>  
        <div class="main-header-area">
            <div class="container">
                <div class="row"> 
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <div class="logo-area">
                            <?php $viktor_lite_option->main_headerLogo(); ?>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                        <div class="main-menu"> 
                            <?php viktor_lite_main_menu(); ?>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <div class="mobile-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mobile-menu">
                            <nav id="dropdown">
                                <?php viktor_lite_main_menu(); ?>
                            </nav>
                        </div>          
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header area end here -->

    <!-- slider area-->
    <?php 
    vikor_lite_banner_temp(); 
     ?>    

	<div id="content" class="site-content">
