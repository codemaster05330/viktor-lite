<?php
function viktor_lite_blog_section(){
    global $viktor_lite;
    $section_title = !empty($viktor_lite['blog_sec_title']) ? $viktor_lite['blog_sec_title'] : 'Latest News';
    $section_subtitle = !empty($viktor_lite['blog_sub_title']) ? $viktor_lite['blog_sub_title'] : 'Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since, when an unknown printer took a galley of type and scrambled.';
    $section_number = !empty($viktor_lite['blog_number']) ? $viktor_lite['blog_number'] : '3';
    ?>

    <div class="home-news-area">
        <div class="container">
            <?php if(''!=$section_title): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">                    
                        <div class="site-section-area">
                            <h2><?php echo $section_title; ?></h2>
                            <p><?php echo $section_subtitle; ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row total-homenews"> 
                <?php $args = array('post_type'=>'post','posts_per_page'=>$section_number,'order'=>'desc');
                $blog_query = new WP_Query($args);
                while($blog_query->have_posts()): $blog_query->the_post();
                 ?>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="single-news">
                             <div class="news-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if(has_post_thumbnail()) { the_post_thumbnail('',array('class'=>'attachment-post-thumbnail size-post-thumbnail wp-post-image')); }else{ echo '<img src="https://dummyimage.com/420x253/000/fff">'; } ?>
                                </a>
                                 <div class="news-date">                                    
                                 <p><?php viktor_lite_posted_on(); ?></p>
                                 </div>
                             </div>
                             <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                             <p><?php echo wp_trim_words(get_the_content(),12,''); ?></p>
                         </div>
                    </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>                
        </div>
    </div>
<?php } ?>