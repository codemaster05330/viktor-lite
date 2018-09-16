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
        if(''!=$viktor_lite['slide-autoplay']){
            if(1==$viktor_lite['slide-autoplay']){
                return false;
            }else{
                return true;
            } 
        }else{
            return false;
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
            $url1 =  esc_url('https://digitalcenturysf.com/'); 
            $url2 =  esc_url('https://digitalcenturysf.com/templates/'); 
            $text1 =  esc_html__('Best WordPress Themes','viktor-lite'); 
            $text2 =  esc_html__('Best WordPress Themes','viktor-lite'); 
            printf( '<p><a href="%s">%s</a> Powered by <a class="credits" href="%s">%s</a></p>', $url1, $text1, $url2, $text2 );
        }
    }


}




