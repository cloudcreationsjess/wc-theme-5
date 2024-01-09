<?php
function custom_login_logo() {
	$logo_url = get_template_directory_uri() . '/resources/images/white-canvas-logo.png'; // Replace with the actual path to your logo image.
	echo '<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(' . esc_url($logo_url) . ');
			background-size: contain;
			width: 100%;
			height:90px;
		}
	</style>';
}
add_action('login_enqueue_scripts', 'custom_login_logo');

/**
 * Change the link of the login logo
 */
function custom_login_logo_url() {
	return home_url(); // Change this to the URL you want the logo to link to.
}
add_filter('login_headerurl', 'custom_login_logo_url');

/**
 * Change the title attribute of the login logo
 */
function custom_login_logo_url_title() {
	return 'White Canvas'; // Change this to the title you want for the logo link.
}
add_filter('login_headertitle', 'custom_login_logo_url_title');
