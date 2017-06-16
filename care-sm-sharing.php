<?php
/**
 * Plugin Name: Care Social Media Sharing Icon
 * Plugin URI: http://careTec.in
 * Description: This plugin adds social sharing icons.
 * Version: 1.0.0
 * Author: careTec Team
 * Text Domain: caresocialmedia
 */

// Setup
defined('ABSPATH') or die('No script kiddies please!');
define('CARE_MEDIA_SOCIAL_URL',__FILE__);

// Includes
include('includes/activate.php');
include('includes/enqueue.php');
include('includes/settings.php');
include('includes/shortcodes.php');

// Hooks
register_activation_hook(__FILE__, 'care_activation_hook');
add_action( 'admin_enqueue_scripts', 'care_socialmedia_enqueue', false);
add_action('admin_menu', 'care_register_menu'); 
register_deactivation_hook(__FILE__, 'care_deactivation_hook');

// Shortcodes
add_shortcode('care_sm_share_icons', 'care_sm_share_icons_fn');

// Register a Menu
function care_register_menu(){
	//create new top-level menu
	add_menu_page( 
		'Care-Social Media', 
		'Care-Social Media', 
		'manage_options', 
		'care-social-media', 
		'care_create_content_page','dashicons-share');
	
	//call register settings function
	add_action( 'admin_init', 'register_care_social_settings' );

}
