<?php 
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
    $Allow_Proposed_Answer = get_option("EWD_UFAQ_Allow_Proposed_Answer");
    $Display_Author = get_option("EWD_UFAQ_Display_Author");
    $Display_Date = get_option("EWD_UFAQ_Display_Date");

	$Posted_Label = get_option("EWD_UFAQ_Posted_Label");
	$By_Label = get_option("EWD_UFAQ_By_Label");
	$On_Label = get_option("EWD_UFAQ_On_Label");
	$Category_Label = get_option("EWD_UFAQ_Category_Label");
	$Tag_Label = get_option("EWD_UFAQ_Tag_Label");

	$UFAQ_Styling_Question_Font = get_option("EWD_UFAQ_Styling_Question_Font");
	$UFAQ_Styling_Question_Font_Size = get_option("EWD_UFAQ_Styling_Question_Font_Size");
	$UFAQ_Styling_Question_Font_Color = get_option("EWD_UFAQ_Styling_Question_Font_Color");
	$UFAQ_Styling_Question_Margin = get_option("EWD_UFAQ_Styling_Question_Margin");
	$UFAQ_Styling_Question_Padding = get_option("EWD_UFAQ_Styling_Question_Padding");
	$UFAQ_Styling_Answer_Font = get_option("EWD_UFAQ_Styling_Answer_Font");
	$UFAQ_Styling_Answer_Font_Size = get_option("EWD_UFAQ_Styling_Answer_Font_Size");
	$UFAQ_Styling_Answer_Font_Color = get_option("EWD_UFAQ_Styling_Answer_Font_Color");
	$UFAQ_Styling_Answer_Margin = get_option("EWD_UFAQ_Styling_Answer_Margin");
	$UFAQ_Styling_Answer_Padding = get_option("EWD_UFAQ_Styling_Answer_Padding");
	$UFAQ_Styling_Postdate_Font = get_option("EWD_UFAQ_Styling_Postdate_Font");
	$UFAQ_Styling_Postdate_Font_Size = get_option("EWD_UFAQ_Styling_Postdate_Font_Size");
	$UFAQ_Styling_Postdate_Font_Color = get_option("EWD_UFAQ_Styling_Postdate_Font_Color");
	$UFAQ_Styling_Postdate_Margin = get_option("EWD_UFAQ_Styling_Postdate_Margin");
	$UFAQ_Styling_Postdate_Padding = get_option("EWD_UFAQ_Styling_Postdate_Padding");
	$UFAQ_Styling_Category_Font = get_option("EWD_UFAQ_Styling_Category_Font");
	$UFAQ_Styling_Category_Font_Size = get_option("EWD_UFAQ_Styling_Category_Font_Size");
	$UFAQ_Styling_Category_Font_Color = get_option("EWD_UFAQ_Styling_Category_Font_Color");
	$UFAQ_Styling_Category_Margin = get_option("EWD_UFAQ_Styling_Category_Margin");
	$UFAQ_Styling_Category_Padding = get_option("EWD_UFAQ_Styling_Category_Padding");
		
?>
<div class="wrap ufaq-options-page-tabbed">
	<div class="ufaq-options-submenu-div">
		<ul class="ufaq-options-submenu ufaq-options-page-tabbed-nav">
			<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
			<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');">Premium</a></li>
			<li><a id="Order_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Order') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Order');">Ordering</a></li>
			<li><a id="Labelling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Labelling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Labelling');">Labelling</a></li>
			<li><a id="Styling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Styling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Styling');">Styling</a></li>
		</ul>
	</div>


<div class="ufaq-options-page-tabbed-content">

<form method="post" action="edit.php?post_type=ufaq&page=options&Action=EWD_UFAQ_UpdateOptions">
<div id='Basic' class='ufaq-option-set'>
<h2 id='label-basic-options' class='ufaq-options-page-tab-title'>Basic Options</h2>
<table class="form-table">
<tr>
<th scope="row">Custom CSS</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Custom CSS</span></legend>
	<label title='Custom CSS'></label><textarea class='ewd-ufaq-textarea' name='custom_css'> <?php echo $Custom_CSS; ?></textarea><br />
	<p>You can add custom CSS styles for your FAQs in the box above.</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">FAQ Accordion</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>FAQ Accordion</span></legend>
	<label title='Yes'><input type='radio' name='faq_accordion' value='Yes' <?php if($FAQ_Accordion == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='faq_accordion' value='No' <?php if($FAQ_Accordion == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should the FAQs accordion? (Close old open FAQ when a new one is clicked)</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Hide Categories</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Hide Categories</span></legend>
	<label title='Yes'><input type='radio' name='hide_categories' value='Yes' <?php if($Hide_Categories == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='hide_categories' value='No' <?php if($Hide_Categories == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should the categories for each FAQ be hidden?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Hide Tags</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Hide Tags</span></legend>
	<label title='Yes'><input type='radio' name='hide_tags' value='Yes' <?php if($Hide_Tags == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='hide_tags' value='No' <?php if($Hide_Tags == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should the tags for each FAQ be hidden?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Scroll To Top</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Scroll To Top</span></legend>
	<label title='Yes'><input type='radio' name='scroll_to_top' value='Yes' <?php if($Scroll_To_Top == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='scroll_to_top' value='No' <?php if($Scroll_To_Top == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />	
	<p>Should the browser scroll to the top of the FAQ when it's opened?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Display All Answers</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Display All Answers</span></legend>
	<label title='Yes'><input type='radio' name='display_all_answers' value='Yes' <?php if($Display_All_Answers == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='display_all_answers' value='No' <?php if($Display_All_Answers == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />	
	<p>Should the answer to each question be displayed when the page loads?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Display Post Author</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Display Post Author</span></legend>
	<label title='Yes'><input type='radio' name='display_author' value='Yes' <?php if($Display_Author == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='display_author' value='No' <?php if($Display_Author == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />	
	<p>Should the display name of the post's author be show beneath the FAQ title?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Display Post Date</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Display Post Date</span></legend>
	<label title='Yes'><input type='radio' name='display_date' value='Yes' <?php if($Display_Date == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='display_date' value='No' <?php if($Display_Date == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />	
	<p>Should the date the post was created be show beneath the FAQ title?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Include Permalink Icon</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Include Permalink Icon</span></legend>
	<label title='Yes'><input type='radio' name='include_permalink' value='Yes' <?php if($Include_Permalink == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='include_permalink' value='No' <?php if($Include_Permalink == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />	
	<p>Should an icon to link directly to each question be displayed?</p>
	</fieldset>
</td>
</tr>
</table>
</div>

<div id='Premium' class='ufaq-option-set ufaq-hidden'>
<h2 id='label-premium-options' class='ufaq-options-page-tab-title'>Premium Options</h2>
<table class="form-table">
<tr>
<th scope="row">Reveal Effect</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Reveal Effect</span></legend>
	<label title='Reveal Effect'></label> 

	<select name="reveal_effect" <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> >
  		<option value="none" <?php if($Reveal_Effect == "none") {echo "selected=selected";} ?> >None</option>
			<option value="blind" <?php if($Reveal_Effect == "blind") {echo "selected=selected";} ?> >Blind</option>
  		<option value="bounce" <?php if($Reveal_Effect == "bounce") {echo "selected=selected";} ?> >Bounce</option>
  		<option value="clip" <?php if($Reveal_Effect == "clip") {echo "selected=selected";} ?> >Clip</option>
  		<option value="drop" <?php if($Reveal_Effect == "drop") {echo "selected=selected";} ?> >Drop</option>
  		<option value="explode" <?php if($Reveal_Effect == "explode") {echo "selected=selected";} ?> >Explode</option>
  		<option value="fade" <?php if($Reveal_Effect == "fade") {echo "selected=selected";} ?> >Fade</option>
  		<option value="fold" <?php if($Reveal_Effect == "fold") {echo "selected=selected";} ?> >Fold</option>
  		<option value="highlight" <?php if($Reveal_Effect == "highlight") {echo "selected=selected";} ?> >Highlight</option>
  		<option value="puff" <?php if($Reveal_Effect == "puff") {echo "selected=selected";} ?> >Puff</option>
  		<option value="pulsate" <?php if($Reveal_Effect == "pulsate") {echo "selected=selected";} ?> >Pulsate</option>
  		<option value="shake" <?php if($Reveal_Effect == "shake") {echo "selected=selected";} ?> >Shake</option>
  		<option value="size" <?php if($Reveal_Effect == "size") {echo "selected=selected";} ?> >Size</option>
  		<option value="slide" <?php if($Reveal_Effect == "slide") {echo "selected=selected";} ?> >Slide</option>
	</select>
	
	<p>How should FAQ's be displayed when their titles are clicked?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Pretty Permalinks</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Pretty Permalinks</span></legend>
	<label title='Yes'><input type='radio' name='pretty_permalinks' value='Yes' <?php if($Pretty_Permalinks == "Yes") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='pretty_permalinks' value='No' <?php if($Pretty_Permalinks == "No") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />	
	<p>Should an SEO friendly permalink structure be used for the link to this FAQ?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Allow Proposed Answer</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Allow Proposed Answer</span></legend>
	<label title='Yes'><input type='radio' name='allow_proposed_answer' value='Yes' <?php if($Allow_Proposed_Answer == "Yes") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='allow_proposed_answer' value='No' <?php if($Allow_Proposed_Answer == "No") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />	
	<p>When using the user-submitted question shortcode, should users be able to propose an answer to the question they're submitting?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Social Media Option</th>
<td>
    <fieldset><legend class="screen-reader-text"><span>Social Media Option</span></legend>
        <label title='Facebook'><input type='checkbox' name='Socialmedia[]' value='Facebook' <?php if(in_array("Facebook", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Facebook</span></label><br />
        <label title='Name'><input type='checkbox' name='Socialmedia[]' value='Google'  <?php if(in_array("Google", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Google</span></label><br />
        <label title='Twitter'><input type='checkbox' name='Socialmedia[]' value='Twitter' <?php if(in_array("Twitter", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Twitter</span></label><br />
        <label title='Linkedin'><input type='checkbox' name='Socialmedia[]' value='Linkedin' <?php if(in_array("Linkedin", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Linkedin</span></label><br />
        <label title='Pinterest'><input type='checkbox' name='Socialmedia[]' value='Pinterest' <?php if(in_array("Pinterest", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Pinterest</span></label><br />
        <label title='Email'><input type='checkbox' name='Socialmedia[]' value='Email' <?php if(in_array("Email", $Socialmedia)) {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Email</span></label><br />
        <div style='display:none;'><label title='Blank'><input type='checkbox' name='Socialmedia[]' value='Blank' checked='checked'/> <span>Blank</span></label></div>
    </fieldset>
</td>
</tr>
</table>
</div>

<div id='Order' class='ufaq-option-set ufaq-hidden'>
<h2 id='label-order-options' class='ufaq-options-page-tab-title'>Ordering Options</h2>
<table class="form-table">
<tr>
<th scope="row">Group FAQs by Category</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Group FAQs by Category</span></legend>
	<label title='Yes'><input type='radio' name='group_by_category' value='Yes' <?php if($Group_By_Category == "Yes") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='group_by_category' value='No' <?php if($Group_By_Category == "No") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>No</span></label><br />
	<p>Should FAQs be grouped by category, or should all categories be mixed together?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Sort Categories</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Sort Categories</span></legend>
	<label title='Group By Order By'></label> 

	<select name="group_by_order_by" <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> >
  		<option value="name" <?php if($Group_By_Order_By == "name") {echo "selected=selected";} ?> >Name</option>
			<option value="count" <?php if($Group_By_Order_By == "count") {echo "selected=selected";} ?> >FAQ Count</option>
  		<option value="slug" <?php if($Group_By_Order_By == "slug") {echo "selected=selected";} ?> >Slug</option>
	</select>
	
	<p>How should FAQ categories be ordered? (Only used if "Group FAQs by Category" above is set to "Yes")</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">Sort Categories Ordering</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Sort Categories Ordering</span></legend>
	<label title='Ascending'><input type='radio' name='group_by_order' value='ASC' <?php if($Group_By_Order == "ASC") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Ascending</span></label><br />
	<label title='Descending'><input type='radio' name='group_by_order' value='DESC' <?php if($Group_By_Category == "DESC") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Descending</span></label><br />	
	<p>How should FAQ categories be ordered? (Only used if "Group FAQs by Category" above is set to "Yes")</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">FAQ Ordering</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>FAQ Ordering</span></legend>
	<label title='FAQ Ordering'></label> 

	<select name="order_by_setting" <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> >
  		<option value="date" <?php if($Order_By_Setting == "date") {echo "selected=selected";} ?> >Created Date</option>
		<option value="title" <?php if($Order_By_Setting == "title") {echo "selected=selected";} ?> >Title</option>
  		<option value="modified" <?php if($Order_By_Setting == "modified") {echo "selected=selected";} ?> >Modified Date</option>
  		<option value="set_order" <?php if($Order_By_Setting == "set_order") {echo "selected=selected";} ?> >Selected Order (using Order table)</option>
	</select>
	
	<p>How should individual FAQs be ordered?</p>
	</fieldset>
</td>
</tr>
<tr>
<th scope="row">FAQ Order Setting</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Sort Categories Ordering</span></legend>
	<label title='Yes'><input type='radio' name='order_setting' value='ASC' <?php if($Order_Setting == "ASC") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Ascending</span></label><br />
	<label title='No'><input type='radio' name='order_setting' value='DESC' <?php if($Order_Setting == "DESC") {echo "checked='checked'";} ?> <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /> <span>Descending</span></label><br />	
	<p>Should FAQ be ascending or descending order, based on the ordering criteria above?</p>
	</fieldset>
</td>
</tr>
</table>

<div class='ufaq-order-table'>
<h3><?php echo __("Order Table", 'EWD_UFAQ'); ?></h3>
<p><?php _e("Drag and drop the posts below to reorder them, if you have 'Selected Order' set for the 'FAQ Ordering' option", 'EWD_UFAQ'); ?></p>
<?php 
	if ($UFAQ_Full_Version != "Yes") {echo "<p>Upgrade to premium to access this feature.</p>";} 
	else {
?>
<!--<div id="col-right">
	<div class="col-wrap">
	<div id="add-page" class="postbox metabox-holder" >
	<div class="inside">
	<div id="posttype-page" class="posttypediv">-->
	<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">

	<table class="wp-list-table widefat tags sorttable ewd-ufaq-list">
	    <thead>
	    	<tr>
	            <th><?php _e("Question", 'UPCP') ?></th>
	            <th><?php _e("Views", 'UPCP') ?></th>
	            <th><?php _e("Categories", 'UPCP') ?></th>
	            <th><?php _e("Tags", 'UPCP') ?></th>
	    	</tr>
	    </thead>
	    <tbody>
	    <?php 
	    $params = array(
	    	'post_type' => 'ufaq',
	    	'posts_per_page' => -1,
	    	'meta_key' => 'ufaq_order',
	    	'orderby' => 'meta_value_num',
	    	'order' => 'ASC'
	    );
	    $FAQs = get_posts($params);
		if (empty($FAQs)) { echo "<div class='ewd-ufaq-row list-item'><p>No FAQs have been created<p/></div>"; }
		else {
	    	foreach ($FAQs as $FAQ) {
	    		$FAQ_Views = get_post_meta($FAQ->ID, 'ufaq_view_count', true);
	    		$FAQ_Categories = get_the_term_list($FAQ->ID, 'ufaq-category', '', ', ', '');
	    		$FAQ_Tags = get_the_term_list($FAQ->ID, 'ufaq-tag', '', ', ', '');
	    		echo "<tr id='ewd-ufaq-item-" . $FAQ->ID . "' class='ewd-ufaq-item'>";
	    	    echo "<td class='ufaq-title'>" . $FAQ->post_title . "</td>";
	    	    echo "<td class='ufaq-title'>" . $FAQ_Views . "</td>";
	    	    echo "<td class='ufaq-title'>" . $FAQ_Categories . "</td>";
	    	    echo "<td class='ufaq-title'>" . $FAQ_Tags . "</td>";
	    		echo "</tr>";
	    	}
		}?>
	    </tbody>
	    <tfoot>
	        <tr>
	            <th><?php _e("Question", 'UPCP') ?></th>
	            <th><?php _e("Views", 'UPCP') ?></th>
	            <th><?php _e("Categories", 'UPCP') ?></th>
	            <th><?php _e("Tags", 'UPCP') ?></th>
	        </tr>
	    </tfoot>
	</table>
</div>
<?php } ?>

</div>
</div>

<div id='Labelling' class='ufaq-option-set ufaq-hidden'>
<h2 id='label-order-options' class='ufaq-options-page-tab-title'>Labelling Options</h2>
		<div class="ufaq-label-description"> Replace the default text on the FAQ page </div>

	<div id='labelling-view-options' class="ufaq-options-div ufaq-options-flex">
	 	<div class='ufaq-option ufaq-label-option'>
			<?php _e("Posted", 'UFAQ')?>
				<fieldset>
				<input type='text' name='posted_label' value='<?php echo $Posted_Label; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
				<!-- <input type='text' name='posted_label' value='<?php echo $Posted_Label; ?>' <?php if ($EWD_UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/> -->
				</fieldset>
			</div>
	 		<div class='ufaq-option ufaq-label-option'>
			<?php _e("By", 'UFAQ')?>
				<fieldset>
				<input type='text' name='by_label' value='<?php echo $By_Label; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
				<!-- <input type='text' name='by_label' value='<?php echo $By_Label; ?>' <?php if ($EWD_UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/> -->
				</fieldset>
			</div>
	 	<div class='ufaq-option ufaq-label-option'>
			<?php _e("On", 'UFAQ')?>
				<fieldset>
				<input type='text' name='on_label' value='<?php echo $On_Label; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
				<!-- <input type='text' name='on_label' value='<?php echo $On_Label; ?>' <?php if ($EWD_UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/> -->
				</fieldset>
			</div>
		<div class='ufaq-option ufaq-label-option'>
			<?php _e("Categories", 'UFAQ')?>
				<fieldset>
				<input type='text' name='category_label' value='<?php echo $Category_Label; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> />
<!-- 				<input type='text' name='category_label' value='<?php echo $Category_Label; ?>' <?php if ($EWD_UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
 -->				</fieldset>
			</div>
		<div class='ufaq-option ufaq-label-option'>
			<?php _e("Tags", 'UFAQ')?>
				<fieldset>
				<input type='text' name='tag_label' value='<?php echo $Tag_Label; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
<!-- 				<input type='text' name='tag_label' value='<?php echo $Tag_Label; ?>' <?php if ($EWD_UFAQ_Full_Version != "Yes") {echo "disabled";} ?>/>
 -->				</fieldset>
			</div>
	</div>
	</div>
<div id='Styling' class='ufaq-option-set ufaq-hidden'>
<h2 id='label-order-options' class='ufaq-options-page-tab-title'>Styling Options</h2>
	
<div id='ufaq-styling-options' class="ufaq-options-div ufaq-options-flex">
<!-- 	<div class='ufaq-subsection ufaq-subsection-half'>
	<div class='ufaq-subsection-header'>FAQ Question</div>
		<div class='ufaq-subsection-content'>
			<fieldset>
			<p>How would you like the FAQ's to be displayed?</p>
			<label title='Yes'><input type='radio' name='ufaq_display_style' value='Default' <?php if($Pretty_Permalinks == "Yes") {echo "checked='checked'";} ?> /> <span>Yes</span></label>
			<label title='No'><input type='radio' name='ufaq_display_style' value='Accordian' <?php if($Pretty_Permalinks == "No") {echo "checked='checked'";} ?> /> <span>No</span></label>	
			<label title='No'><input type='radio' name='ufaq_display_style' value='Block' <?php if($Pretty_Permalinks == "No") {echo "checked='checked'";} ?> /> <span>No</span></label>
			</fieldset>
		</div> 
	</div> 
	<div class='ufaq-subsection ufaq-subsection-half'>
		<div class='ufaq-subsection-header'>Accordian Icon</div>
			<div class='ufaq-subsection-content'>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Background Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_title_font_color' value='<?php echo $ufaq_Styling_Title_Font_Color; ?>' /></div>
			</div>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_title_font_color' value='<?php echo $ufaq_Styling_Title_Font_Color; ?>' /></div>
			</div>
		</div>
	</div>  -->
	<div class='ufaq-subsection'>
		<div class='ufaq-subsection-header'>FAQ Question</div>
			<div class='ufaq-subsection-content'>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Family</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_question_font' value='<?php echo $UFAQ_Styling_Question_Font; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Size</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_question_font_size' value='<?php echo $UFAQ_Styling_Question_Font_Size; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_question_font_color' value='<?php echo $UFAQ_Styling_Question_Font_Color; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Margin</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_question_margin' value='<?php echo $UFAQ_Styling_Question_Margin; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>			
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Padding</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_question_padding' value='<?php echo $UFAQ_Styling_Question_Padding; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
		</div>
	</div>
	<div class='ufaq-subsection'>
		<div class='ufaq-subsection-header'>FAQ Answer</div>
			<div class='ufaq-subsection-content'>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Family</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_answer_font' value='<?php echo $UFAQ_Styling_Answer_Font; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Size</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_answer_font_size' value='<?php echo $UFAQ_Styling_Answer_Font_Size; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_answer_font_color' value='<?php echo $UFAQ_Styling_Answer_Font_Color; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Margin</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_answer_margin' value='<?php echo $UFAQ_Styling_Answer_Margin; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>			
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Padding</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_answer_padding' value='<?php echo $UFAQ_Styling_Answer_Padding; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
		</div>
	</div>
	<div class='ufaq-subsection'>
		<div class='ufaq-subsection-header'>FAQ Post Date</div>
			<div class='ufaq-subsection-content'>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Family</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_postdate_font' value='<?php echo $UFAQ_Styling_Postdate_Font; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Size</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_postdate_font_size' value='<?php echo $UFAQ_Styling_Postdate_Font_Size; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_postdate_font_color' value='<?php echo $UFAQ_Styling_Postdate_Font_Color; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Margin</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_postdate_margin' value='<?php echo $UFAQ_Styling_Postdate_Margin; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>			
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Padding</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_postdate_padding' value='<?php echo $UFAQ_Styling_Postdate_Padding; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
		</div>
	</div>
	<div class='ufaq-subsection'>
		<div class='ufaq-subsection-header'>FAQ Category, Tags</div>
			<div class='ufaq-subsection-content'>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Family</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_category_font' value='<?php echo $UFAQ_Styling_Category_Font; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Size</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_category_font_size' value='<?php echo $UFAQ_Styling_Category_Font_Size; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div> 
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Font Color</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_category_font_color' value='<?php echo $UFAQ_Styling_Category_Font_Color; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Margin</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_category_margin' value='<?php echo $UFAQ_Styling_Category_Margin; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>			
			<div class='ufaq-option ufaq-styling-option'>
				<div class='ufaq-option-label'>Padding</div>
				<div class='ufaq-option-input'><input type='text' name='ufaq_styling_category_padding' value='<?php echo $UFAQ_Styling_Category_Padding; ?>' <?php if ($UFAQ_Full_Version != "Yes") {echo "disabled";} ?> /></div>
			</div>
	</div>
	</div>

</div>
</div>

<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value="Save Changes"  /></p></form>

	<?php /* </div><!-- /.tabs-panel -->
	</div><!-- /.posttypediv -->
	</div>
	</div>
	</div>
	</div><!-- col-right --> */ ?>
</div>
</div>


