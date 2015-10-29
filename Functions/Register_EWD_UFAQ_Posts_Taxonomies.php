<?php
add_action( 'init', 'EWD_UFAQ_Create_Posttype' );
function EWD_UFAQ_Create_Posttype() {
		$labels = array(
				'name' => __('FAQs', 'EWD_UFAQ'),
				'singular_name' => __('FAQ', 'EWD_UFAQ'),
				'menu_name' => __('FAQs', 'EWD_UFAQ'),
				'add_new' => __('Add New', 'EWD_UFAQ'),
				'add_new_item' => __('Add New FAQ', 'EWD_UFAQ'),
				'edit_item' => __('Edit FAQ', 'EWD_UFAQ'),
				'new_item' => __('New FAQ', 'EWD_UFAQ'),
				'view_item' => __('View FAQ', 'EWD_UFAQ'),
				'search_items' => __('Search FAQs', 'EWD_UFAQ'),
				'not_found' =>  __('Nothing found', 'EWD_UFAQ'),
				'not_found_in_trash' => __('Nothing found in Trash', 'EWD_UFAQ'),
				'parent_item_colon' => ''
		);

		$args = array(
				'labels' => $labels,
				'public' => true,
				'publicly_queryable' => true,
				'show_ui' => true,
				'query_var' => true,
				'has_archive' => true,
				'menu_icon' => null,
				'rewrite' => array('slug' => 'faqs'),
				'capability_type' => 'post',
				'menu_position' => null,
				'menu_icon' => 'dashicons-format-status',
				'supports' => array('title','editor','author','excerpt','comments')
	  ); 

	register_post_type( 'ufaq' , $args );
}

function EWD_UFAQ_Create_Category_Taxonomy() {

	register_taxonomy('ufaq-category', 'ufaq', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => __('FAQ Categories', 'EWD_UFAQ'),
			'singular_name' => __('FAQ Category', 'EWD_UFAQ'),
			'search_items' =>  __('Search FAQ Categories', 'EWD_UFAQ'),
			'all_items' => __('All FAQ Categories', 'EWD_UFAQ'),
			'parent_item' => __('Parent FAQ Category', 'EWD_UFAQ'),
			'parent_item_colon' => __('Parent FAQ Category:', 'EWD_UFAQ'),
			'edit_item' => __('Edit FAQ Category', 'EWD_UFAQ'),
			'update_item' => __('Update FAQ Category', 'EWD_UFAQ'),
			'add_new_item' => __('Add New FAQ Category', 'EWD_UFAQ'),
			'new_item_name' => __('New FAQ Category Name', 'EWD_UFAQ'),
			'menu_name' => __('FAQ Categories', 'EWD_UFAQ'),
		)
	));

	register_taxonomy('ufaq-tag', 'ufaq', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => false,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => __('FAQ Tags', 'EWD_UFAQ'),
			'singular_name' => __('FAQ Tag', 'EWD_UFAQ'),
			'search_items' =>  __('Search FAQ Tags', 'EWD_UFAQ'),
			'all_items' => __('All FAQ Tags', 'EWD_UFAQ'),
			'parent_item' => __('Parent FAQ Tag', 'EWD_UFAQ'),
			'parent_item_colon' => __('Parent FAQ Tag:', 'EWD_UFAQ'),
			'edit_item' => __('Edit FAQ Tag', 'EWD_UFAQ'),
			'update_item' => __('Update FAQ Tag', 'EWD_UFAQ'),
			'add_new_item' => __('Add New FAQ Tag', 'EWD_UFAQ'),
			'new_item_name' => __('New FAQ Tag Name', 'EWD_UFAQ'),
			'menu_name' => __('FAQ Tags', 'EWD_UFAQ'),
		)
	));
}
add_action( 'init', 'EWD_UFAQ_Create_Category_Taxonomy', 0 );

add_action( 'add_meta_boxes', 'EWD_UFAQ_Add_Meta_Boxes' );
function EWD_UFAQ_Add_Meta_Boxes () {
	add_meta_box("ufaq-meta", __("FAQ Details", 'EWD_UFAQ'), "EWD_UFAQ_Meta_Box", "ufaq", "normal", "high");
}

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function EWD_UFAQ_Meta_Box( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'EWD_UFAQ_Save_Meta_Box_Data', 'EWD_UFAQ_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$Value = get_post_meta( $post->ID, 'EWD_UFAQ_Post_Author', true );

	if ($Value == "") {
		$User = wp_get_current_user();
		$Value = $User->display_name;
	}

	echo "<div class='ewd-ufaq-meta-field'>";
	echo "<label for='Post_Author'>";
	echo __( "Author Display Name:", 'EWD_UFAQ' );
	echo " </label>";
	echo "<input type='text' id='ewd-ufaq-post-author' name='Post_Author' value='" . esc_attr( $Value ) . "' size='25' />";
	echo "</div>";
}

add_action( 'save_post', 'EWD_UFAQ_Save_Meta_Box_Data' );
function EWD_UFAQ_Save_Meta_Box_Data($post_id) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['EWD_UFAQ_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['EWD_UFAQ_meta_box_nonce'], 'EWD_UFAQ_Save_Meta_Box_Data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. If there's no product name, don't save any other information.*/
	if ( ! isset( $_POST['Post_Author'] ) ) {
		return;
	}

	// Sanitize user input.
	$Post_Author = sanitize_text_field( $_POST['Post_Author'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'EWD_UFAQ_Post_Author', $Post_Author );

}
?>
