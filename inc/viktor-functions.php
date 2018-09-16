<?php  
/**
 * The template for Framework options functions.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Viktor_lite
 */

Class Viktor_Lite_Options{
   
    // main header logo area
    public function main_headerLogo(){
        global $viktor_lite;
       $logo = get_theme_mod( 'custom_logo' );
       $image = wp_get_attachment_image_src( $logo , 'full' ); 
        //$logo = get_theme_mod( 'v_logo_img' );
        if( !empty($logo) ){
       ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($image[0]); ?>" alt="<?php esc_attr_e('site logo','viktor-lite'); ?>"></a>
        <?php }else{ ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
       <?php }
    } 
 

    // slider options
    public function viktor_lite_slider_autoplay(){
        global $viktor_lite;
        if(1==$viktor_lite['slide-autoplay']){
            return false;
        }else{
            return true;
        } 
    }
    public function viktor_lite_slider_effect(){
        global $viktor_lite;
        if(isset($viktor_lite['slide-effect'])){
            return $viktor_lite['slide-effect'];
        }else{
            return "slideInLeft";
        } 
    }
    public function viktor_lite_slider_number(){
        global $viktor_lite;
        if(isset($viktor_lite['slide-number'])){
            return $viktor_lite['slide-number'];
        }else{
            return 9;
        } 
    }
    public function viktor_lite_slider_speed(){
        global $viktor_lite;
        if(!empty($viktor_lite['slide-speed'])){
            return $viktor_lite['slide-speed'];
        }else{
            return 500;
        } 
    }
    public function viktor_lite_sliders_speed(){
        global $viktor_lite;
        if(!empty($viktor_lite['sslide-speed'])){
            return $viktor_lite['sslide-speed'];
        }else{
            return 5000;
        } 
    }


 
    // copyright test options
    public function copyrightText(){ 
        $copy_text = get_theme_mod( 'v_copyright_text' );
        if(!empty($copy_text)){
       ?>
        <p><?php echo esc_html($copy_text); ?></p>
       <?php
        }else{
       ?>
        <p>&copy; <?php esc_html_e('Copyrights','viktor-lite'); ?> <a href="<?php echo esc_url('http://digitalcenturysf.com/'); ?>"><?php esc_html_e('ViktorFinance.','viktor-lite'); ?></a> <?php esc_html_e('All rights reserved.','viktor-lite'); ?>.</p>
       <?php
        }
    }


}




