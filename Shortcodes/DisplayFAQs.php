<?php
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function Display_FAQs($atts) {
	global $wp;
	
	$current_url = $_SERVER['REQUEST_URI'];
	$Custom_CSS = get_option("EWD_UFAQ_Custom_CSS");
	$FAQ_Accordion = get_option("EWD_UFAQ_FAQ_Accordion");
	$Hide_Categories = get_option("EWD_UFAQ_Hide_Categories");
	$Hide_Tags = get_option("EWD_UFAQ_Hide_Tags");
	$Reveal_Effect = get_option("EWD_UFAQ_Reveal_Effect");
	$Group_By_Category = get_option("EWD_UFAQ_Group_By_Category");
	$Group_By_Order_By = get_option("EWD_UFAQ_Group_By_Order_By");
	$Group_By_Order = get_option("EWD_UFAQ_Group_By_Order");
	$Order_By_Setting = get_option("EWD_UFAQ_Order_By");
	$Order_Setting = get_option("EWD_UFAQ_Order");
	$Include_Permalink = get_option("EWD_UFAQ_Include_Permalink");
	$Pretty_Permalinks = get_option("EWD_UFAQ_Pretty_Permalinks");
	$Display_All_Answers = get_option("EWD_UFAQ_Display_All_Answers");
	$Scroll_To_Top = get_option("EWD_UFAQ_Scroll_To_Top");
    $Socialmedia_String = get_option("EWD_UFAQ_Social_Media");
    $Socialmedia = explode(",", $Socialmedia_String);
    $Display_Author = get_option("EWD_UFAQ_Display_Author");
    $Display_Date = get_option("EWD_UFAQ_Display_Date");
	
	$Posted_Label = get_option("EWD_UFAQ_Posted_Label");
		if ($Posted_Label == "") {$Posted_Label = __("Posted ", 'EWD_UFAQ');}
	$By_Label = get_option("EWD_UFAQ_By_Label");
		if ($By_Label == "") {$By_Label = __("by ", 'EWD_UFAQ');}
	$On_Label = get_option("EWD_UFAQ_On_Label");
		if ($On_Label == "") {$On_Label = __("on ", 'EWD_UFAQ');}
	$Category_Label = get_option("EWD_UFAQ_Category_Label");
	$Tag_Label = get_option("EWD_UFAQ_Tag_Label");
	
	$ReturnString = "";
	
	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
			'search_string' => "",
			'include_category' => "",
			'exclude_category' => "",
			'orderby' => "",
			'order' => "",
			'ajax' => "No",
            'post_count'=>-1),
			$atts
		)
	);
	
	$search_string = strtolower($search_string);

	if ($orderby == "") {$orderby = $Order_By_Setting;}
	if ($orderby == "popular" or $orderby == "set_order") {
		$orig_order_setting = $orderby;
		$orderby = "meta_value_num";
	}

	if ($order == "") {$order = $Order_Setting;}
	if ($orig_order_setting == "popular") {$order = "DESC";}
	if ($orig_order_setting == "set_order") {$order = "ASC";}

	if ($Group_By_Category == "Yes") {
		  $Category_Array = get_terms('ufaq-category', array('orderby' => $Group_By_Order_By, 'order' => $Group_By_Order));
	}
	else {
			$Category_Array = array("EWD_UFAQ_ALL_CATEGORIES");
	}
	
	if (isset($_GET['include_category'])) {$include_category = $_GET['include_category'];}
	if (get_query_var('ufaq_category_slug') != "") {$include_category = get_query_var('ufaq_category_slug');}
	if ($include_category != "" ) {$include_category_array = explode(",", $include_category);}
	else {$include_category_array = array();}
	if (sizeOf($include_category_array) > 0) {
		$include_category_filter_array = array( 'taxonomy' => 'ufaq-category',
								'field' => 'slug',
								'terms' => $include_category_array
		);
	}
	if ($exclude_category != "" ) {$exclude_category_array = explode(",", $exclude_category);}
	else {$exclude_category_array = array();}
	if (sizeOf($exclude_category_array) > 0) {
		$exclude_category_filter_array = array( 'taxonomy' => 'ufaq-category',
								'field' => 'slug',
								'terms' => $exclude_category_array,
								'operator' => 'NOT IN'
		);
	}

	if (isset($_GET['include_tag'])) {$include_tag = $_GET['include_tag'];}
	if (get_query_var('ufaq_tag_slug') != "") {$include_tag = get_query_var('ufaq_tag_slug');}
	if ($include_tag != "" ) {$include_tag_array = explode(",", $include_tag);}
	else {$include_tag_array = array();}
	if (sizeOf($include_tag_array) > 0) {
		$include_tag_filter_array = array( 'taxonomy' => 'ufaq-tag',
								'field' => 'slug',
								'terms' => $include_tag_array
		);
	}

	$ReturnString .= "<div class='ufaq-faq-list' id='ufaq-faq-list'>";

	if (get_query_var('single_faq') != "") {
		$FAQ = get_page_by_path(get_query_var('single_faq'),OBJECT,'ufaq');
		$ReturnString .= "<script>var Display_FAQ_ID = " . $FAQ->ID . ";</script>";
	}
	if (isset($_GET['Display_FAQ'])) {$ReturnString .= "<script>var Display_FAQ_ID = " . $_GET['Display_FAQ'] . ";</script>";}

	foreach ($Category_Array as $Category) {

		if ($Category != "EWD_UFAQ_ALL_CATEGORIES") {$category_array = array( 'taxonomy' => 'ufaq-category',
						 							 	 					'field' => 'slug',
																			'terms' => $Category->slug
													 );
		}
	
		$params = array('posts_per_page' => $post_count,
						'post_type' => 'ufaq',
						'orderby' => $orderby,
						'order' => $order,
						'tax_query' => array('relation' => 'AND',
										$include_category_filter_array,
										$exclude_category_filter_array,
										$include_tag_filter_array,
										$category_array
									)
				);
		if ($orig_order_setting == "popular") {$params['meta_key'] = 'ufaq_view_count';}
		if ($orig_order_setting == "set_order") {$params['meta_key'] = 'ufaq_order';}
		$faqs = get_posts($params);
	
		if ($Custom_CSS != "") {$ReturnString .= "<style>" . $Custom_CSS . "</style>";}
		$ReturnString .= EWD_UFAQ_Add_Modified_Styles();
		
		$ReturnString .= "<script language='JavaScript' type='text/javascript'>";
		if ($FAQ_Accordion == "Yes") {$ReturnString .= "var faq_accordion = true;";}
		else {$ReturnString .= "var faq_accordion = false;";}
		if ($Scroll_To_Top == "Yes") {$ReturnString .= "var faq_scroll = true;";}
		else {$ReturnString .= "var faq_scroll = false;";}
		$ReturnString .= "var reveal_effect = '" . $Reveal_Effect . "';";
		$ReturnString .= "</script>";
	
		if ($Category != "EWD_UFAQ_ALL_CATEGORIES" and sizeOf($faqs) > 0) {
			$ReturnString .= "<div class='ufaq-faq-category'>";
			$ReturnString .= "<div class='ufaq-faq-category-title'>";
			$ReturnString .= "<h4>" . $Category->name . "</h4>";
			$ReturnString .= "</div>";
	    }
	
		foreach ($faqs as $faq) {
			if ($search_string == "" or strpos(strtolower($faq->post_content), $search_string) !== false or strpos(strtolower($faq->post_title), $search_string) !== false) {
				$Category_Terms = wp_get_post_terms($faq->ID, 'ufaq-category');
				$Tag_Terms = wp_get_post_terms($faq->ID, 'ufaq-tag');

				if ($Pretty_Permalinks == "Yes") {$FAQ_Permalink = get_the_permalink() . "single-faq/" . $faq->post_name;}
				else {$FAQ_Permalink = get_the_permalink() . "?Display_FAQ=" . $faq->ID;}
		
				$ReturnString .= "<div class='ufaq-faq-div'>";
		
		
				$ReturnString .= "<div class='ufaq-faq-title' id='ufaq-title-" . $faq->ID . "' data-postid='" . $faq->ID . "'>";
				$ReturnString .= "<h4 ><a class='ewd-ufaq-post-margin-symbol' id='ewd-ufaq-post-margin-symbol-" . $faq->ID . "' href='" . get_permalink($faq->ID) . "' data-id='" . $faq->ID . "'>+ </a>";
				$ReturnString .= "<a class='ewd-ufaq-post-margin'  href='" . get_permalink($faq->ID) . "'>" .$faq->post_title . " </a></h4>";
				$ReturnString .= "</div>";
		
				if (strlen($faq->post_excerpt) > 0) {$ReturnString .= "<div class='ufaq-faq-excerpt' id='ufaq-excerpt-" . $faq->ID . "'>" . apply_filters('the_content', html_entity_decode($faq->post_excerpt)) . "</div>";}
				$ReturnString .= "<div class='ufaq-faq-body ";
				if ($Display_All_Answers != "Yes") {$ReturnString .= "ewd-ufaq-hidden";}
				$ReturnString .= "' id='ufaq-body-" . $faq->ID . "'>";

				if ($Display_Author == "Yes"  or $Display_Date == "Yes") {
					$Display_Author_Value = get_post_meta($faq->ID, "EWD_UFAQ_Post_Author", true);
					$Display_Date_Value = get_the_date("", $faq->ID);
					$ReturnString .= "<div class='ewd-ufaq-author-date'>";
					$ReturnString .= $Posted_Label . " " ;
					if ($Display_Author == "Yes" and $Display_Author_Value != "") {$ReturnString .= $By_Label . " <span class='ewd-ufaq-author'>" . $Display_Author_Value . "</span> ";}
					if ($Display_Date == "Yes") {$ReturnString .= $On_Label . " <span class='ewd-ufaq-date'>" . $Display_Date_Value . "</span> ";}
					$ReturnString .= "</div>";
				}

				$ReturnString .= "<div class='ewd-ufaq-post-margin ufaq-faq-post' id='ufaq-post-" . $faq->ID . "'>" . apply_filters('the_content', html_entity_decode($faq->post_content)) . "</div>";
		
				if ($Hide_Categories == "No") {
					$ReturnString .= "<div class='ufaq-faq-categories' id='ufaq-categories-" . $faq->ID . "'>";
					if ($Category_Label == ""){
						if (sizeOf($Category_Terms) > 1) {$ReturnString .= "Categories: ";}
						else {$ReturnString .= "Category: ";}}
					else {$ReturnString .= $Category_Label . ": ";}
					foreach ($Category_Terms as $Category_Term) {
						if ($Pretty_Permalinks == "Yes") {$Category_URL = $current_url . "faq-category/" . $Category_Term->slug . "/";}
						else {$Category_URL = $current_url . "?include_category=" . $Category_Term->slug;}
						$ReturnString .= "<a  href='" . $Category_URL ."'>" .$Category_Term->name . "</a>, ";
					}
					if (sizeOf($Category_Terms) > 0) {$ReturnString = substr($ReturnString, 0, strlen($ReturnString)-2);}
					$ReturnString .= "</div>";
				}

				if ($Hide_Tags == "No") {
					$ReturnString .= "<div class='ufaq-faq-tags' id='ufaq-tags-" . $faq->ID . "'>";
					if ($Tag_Label == ""){
						if (sizeOf($Tag_Terms) > 1) {$ReturnString .= "Tags: ";}
						else {$ReturnString .= "Tag: ";}}
					else {$ReturnString .= $Tag_Label . ": ";}
					foreach ($Tag_Terms as $Tag_Term) {
						if ($Pretty_Permalinks == "Yes") {$Tag_URL = $current_url . "faq-tag/" . $Tag_Term->slug . "/";}
						else {$Tag_URL = $current_url . "?include_tag=" . $Tag_Term->slug;}
						$ReturnString .= "<a  href='" . $Tag_URL . "'>" .$Tag_Term->name . "</a>, ";
					}
					if (sizeOf($Tag_Terms) > 0) {$ReturnString = substr($ReturnString, 0, strlen($ReturnString)-2);}
					$ReturnString .= "</div>";
				}
		
				if ($Socialmedia[0] != "Blank" and $Socialmedia[0] != "") {
					$ReturnString .= "<div class='ufaq-social-links'>Share: ";
					$ReturnString .= "<ul class='rrssb-buttons'>";
				}
			    if(in_array("Facebook", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Facebook", $FAQ_Permalink, $faq->post_title);}
			    if(in_array("Google", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Google", $FAQ_Permalink, $faq->post_title);}
			    if(in_array("Twitter", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Twitter", $FAQ_Permalink, $faq->post_title);}
			    if(in_array("Linkedin", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Linkedin", $FAQ_Permalink, $faq->post_title);}
			    if(in_array("Pinterest", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Pinterest", $FAQ_Permalink, $faq->post_title);}
			    if(in_array("Email", $Socialmedia)) {$ReturnString .= EWD_UFAQ_Add_Social_Media_Buttons("Email", $FAQ_Permalink, $faq->post_title);}
			    if ($Socialmedia[0] != "Blank" and $Socialmedia[0] != "") {
			    	$ReturnString .= "</ul>";
			    	$ReturnString .= "</div>";
			    }	

			    if ($Include_Permalink == "Yes" and $ajax == "No") {
			    	$ReturnString .= "<div class='ufaq-permalink'>Permalink: ";
			    	$ReturnString .= "<a href='" . $FAQ_Permalink . "'>";
			    	$ReturnString .= "<div class='ufaq-permalink-image'></div>";
			    	$ReturnString .= "</a>";
			    	$ReturnString .= "</div>";
			    }
				
				$ReturnString .= "</div>";
				$ReturnString .= "</div>";
			}
		}
	
		if ($Category != "EWD_UFAQ_ALL_CATEGORIES" and sizeOf($faqs) > 0) {
			$ReturnString .= "</div>";
		}
	}
	$ReturnString .= "</div>";

	return $ReturnString;
}
add_shortcode("ultimate-faqs", "Display_FAQs");
