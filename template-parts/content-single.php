<?php
/**
 * Template part for displaying sigle blog post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version 1.2.9
 * @package Viktor_lite
 */

?>

 <div class="news-featured-image">
     <a href="#"><?php the_post_thumbnail('viktor-lite-single-blog'); ?></a>
     <div class="date-area">
         <ul>
             <li><?php echo esc_html(get_the_time('d')); ?></li>
             <li><?php echo esc_html(get_the_time('M')); ?></li>
         </ul>
     </div>
 </div> 
 <h3><a href="#"><?php the_title(); ?></a></h3>
 <ul class="ptags">
 	 <li><span><?php esc_html_e('by','viktor-lite'); ?></span> <?php the_author(); ?> |</li> 
    <li><?php  comments_popup_link( 
    '<span>0</span> Comment',
    '<span>1</span> Comment',
    '<span>%</span> Comments',
    ' ', 
    'Comments off'
    ); ?></li>
 </ul>
 <div class="single-blog-content">
     <?php the_content(); 
      wp_link_pages( array(
        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'viktor-lite' ),
        'after'  => '</div>',
      ) ); 
     ?>   
      <?php  
      global $numpages;
        if ( is_singular( 'attachment' ) ) {
          // Parent post navigation.
          the_post_navigation( array(
            'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'viktor-lite' ),
          ) );
        } elseif ( is_singular( 'post' )  && $numpages > 1) {
          // Previous/next post navigation.
          the_post_navigation( array(
            'next_text' =>  '<span class="post-title">%title</span>',
            'prev_text' =>  '<span class="post-title">%title</span>',
          ) );
        }
      ?>

 </div>  
<?php if(has_tag()): ?>
  <div class="row content-info">
       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
           <div class="blog-content-tag">
               <ul class="ptags">
                   <li> <span><?php esc_html_e('Tags','viktor-lite'); ?>: </span> </li>
                   <?php the_tags( '<li>', ',</li><li>', '</li>' ); ?>
               </ul>
           </div>
       </div> 
  </div>
<?php endif; ?>
<?php
 $viktor_lite_authordesc = get_the_author_meta( 'description' );  ?>
  <div class="row author-post">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="about-author-post">
              <h2><?php esc_html_e('About Post Author','viktor-lite'); ?></h2>
              <div class="single-author-post">
                  <div class="media">
                    <a class="pull-left" href="#">
                    	<?php echo get_avatar( get_the_author_meta('email'), '130'); ?> 
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><?php the_author(); ?></h4>
                      <p><?php the_author_meta('description'); ?></p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div> 