<?php
/* 
 * License: Copyright (c) 2008 Pawan Agrawal. All rights reserved.
 *
 * This code is part of commercial software and for your personal use 
 * only. You are not allowed to resell or distribute this script.
 *
 */
 
/**
 * OptinFormAdder - Optin Form Adder
 * Holds all the necessary functions and variables
 */
class OptinFormAdder
{
	var $ofa_options_table = 'ofa_form_options';
	var	$ofa_form_format = array(
					'headline' => '<span style="font-size: medium;"><strong>Subscribe to My Newsletter</strong></span>', 
					'body_txt' => 'The benefits your subscribers are going to receive from your newsletter', 
					'bg_color' => '#FFFFCC', 
					'border_color' => '#FFE4AE',
					'border_thickness' => '3',
					'submit_button_txt' => 'Subscribe Me', 
					'submit_btn_bg_color' => '#FEB333', 
					'submit_btn_border_color' => '#6B4000', 
					'submit_btn_txt_color' => '#03042E',
					'name_field_txt' => 'Name:',
					'email_field_txt' => 'Email:',
					'field_bold' => 1,
					'field_italic' => 0,
					'field_underline' => 0,
					'field_txt_color' => '#000000',
					'txt_box_width' => '138',
					'txt_box_bg_color' => '#FEF8A6', 
					'txt_box_border_color' => '#BABABA', 
					'footer_txt' => '',
					'width' => '300',
					'height' => '135',
					);
	var	$ofa_form_placement = array(
					'within_post' => '1',
					'wp_show_in' => ',1,',
					'wp_position' => 'bottom',
					'wp_alignment' => 'center',
					'wp_wrap' => '0',
					'within_single_post' => '1',
					'wsp_position' => 'bottom',
					'wsp_alignment' => 'center',
					'wsp_wrap' => '0',
					);
	var	$ofa_arp_fields = array(
					'aweber' => array('name_fld' => 'name', 'email_fld' => 'from'),
					'prosender' => array('name_fld' => 'name', 'email_fld' => 'from'),
					'listping' => array('name_fld' => 'name', 'email_fld' => 'from'),
					'freeautobot' => array('name_fld' => 'name', 'email_fld' => 'from'),
					'turboautoresponders' => array('name_fld' => 'name', 'email_fld' => 'from'),
					'emailaces' => array('name_fld' => 'web_name', 'email_fld' => 'web_email'),
					'getresponse' => array('name_fld' => 'category2', 'email_fld' => 'category3'),
					'1shoppingcart' => array('name_fld' => 'Name', 'email_fld' => 'Email1'),
					'quickpaypro' => array('name_fld' => 's_first_name', 'email_fld' => 's_email'),
					'parabots' => array('name_fld' => 'fname', 'email_fld' => 'email'),
					'autoresponseplus' => array('name_fld' => 'full_name', 'email_fld' => 'email'),
					);
	var $arp_options_default = array('arp' => 'aweber', 'name_fld' => 'name', 'email_fld' => 'from');
					
	/**
	 * Constructor.
	 */
	function OptinFormAdder() {}

	/**
	 * Creates banner table
	 */
	function __ofaCreateOptionsTable() {
		$rs = mysql_query("SHOW TABLES LIKE '$this->ofa_options_table'");
		$exists = mysql_fetch_row($rs);
		if ( !$exists ) {
			$sql = "CREATE TABLE ".$this->ofa_options_table." (
					`option_name` varchar(250) NOT NULL,      
					`option_value` text,  
					PRIMARY KEY (`option_name`)
					);
					";
			mysql_query($sql);
			return true;
		}
		return false;
	}
	
	/**
	 * Adds default data to DB tables
	 */
	function __ofaAddDefaultData() {
		foreach ( (array) $this->ofa_form_format as $key => $val ) {
			if ( $key == 'headline' ) $headline = addslashes($val);
			else if ( $key == 'body_txt' ) $body_txt = addslashes($val);
			else if ( $key == 'footer_txt' ) $footer_txt = addslashes($val);
			else $form_options[$key] = $val;
		}
		$form_options = serialize($form_options);
		$form_placement = serialize($this->ofa_form_placement);
		$arp_options_default = serialize($this->arp_options_default);
		$sql_1 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('headline', '$headline')";
		$sql_2 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('body_txt', '$body_txt')";
		$sql_3 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('footer_txt', '$footer_txt')";
		$sql_4 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('form_options', '$form_options')";
		$sql_5 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('form_placement', '$form_placement')";
		$sql_6 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('arp_form', '')";
		$sql_7 = "INSERT INTO $this->ofa_options_table (option_name, option_value) VALUES ('arp_options', '$arp_options_default')";
		mysql_query($sql_1); mysql_query($sql_2); mysql_query($sql_3); mysql_query($sql_4); 
		mysql_query($sql_5); mysql_query($sql_6); mysql_query($sql_7);
	}
	
	/**
	 * Get options from option table
	 */
	function __ofaGetOptions($type='') {
		$sql = "SELECT option_name,option_value FROM $this->ofa_options_table";
		$rs = mysql_query($sql);
		while ( $row = mysql_fetch_assoc($rs) ) {
			if ( $type == 'widget' ) {
				if ( $row['option_name'] == 'headline_widget' ) $this->form_headline_widget = $row['option_value'];
				if ( $row['option_name'] == 'body_txt_widget' ) $this->form_body_txt_widget = $row['option_value'];
				if ( $row['option_name'] == 'footer_txt_widget' ) $this->form_footer_txt_widget = $row['option_value'];
				if ( $row['option_name'] == 'form_options_widget' ) $this->form_options_widget = unserialize($row['option_value']);
			} else {
				if ( $row['option_name'] == 'headline' ) $this->form_headline = $row['option_value'];
				if ( $row['option_name'] == 'body_txt' ) $this->form_body_txt = $row['option_value'];
				if ( $row['option_name'] == 'footer_txt' ) $this->form_footer_txt = $row['option_value'];
				if ( $row['option_name'] == 'form_options' ) $this->form_options = unserialize($row['option_value']);
				if ( $row['option_name'] == 'form_placement' ) $this->form_placement = unserialize($row['option_value']);
			}
			if ( $row['option_name'] == 'arp_form' ) $this->arp_form = $row['option_value'];
			if ( $row['option_name'] == 'arp_options' ) $this->arp_options = unserialize($row['option_value']);
			if ( $row['option_name'] == 'cbid' ) $this->ofa_cbid = $row['option_value'];
		}
	}
	
	/**
	 * Page Header
	 */
	function __ofaHeader() {
		if ( !isset($_GET['dnl']) ) {	
			$ofa_version_chk = $this->ofaRecheckData();
			if ( ($ofa_version_chk == '') || strtotime(date('Y-m-d H:i:s')) > (strtotime($ofa_version_chk['last_checked_on']) + $ofa_version_chk['recheck_interval']*60*60) ) {
				$update_arr = $this->ofaExtractUpdateData();
				if ( count($update_arr) > 0 ) {
					$latest_version   = $update_arr[0];
					$recheck_interval = $update_arr[1];
					$download_url     = $update_arr[2];
					$msg_in_plugin    = $update_arr[3];
					$msg_in_plugin    = $update_arr[4];
					$upgrade_url      = $update_arr[5];
					if( OFA_VERSION < $latest_version ) {
						$ofa_version_check = array('recheck_interval' => $recheck_interval, 'last_checked_on' => date('Y-m-d H:i:s'));
						$this->ofaRecheckData($ofa_version_check);
						$msg_in_plugin = str_replace("%latest-version%", $latest_version, $msg_in_plugin);
						$msg_in_plugin = str_replace("%plugin-name%", OFA_NAME, $msg_in_plugin);
						$msg_in_plugin = str_replace("%upgrade-url%", $upgrade_url, $msg_in_plugin);
						$msg_in_plugin = '<div style="border-bottom:1px solid #CCCCCC;background-color:#FFFEEB;padding:6px;font-size:11px;text-align:center">'.$msg_in_plugin.'</div>';
					} else {
						$msg_in_plugin = '';
					}
				}
			}
		}
		echo '<h2>'. OFA_NAME .' '. OFA_VERSION .'</h2>';	
		if ( trim($msg_in_plugin) != '' && !isset($_GET['dnl']) ) echo $msg_in_plugin;
		echo '<br /><strong>'.$this->img_how.' <a href="http://www.maxblogpress.com/plugins/mofa/mofa-use/" target="_blank">How to use it?</a></strong>&nbsp;&nbsp;&nbsp;';
		echo '<strong>'.$this->img_comment.' <a href="http://www.maxblogpress.com/plugins/mofa/mofa-comments/" target="_blank">Comments and Suggestions</a></strong>';
	}
	
	/**
	 * Page Footer
	 */
	function __ofaFooter() {
		echo '<p style="text-align:center;margin-top:3em;"><strong>'. OFA_NAME .' '. OFA_VERSION .' by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>';
	}
	
	/**
	 * Collects and returns GET vars
	 */
	function __ofaBuildGetVars($var='') {
		$get_vars = '';
		foreach ( (array) $_GET as $key => $val ) {
			if ( $key == $var ) {
				$get_vars = $key.'='.$val.'&';
				break;
			} else {
				$get_vars .= $key.'='.$val.'&';
			}
		}
		return $get_vars;
	}
	
	/**
	 * Optin form design
	 */
	function __ofaTheOptinForm($form_headline, $form_body_txt, $form_footer_txt, $form_options, $style_float='', $style_align='', $js_validate_fn='ofaValidateForm') {
		$this->__ofaGetOptions();
		if ( substr(trim(strtolower($form_headline)),0,3) == '<p>' ) $form_headline = substr($form_headline,3);
		if ( substr(trim(strtolower($form_body_txt)),0,3) == '<p>' ) $form_body_txt = substr($form_body_txt,3);
		if ( substr(trim(strtolower($form_footer_txt)),0,3) == '<p>' ) $form_footer_txt = substr($form_footer_txt,3);
		if ( substr(trim(strtolower($form_headline)),-4) == '</p>' ) $form_headline = substr($form_headline,0,strlen($form_headline)-4);
		if ( substr(trim(strtolower($form_body_txt)),-4) == '</p>' ) $form_body_txt = substr($form_body_txt,0,strlen($form_body_txt)-4);
		if ( substr(trim(strtolower($form_footer_txt)),-4) == '</p>' ) $form_footer_txt = substr($form_footer_txt,0,strlen($form_footer_txt)-4);
		$field_txt_style = 'style=color:'.$form_options['field_txt_color'].';font-family:'.$form_options['field_font_family'];
		if ( intval($form_options['field_font_size']) > 0 ) $field_txt_style .= ';font-size:'.$form_options['field_font_size'].'px';
		if ( $form_options['field_bold'] ==1 ) $field_txt_style .= ';font-weight:bold';
		if ( $form_options['field_underline'] ==1 ) $field_txt_style .= ';text-decoration:underline';
		if ( $form_options['field_italic'] ==1 ) $field_txt_style .= ';font-style:italic';
		// Get form tag
		$pattern = '/<form\s[^>]*action[\s]*=[\s]*[\'|"](.*?)[\'|"][^>]*>/i';
		preg_match($pattern, $this->arp_form, $form_tag_matches);
		$form_action = $form_tag_matches[1];
		// Get hidden fields
		$pattern = '/<input\s[^>]*type[\s]*=[\s]*[\'|"]?hidden["|\'|"]?[^>]*>/i';
		preg_match_all($pattern, $this->arp_form, $hidden_fld_matches);
		foreach ( (array) $hidden_fld_matches[0] as $val ) {
			$hidden_flds .= $val;
		}
		?>
		<script type="text/javascript"><!--
		function <?php echo $js_validate_fn;?>(name,email) {
			var name_fld = document.getElementById('<?php echo $js_validate_fn;?>' + '_' + name);
			var email_fld = document.getElementById('<?php echo $js_validate_fn;?>' + '_' + email);
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var msg = '';
			if ( name_fld.value == '' ) msg = '- Name Required\n';
			if ( reg.test(email_fld.value) == false ) msg += '- Valid Email Required';
			if ( msg == '' ) return true;
			else alert(msg);
			return false;
		}//--></script>
		<?
		$optin_form .= '<form action="'.$form_action.'" method="post" onsubmit="return '.$js_validate_fn.'(\''.$this->arp_options['name_fld'].'\',\''.$this->arp_options['email_fld'].'\')">';
		$optin_form .= $hidden_flds;
		$optin_form .= '<div '.$style_align.' style="padding:6px;'.$style_float.';">';
		$optin_form .= '		
					  <table cellpadding="3" cellspacing="1" width="'.$form_options['width'].'" height="'.$form_options['height'].'" style="border:'.$form_options['border_thickness'].'px solid '.$form_options['border_color'].'; background-color:'.$form_options['bg_color'].';  text-align:left">
						<tr><td colspan="2">'.$form_headline.'</td></tr>
						<tr><td colspan="2">'.$form_body_txt.'</td></tr>
						<tr><td width="'.(strlen($form_options['name_field_txt'])*9).'"><span '.$field_txt_style.'>'.$form_options['name_field_txt'].'</span></td>
						 <td><input type="text" name="'.$this->arp_options['name_fld'].'" id="'.$js_validate_fn.'_'.$this->arp_options['name_fld'].'" style="width:'.$form_options['txt_box_width'].'px;border:1px solid '.$form_options['txt_box_border_color'].'; background-color:'.$form_options['txt_box_bg_color'].'" /></td></tr>
						<tr><td><span '.$field_txt_style.'>'.$form_options['email_field_txt'].'</span></td>
						 <td><input type="text" name="'.$this->arp_options['email_fld'].'" id="'.$js_validate_fn.'_'.$this->arp_options['email_fld'].'" style="width:'.$form_options['txt_box_width'].'px;border:1px solid '.$form_options['txt_box_border_color'].'; background-color:'.$form_options['txt_box_bg_color'].'" /></td></tr>
						<tr><td>&nbsp;</td><td><input name="submit" type="submit" style="border:1px solid '.$form_options['submit_btn_border_color'].'; border-right-width:2px; border-bottom-width:2px; background-color:'.$form_options['submit_btn_bg_color'].'; color:'.$form_options['submit_btn_txt_color'].'; font-weight:normal" value="'.$form_options['submit_button_txt'].'" /></td></tr>
						<tr><td colspan="2" style="line-height:13px">'.$form_footer_txt.$this->ofap1.$this->ofa_cbid.'&pid=13" target="_blank" style="font-size:xx-small;color:'.$form_options['field_txt_color'].';text-decoration:underline">'.$this->ofap2;
		$optin_form .= '</div>';
		$optin_form .= '</form>';
		return $optin_form;
	}
	
	/**
	 * Insert optin form within the post
	 */
	function __ofaInsertForm($post_content,$is_single_post) {
		if ( $is_single_post == 1 ) {
			$ofa_position  = $this->form_placement['wsp_position'];
			$ofa_alignment = $this->form_placement['wsp_alignment'];
			$ofa_wrap      = $this->form_placement['wsp_wrap'];
		} else {
			$ofa_position  = $this->form_placement['wp_position'];
			$ofa_alignment = $this->form_placement['wp_alignment'];
			$ofa_wrap      = $this->form_placement['wp_wrap'];
		}
		if ( $ofa_wrap == 1 ) {
			$style_float = 'float:'.$ofa_alignment;
			$style_align = '';
		} else {
			$style_float = '';
			$style_align = 'align="'.$ofa_alignment.'"';
		}
		$js_validate_fn = 'ofaValidateForm';
		$optin_form = $this->__ofaTheOptinForm($this->form_headline, $this->form_body_txt, $this->form_footer_txt, $this->form_options, $style_float, $style_align, $js_validate_fn);

		if ( $ofa_position == 'bottom' ) {
			$post_content = $post_content.$optin_form;
		} else {
			$post_content = $optin_form.$post_content;
		}
		return $post_content;
	}
	
	/**
	 * Carries out all the operations
	 */
	function __ofaOptionsPg() {
		$ofa_msg = '';
		$this->ofa_request = $_POST['ofa'];
		if ( $_POST['s'] == 2 ) {
			$form_code = $this->ofa_request['form_code'];
			$arp = $this->ofa_request['arp'];
			$name_fld = $this->ofa_arp_fields[$arp]['name_fld'];
			$email_fld = $this->ofa_arp_fields[$arp]['email_fld'];
			if ( $name_fld == '' ) {
				$name_fld = $this->ofa_request['name_fld'];
				$email_fld = $this->ofa_request['email_fld'];
			}
			$arp_options = array('arp' => "$arp", 'name_fld' => "$name_fld", 'email_fld' => "$email_fld");
			$arp_options = serialize($arp_options);
			$sql_1 = "UPDATE $this->ofa_options_table SET option_value='$form_code' WHERE option_name='arp_form'";
			$sql_2 = "UPDATE $this->ofa_options_table SET option_value='$arp_options' WHERE option_name='arp_options'";
			mysql_query($sql_1); mysql_query($sql_2);
			$ofa_msg = 'Options Saved Successfully.';
		} else if ( $_POST['s'] == 3 ) {
			foreach ( (array) $this->ofa_request as $key => $val ) {
				if ( $key == 'headline' ) $headline = $val;
				else if ( $key == 'body_txt' ) $body_txt = $val;
				else if ( $key == 'footer_txt' ) $footer_txt = $val;
				else if ( $key != 'next_step' ) $form_options[$key] = $val;
			}
			$form_options = serialize($form_options);
			$sql_1 = "UPDATE $this->ofa_options_table SET option_value='$headline' WHERE option_name='headline'";
			$sql_2 = "UPDATE $this->ofa_options_table SET option_value='$body_txt' WHERE option_name='body_txt'";
			$sql_3 = "UPDATE $this->ofa_options_table SET option_value='$footer_txt' WHERE option_name='footer_txt'";
			$sql_4 = "UPDATE $this->ofa_options_table SET option_value='$form_options' WHERE option_name='form_options'";
			mysql_query($sql_1); mysql_query($sql_2); mysql_query($sql_3); mysql_query($sql_4);
			$ofa_msg = 'Options Saved Successfully.';
		} else if ( $_POST['s'] == 4 ) {
			$wp_show_in = '';
			foreach ( (array) $this->ofa_request as $key => $val ) {
				if ( strpos($key,'wp_show_in_all') !== false ) {
					$form_placement['wp_show_in'] = 'all';
				} else if ( strpos($key,'wp_show_in_') !== false && $form_placement['wp_show_in'] != 'all' ) {
					$show_in_num = ltrim($key,'wp_show_in_');
					$wp_show_in .= ','.$show_in_num;
				} else if ( $key != 'finish' ) {
					$form_placement[$key] = $val;
				}
				if ( trim($wp_show_in) != '' ) $form_placement['wp_show_in'] = $wp_show_in.',';
			}
			$form_placement = serialize($form_placement);
			$sql = "UPDATE $this->ofa_options_table SET option_value='$form_placement' WHERE option_name='form_placement'";
			mysql_query($sql);
			$ofa_msg = 'Options Saved Successfully.';
		} else if ( $this->ofa_request['more_options'] ) {
			$cb_id = $this->ofa_request['cb_id'];
			$sql_chk = "SELECT option_value FROM $this->ofa_options_table WHERE option_name='cbid'";
			$rs_chk = mysql_query($sql_chk);
			if ( mysql_num_rows($rs_chk) > 0 ) $sql = "UPDATE $this->ofa_options_table SET option_value='$cb_id' WHERE option_name='cbid'";
			else $sql = "INSERT INTO $this->ofa_options_table (option_name,option_value) VALUES ('cbid','$cbid')";
			mysql_query($sql);
			$ofa_msg = 'Options Saved Successfully.';
		}
		return $ofa_msg;
	}
	
	/**
	 * Options Page
	 */
	function __ofaShowOptionsPg() {
		if ( isset($_POST['w']) ) $wizard = $_POST['w'];
		else $wizard = $_GET['w'];
		if ( isset($_POST['s']) ) $step = $_POST['s'];
		else $step = $_GET['s'];
		$row_style_display = strpos($_SERVER['HTTP_USER_AGENT'],'MSIE') ? 'block' : 'table-row';
	
		$ofa_get_vars = $this->__ofaBuildGetVars('page');
		$this->__ofaGetOptions(); // Get options 
		
		$arp = $_POST['ofa']['arp'];
		$name_fld = $_POST['ofa']['name_fld'];
		$email_fld = $_POST['ofa']['email_fld'];
		$ofatabhead_1_cls = '';
		$ofatabhead_2_cls = '';
		$ofatabhead_3_cls = '';
		$ofatabhead_4_cls = '';
		$ofatab_1_show = 'none';
		$ofatab_2_show = 'none';
		$ofatab_3_show = 'none';
		$ofatab_4_show = 'none';
		if ( $_POST['s'] && !$_POST['w'] ) {
			$ofatabhead_1_cls = 'selected';
			$ofatab_1_show = 'block';
		} else if ( $step == 1 ) {
			$ofatabhead_2_cls = 'selected';
			$ofatab_2_show = 'block';
		} else if ( $step == 2 ) {
			$ofatabhead_3_cls = 'selected';
			$ofatab_3_show = 'block';
		} else if ( $step == 3 ) {
			$ofatabhead_4_cls = 'selected';
			$ofatab_4_show = 'block';
		} else {
			$ofatabhead_1_cls = 'selected';
			$ofatab_1_show = 'block';
		}
		if ( $wizard == 1 && ($step == 1 || $step == 2)  ) $btn_txt = "Next Step &raquo;";
		else if ( $wizard == 1 && $step == 3  ) $btn_txt = "Finish";
		else $btn_txt = "Save";
		
		// Home
		$ofa_cb_tooltip = "Enter your ClickBank ID for branding the &quot;Powered by&quot; link with your affiliate link.<br><br>Whenever someone use any of our free plugins they\'ll see an &quot;One Time Offer&quot; and if they buy it then you\'ll get commission for it. Also, your affiliate id will be cookied so if the user went ahead and purchase any other product then you\'ll still receive commission for that.<br><br>You can join our affiliate program by clicking on &quot;Jour our affiliate program&quot; link just beside this icon.";

		// Form Settings
		$ofa_sel_namemail_tooltip = "If you are unsure about the Name/Email field then please post your optin form code in our forum by clicking on &quot;MaxBlogPress Optin Form Adder Forum&quot; link just beside this icon.<br><br>We\'ll check your code and will suggest the name/email field.";
		$ofa_form_code = $this->arp_form;
		
		// Form Format
		$ofa_field_bold_chk          = ''; 
		$ofa_field_italic_chk        = ''; 
		$ofa_field_underline_chk     = ''; 
		$ofa_headline                = $this->form_headline;
		$ofa_body_txt                = $this->form_body_txt;
		$ofa_footer_txt              = $this->form_footer_txt;
		$ofa_submit_button_txt       = $this->form_options['submit_button_txt'];
		$ofa_submit_btn_bg_color     = $this->form_options['submit_btn_bg_color'];
		$ofa_submit_btn_border_color = $this->form_options['submit_btn_border_color'];
		$ofa_submit_btn_txt_color    = $this->form_options['submit_btn_txt_color'];
		$ofa_bg_color                = $this->form_options['bg_color'];
		$ofa_border_color            = $this->form_options['border_color'];
		$ofa_border_thickness        = $this->form_options['border_thickness'];
		$ofa_name_field_txt          = $this->form_options['name_field_txt'];
		$ofa_email_field_txt         = $this->form_options['email_field_txt'];
		$ofa_field_font_family       = $this->form_options['field_font_family'];
		$ofa_field_font_size         = $this->form_options['field_font_size'];
		$ofa_field_txt_color         = $this->form_options['field_txt_color'];
		$ofa_txt_box_width           = $this->form_options['txt_box_width'];
		$ofa_txt_box_bg_color        = $this->form_options['txt_box_bg_color'];
		$ofa_txt_box_border_color    = $this->form_options['txt_box_border_color'];
		$ofa_width                   = $this->form_options['width'];
		$ofa_height                  = $this->form_options['height'];
		$ofa_field_txt_style         = 'style=color:'.$ofa_field_txt_color.';font-family:'.$ofa_field_font_family;
		if ( intval($ofa_field_font_size) > 0 ) $ofa_field_txt_style .= ';font-size:'.$ofa_field_font_size.'px';
		if ( $this->form_options['field_bold'] == 1 ) {
			$ofa_field_bold_chk = 'checked'; 
			$ofa_field_txt_style .= ';font-weight:bold';
		}
		if ( $this->form_options['field_italic'] == 1 ) {
		   $ofa_field_italic_chk = 'checked'; 
		   $ofa_field_txt_style .= ';font-style:italic';
		}
		if ( $this->form_options['field_underline'] == 1 ) {
			$ofa_field_underline_chk = 'checked'; 
			$ofa_field_txt_style .= ';text-decoration:underline';
		}
		$ofa_pre_headline = $ofa_headline;
		$ofa_pre_body_txt = $ofa_body_txt;
		$ofa_pre_footer_txt = $ofa_footer_txt;
		if ( substr(trim(strtolower($ofa_headline)),0,3) == '<p>' ) $ofa_pre_headline = substr($ofa_headline,3);
		if ( substr(trim(strtolower($ofa_body_txt)),0,3) == '<p>' ) $ofa_pre_body_txt = substr($ofa_body_txt,3);
		if ( substr(trim(strtolower($ofa_footer_txt)),0,3) == '<p>' ) $ofa_pre_footer_txt = substr($ofa_footer_txt,3);
		if ( substr(trim(strtolower($ofa_headline)),-4) == '</p>' ) $ofa_pre_headline = substr($ofa_headline,0,strlen($ofa_headline)-4);
		if ( substr(trim(strtolower($ofa_body_txt)),-4) == '</p>' ) $ofa_pre_body_txt = substr($ofa_body_txt,0,strlen($ofa_body_txt)-4);
		if ( substr(trim(strtolower($ofa_footer_txt)),-4) == '</p>' ) $ofa_pre_footer_txt = substr($ofa_footer_txt,0,strlen($ofa_footer_txt)-4);
		
		// Form Placement
		$ofa_wrap_txt_tooltip = '<img src=&quot;'.OFA_LIBPATH.'images/wrap-nowrap.jpg&quot;>';
		$ofa_in_widget_tooltip = 'Choose &quot;MaxBlogPress Optin Form Adder&quot; in the widget setting page';
		$ofa_within_post_chk = '';
		$ofa_within_single_post_chk = '';
		$ofa_wp_main_display = 'none';
		$ofa_wsp_main_display = 'none';
		$wp_show_in_arr = explode(',',$this->form_placement['wp_show_in']);
		
		if ( $this->form_placement['within_post'] == 1 ) {
			$ofa_within_post_chk = 'checked';
			$ofa_wp_main_display = 'block';
			$ofa_wp_1_display = $row_style_display;
		}
		foreach ( (array) $wp_show_in_arr as $val ) {
			if ( $val == 'all' ) {
				$wp_show_in_all_chk = 'checked';
				break;
			}
			$_wp_show_in = 'wp_show_in_'.$val;
			${$_wp_show_in} = 1;
		}
		if ( $this->form_placement['wp_position'] == 'top' ) $wp_position_top = 'selected';
		else $wp_position_bottom = 'selected';
		if ( $this->form_placement['wp_alignment'] == 'left' ) $wp_alignment_left = 'selected';
		else if ( $this->form_placement['wp_alignment'] == 'right' ) $wp_alignment_right = 'selected';
		else $wp_alignment_center = 'selected';
		if ( $this->form_placement['wp_wrap'] == 1 )  $wp_wrap_chk  = 'checked'; 
		if ( $this->form_placement['within_single_post'] == 1 ) {
			$ofa_within_single_post_chk = 'checked';
			$ofa_wsp_main_display = 'block';
			$ofa_wsp_1_display = $row_style_display;
		}
		if ( $this->form_placement['wsp_position'] == 'top' ) $wsp_position_top = 'selected';
		else $wsp_position_bottom = 'selected';
		if ( $this->form_placement['wsp_alignment'] == 'left' ) $wsp_alignment_left = 'selected';
		else if ( $this->form_placement['wsp_alignment'] == 'right' ) $wsp_alignment_right = 'selected';
		else $wsp_alignment_center = 'selected';
		if ( $this->form_placement['wsp_wrap'] == 1 ) $wsp_wrap_chk = 'checked'; 
		
		$this->__ofaHeader();
		require_once('home-pg.php');
		$this->__ofaFooter();
	}

	/**
	 * Plugin registration form
	 */
	function __ofaRegistrationForm($form_name, $submit_btn_txt='Register', $name, $email, $hide=0, $submit_again='') {
		$plugin_pg    = ($this->wp_version >= 2.7) ? 'tools.php' : 'edit.php';
		$thankyou_url = OFA_SITEURL.'/wp-admin/'.$plugin_pg.'?page='.$_GET['page'];
		$onlist_url   = OFA_SITEURL.'/wp-admin/'.$plugin_pg.'?page='.$_GET['page'].'&amp;mbp_onlist=1';
		if ( $hide == 1 ) $align_tbl = 'left';
		else $align_tbl = 'center';
		?>
		
		<?php if ( $submit_again != 1 ) { ?>
		<script><!--
		function trim(str){
			var n = str;
			while ( n.length>0 && n.charAt(0)==' ' ) 
				n = n.substring(1,n.length);
			while( n.length>0 && n.charAt(n.length-1)==' ' )	
				n = n.substring(0,n.length-1);
			return n;
		}
		function __ofaValidateForm_0() {
			var name = document.<?php echo $form_name;?>.name;
			var email = document.<?php echo $form_name;?>.from;
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			var err = ''
			if ( trim(name.value) == '' )
				err += '- Name Required\n';
			if ( reg.test(email.value) == false )
				err += '- Valid Email Required\n';
			if ( err != '' ) {
				alert(err);
				return false;
			}
			return true;
		}
		//-->
		</script>
		<?php } ?>
		<table align="<?php echo $align_tbl;?>">
		<form name="<?php echo $form_name;?>" method="post" action="http://www.aweber.com/scripts/addlead.pl" <?php if($submit_again!=1){;?>onsubmit="return __ofaValidateForm_0()"<?php }?>>
		 <input type="hidden" name="unit" value="mofa">
		 <input type="hidden" name="redirect" value="<?php echo $thankyou_url;?>">
		 <input type="hidden" name="meta_redirect_onlist" value="<?php echo $onlist_url;?>">
		 <input type="hidden" name="meta_adtracking" value="ofa-m-activate">
		 <input type="hidden" name="meta_message" value="1">
		 <input type="hidden" name="meta_required" value="from,name">
	 	 <input type="hidden" name="meta_forward_vars" value="1">	
		 <?php if ( $submit_again == 1 ) { ?> 	
		 <input type="hidden" name="submit_again" value="1">
		 <?php } ?>		 
		 <?php if ( $hide == 1 ) { ?> 
		 <input type="hidden" name="name" value="<?php echo $name;?>">
		 <input type="hidden" name="from" value="<?php echo $email;?>">
		 <?php } else { ?>
		 <tr><td>Name: </td><td><input type="text" name="name" value="<?php echo $name;?>" size="25" maxlength="150" /></td></tr>
		 <tr><td>Email: </td><td><input type="text" name="from" value="<?php echo $email;?>" size="25" maxlength="150" /></td></tr>
		 <?php } ?>
		 <tr><td>&nbsp;</td><td><input type="submit" name="submit" value="<?php echo $submit_btn_txt;?>" class="button" /></td></tr>
		 </form>
		</table>
		<?php
	}
	
	/**
	 * Register Plugin - Step 2
	 */
	function __ofaRegisterStep2($form_name='frm2',$name,$email) {
		$msg = 'You have not clicked on the confirmation link yet. A confirmation email has been sent to you again. Please check your email and click on the confirmation link to activate the plugin.';
		if ( trim($_GET['submit_again']) != '' && $msg != '' ) {
			echo '<div id="message" class="updated fade"><p><strong>'.$msg.'</strong></p></div>';
		}
		?>
		<div class="wrap"><h2> <?php echo OFA_NAME.' '.OFA_VERSION; ?></h2>
		 <center>
		 <table width="640" cellpadding="5" cellspacing="1" bgcolor="#ffffff" style="border:1px solid #e9e9e9">
		  <tr><td align="center"><h3>Almost Done....</h3></td></tr>
		  <tr><td><h3>Step 1:</h3></td></tr>
		  <tr><td>A confirmation email has been sent to your email "<?php echo $email;?>". You must click on the link inside the email to activate the plugin.</td></tr>
		  <tr><td><strong>The confirmation email will look like:</strong><br /><img src="http://www.maxblogpress.com/images/activate-plugin-email.jpg" vspace="4" border="0" /></td></tr>
		  <tr><td>&nbsp;</td></tr>
		  <tr><td><h3>Step 2:</h3></td></tr>
		  <tr><td>Click on the button below to Verify and Activate the plugin.</td></tr>
		  <tr><td><?php $this->__ofaRegistrationForm($form_name.'_0','Verify and Activate',$name,$email,$hide=1,$submit_again=1);?></td></tr>
		 </table>
		 <p>&nbsp;</p>
		 <table width="640" cellpadding="5" cellspacing="1" bgcolor="#ffffff" style="border:1px solid #e9e9e9">
           <tr><td><h3>Troubleshooting</h3></td></tr>
           <tr><td><strong>The confirmation email is not there in my inbox!</strong></td></tr>
           <tr><td>Dont panic! CHECK THE JUNK, spam or bulk folder of your email.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>It's not there in the junk folder either.</strong></td></tr>
           <tr><td>Sometimes the confirmation email takes time to arrive. Please be patient. WAIT FOR 6 HOURS AT MOST. The confirmation email should be there by then.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>6 hours and yet no sign of a confirmation email!</strong></td></tr>
           <tr><td>Please register again from below:</td></tr>
           <tr><td><?php $this->__ofaRegistrationForm($form_name,'Register Again',$name,$email,$hide=0,$submit_again=2);?></td></tr>
           <tr><td><strong>Help! Still no confirmation email and I have already registered twice</strong></td></tr>
           <tr><td>Okay, please register again from the form above using a DIFFERENT EMAIL ADDRESS this time.</td></tr>
           <tr><td>&nbsp;</td></tr>
           <tr>
             <td><strong>Why am I receiving an error similar to the one shown below?</strong><br />
                 <img src="http://www.maxblogpress.com/images/no-verification-error.jpg" border="0" vspace="8" /><br />
               You get that kind of error when you click on &quot;Verify and Activate&quot; button or try to register again.<br />
               <br />
               This error means that you have already subscribed but have not yet clicked on the link inside confirmation email. In order to  avoid any spam complain we don't send repeated confirmation emails. If you have not recieved the confirmation email then you need to wait for 12 hours at least before requesting another confirmation email. </td>
           </tr>
           <tr><td>&nbsp;</td></tr>
           <tr><td><strong>But I've still got problems.</strong></td></tr>
           <tr><td>Stay calm. <strong><a href="http://www.maxblogpress.com/contact-us/" target="_blank">Contact us</a></strong> about it and we will get to you ASAP.</td></tr>
         </table>
		 </center>		
		<p style="text-align:center;margin-top:3em;"><strong><?php echo OFA_NAME.' '.OFA_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	    </div>
		<?php
	}

	/**
	 * Register Plugin - Step 1
	 */
	function __ofaRegisterStep1($form_name='frm1',$userdata) {
		$name  = trim($userdata->first_name.' '.$userdata->last_name);
		$email = trim($userdata->user_email);
		?>
		<div class="wrap"><h2> <?php echo OFA_NAME.' '.OFA_VERSION; ?></h2>
		 <center>
		 <table width="620" cellpadding="3" cellspacing="1" bgcolor="#ffffff" style="border:1px solid #e9e9e9">
		  <tr><td align="center"><h3>Please register the plugin to activate it. (Registration is free)</h3></td></tr>
		  <tr><td align="left">In addition you'll receive complimentary subscription to MaxBlogPress Newsletter which will give you many tips and tricks to attract lots of visitors to your blog.</td></tr>
		  <tr><td align="center"><strong>Fill the form below to register the plugin:</strong></td></tr>
		  <tr><td><?php $this->__ofaRegistrationForm($form_name,'Register',$name,$email);?></td></tr>
		  <tr><td align="center"><font size="1">[ Your contact information will be handled with the strictest confidence <br />and will never be sold or shared with third parties ]</font></td></td></tr>
		 </table>
		 </center>
		<p style="text-align:center;margin-top:3em;"><strong><?php echo OFA_NAME.' '.OFA_VERSION; ?> by <a href="http://www.maxblogpress.com/" target="_blank" >MaxBlogPress</a></strong></p>
	    </div>
		<?php
	}
	
} // Eof Class

$OptinFormAdder = new OptinFormAdder();
?>