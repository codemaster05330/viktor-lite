<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @version 1.2.9
 * @package Viktor_lite
 */
$viktor_lite_option = new Viktor_Lite_Options();
?>

	</div><!-- #content -->
 
        <!-- footer area start here -->
        <footer> 
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <?php $viktor_lite_option->copyrightText(); ?> 
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer area end here -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
