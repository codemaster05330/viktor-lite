<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Viktor_lite
 */

?>
 
<div id="post-<?php the_ID(); ?>">
    <div class="single-news-area">
        <?php if(has_post_thumbnail()): ?>
            <div class="news-featured-image  col-lg-5 col-md-5 col-sm-5 col-xs-12 pd0">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('viktor-lite-blog'); ?></a>
                <div class="date-area">
                    <ul>
                        <li><?php echo esc_html(get_the_time('d')); ?></li>
                        <li><?php echo esc_html(get_the_time('M')); ?></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
        <div class="cont  col-lg-7 col-md-7 col-sm-7 col-xs-12">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
            <ul class="ptags"> 
            <?php   if ( is_sticky() ) {
                printf( '<li><span class="dashicons dashicons-admin-post sticky-icon"></span> %s |</li>', esc_html__( 'Sticky ', 'viktor-lite' ) );
            } ?>  
                <li><span><?php esc_html_e('by','viktor-lite'); ?></span> <?php the_author(); ?> |</li> 
                <li><?php  comments_popup_link( 
                '<span>0</span> Comment',
                '<span>1</span> Comment',
                '<span>%</span> Comments',
                ' ', 
                'Comments off'
                ); ?></li>
            </ul>
            <p><?php viktor_lite_short_text_remove_shortcode(); ?></p>
            <a class="redmor" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','viktor-lite'); ?></a>
        </div>
    </div>
</div> 

