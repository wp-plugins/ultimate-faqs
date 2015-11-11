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

	update_option('EWD_UFAQ_Version', $EWD_UFAQ_Version);
}

?>