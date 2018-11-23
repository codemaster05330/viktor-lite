<?php
/**
 * The template for displaying pagination.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @version 1.2.9
 * @package Viktor_lite
 */

?>

<ul>
	<?php the_posts_pagination( array(
	    'show_all' => true,
	    'prev_text' => '<i class="fa fa-angle-double-left"></i>',
	    'next_text' => '<i class="fa fa-angle-double-right"></i>',
	    'screen_reader_text' => '',
	    'before_page_number' => '',
	    'after_page_number' => '',
	) ); ?>
</ul>

