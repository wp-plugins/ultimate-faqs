<?php
/*
Plugin Name: Ultimate FAQ
Plugin URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Description: A plugin that lets you create FAQs (frequently asked questions), organize them, publicize them, etc.
Author: Tim Ruse
Author URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Terms and Conditions: http://www.etoilewebdesign.com/plugin-terms-and-conditions/
Text Domain: EWD_UFAQ
Version: 0.1
*/

global $ewd_ufaq_message;
global $UFAQ_Full_Version;

define( 'EWD_UFAQ_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_UFAQ_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//define('WP_DEBUG', true);

register_activation_hook(__FILE__,'Set_EWD_UFAQ_Options');

/* Hooks neccessary admin tasks */
if ( is_admin() ){
		add_action('widgets_init', 'Update_EWD_UFAQ_Content');
		add_action('admin_notices', 'EWD_UFAQ_Error_Notices');
}

function EWD_UFAQ_Enable_Sub_Menu() {
		//add_submenu_page('edit.php?post_type=ufaq', 'FAQ Order', 'FAQ Order', 'edit_posts', basename(__FILE__), 'custom_function');
		add_submenu_page('edit.php?post_type=ufaq', 'FAQ Options', 'FAQ Settings', 'edit_posts', 'options', 'EWD_UFAQ_Output_Options_Page');
		//add_submenu_page('edit.php?post_type=ufaq', 'FAQ Statistics', 'FAQ Statistics', 'edit_posts', basename(__FILE__), 'EWD_UFAQ_Output_Statistics_Page');
}
add_action('admin_menu' , 'EWD_UFAQ_Enable_Sub_Menu');

function custom_function() {
		echo "Here is a function<br>";
}

/* Add localization support */
function EWD_UFAQ_localization_setup() {
		load_plugin_textdomain('EWD_UFAQ', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_UFAQ_localization_setup');

// Add settings link on plugin page
function EWD_UFAQ_plugin_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=EWD-UFAQ-options">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'EWD_UFAQ_plugin_settings_link' );

function Add_EWD_UFAQ_Scripts() {
		if (isset($_GET['page']) && $_GET['page'] == 'EWD-UFAQ-options') {
			  $url_one = plugins_url("ultimate-faq/js/Admin.js");
				wp_enqueue_script('PageSwitch', $url_one, array('jquery'));
		}
}

add_action( 'wp_enqueue_scripts', 'Add_EWD_UFAQ_FrontEnd_Scripts' );
function Add_EWD_UFAQ_FrontEnd_Scripts() {
	wp_enqueue_script('ewd-ufaq-js', plugins_url( '/js/ewd-ufaq-js.js' , __FILE__ ), array( 'jquery' ));
	
	wp_enqueue_script("jquery-ui-core");
	wp_enqueue_script("jquery-effects-core");
	
	wp_enqueue_script("jquery-effects-blind");
	wp_enqueue_script("jquery-effects-bounce");
	wp_enqueue_script("jquery-effects-clip");
	wp_enqueue_script("jquery-effects-drop");
	wp_enqueue_script("jquery-effects-explode");
	wp_enqueue_script("jquery-effects-fade");
	wp_enqueue_script("jquery-effects-fold");
	wp_enqueue_script("jquery-effects-highlight");
	wp_enqueue_script("jquery-effects-pulsate");
	wp_enqueue_script("jquery-effects-scale");
	wp_enqueue_script("jquery-effects-shake");
	wp_enqueue_script("jquery-effects-slide");
	wp_enqueue_script("jquery-effects-transfer");
}


add_action( 'wp_enqueue_scripts', 'EWD_UFAQ_Add_Stylesheet' );
function EWD_UFAQ_Add_Stylesheet() {
    wp_register_style( 'ewd-ufaq-style', plugins_url('css/ewd-ufaq-styles.css', __FILE__) );
    wp_enqueue_style( 'ewd-ufaq-style' );
}

add_action('activated_plugin','save_ufaq_error');
function save_ufaq_error(){
		update_option('plugin_error',  ob_get_contents());
		file_put_contents("Error.txt", ob_get_contents());
}

function Set_EWD_UFAQ_Options() {
		if (get_option("EWD_UFAQ_FAQ_Accordion") == "") {update_option("EWD_UFAQ_FAQ_Accordion", "No");}
		if (get_option("EWD_UFAQ_Reveal_Effect") == "") {update_option("EWD_UFAQ_Reveal_Effect", "none");}
		update_option("EWD_UFAQ_Full_Version", "Yes");
}

$UFAQ_Full_Version = get_option("EWD_UFAQ_Full_Version");

/*if (isset($_POST['Upgrade_To_Full'])) {
	  add_action('admin_init', 'Upgrade_To_Full');
}*/

include "Functions/Error_Notices.php";
include "Functions/EWD_UFAQ_Output_Options_Page.php";
include "Functions/Register_EWD_UFAQ_Posts_Taxonomies.php";
include "Functions/Update_Admin_Databases.php";
include "Functions/Update_EWD_UFAQ_Content.php";

include "Shortcodes/DisplayFAQs.php";
include "Shortcodes/SelectFAQ.php";

?>