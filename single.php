<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @version 1.2.9
 * @package Viktor_lite
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- News Details Page start here -->
	        <div class="news-page-area single-news-page-area">
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                    	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		                        <div class="single-news-page" id="post-<?php the_ID(); ?>">
		                            <?php get_template_part('template-parts/content','single'); ?>
	                               <?php 
									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif; ?>

		                        </div>

		                    <?php endwhile; endif; ?> 
	                    </div>
	                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                        <div class="sidebar-area"> 
	                        	<?php get_sidebar(); ?>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <!-- News Details Page end here --> 
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
