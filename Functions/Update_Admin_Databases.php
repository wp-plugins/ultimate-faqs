<?php
/* The file contains all of the functions which make changes to the WordPress tables */


function EWD_UFAQ_UpdateOptions() {
		$Custom_CSS = $_POST['custom_css'];
		$FAQ_Accordion = $_POST['faq_accordion'];
		$Reveal_Effect = $_POST['reveal_effect'];
		
		$Custom_CSS = stripslashes_deep($Custom_CSS);
		$FAQ_Accordion = stripslashes_deep($FAQ_Accordion);
		$Reveal_Effect = stripslashes_deep($Reveal_Effect);
		
		update_option('EWD_UFAQ_Custom_CSS', $Custom_CSS);
		update_option('EWD_UFAQ_FAQ_Accordion', $FAQ_Accordion);
		update_option('EWD_UFAQ_Reveal_Effect', $Reveal_Effect);
}

?>