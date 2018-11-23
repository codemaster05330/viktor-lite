<?php  
/**
 * The template for Framework options functions.
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @version 1.2.9
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

    // copyright test options
    public function copyrightText(){ 
        $copy_text = get_theme_mod( 'v_copyright_text' );
        if(!empty($copy_text)){
       ?>
        <p><?php echo esc_html($copy_text); ?></p>
       <?php
        }else{
          $url1 =  esc_url('https://digitalcenturysf.com/templates/');
          $url2 =  esc_url('https://digitalcenturysf.com/'); 
          $text =  esc_html__('WordPress Themes','viktor-lite'); 
          printf( '<p><a href="%s">%s</a> Powered by <a class="credits" href="%s">%s</a></p>', esc_url($url1), esc_html($text), esc_url($url2), esc_html($text) );
        }
    }


}




