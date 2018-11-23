<?php
/**
 * DCSF_viktor Theme Customizer.
 *
 * @version 1.2.9
 * @package Viktor_lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function viktor_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage'; 



	$wp_customize->add_section( 'v_colors' , array(
	    'title'      => __( 'Brand Color', 'viktor-lite' ),
	    'priority'   => 50,
	) );
	// add color picker setting
	$wp_customize->add_setting( 'brand_color', array(
		'default' => '#ff0000',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) ); 
	// add color picker control
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'brand_color', array(
		'label' => __( 'Current Color', 'viktor-lite' ),
		'section' => 'v_colors',
		'settings' => 'brand_color',
	) ) );

	$wp_customize->add_section( 'v_copyright' , array(
	    'title'      => __( 'Footer Settings', 'viktor-lite' ),
	    'priority'   => 90,
	) );
	$wp_customize->add_setting( 'v_copyright_text' , array(
	    'default'     => '',
	    'transport'   => 'postMessage', 
	    'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_setting( 'footer_bg_color', array(
		'default' => '#000',
		'transport'   => 'postMessage',
		'sanitize_callback' => 'sanitize_hex_color',
	) ); 

	$wp_customize->add_control( 'v_copyright_text', array(
	    'label' => __( 'Copyright Text', 'viktor-lite' ),
		'section'	=> 'v_copyright',
		'setting'	=> 'v_copyright_text',
		'type'	 => 'text',
        'description'   => 'Write copyright text here.'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
		'label' => __( 'Background Color', 'viktor-lite' ),
		'section' => 'v_copyright',
		'settings' => 'footer_bg_color',
        'description'  => __( 'Pick a color for footer background.', 'viktor-lite' ),   
	) ) );
}
add_action( 'customize_register', 'viktor_lite_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function viktor_lite_customize_preview_js() {
	wp_enqueue_script( 'viktor_lite_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'viktor_lite_customize_preview_js' );
