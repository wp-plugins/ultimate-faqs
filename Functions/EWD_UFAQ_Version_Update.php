<?php
function EWD_UFAQ_Version_Update() {
	global $EWD_UFAQ_Version;

	$params = array(
		'post_type' => 'ufaq',
		'posts_per_page' => -1,
	);
	$FAQs = get_posts($params);

	if (is_array($FAQs)) {
		foreach ($FAQs as $FAQ) {
			$Current_Order = get_post_meta($FAQ->ID, "ufaq_order", true);
			if ($Current_Order == "") {
				update_post_meta($FAQ->ID, 'ufaq_order', 999);
			}
		}
	}

	if (get_option("EWD_UFAQ_Toggle") == "") {update_option("EWD_UFAQ_Toggle", "Yes");}
	if (get_option("EWD_UFAQ_Display_Back_To_Top") == "") {update_option("EWD_UFAQ_Display_Back_To_Top", "No");}
	if (get_option("EWD_UFAQ_Display_Style") == "") {update_option("EWD_UFAQ_Display_Style", "Default");}
	if (get_option("EWD_UFAQ_Color_Block_Shape") == "") {update_option("EWD_UFAQ_Color_Block_Shape", "Square");}
	if (get_option("FAQ_Auto_Complete_Titles") == "") {update_option("FAQ_Auto_Complete_Titles", "Yes");}

	update_option('EWD_UFAQ_Version', $EWD_UFAQ_Version);
}

?>