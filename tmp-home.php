<?php
/**
 * Template Name: HomePage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Viktor_lite
 */ 
get_header(); ?>

<?php viktor_lite_services_section(); ?>
<?php viktor_lite_counter_section(); ?>
<?php viktor_lite_blog_section(); ?>

<?php get_footer();
