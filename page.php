<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version 1.2.9
 * @package Viktor_lite
 */ 
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	        <!-- News Page start here -->
	        <div class="news-page-area">
	            <div class="container">
	                <div class="row">   
	                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
	                        <div class="news-main-content pg-content">
								<?php
								if ( have_posts() ) :  
									while ( have_posts() ) : the_post(); 
										get_template_part( 'template-parts/content', 'page' );

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

									endwhile; 
								else :
									get_template_part( 'template-parts/content', 'none' );
								endif; ?>   
	                        </div>
	                    </div> 
	                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
	                        <div class="sidebar-area">
	                            <?php get_sidebar(); ?> 
	                        </div>
	                    </div> 
	                </div>
	            </div>
	        </div>
	        <!-- News Page end here -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
