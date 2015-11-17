<?php
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function Display_Select_FAQs($atts) {
	$Custom_CSS = get_option("EWD_UFAQ_Custom_CSS");
	$FAQ_Accordion = get_option("EWD_UFAQ_FAQ_Accordion");
	$Reveal_Effect = get_option("EWD_UFAQ_Reveal_Effect");
	$Display_All_Answers = get_option("EWD_UFAQ_Display_All_Answers");
	$Scroll_To_Top = get_option("EWD_UFAQ_Scroll_To_Top");
	$Include_Permalink = get_option("EWD_UFAQ_Include_Permalink");
	$Socialmedia_String = get_option("EWD_UFAQ_Social_Media");
    $Socialmedia = explode(",", $Socialmedia_String);
    $Display_Author = get_option("EWD_UFAQ_Display_Author");
    $Display_Date = get_option("EWD_UFAQ_Display_Date");

	$ReturnString = "";

	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
									'faq_name' => "",
									'faq_slug' => "",
									'faq_id' => ""),
									$atts
		)
	);

	$name_array = explode(",", $faq_name);
	$slug_array = explode(",", $faq_slug);
	$id_array = explode(",", $faq_id);

	foreach ($name_array as $post_name) {
		$single_post = get_page_by_title($post_name, "OBJECT", "ufaq");
		$post_id_array[] = $single_post->ID;
	}

	foreach ($slug_array as $post_slug) {
		$single_post = get_page_by_path($post_slug, "OBJECT", "ufaq");
		$post_id_array[] = $single_post->ID;
	}

	foreach ($id_array as $post_id) {
		$post_id_array[] = $post_id;
	}

	$params = array(
					'posts_per_page' => -1,
					'post_type' => 'ufaq',
					'include' => $post_id_array
				);
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

	$ReturnString .= "<div class='ufaq-faq-list' id='ufaq-faq-list'>";
	$Counter = 0;
	foreach ($faqs as $faq) {
		if ($Pretty_Permalinks == "Yes") {$FAQ_Permalink = get_the_permalink() . "single-faq/" . $faq->post_name;}
		else {$FAQ_Permalink = get_the_permalink() . "?Display_FAQ=" . $faq->ID;}

		$ReturnString .= "<div class='ufaq-faq-div'>";

		$ReturnString .= "<div class='ufaq-faq-title' id='ufaq-title-" . $faq->ID . "' data-postid='" . $faq->ID . "-" . $Counter . "'>";
		$ReturnString .= "<h4 ><a class='ewd-ufaq-post-margin-symbol' id='ewd-ufaq-post-margin-symbol-" . $faq->ID . "' href='" . get_permalink($faq->ID) . "' data-id='" . $faq->ID . "'>+ </a>";
		$ReturnString .= "<a class='ewd-ufaq-post-margin'  href='" . get_permalink($faq->ID) . "'>" .$faq->post_title . " </a></h4>";
		$ReturnString .= "</div>";

		if (strlen($faq->post_excerpt) > 0) {$ReturnString .= "<div class='ufaq-faq-excerpt' id='ufaq-excerpt-" . $faq->ID . "'>" . $faq->post_excerpt . "</div>";}
		$ReturnString .= "<div class='ufaq-faq-body ";
		if ($Display_All_Answers != "Yes") {$ReturnString .= "ewd-ufaq-hidden";}
		$ReturnString .= "' id='ufaq-body-" . $faq->ID . "-" . $Counter . "'>";

		if ($Display_Author == "Yes"  or $Display_Date == "Yes") {
			$Display_Author_Value = get_post_meta($faq->ID, "EWD_UFAQ_Post_Author", true);
			$Display_Date_Value = get_the_date("", $faq->ID);
			$ReturnString .= "<div class='ewd-ufaq-author-date'>";
			$ReturnString .= __("Posted ", 'EWD_UFAQ');
			if ($Display_Author == "Yes" and $Display_Author_Value != "") {$ReturnString .= __("by ", 'EWD_UFAQ') . "<span class='ewd-ufaq-author'>" . $Display_Author_Value . "</span> ";}
			if ($Display_Date == "Yes") {$ReturnString .= __("on ", 'EWD_UFAQ') . "<span class='ewd-ufaq-date'>" . $Display_Date_Value . "</span> ";}
			$ReturnString .= "</div>";
		}

		$ReturnString .= "<div class='ufaq-faq-post' id='ufaq-post-" . $faq->ID . "'>" . $faq->post_content . "</div>";

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

		$Counter++;
	}
	$ReturnString .= "</div>";

	return $ReturnString;
}
add_shortcode("select-faq", "Display_Select_FAQs");