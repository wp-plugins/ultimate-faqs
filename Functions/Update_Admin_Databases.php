<?php
/* The file contains all of the functions which make changes to the WordPress tables */

function EWD_UFAQ_Add_Post_Order_Meta($post_id) {
    $Current_Order = get_post_meta($post_id, "ufaq_order", true);

    if ($Current_Order == "") {
        update_post_meta($post_id, "ufaq_order", 1000);
    }
}
add_action('save_post_ufaq', 'EWD_UFAQ_Add_Post_Order_Meta');

function EWD_UFAQ_UpdateOptions() {
	global $UFAQ_Full_Version;

    $Custom_CSS = $_POST['custom_css'];
	$FAQ_Accordion = $_POST['faq_accordion'];
	$Hide_Categories = $_POST['hide_categories'];
	$Hide_Tags = $_POST['hide_tags'];
	$Reveal_Effect = $_POST['reveal_effect'];
	$Group_By_Category = $_POST['group_by_category'];
	$Group_By_Order_By = $_POST['group_by_order_by'];
	$Group_By_Order = $_POST['group_by_order'];
	$Order_By_Setting = $_POST['order_by_setting'];
	$Order_Setting = $_POST['order_setting'];
	$Include_Permalink = $_POST['include_permalink'];
	$Pretty_Permalinks = $_POST['pretty_permalinks'];
	$Display_All_Answers = $_POST['display_all_answers'];
	$Scroll_To_Top = $_POST['scroll_to_top'];
    $Social_Media_Array = $_POST['Socialmedia'];
    if (is_array($Social_Media_Array)) {$Social_Media = implode(",", $Social_Media_Array);}
    $Allow_Proposed_Answer = $_POST['allow_proposed_answer'];
    $Display_Author = $_POST['display_author'];
    $Display_Date = $_POST['display_date'];
    $Display_Back_To_Top = $_POST['display_back_to_top'];
    
    $Posted_Label = $_POST['posted_label'];
    $By_Label = $_POST['by_label'];
    $On_Label = $_POST['on_label'];
    $Category_Label = $_POST['category_label'];
    $Tag_Label = $_POST['tag_label'];
	
	$Custom_CSS = stripslashes_deep($Custom_CSS);
	
	if (isset($_POST['custom_css'])) {update_option('EWD_UFAQ_Custom_CSS', $Custom_CSS);}
    if (isset($_POST['faq_toggle'])) {update_option('EWD_UFAQ_Toggle',  $_POST['faq_toggle']);}
    if (isset($_POST['faq_accordion'])) {update_option('EWD_UFAQ_FAQ_Accordion', $FAQ_Accordion);}
    if (isset($_POST['faq_auto_complete_titles'])) {update_option('EWD_UFAQ_Auto_Complete_Titles', $_POST['faq_auto_complete_titles']);}
    if (isset($_POST['hide_categories'])) {update_option('EWD_UFAQ_Hide_Categories', $Hide_Categories);}
    if (isset($_POST['hide_tags'])) {update_option('EWD_UFAQ_Hide_Tags', $Hide_Tags);}
	if (isset($_POST['reveal_effect'])) {update_option('EWD_UFAQ_Reveal_Effect', $Reveal_Effect);}
	if (isset($_POST['group_by_category'])) {update_option('EWD_UFAQ_Group_By_Category', $Group_By_Category);}
	if (isset($_POST['group_by_order_by'])) {update_option('EWD_UFAQ_Group_By_Order_By', $Group_By_Order_By);}
	if (isset($_POST['group_by_order'])) {update_option('EWD_UFAQ_Group_By_Order', $Group_By_Order);}
	if (isset($_POST['order_by_setting'])) {update_option('EWD_UFAQ_Order_By', $Order_By_Setting);}
	if (isset($_POST['order_setting'])) {update_option('EWD_UFAQ_Order', $Order_Setting);}
	if (isset($_POST['include_permalink'])) {update_option('EWD_UFAQ_Include_Permalink', $Include_Permalink);}
	if (isset($_POST['pretty_permalinks'])) {update_option('EWD_UFAQ_Pretty_Permalinks', $Pretty_Permalinks);}
	if (isset($_POST['display_all_answers'])) {update_option('EWD_UFAQ_Display_All_Answers', $Display_All_Answers);}
	if (isset($_POST['scroll_to_top'])) {update_option('EWD_UFAQ_Scroll_To_Top', $Scroll_To_Top);}
    if (isset($_POST['Socialmedia'])) {update_option('EWD_UFAQ_Social_Media',  $Social_Media);}
    if (isset($_POST['allow_proposed_answer'])) {update_option('EWD_UFAQ_Allow_Proposed_Answer',  $Allow_Proposed_Answer);}
    if (isset($_POST['display_author'])) {update_option('EWD_UFAQ_Display_Author',  $Display_Author);}
    if (isset($_POST['display_date'])) {update_option('EWD_UFAQ_Display_Date',  $Display_Date);}
    if (isset($_POST['display_back_to_top'])) {update_option('EWD_UFAQ_Display_Back_To_Top',  $Display_Back_To_Top);}

    if (isset($_POST['display_style']) and $UFAQ_Full_Version == "Yes") {update_option('EWD_UFAQ_Display_Style',  $_POST['display_style']);}
    if (isset($_POST['color_block_shape']) and $UFAQ_Full_Version == "Yes") {update_option('EWD_UFAQ_Color_Block_Shape',  $_POST['color_block_shape']);}

    if (isset($_POST['posted_label'])) {update_option('EWD_UFAQ_Posted_Label',  $Posted_Label);}
    if (isset($_POST['by_label'])) {update_option('EWD_UFAQ_By_Label',  $By_Label);}
    if (isset($_POST['on_label'])) {update_option('EWD_UFAQ_On_Label',  $On_Label);}
    if (isset($_POST['category_label'])) {update_option('EWD_UFAQ_Category_Label',  $Category_Label);}
    if (isset($_POST['tag_label'])) {update_option('EWD_UFAQ_Tag_Label',  $Tag_Label);}

    if (isset($_POST['ufaq_styling_default_bg_color'])) {update_option('EWD_UFAQ_Styling_Default_Bg_Color',  $_POST['ufaq_styling_default_bg_color']);}
    if (isset($_POST['ufaq_styling_default_font_color'])) {update_option('EWD_UFAQ_Styling_Default_Font_Color',  $_POST['ufaq_styling_default_font_color']);}
    if (isset($_POST['ufaq_styling_default_border'])) {update_option('EWD_UFAQ_Styling_Default_Border',  $_POST['ufaq_styling_default_border']);}
    if (isset($_POST['ufaq_styling_default_border_radius'])) {update_option('EWD_UFAQ_Styling_Default_Border_Radius',  $_POST['ufaq_styling_default_border_radius']);}
    if (isset($_POST['ufaq_styling_block_bg_color'])) {update_option('EWD_UFAQ_Styling_Block_Bg_Color',  $_POST['ufaq_styling_block_bg_color']);}
    if (isset($_POST['ufaq_styling_block_font_color'])) {update_option('EWD_UFAQ_Styling_Block_Font_Color',  $_POST['ufaq_styling_block_font_color']);}
    if (isset($_POST['ufaq_styling_list_font'])) {update_option('EWD_UFAQ_Styling_List_Font',  $_POST['ufaq_styling_list_font']);}
    if (isset($_POST['ufaq_styling_list_font_size'])) {update_option('EWD_UFAQ_Styling_List_Font_Size',  $_POST['ufaq_styling_list_font_size']);}
    if (isset($_POST['ufaq_styling_list_font_color'])) {update_option('EWD_UFAQ_Styling_List_Font_Color',  $_POST['ufaq_styling_list_font_color']);}
    if (isset($_POST['ufaq_styling_list_margin'])) {update_option('EWD_UFAQ_Styling_List_Margin',  $_POST['ufaq_styling_list_margin']);}
    if (isset($_POST['ufaq_styling_list_padding'])) {update_option('EWD_UFAQ_Styling_List_Padding',  $_POST['ufaq_styling_list_padding']);}
   
    if (isset($_POST['ufaq_styling_question_font'])) {update_option('EWD_UFAQ_Styling_Question_Font',  $_POST['ufaq_styling_question_font']);}
    if (isset($_POST['ufaq_styling_question_font_size'])) {update_option('EWD_UFAQ_Styling_Question_Font_Size',  $_POST['ufaq_styling_question_font_size']);}
    if (isset($_POST['ufaq_styling_question_font_color'])) {update_option('EWD_UFAQ_Styling_Question_Font_Color',  $_POST['ufaq_styling_question_font_color']);}
    if (isset($_POST['ufaq_styling_question_margin'])) {update_option('EWD_UFAQ_Styling_Question_Margin',  $_POST['ufaq_styling_question_margin']);}
    if (isset($_POST['ufaq_styling_question_padding'])) {update_option('EWD_UFAQ_Styling_Question_Padding',  $_POST['ufaq_styling_question_padding']);}
    if (isset($_POST['ufaq_styling_answer_font'])) {update_option('EWD_UFAQ_Styling_Answer_Font',  $_POST['ufaq_styling_answer_font']);}
    if (isset($_POST['ufaq_styling_answer_font_size'])) {update_option('EWD_UFAQ_Styling_Answer_Font_Size',  $_POST['ufaq_styling_answer_font_size']);}
    if (isset($_POST['ufaq_styling_answer_font_color'])) {update_option('EWD_UFAQ_Styling_Answer_Font_Color',  $_POST['ufaq_styling_answer_font_color']);}
    if (isset($_POST['ufaq_styling_answer_margin'])) {update_option('EWD_UFAQ_Styling_Answer_Margin',  $_POST['ufaq_styling_answer_margin']);}
    if (isset($_POST['ufaq_styling_answer_padding'])) {update_option('EWD_UFAQ_Styling_Answer_Padding',  $_POST['ufaq_styling_answer_padding']);}
    if (isset($_POST['ufaq_styling_postdate_font'])) {update_option('EWD_UFAQ_Styling_Postdate_Font',  $_POST['ufaq_styling_postdate_font']);}
    if (isset($_POST['ufaq_styling_postdate_font_size'])) {update_option('EWD_UFAQ_Styling_Postdate_Font_Size',  $_POST['ufaq_styling_postdate_font_size']);}
    if (isset($_POST['ufaq_styling_postdate_font_color'])) {update_option('EWD_UFAQ_Styling_Postdate_Font_Color',  $_POST['ufaq_styling_postdate_font_color']);}
    if (isset($_POST['ufaq_styling_postdate_margin'])) {update_option('EWD_UFAQ_Styling_Postdate_Margin',  $_POST['ufaq_styling_postdate_margin']);}
    if (isset($_POST['ufaq_styling_postdate_padding'])) {update_option('EWD_UFAQ_Styling_Postdate_Padding',  $_POST['ufaq_styling_postdate_padding']);}
    if (isset($_POST['ufaq_styling_category_font'])) {update_option('EWD_UFAQ_Styling_Category_Font',  $_POST['ufaq_styling_category_font']);}
    if (isset($_POST['ufaq_styling_category_font_size'])) {update_option('EWD_UFAQ_Styling_Category_Font_Size',  $_POST['ufaq_styling_category_font_size']);}
    if (isset($_POST['ufaq_styling_category_font_color'])) {update_option('EWD_UFAQ_Styling_Category_Font_Color',  $_POST['ufaq_styling_category_font_color']);}
    if (isset($_POST['ufaq_styling_category_margin'])) {update_option('EWD_UFAQ_Styling_Category_Margin',  $_POST['ufaq_styling_category_margin']);}
    if (isset($_POST['ufaq_styling_category_padding'])) {update_option('EWD_UFAQ_Styling_Category_Padding',  $_POST['ufaq_styling_category_padding']);}

	if (isset($_POST['custom_css'])) {update_option('EWD_UFAQ_Custom_CSS', $Custom_CSS);}

    if ($_POST['Pretty_Permalinks'] == "Yes") {
		 update_option("EWD_UFAQ_Rewrite_Rules", "Yes");
	}
}

?>