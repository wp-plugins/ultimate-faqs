<?php
function  EWD_UFAQ_Submit_Question($success_message) {
	$Post_Title = sanitize_text_field($_POST['Post_Title']);
	$Post_Body = sanitize_text_field($_POST['Post_Body']);
	$Post_Author = sanitize_text_field($_POST['Post_Author']);

	$post = array(
		'post_content' => $Post_Body,
		'post_title' => $Post_Title,
		'post_type' => 'ufaq',
		'post_status' => 'draft' //Can create an option for admin approval of reviews here
	);
	$post_id = wp_insert_post($post);
	if ($post_id == 0) {$user_message = __("FAQ was not created succesfully.", 'EWD_UFAQ'); return $user_message;}

	update_post_meta($post_id, "EWD_UFAQ_Post_Author", $Post_Author);

	return $success_message;
}

?>