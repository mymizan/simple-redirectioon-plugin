<?php
/**
 * Plugin Name: Simple Redirection
 * Plugin URI: https://developerhero.net
 * Description: This is a simple plugin that will redirect all or certain pages to the homepage.
 * Author: M Yakub Mizan
 * Version: 1.0.0
 * Author URI: https://yakub.xyz
 **/

function mymizan_simple_redirection_plugin() {
	/**
	 * If the user is already on frontpage or home
	 * page (blogs) or in the admin area return false.
	**/
	if ( is_front_page() ||
		 is_home() ||
		 is_admin() ) {
		return false;
	}

	/**
	 * Add the whitelisted page IDs (eg. 1, 2, 3, 4) here such as
	 * cart, checkout, shop, privacy policy etc.
	 * You don't need to add homepage, blog page as they are
	 * already being checked above
	**/
	$whitelist = array(
		// put page IDs to ignore here
	);

	/**
	 * The page you want to redirect to
	**/
	$redirect_url = 'https://www.example.com/';

	$current_object_id = get_queried_object_id();

	if ( is_page() && ! in_array( $current_object_id, $whitelist ) ) {
		header( 'Location: ' . $redirect_url );
		die;
	}
}

add_action( 'wp', 'mymizan_simple_redirection_plugin' );
