<?php
// Add in a new column option for the UFAQ post type
function EWD_UFAQ_Columns_Head($defaults) {
	$defaults['number_of_views'] = __('# of Views', 'EWD_UFAQ');
	$defaults['ufaq_ID'] = __('Post ID', 'EWD_UFAQ');
	return $defaults;
}
 
// Show the number of times the FAQ post has been clicked
function EWD_UFAQ_Columns_Content($column_name, $post_ID) {
	if ($column_name == 'number_of_views') {
		$num_views = EWD_UFAQ_Get_Views($post_ID);
		echo $num_views;
	}

	if ($column_name == 'ufaq_ID') {
		echo $post_ID;
	}
}

// Get the number of times the FAQ post has been clicked
function EWD_UFAQ_Get_Views($post_ID) {
	$UFAQ_View_Count = get_post_meta($post_ID, 'ufaq_view_count', true);
	if ($UFAQ_View_Count != "") {
		return $UFAQ_View_Count;
	}
	else {
		return 0;
	}
}

add_filter('manage_ufaq_posts_columns', 'EWD_UFAQ_Columns_Head');
add_action('manage_ufaq_posts_custom_column', 'EWD_UFAQ_Columns_Content', 10, 2);

?>