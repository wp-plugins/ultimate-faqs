<?php
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the customer-order shortcode */
function Insert_Question_Form($atts) {
	global $user_message;
	global $wpdb;
		
	$Custom_CSS = get_option('EWD_UFAQ_Custom_CSS');
	$Allow_Proposed_Answer = get_option("EWD_UFAQ_Allow_Proposed_Answer");
	
	$ReturnString = "";
		
	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
		 		'success_message' => __('Thank you for submitting an FAQ.', 'EWD_UFAQ'),
		 		'submit_faq_form_title' => __('Submit a Question', 'EWD_UFAQ'),
				'submit_faq_instructions' => __('Please fill out the form below to submit a question.', 'EWD_UFAQ'),
				'submit_text' => __('Send Question', 'EWD_UFAQ')),
		$atts
		)
	);
		
	if (isset($_POST['Submit_Question'])) {$user_update = EWD_UFAQ_Submit_Question($success_message);}

	$ReturnString .= "<style type='text/css'>";
	$ReturnString .= $Custom_CSS;
	$ReturnString .= "</style>";
	$ReturnString .= EWD_UFAQ_Add_Modified_Styles();

	$ReturnString .= "<div class='ewd-ufaq-question-form'>";

	if (isset($_POST['Submit_Question'])) {
		$ReturnString .= "<div class='ewd-ufaq-question-update'>";
		$ReturnString .= $user_update;
		$ReturnString .= "</div>";
	}

	$ReturnString .= "<form id='question_form' method='post' action='#'>";
	$ReturnString .= wp_nonce_field();
	$ReturnString .= wp_referer_field();

	$ReturnString .= "<div class='form-field'>";
	$ReturnString .= "<div id='ewd-ufaq-review-title' class='ewd-ufaq-review-label'>";
	$ReturnString .= __("Question Title", 'EWD_UFAQ') . ": ";
	$ReturnString .= "</div>";
	$ReturnString .= "<div id='ewd-ufaq-review-author-input' class='ewd-ufaq-review-input'>";
	$ReturnString .= "<input type='text' name='Post_Title' id='Post_Title' />";
	$ReturnString .= "</div>";
	$ReturnString .= "<div id='ewd-ufaq-title-explanation' class='ewd-ufaq-review-explanation'>";
	$ReturnString .= "<p>" . __("What question is being answered?", 'EWD_UFAQ')  . "</p>";
	$ReturnString .= "</div>";
	$ReturnString .= "</div>";

	if ($Allow_Proposed_Answer == "Yes") {
		$ReturnString .= "<div class='ewd-ufaq-meta-field'>";
		$ReturnString .= "<label for='Post_Body'>";
		$ReturnString .= __("Proposed Answer", 'EWD_UFAQ') . ": ";
		$ReturnString .= "</label>";
		$ReturnString .= "<textarea name='Post_Body'></textarea>";
		$ReturnString .= "</div>";
	}

	$ReturnString .= "<div class='form-field'>";
	$ReturnString .= "<div id='ewd-urp-review-author' class='ewd-urp-review-label'>";
	$ReturnString .= __("Review Author", 'EWD_URP') . ": ";
	$ReturnString .= "</div>";
	$ReturnString .= "<div id='ewd-urp-review-author-input' class='ewd-urp-review-input'>";
	$ReturnString .= "<input type='text' name='Post_Author' id='Post_Author' />";
	$ReturnString .= "</div>";
	$ReturnString .= "<div id='ewd-urp-author-explanation' class='ewd-urp-review-explanation'>";
	$ReturnString .= "<p>" . __('What name should be displayed with your review?', 'EWD_URP')  . "</p>";
	$ReturnString .= "</div>";
	$ReturnString .= "</div>";


	$ReturnString .= "<p class='submit'><input type='submit' name='Submit_Question' id='submit' class='button-primary' value='" . $submit_text . "'  /></p></form>";
	$ReturnString .= "</div>";

	return $ReturnString;
}
if ($UFAQ_Full_Version == "Yes") {add_shortcode("submit-question", "Insert_Question_Form");}

?>