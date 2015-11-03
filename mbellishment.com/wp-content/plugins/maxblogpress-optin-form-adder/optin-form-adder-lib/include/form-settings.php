<script type="text/javascript">
var ie = document.all;
function __ofaPopulateDropdown(dropDown, theArray) {
	var i;
	dropDown.length = 0;
	for (i=0; i<theArray.length; i++) {
	   dropDown.options[i] = new Option(theArray[i], theArray[i]);
	}
}
Array.prototype.in_array = function ( obj ) {
	var len = this.length;
	for ( var x = 0 ; x <= len ; x++ ) {
	   if ( this[x] == obj ) return true;
	}
	return false;
}
function __ofaDetectForm() {
	var frm_action = '';
	var arp_detected = 1;
	var choices = new Array();
	var form_code = document.getElementById('ofa_form_code').value;
	if ( form_code == '' ) {
		alert('Form Code Required'); return false;
	}
	var form_code_html = document.getElementById('ofa_form_code_html');
	var name_fld = document.getElementById('ofa_name_fld');
	var email_fld = document.getElementById('ofa_email_fld');
	var arp_name_html = document.getElementById('the_arp_name');
	var arp = document.getElementById('arp');
	
	var pattern = /action=("|')(.*?)('|")/i;
	var matches = pattern.exec(form_code);
	if ( matches != null ) {
		frm_action = matches[2];
		frm_action = frm_action.toLowerCase();
	}
	if ( frm_action.indexOf('aweber.com') != -1 ) 					arp_type = 'Aweber';
	else if ( frm_action.indexOf('prosender.com') != -1 ) 			arp_type = 'ProSender';
	else if ( frm_action.indexOf('listping.com') != -1 ) 			arp_type = 'ListPing';
	else if ( frm_action.indexOf('freeautobot.com') != -1 )			arp_type = 'FreeAutoBot';
	else if ( frm_action.indexOf('turboautoresponders.com') != -1 ) arp_type = 'TurboAutoResponders';
	else if ( frm_action.indexOf('emailaces.com') != -1 ) 			arp_type = 'EmailAces';
	else if ( frm_action.indexOf('getresponse.com') != -1 ) 		arp_type = 'GetResponse';
	else if ( frm_action.indexOf('mcssl.com') != -1 ) 				arp_type = '1ShoppingCart';
	else if ( frm_action.indexOf('quickpaypro.com') != -1 ) 		arp_type = 'QuickPayPro';
	else if ( frm_action.indexOf('parabots.net') != -1 ) 			arp_type = 'Parabots';
	else if ( frm_action.indexOf('/arp3') != -1 )                   arp_type = 'AutoResponsePlus';
	else {arp_detected = 0; arp_type = 'Not in our database';}
	arp_name_html.innerHTML = '<strong>Autoresponder Detected: <font color="#FF0000">'+arp_type+'</font></strong>';
	arp.value = arp_type.toLowerCase();
	if ( arp_detected == 1 ) {
		document.getElementById('ofa_after_detect_1').style.display = 'block';
		document.getElementById('ofa_after_detect_2').style.display = 'none';
		document.getElementById('ofa_after_detect_3').style.display = 'block';
		return true;
	}
	form_code_2 = form_code.replace(/<form/gi,'<OFA_Form');
	form_code_2 = form_code_2.replace(/<\/form/gi,'</OFA_Form');
	form_code_html.innerHTML = form_code_2;
	var text_boxes = form_code_html.getElementsByTagName("INPUT");
	for ( var i=0; i<text_boxes.length; i++ ) {
	   var textbox = text_boxes[i];
	   if ( textbox.type == 'text' ) choices[choices.length] = textbox.name;
	}
	if ( choices[0] == undefined ) {
		choices[0] = 'name';
		choices[1] = 'from';
	}
	__ofaPopulateDropdown(name_fld, choices);
	__ofaPopulateDropdown(email_fld, choices);
	// Guess Name field
	if (choices.in_array('name')) { name_fld.value = 'name'; }
	else if (choices.in_array('fname')) { name_fld.value = 'fname'; }
	else if (choices.in_array('SubscriberName')) { name_fld.value = 'SubscriberName'; }
	else if (choices.in_array('category2')) { name_fld.value = 'category2'; }
	else if (choices.in_array('SendName')) { name_fld.value = 'SendName'; }
	else { name_fld.value = choices[0]; }
	// Guess Email field
	if (choices.in_array('from')) { email_fld.value = 'from'; }
	else if (choices.in_array('email')) { email_fld.value = 'email'; }
	else if (choices.in_array('Email1')) { email_fld.value = 'Email1'; }
	else if (choices.in_array('MailFromAddress')) { email_fld.value = 'MailFromAddress'; }
	else if (choices.in_array('category3')) { email_fld.value = 'category3'; }
	else if (choices.in_array('SendEmail')) { email_fld.value = 'SendEmail'; }
	else { email_fld.value = choices[1]; }
	
	document.getElementById('ofa_after_detect_1').style.display = 'none';
	document.getElementById('ofa_after_detect_2').style.display = 'block';
	document.getElementById('ofa_after_detect_3').style.display = 'block';
}
</script>
</script>
<style type="text/css">
table, tbody, tfoot, thead, tr, th, td {
	padding: 3px;
}
</style>
<?php 
if ( $wizard == 1 ) echo '<h3 class="ofa_h3">Step 1 of 3: Save your optin form code</h3>'; 
else '<br>';
?>
<form name="ofa_form1" method="post" action="">
<table width="100%" cellpadding="0" cellspacing="0" style="border:1px solid #cccccc; background-color:#f1f1f1; padding:0">
 <tr>
  <td>
	<table cellpadding="6" cellspacing="1" width="100%" style="border:1px solid #eeeeee; background-color:#f1f1f1; padding:0">
	 <tr>
	  <td><strong>Copy and Paste your optin form code: </strong><br />
	  <textarea name="ofa[form_code]" id="ofa_form_code" rows="10" cols="75"><?php echo htmlspecialchars($ofa_form_code);?></textarea></td>
	 </tr>
	 <tr>
	   <td><input type="button" name="ofa[detect_form]" id="ofa_detect_form" value="Detect The Form" class="button" onclick="__ofaDetectForm()" /></td>
	 </tr>
	 <tr id="ofa_after_detect_1" style="display:none">
	  <td id="the_arp_name"><strong>Autoresponder Detected: </strong></td>
	 </tr>
	 <tr id="ofa_after_detect_2" style="display:none">
	  <td>
	   <table width="100%" cellpadding="3" cellspacing="1">
		 <tr>
		  <td><strong>Select the Name/Email Field: </strong> 
		  <a href="#" onMouseover="tooltip('<?php echo $ofa_sel_namemail_tooltip;?>',270)" onMouseout="hidetooltip()" style="border-bottom:none;"><?php echo $this->img_help;?></a> &nbsp;  
		  <a href="http://www.maxblogpress.com/forum/forumdisplay.php?f=18" target="_blank">MaxBlogPress Optin Form Adder Forum</a></td>
		 </tr>
		 <tr>
		  <td>Name Field: <select name="ofa[name_fld]" id="ofa_name_fld"></select></td>
		 </tr>
		 <tr>
		  <td>Email Field: <select name="ofa[email_fld]" id="ofa_email_fld"></select></td>
		 </tr>
	   </table></td>
	 </tr>
	 <tr id="ofa_after_detect_3" style="display:none">
	  <td>
	  <div id="ofa_form_code_html" style="display:none"></div>
	  <input type="hidden" name="s" value="2" />
	  <input type="hidden" name="w" value="<?php echo $wizard;?>" />
	  <input type="hidden" name="ofa[arp]" id="arp" value="" />
	  <input type="submit" name="ofa[next_step]" value="<?php echo $btn_txt;?>" class="button" style="font-weight:bold" />
	  </td>
	 </tr>
    </table>
  </td>
 </tr>
</table>
<br />
</form>