<?php
/**
 * Theme about page
 *
 * @package Viktor
 */

//Add the theme page
add_action('admin_menu', 'viktor_add_theme_about');
function viktor_add_theme_about(){

	if ( !current_user_can('install_plugins') ) {
		return;
	}

	$theme_about = add_theme_page( __('About Viktor','viktor-lite'), __('About Viktor','viktor-lite'), 'manage_options', 'viktor-about', 'viktor_about_page' );
	add_action( 'load-' . $theme_about, 'viktor_about_hook_styles' );
}

//Callback
function viktor_about_page() {
	$user = wp_get_current_user();
?>
	<div class="about-container"> 
		<h1 class="about-title"><?php echo sprintf( __( 'Welcome to Viktor Lite version %s', 'viktor-lite' ), esc_html( wp_get_theme()->version ) ); ?></h1>
		<div class="welcome">
			<p class="welcome-desc"><?php esc_html_e( 'Viktor Lite is a clean, creative, elegant, fun, colorful, powerful, motivational, simple, and stylish WordPress theme. Viktor Lite is designed for all type of corporations such as banking, finance, consulting, management, real estate, insurance, legal & law, startup, venture capital, technology, and so on. It is a clean, super flexible, fast in loading, bootstrap based, mobile responsive and modern looking premium quality WordPress theme. It can be used for any business or personal website relating to business, technology, travel, food, people, architecture, health, sports, animals, modern, design, corporate, vector, nature, commerical, holiday, advertising, game, presentation, computer, marketing, building, ecommerce, internet, office, company, digital, portfolio, multipurpose, transportation, fitness, weather, disco, valentine, cafe, sci-fi, agriculture, relaxation, mountain, baby, television, earth, church, cinema, furniture, hospital, healthcare, infographic, vegetarian, smartphone, iphone, android, hip hop, seo, night club, hotel, college. For more information, visit our website:', 'viktor-lite' ); ?> <a target="_blank" href="<?php echo esc_url('https://www.digitalcenturysf.com'); ?>"><?php esc_html_e('https://digitalcenturysf.com/','viktor-lite'); ?></a></p>
			<a class="welcome-img" href="<?php echo esc_url('https://digitalcenturysf.com/demo/?theme=viktor-wp'); ?>"  target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/preview.jpg" alt="<?php echo esc_attr('Viktor Lite','viktor-lite'); ?>"></a>
		
		</div>

		<div class="viktor-theme-tabs">

			<div class="viktor-tab-nav nav-tab-wrapper">
				<a href="#begin" data-target="begin" class="nav-button nav-tab begin active"><?php esc_html_e( 'Getting started', 'viktor-lite' ); ?></a>
				<a href="#actions" data-target="actions" class="nav-button actions nav-tab"><?php esc_html_e( 'Recommended Actions', 'viktor-lite' ); ?></a>
				<a href="#support" data-target="support" class="nav-button support nav-tab"><?php esc_html_e( 'Support', 'viktor-lite' ); ?></a>
				<a href="#table" data-target="table" class="nav-button table nav-tab"><?php esc_html_e( 'Free vs Pro', 'viktor-lite' ); ?></a>
			</div>

			<div class="viktor-tab-wrapper">

				<div id="#begin" class="viktor-tab begin show">
					<h3><?php esc_html_e( 'Step 1 - Implement recommended actions', 'viktor-lite' ); ?></h3>
					<p><?php esc_html_e( 'We\'ve made a list of steps for you to follow to get the most of Viktor.', 'viktor-lite' ); ?></p>
					<p><a class="actions" href="#actions"><?php esc_html_e( 'Check recommended actions', 'viktor-lite' ); ?></a></p>
					<hr>
					<h3><?php esc_html_e( 'Step 2 - Read documentation', 'viktor-lite' ); ?></h3>
					<p><?php esc_html_e( 'Our documentation (including video tutorials) will have you up and running in no time.', 'viktor-lite' ); ?></p>
					<p><a href="http://docs.digitalcenturysf.com/acategory/viktor-lite/" target="_blank"><?php esc_html_e( 'Documentation', 'viktor-lite' ); ?></a></p>
					<hr>
					<h3><?php esc_html_e( 'Step 3 - Customize', 'viktor-lite' ); ?></h3>
					<p><?php esc_html_e( 'Use the Customizer to make Viktor your own.', 'viktor-lite' ); ?></p>
					<p><a class="button button-primary button-large" href="<?php echo admin_url( 'customize.php' ); ?>"><?php esc_html_e( 'Go to Customizer', 'viktor-lite' ); ?></a></p>
				</div>

				<div id="#actions" class="viktor-tab actions">
					<h3><?php esc_html_e( 'Install: Redux Framework', 'viktor-lite' ); ?></h3>
					<p><?php esc_html_e( 'It is highly recommended that you install Redux Framework. It will enable the core functionality of this theme.', 'viktor-lite' ); ?></p>
					
					<?php if ( ! class_exists( 'ReduxFramework' ) ): ?>
					<?php // $so_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=redux-framework'), 'install-plugin_redux-framework'); ?>
					<?php $so_url = self_admin_url('themes.php?page=tgmpa-install-plugins'); ?>
					<p>
						<a target="_blank" class="install-now button" href="<?php echo esc_url( $so_url ); ?>"><?php esc_html_e( 'Install and Activate', 'viktor-lite' ); ?></a>
					</p>
					<?php else : ?>
						<p style="color:#23d423;font-style:italic;font-size:14px;"><?php esc_html_e( 'Plugin installed and active!', 'viktor-lite' ); ?></p>
					<?php endif; ?>
 
				</div>

				<div id="#support" class="viktor-tab support">
					<div class="column-wrapper">
						<div class="tab-column">
						<span class="dashicons dashicons-sos"></span>
						<h3><?php esc_html_e( 'Visit our forums', 'viktor-lite' ); ?></h3>
						<p><?php esc_html_e( 'Need help? Go ahead and visit our support forums and we\'ll be happy to assist you with any theme related questions you might have', 'viktor-lite' ); ?></p>
							<a href="http://digitalcenturysf.com/support/" target="_blank"><?php esc_html_e( 'Visit the forums', 'viktor-lite' ); ?></a>				
							</div>
						<div class="tab-column">
						<span class="dashicons dashicons-book-alt"></span>
						<h3><?php esc_html_e( 'Documentation', 'viktor-lite' ); ?></h3>
						<p><?php esc_html_e( 'Our documentation can help you learn how to use the theme and also provides you with premade code snippets and answers to FAQs.', 'viktor-lite' ); ?></p>
						<a href="http://docs.digitalcenturysf.com/acategory/viktor-lite/" target="_blank"><?php esc_html_e( 'See the Documentation', 'viktor-lite' ); ?></a>
						</div>
					</div>
				</div>
				<div id="#table" class="viktor-tab table">
				<table class="widefat fixed featuresList"> 
				   <thead> 
					<tr> 
					 <td><strong><h3><?php esc_html_e( 'Feature', 'viktor-lite' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'Viktor Lite', 'viktor-lite' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'Viktor Pro', 'viktor-lite' ); ?></h3></strong></td>
					</tr> 
				   </thead> 
				   <tbody> 
					<tr> 
					 <td><?php esc_html_e( 'Responsive', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>  
					<tr> 
					 <td><?php esc_html_e( 'Social Icons', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Slider or image header', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Front Page Blocks', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Translation ready', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>  
					<tr> 
					 <td><?php esc_html_e( 'Blog options', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Footer options', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>  
					<tr> 
					 <td><?php esc_html_e( 'Access to all Google Fonts', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Color options', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Footer Credits', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Advanced CSS and JS', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Top Header Support', 'viktor-lite' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Extra widgets (About, Ad, Project, Services, Recent Post , Instagram and Testimonial)', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Extra Theme Options (Blog Page, Search Page, Archive Page, Header contactm, Csutom CSS JS)', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr>    
					<tr> 
					 <td><?php esc_html_e( 'WooCommerce compatible', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Extra page section (Team, accordion, testimonail, carousel slider, contact form, projects post type, service psot type)', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Priority support', 'viktor-lite' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
				   </tbody> 
				  </table>
				  <p style="text-align: right;"><a class="button button-primary button-large" href="https://digitalcenturysf.com/demo/?theme=viktor-wp"><?php esc_html_e('Buy Viktor Pro ', 'viktor-lite'); ?></a></p>
				</div>		
			</div>
		</div>
	</div>
<?php
}

//Styles
function viktor_about_hook_styles(){
	add_action( 'admin_enqueue_scripts', 'viktor_about_page_styles' );
}
function viktor_about_page_styles() {
	wp_enqueue_style( 'viktor-about-style', get_template_directory_uri() . '/inc/upsell/css/about-page.css', array(), true );

	wp_enqueue_script( 'viktor-about-script', get_template_directory_uri() . '/inc/upsell/js/about-page.js', array('jquery'),'', true );

}