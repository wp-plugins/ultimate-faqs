<?php 
function EWD_UFAQ_Add_Modified_Styles() {
	$StylesString = "<style>";
	$StylesString .="div.ufaq-faq-title h4 { ";
		if (get_option("EWD_UFAQ_Styling_Question_Font") != "") {$StylesString .= "font:" .  get_option("EWD_UFAQ_Styling_Question_Font") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Question_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_UFAQ_Styling_Question_Font_Size") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Question_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_UFAQ_Styling_Question_Font_Color") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Question_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UFAQ_Styling_Question_Margin") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Question_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UFAQ_Styling_Question_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .="div.ufaq-faq-post p { ";
		if (get_option("EWD_UFAQ_Styling_Answer_Font") != "") {$StylesString .= "font:" .  get_option("EWD_UFAQ_Styling_Answer_Font") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Answer_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_UFAQ_Styling_Answer_Font_Size") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Answer_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_UFAQ_Styling_Answer_Font_Color") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Answer_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UFAQ_Styling_Answer_Margin") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Answer_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UFAQ_Styling_Answer_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .="div.ewd-ufaq-author-date { ";
		if (get_option("EWD_UFAQ_Styling_Postdate_Font") != "") {$StylesString .= "font:" .  get_option("EWD_UFAQ_Styling_Postdate_Font") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Postdate_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_UFAQ_Styling_Postdate_Font_Size") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Postdate_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_UFAQ_Styling_Postdate_Font_Color") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Postdate_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UFAQ_Styling_Postdate_Margin") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Postdate_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UFAQ_Styling_Postdate_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .="div.ufaq-faq-categories, div.ufaq-faq-tags { ";
		if (get_option("EWD_UFAQ_Styling_Category_Font") != "") {$StylesString .= "font:" .  get_option("EWD_UFAQ_Styling_Category_Font") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Category_Font_Size") != "") {$StylesString .="font-size:" . get_option("EWD_UFAQ_Styling_Category_Font_Size") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Category_Font_Color") != "") {$StylesString .= "color:" . get_option("EWD_UFAQ_Styling_Category_Font_Color") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Category_Margin") != "") {$StylesString .= "margin:" . get_option("EWD_UFAQ_Styling_Category_Margin") . " !important;";} 
		if (get_option("EWD_UFAQ_Styling_Category_Padding") != "") {$StylesString .= "padding:" . get_option("EWD_UFAQ_Styling_Category_Padding") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .= "</style>";

	return $StylesString;
}