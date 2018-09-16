<?php
/**
 *
 * This is the template that displays for banner.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Viktor_lite
 */
function vikor_lite_slider_temp(){
global $viktor_lite;  
define('SLIDE_IMG',get_template_directory_uri().'/img/'); 
if(isset($viktor_lite['front-pg-slider'])){
    $aslider_enable = ('1'!=$viktor_lite['front-pg-slider']) ? $viktor_lite['front-pg-slider'] : 1;
}else{
    $aslider_enable = 1;
}
if(('1'==$aslider_enable && is_front_page()) || ('1'==$aslider_enable && is_home() && is_front_page())):   


        $images = array(
            'slide_img_1' => (!empty($viktor_lite['slide_img_1']['url'])) ? $viktor_lite['slide_img_1']['url'] : SLIDE_IMG.'2.jpg', 
            'slide_img_2' => (!empty($viktor_lite['slide_img_2']['url'])) ? $viktor_lite['slide_img_2']['url'] : SLIDE_IMG.'1.jpg', 
            'slide_img_3' => (!empty($viktor_lite['slide_img_3']['url'])) ? $viktor_lite['slide_img_3']['url'] : '', 
            'slide_img_4' => (!empty($viktor_lite['slide_img_4']['url'])) ? $viktor_lite['slide_img_4']['url'] : '' 
        );
        $titles = array(
            'slide_title_1' => (!empty($viktor_lite['slide_title_1'])) ? $viktor_lite['slide_title_1'] : esc_html__('Planning Your Dream','viktor-lite'),
            'slide_title_2' => (!empty($viktor_lite['slide_title_2'])) ? $viktor_lite['slide_title_2'] : esc_html__('Grow Your Business','viktor-lite'),
            'slide_title_3' => (!empty($viktor_lite['slide_title_3'])) ? $viktor_lite['slide_title_3'] : '',
            'slide_title_4' => (!empty($viktor_lite['slide_title_4'])) ? $viktor_lite['slide_title_4'] : ''
        );
        $subtitles = array(
            'slide_subtitle_1' => (!empty($viktor_lite['slide_subtitle_1'])) ? $viktor_lite['slide_subtitle_1'] : esc_html__('Ne homero prompta constituam provtim omnis porro eu, iusto deserunt incorrupte sea ad. Aliquam compre hensam definitionem eam ea ius facete nominaviId vim laudem nusquamtion.','viktor-lite'),
            'slide_subtitle_2' => (!empty($viktor_lite['slide_subtitle_2'])) ? $viktor_lite['slide_subtitle_2'] : esc_html__('Ne homero prompta constituam provtim omnis porro eu, iusto deserunt incorrupte sea ad. Aliquam compre hensam definitionem eam ea ius facete nominaviId vim laudem nusquamtion.','viktor-lite'),
            'slide_subtitle_3' => (!empty($viktor_lite['slide_subtitle_3'])) ? $viktor_lite['slide_subtitle_3'] : '',
            'slide_subtitle_4' => (!empty($viktor_lite['slide_subtitle_4'])) ? $viktor_lite['slide_subtitle_4'] : '',
        );
        $buttonlabel = array(
            'slide_btntitle_1' => (!empty($viktor_lite['slide_btntitle_1'])) ? $viktor_lite['slide_btntitle_1'] : esc_html__('Get Consultancy','viktor-lite'), 
            'slide_btntitle_2' => (!empty($viktor_lite['slide_btntitle_2'])) ? $viktor_lite['slide_btntitle_2'] : esc_html__('Get Consultancy','viktor-lite'), 
            'slide_btntitle_3' => (!empty($viktor_lite['slide_btntitle_3'])) ? $viktor_lite['slide_btntitle_3'] : '', 
            'slide_btntitle_4' => (!empty($viktor_lite['slide_btntitle_4'])) ? $viktor_lite['slide_btntitle_4'] : ''
        );
        $buttonurl = array(
            'slide_btnurl_1' => (!empty($viktor_lite['slide_btnurl_1'])) ? $viktor_lite['slide_btnurl_1'] : '#',  
            'slide_btnurl_2' => (!empty($viktor_lite['slide_btnurl_2'])) ? $viktor_lite['slide_btnurl_2'] : '#',  
            'slide_btnurl_3' => (!empty($viktor_lite['slide_btnurl_3'])) ? $viktor_lite['slide_btnurl_3'] : '',  
            'slide_btnurl_4' => (!empty($viktor_lite['slide_btnurl_4'])) ? $viktor_lite['slide_btnurl_4'] : ''
        );
        
    ?> 

    <div class="slider-area">
        <div class="bend niceties preview-2">
            <div id="ensign-nivoslider" class="slides"> 
                <?php $s = 1; ?>
                <?php foreach ($images as $key => $image) {
                    if ( $image ) {
                        echo '<img src="'.$images['slide_img_'.$s].'" alt="" title="#slider-direction-'.$s.'"  />';
                    }
                    $s++;
                } ?>              
            </div>
            <!-- direction  -->
        
            <?php $s = 1;
            foreach ($images as $key => $image) {
                if ( $image ) {
                    echo '    
                        <div id="slider-direction-'.$s.'" class="t-cn slider-direction">
                             <div class="slider-content t-cn s-tb slider-1">
                                <div class="title-container s-tb-c title-compress">
                                    <h1 class="title1">'.$titles['slide_title_'.$s].'</h1>
                                    <div class="title2" >'.$subtitles['slide_subtitle_'.$s].'</div>
                                    <div class="slider-botton" >
                                        <ul> 
                                            <li><a href="'.$buttonurl['slide_btnurl_'.$s].'">'.$buttonlabel['slide_btntitle_'.$s].' <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>  
                        </div>';
                    }
                $s++;
            } ?>    
         
        </div>
    </div>    
    <?php 
endif; 
} ?>