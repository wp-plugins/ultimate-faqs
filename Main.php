<?php
/*
Plugin Name: Ultimate FAQ
Plugin URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Description: A plugin that lets you create FAQs (frequently asked questions), organize them, publicize them, etc.
Author: Etoile Web Design
Author URI: http://www.EtoileWebDesign.com/wordpress-plugins/
Terms and Conditions: http://www.etoilewebdesign.com/plugin-terms-and-conditions/
Text Domain: EWD_UFAQ
Version: 1.0.6
*/

global $ewd_ufaq_message;
global $UFAQ_Full_Version;
global $EWD_UFAQ_Version;

$EWD_UFAQ_Version = '1.0.6';

define( 'EWD_UFAQ_CD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'EWD_UFAQ_CD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

//define('WP_DEBUG', true);

register_activation_hook(__FILE__,'Set_EWD_UFAQ_Options');
add_filter('upgrader_post_install', 'Set_EWD_UFAQ_Options', 10, 2);

/* Hooks neccessary admin tasks */
if ( is_admin() ){
	add_action('widgets_init', 'Update_EWD_UFAQ_Content');
	add_action('admin_notices', 'EWD_UFAQ_Error_Notices');
	add_action('admin_init', 'Add_EWD_UFAQ_Scripts');
	add_action('admin_head', 'EWD_UFAQ_Admin_Options');
}

function EWD_UFAQ_Enable_Sub_Menu() {
	//add_submenu_page('edit.php?post_type=ufaq', 'FAQ Order', 'FAQ Order', 'edit_posts', basename(__FILE__), 'custom_function');
	add_submenu_page('edit.php?post_type=ufaq', 'FAQ Options', 'FAQ Settings', 'edit_posts', 'options', 'EWD_UFAQ_Output_Options_Page');
	add_submenu_page('edit.php?post_type=ufaq', 'FAQ Export', 'FAQ Export', 'edit_posts', 'export', 'EWD_UFAQ_Output_Export_Page');
	add_submenu_page('edit.php?post_type=ufaq', 'FAQ Import', 'FAQ Import', 'edit_posts', 'import_posts', 'EWD_UFAQ_Output_Import_Page');
	//add_submenu_page('edit.php?post_type=ufaq', 'FAQ Statistics', 'FAQ Statistics', 'edit_posts', basename(__FILE__), 'EWD_UFAQ_Output_Statistics_Page');
}
add_action('admin_menu' , 'EWD_UFAQ_Enable_Sub_Menu');

/* Add localization support */
function EWD_UFAQ_localization_setup() {
		load_plugin_textdomain('EWD_UFAQ', false, dirname(plugin_basename(__FILE__)) . '/lang/');
}
add_action('after_setup_theme', 'EWD_UFAQ_localization_setup');

// Add settings link on plugin page
function EWD_UFAQ_plugin_settings_link($links) {
  $settings_link = '<a href="edit.php?post_type=ufaq&page=options">Settings</a>';
  array_unshift($links, $settings_link);
  return $links;
}
$plugin = plugin_basename(__FILE__);
add_filter("plugin_action_links_$plugin", 'EWD_UFAQ_plugin_settings_link' );

function Add_EWD_UFAQ_Scripts() {
	if (isset($_GET['post_type']) && $_GET['post_type'] == 'ufaq') {
		$url_one = plugins_url("ultimate-faqs/js/sorttable.js");
		$url_two = plugins_url("ultimate-faqs/js/Admin.js");

		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('sortable', $url_one, array('jquery'));
		wp_enqueue_script('UFAQ Admin', $url_two, array('jquery'));
	}
}

function EWD_UFAQ_Admin_Options() {
	wp_enqueue_style( 'ewd-ufaq-admin', plugins_url("ultimate-faqs/css/Admin.css"));
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

    wp_register_style( 'ewd-ufaq-rrssb', plugins_url('css/rrssb-min.css', __FILE__) );
    wp_enqueue_style( 'ewd-ufaq-rrssb' );
}

add_action('activated_plugin','save_ufaq_error');
function save_ufaq_error(){
		update_option('plugin_error',  ob_get_contents());
		file_put_contents("Error.txt", ob_get_contents());
}

function Set_EWD_UFAQ_Options() {
		if (get_option("EWD_UFAQ_FAQ_Accordion") == "") {update_option("EWD_UFAQ_FAQ_Accordion", "No");}
		if (get_option("EWD_UFAQ_Reveal_Effect") == "") {update_option("EWD_UFAQ_Reveal_Effect", "none");}
		if (get_option("EWD_UFAQ_Full_Version") == "") {update_option("EWD_UFAQ_Full_Version", "No");}

		if (get_option("EWD_UFAQ_Group_By_Category") == "") {update_option("EWD_UFAQ_Group_By_Category", "No");}
		if (get_option("EWD_UFAQ_Group_By_Order_By") == "") {update_option("EWD_UFAQ_Group_By_Order_By", "name");}
		if (get_option("EWD_UFAQ_Group_By_Order") == "") {update_option("EWD_UFAQ_Group_By_Order", "ASC");}
		if (get_option("EWD_UFAQ_Order_By") == "") {update_option("EWD_UFAQ_Order_By", "date");}
		if (get_option("EWD_UFAQ_Order") == "") {update_option("EWD_UFAQ_Order", "DESC");}
}

$UFAQ_Full_Version = get_option("EWD_UFAQ_Full_Version");
if ($_GET['post_type'] == 'ufaq' and $UFAQ_Full_Version != "Yes") {add_action("admin_notices", "EWD_UFAQ_Upgrade_Box");}
if ($_GET['post_type'] == 'ufaq' and isset($_POST['Upgrade_To_Full']) and $UFAQ_Full_Version == "Yes") {add_action("admin_notices", "EWD_UFAQ_Upgrade_Notice");}

$rules = get_option('rewrite_rules');
$PrettyLinks = get_option("EWD_UFAQ_Pretty_Permalinks");
if ($PrettyLinks == "Yes") {
	add_filter( 'query_vars', 'EWD_UFAQ_add_query_vars_filter' );
	add_filter('init', 'EWD_UFAQ_Rewrite_Rules');
	update_option("EWD_UFAQ_Update_RR_Rules", "No");
}

if (isset($_POST['Upgrade_To_Full'])) {
	  add_action('admin_init', 'EWD_UFAQ_Upgrade_To_Full');
}

include "Functions/Error_Notices.php";
include "Functions/EWD_UFAQ_Add_Social_Media_Buttons.php";
include "Functions/EWD_UFAQ_Add_Views_Column.php";
include "Functions/EWD_UFAQ_Export.php";
include "Functions/EWD_UFAQ_Import.php";
include "Functions/EWD_UFAQ_Styling.php";
include "Functions/EWD_UFAQ_Output_Options_Page.php";
include "Functions/EWD_UFAQ_Output_Export_Page.php";
include "Functions/EWD_UFAQ_Output_Import_Page.php";
include "Functions/EWD_UFAQ_Rewrite_Rules.php";
include "Functions/EWD_UFAQ_Submit_Question.php";
include "Functions/EWD_UFAQ_Upgrade_Box.php";
include "Functions/EWD_UFAQ_Version_Update.php";
include "Functions/EWD_UFAQ_Widgets.php";
include "Functions/FrontEndAjaxUrl.php";
include "Functions/Full_Upgrade.php";
include "Functions/Process_Ajax.php";
include "Functions/Register_EWD_UFAQ_Posts_Taxonomies.php";
include "Functions/Update_Admin_Databases.php";
include "Functions/Update_EWD_UFAQ_Content.php";

include "Shortcodes/DisplayFAQs.php";
include "Shortcodes/Display_FAQ_Search.php";
include "Shortcodes/Display_Popular_FAQs.php";
include "Shortcodes/Display_Recent_FAQs.php";
include "Shortcodes/SelectFAQ.php";
include "Shortcodes/SubmitFAQ.php";

if ($EWD_UFAQ_Version != get_option('EWD_UFAQ_Version')) {
	EWD_UFAQ_Version_Update();
}

?>