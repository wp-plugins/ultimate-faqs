<?php
/* This file is the action handler. The appropriate function is then called based 
*  on the action that's been selected by the user. The functions themselves are all
* stored either in Prepare_Data_For_Insertion.php or Update_Admin_Databases.php */

function Update_EWD_UFAQ_Content() {
global $ewd_ufaq_message;
if (isset($_GET['Action'])) {
				switch ($_GET['Action']) {
						case "EWD_UFAQ_UpdateOptions":
        				$ewd_ufaq_message = EWD_UFAQ_UpdateOptions();
								break;
						default:
								$ewd_ufaq_message = __("The form has not worked correctly. Please contact the plugin developer.", 'EWD_UFAQP');
								break;
				}
		}
}

?>