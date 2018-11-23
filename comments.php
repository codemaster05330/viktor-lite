<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version 1.2.9
 * @package Viktor_lite
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="row author-comment">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="about-author-comment">

			<?php
			// You can start editing here -- including this comment!
			if ( have_comments() ) : ?>
				<h2><?php esc_html_e('Recent Comments','viktor-lite'); ?></h2>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'viktor-lite' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'viktor-lite' ) ); ?></div>

					</div><!-- .nav-links --> 
				<?php endif; // Check for comment navigation. ?>

				<ul>
					<?php
						wp_list_comments( array(
							'style'      => 'ul',
							'callback'   => 'viktor_lite_comments'
						) );
					?>
				</ul>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?> 
					<div class="nav-links">

						<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'viktor-lite' ) ); ?></div>
						<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'viktor-lite' ) ); ?></div>

					</div><!-- .nav-links --> 
				<?php
				endif; // Check for comment navigation.

			endif; // Check for have_comments().


			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

				<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'viktor-lite' ); ?></p>
			<?php
			endif; ?>

        </div> 
    </div> 
</div> 
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    <div class="leave-comments-area">
			<?php comment_form(); ?>
	    </div>
	</div>
</div>
 