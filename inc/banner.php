<?php
/**
 * The banner for our theme.
 *
 * This is the template that displays for banner.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Viktor_lite
 */ 
function vikor_lite_banner_temp(){
global $viktor_lite;
$banner_enable = $viktor_lite['front-pg-slider'];
if(!is_front_page() || (is_front_page() && '0' ==$banner_enable)):
?>
    <div class="inner-page-header">
        <div class="container"> 
             <div class="header-page-title text-center"> 
                   <h2><?php viktor_lite_banner_title(); ?></h2> 
             </div>
        </div>
    </div>
<?php endif; 
}?>