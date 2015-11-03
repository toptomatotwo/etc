<?php
if ( $OptinFormAdderPlugin->not_ie == 1 ) {
	echo '<script language="javascript" type="text/javascript" src="'.OFA_FULLPATH.'editor/tiny_mce.js"></script>';
}
?>
<script language="javascript" type="text/javascript">
tinyMCE.init({
	mode : "exact",
    elements: "ofa_headline,ofa_body_txt,ofa_footer_txt",
	theme : "advanced",
	plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
	theme_advanced_buttons1 : "bold,italic,underline,|,justifyleft,justifycenter,justifyright,fontselect",
	theme_advanced_buttons2 : "fontsizeselect,forecolor,backcolor,image,|,code",
	theme_advanced_buttons3 : "",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	theme_advanced_resize_horizontal : false,
	nonbreaking_force_tab : true,
	apply_source_formatting : true,
	relat2ive_urls : false,
	rem2ove_script_host : false
});
</script>
<script>
function __ofaLivePreview() {
	var pre_name_fld_txt  = document.getElementById('ofa_pre_name_fld_txt');
	var pre_email_fld_txt = document.getElementById('ofa_pre_email_fld_txt');
	var field_bold        = document.getElementById('ofa_field_bold');
	var field_italic      = document.getElementById('ofa_field_italic');
	var field_underline   = document.getElementById('ofa_field_underline');
	
	if ( field_bold.checked == true ) {
		pre_name_fld_txt.style.fontWeight = 'bold';
		pre_email_fld_txt.style.fontWeight = 'bold';
	} else {
		pre_name_fld_txt.style.fontWeight = 'normal';
		pre_email_fld_txt.style.fontWeight = 'normal';
	}
	if ( field_italic.checked == true ) {
		pre_name_fld_txt.style.fontStyle = 'italic';
		pre_email_fld_txt.style.fontStyle = 'italic';
	} else {
		pre_name_fld_txt.style.fontStyle = 'normal';
		pre_email_fld_txt.style.fontStyle = 'normal';
	}
	if ( field_underline.checked == true ) {
		pre_name_fld_txt.style.textDecoration = 'underline';
		pre_email_fld_txt.style.textDecoration = 'underline';
	} else {
		pre_name_fld_txt.style.textDecoration = 'none';
		pre_email_fld_txt.style.textDecoration = 'none';
	}
}
function __ofaTrim(str){
	var n=str;
	while(n.length>0 && n.charAt(0)==' ') n=n.substring(1,n.length);
	while(n.length>0 && n.charAt(n.length-1)==' ') n=n.substring(0,n.length-1);
	return n;
}
function __ofaLivePreviewUpdate() {
	var ed_headline   = tinyMCE.get('ofa_headline');
	var ed_body_txt   = tinyMCE.get('ofa_body_txt');
	var ed_footer_txt = tinyMCE.get('ofa_footer_txt');
	var ofa_pre_headline   = document.getElementById('ofa_pre_headline');
	var ofa_pre_body_txt   = document.getElementById('ofa_pre_body_txt');
	var ofa_pre_footer_txt = document.getElementById('ofa_pre_footer_txt');
	var title = ed_headline.getContent();
	var body_txt = ed_body_txt.getContent();
	var footer = ed_footer_txt.getContent();
	title    = __ofaTrim(title);
	body_txt = __ofaTrim(body_txt);
	footer   = __ofaTrim(footer);
	title    = title.substring(3,title.length-4);
	body_txt = body_txt.substring(3,body_txt.length-4);
	footer   = footer.substring(3,footer.length-4);
	ofa_pre_headline.innerHTML   = title;
	ofa_pre_body_txt.innerHTML   = body_txt;
	ofa_pre_footer_txt.innerHTML = footer;
}
function __ofaShowHide(curr, img, img_type) {
	var curr = document.getElementById(curr);
	if ( img != '' ) {
		var img  = document.getElementById(img);
	}
	var ofaShowRow = 'block'
	if ( navigator.appName.indexOf('Microsoft') == -1 && curr.tagName == 'TR' ) ofaShowRow = 'table-row';
	if ( curr.style == '' || curr.style.display == 'none' ) {
		curr.style.display = ofaShowRow;
		if ( img != '' && img_type == 1 ) img.src = '<?php echo OFA_LIBPATH;?>images/minus.gif';
		if ( img != '' && img_type == 2 ) img.src = '<?php echo OFA_LIBPATH;?>images/arrow-down.gif';
		if ( img != '' && img_type == 3 ) img.src = '<?php echo OFA_LIBPATH;?>images/minus-small.gif';
	} else if ( curr.style != '' || curr.style.display == 'block' || curr.style.display == 'table-row' ) {
		curr.style.display = 'none';
		if ( img != '' && img_type == 1 ) img.src = '<?php echo OFA_LIBPATH;?>images/plus.gif';
		if ( img != '' && img_type == 2 ) img.src = '<?php echo OFA_LIBPATH;?>images/arrow-right.gif';
		if ( img != '' && img_type == 3 ) img.src = '<?php echo OFA_LIBPATH;?>images/plus-small.gif';
	}
}
function __ofaShowHideRow(curr,target,outer_div) {
	var target  = document.getElementById(target);
	var ofaShowRow = 'block'
	if ( navigator.appName.indexOf('Microsoft') == -1 && target.tagName == 'TR' ) ofaShowRow = 'table-row';
	if ( curr.checked == true ) {
		target.style.display = ofaShowRow;
		if ( outer_div != '' ) document.getElementById(outer_div).style.display = 'block';
	} else {
	    target.style.display = 'none';
		if ( outer_div != '' ) document.getElementById(outer_div).style.display = 'none';
	}
}
</script>
<style type="text/css">
table, tbody, tfoot, thead, tr, th, td {
	padding: 1px;
}
</style>
<input type="hidden" name="ofa_widget" id="ofa_widget" value="1" />
<table width="255" cellpadding="0" cellspacing="0"style="border:1px solid #dfdfdf">
 <?php if ( trim($not_added_yet) == '' && $wp_version >= 2.5 ) {echo'<tr><td style="background-color:#FFFFC8;color:#ff0000; font-size:11px;"><b>Note:</b> The collapse and expand options like: "Headline", "Body Text", "Formatting" etc.. won\'t work until you save the widget.<br><br>Please scroll down and click on "Save Changes".<br><br>(This is one time action only and you won\'t have to repeat this again)</td></tr>';} ?>
 <tr>
  <td>
	<table cellpadding="3" cellspacing="1" width="255" style="border:1px solid #dfdfdf; background-color:#f5f5f5">
	 <tr>
	  <td style="background-color:#f5f5f5"><strong>Title: </strong></a><input type="text" name="ofa[title]" value="<?php echo $ofa_title;?>" class="widefat" style="width:180px" /></td>
	 </tr>
	 <tr bgcolor="#ffffff">
	  <td style="background-color:#ffffff"><a onclick="__ofaShowHide('ofa_edt1','ofa_edt1_img',3)" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus-small.gif" id="ofa_edt1_img" border="0" /><strong>Headline</strong></a>
	  <div id="ofa_edt1" style="display:none"><textarea name="ofa[headline]" id="ofa_headline" class="ofa_headline" style="height:60px;width:250px;"><?php echo stripslashes($ofa_headline);?></textarea></div></td>
	 </tr>
	 <tr>
	  <td style="background-color:#f5f5f5"><a onclick="__ofaShowHide('ofa_edt2','ofa_edt2_img',3)" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus-small.gif" id="ofa_edt2_img" border="0" /><strong>Body Text</strong></a>
	  <div id="ofa_edt2" style="display:none"><textarea name="ofa[body_txt]" id="ofa_body_txt" style="height:130px;width:250px;"><?php echo stripslashes($ofa_body_txt);?></textarea></div></td>
	 </tr>
	 
	 <tr>
	  <td style="background-color:#ffffff"><a onclick="__ofaShowHide('ofa_w_format','ofa_w_format_img',3)" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus-small.gif" id="ofa_w_format_img" border="0" /><strong>Formatting</strong></a>
	   <div id="ofa_w_format" style="display:none">
	    <table width="100%">
		 <tr>
		  <td style="background-color:#f5f5f5">Alignment: 
		  <select name="ofa[alignment]" id="ofa_alignment">
			<option value="left" <?php echo $ofa_alignment_left;?>>Left</option>
			<option value="center" <?php echo $ofa_alignment_center;?>>Center</option>
			<option value="right" <?php echo $ofa_alignment_right;?>>Right</option>
		  </select>
		  </td>
		 </tr>
		 <tr>
		  <td style="background-color:#ffffff">Background Color: <input type="text" name="ofa[bg_color]" id="ofa_bg_color" value="<?php echo $ofa_bg_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_form').style.backgroundColor=this.value;" />
		  <input type="button" name="ofa_bg_color_btn" id="ofa_bg_color_btn" title="Select From Background Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_bg_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_bg_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />	  </td>
		 </tr>
		 <tr>
		  <td style="background-color:#f5f5f5">Border Color: <input type="text" name="ofa[border_color]" id="ofa_border_color" value="<?php echo $ofa_border_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_form').style.borderColor=this.value;" />
		  <input type="button" name="ofa_border_color_btn" id="ofa_border_color_btn" title="Select Form Border Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_border_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_border_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />	  </td>
		 </tr>
		 <tr>
		  <td style="background-color:#ffffff">Border Thickness: <input type="text" name="ofa[border_thickness]" id="ofa_border_thickness" value="<?php echo $ofa_border_thickness;?>" class="widefat" style="width:30px" maxlength="2" onblur="document.getElementById('ofa_pre_form').style.borderWidth=this.value+'px';" /></td>
		 </tr>
		 <tr>
		  <td style="background-color:#f5f5f5">Submit Button Text: <br /><input type="text" name="ofa[submit_button_txt]" id="ofa_submit_button_txt" style="width:100px" maxlength="100" value="<?php echo $ofa_submit_button_txt;?>" class="widefat" onkeyup="document.getElementById('ofa_pre_btn').value=this.value;" />
		  <a onclick="__ofaShowHide('ofa_submit_btn_format','ofa_submit_btn_format_img', 2);" style="cursor:hand;cursor:pointer;text-decoration:underline">More Formatting <img src="<?php echo OFA_LIBPATH?>images/arrow-right.gif" id="ofa_submit_btn_format_img" border="0" /></a></td>
		 </tr>
		 <tr id="ofa_submit_btn_format" style="display:none">
		  <td style="background-color:#eaeaea">Button Color:  
		  <input type="text" name="ofa[submit_btn_bg_color]" id="ofa_submit_btn_bg_color" value="<?php echo $ofa_submit_btn_bg_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_btn').style.backgroundColor=this.value;" />
		  <input type="button" name="ofa_submit_btn_bg_color_btn" id="ofa_submit_btn_bg_color_btn" title="Select Submit Button Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_submit_btn_bg_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_submit_btn_bg_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />
		  <br />Border Color: 
		  <input type="text" name="ofa[submit_btn_border_color]" id="ofa_submit_btn_border_color" value="<?php echo $ofa_submit_btn_border_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_btn').style.borderColor=this.value;" />
		  <input type="button" name="ofa_submit_btn_border_color_btn" id="ofa_submit_btn_border_color_btn" title="Select Submit Button Border Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_submit_btn_border_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_submit_btn_border_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />
		  <br />Text Color: 
		  <input type="text" name="ofa[submit_btn_txt_color]" id="ofa_submit_btn_txt_color" value="<?php echo $ofa_submit_btn_txt_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_btn').style.color=this.value;" />
		  <input type="button" name="ofa_submit_btn_txt_color_btn" id="ofa_submit_btn_txt_color_btn" title="Select Submit Button Text Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_submit_btn_txt_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_submit_btn_txt_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />	  </td>
		 </tr>
		</table>
	   </div>
	  </td>
	 </tr> 
	</table>
  </td>
 </tr>
 <tr><td style="background-color:#ffffff" height="10"></td></tr>
 
 <tr>
  <td>
	<table cellpadding="3" cellspacing="1" width="255" style="border:1px solid #dfdfdf; background-color:#f5f5f5">
	  <tr><td><strong><a onclick="__ofaShowHide('ofa_more_format','ofa_more_format_img', 1);" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus.gif" id="ofa_more_format_img" border="0" />More Customization</a></strong></td></tr>
	  <tr id="ofa_more_format" style="display:none">
	   <td>
		<table width="100%" cellpadding="3" cellspacing="1">
		  <tr>
		   <td style="background-color:#ffffff">Name Field Text: <input type="text" name="ofa[name_field_txt]" id="ofa_name_field_txt" value="<?php echo $ofa_name_field_txt;?>" class="widefat" style="width:100px" maxlength="100" onkeyup="document.getElementById('ofa_pre_name_fld_txt').innerHTML=this.value;document.getElementById('ofa_pre_name_fld_td').width=this.value.length*9" /></td>
		  </tr>
		  <tr>
		   <td style="background-color:#ffffff">Email Field Text: <input type="text" name="ofa[email_field_txt]" id="ofa_email_field_txt" value="<?php echo $ofa_email_field_txt;?>" class="widefat" style="width:100px" maxlength="100" onkeyup="document.getElementById('ofa_pre_email_fld_txt').innerHTML=this.value;" />
		   <br /><a onclick="__ofaShowHide('ofa_fld_txt_format','ofa_fld_txt_format_img', 2);" style="cursor:hand;cursor:pointer;text-decoration:underline">More Formatting <img src="<?php echo OFA_LIBPATH?>images/arrow-right.gif" id="ofa_fld_txt_format_img" border="0" /></a></td>
		  </tr>
		  <tr id="ofa_fld_txt_format" style="display:none">
		   <td style="background-color:#eaeaea" colspan="2"><u>Format Name/Email Field Text: </u><br /><br />
		   <input type="checkbox" name="ofa[field_bold]" id="ofa_field_bold" value="1" <?php echo $ofa_field_bold_chk;?> onclick="__ofaLivePreview()"> Bold &nbsp;&nbsp;  
		   <input type="checkbox" name="ofa[field_italic]" id="ofa_field_italic" value="1" <?php echo $ofa_field_italic_chk;?> onclick="__ofaLivePreview()"> Italic &nbsp;&nbsp;  
		   <input type="checkbox" name="ofa[field_underline]" id="ofa_field_underline" value="1" <?php echo $ofa_field_underline_chk;?> onclick="__ofaLivePreview()" /> Underline
		   <br />Font: <select name="ofa[field_font_family]" istyle="width:105px;" onchange="document.getElementById('ofa_pre_name_fld_txt').style.fontFamily=this.value;document.getElementById('ofa_pre_email_fld_txt').style.fontFamily=this.value;">
			<option value="" <?php if($ofa_field_font_family=='0' || $ofa_field_font_family==''){print'selected';}?>>Default</option>
			<option value="Arial" <?php if($ofa_field_font_family=='Arial'){print'selected';}?> style="font-family:Arial">Arial</option>
			<option value="Comic Sans MS" <?php if($ofa_field_font_family=='Comic Sans MS'){print'selected';}?> style="font-family:Comic Sans MS">Comic Sans MS</option>
			<option value="Courier New" <?php if($ofa_field_font_family=='Courier New'){print'selected';}?> style="font-family:Courier New">Courier New</option>
			<option value="Georgia" <?php if($ofa_field_font_family=='Georgia'){print'selected';}?> style="font-family:Georgia">Georgia</option>
			<option value="Impact" <?php if($ofa_field_font_family=='Impact'){print'selected';}?> style="font-family:Impact">Impact</option>
			<option value="Sans Serif" <?php if($ofa_field_font_family=='Sans Serif'){print'selected';}?> style="font-family:Sans Serif">Sans Serif</option>
			<option value="Tahoma" <?php if($ofa_field_font_family=='Tahoma'){print'selected';}?> style="font-family:Tahoma">Tahoma</option>
			<option value="Times New Roman" <?php if($ofa_field_font_family=='Times New Roman'){print'selected';}?> style="font-family:Times New Roman">Times New Roman</option>
			<option value="Verdana" <?php if($ofa_field_font_family=='Verdana'){print'selected';}?> style="font-family:Verdana">Verdana</option>
		   </select>
		   <br />Size: <select name="ofa[field_font_size]" style="width:105px;" onchange="document.getElementById('ofa_pre_name_fld_txt').style.fontSize=this.value+'px';document.getElementById('ofa_pre_email_fld_txt').style.fontSize=this.value+'px';">
			<option value="" <?php if($ofa_field_font_size=='0' || $ofa_field_font_size==''){print'selected';}?>>Default</option>
			<option value="10" <?php if($ofa_field_font_size=='10'){print'selected';}?> style="font-size:10px">Size 1</option>
			<option value="11" <?php if($ofa_field_font_size=='11'){print'selected';}?> style="font-size:11px">Size 2</option>
			<option value="12" <?php if($ofa_field_font_size=='12'){print'selected';}?> style="font-size:12px">Size 3</option>
			<option value="13" <?php if($ofa_field_font_size=='13'){print'selected';}?> style="font-size:13px">Size 4</option>
			<option value="14" <?php if($ofa_field_font_size=='14'){print'selected';}?> style="font-size:14px">Size 5</option>
			<option value="15" <?php if($ofa_field_font_size=='15'){print'selected';}?> style="font-size:15px">Size 6</option>
			<option value="16" <?php if($ofa_field_font_size=='16'){print'selected';}?> style="font-size:16px">Size 7</option>
		   </select>
		   <br />Color: <input type="text" name="ofa[field_txt_color]" id="ofa_field_txt_color" value="<?php echo $ofa_field_txt_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_name_fld_txt').style.color=this.value;document.getElementById('ofa_pre_email_fld_txt').style.color=this.value;" />
		   <input type="button" name="ofa_field_txt_color_btn" id="ofa_field_txt_color_btn" title="Select Text Box Background Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_field_txt_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_field_txt_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' /></td>
		  </tr>
			
	      <tr>
		   <td style="background-color:#f5f5f5" colspan="2">
		   <strong><a onclick="__ofaShowHide('ofa_txtbox_format','ofa_txtbox_format_img', 3);" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus-small.gif" id="ofa_txtbox_format_img" border="0" />Format Name/Email Text Box</a></strong>
		   <div id="ofa_txtbox_format" style="display:none">
			<table width="100%" cellpadding="3" cellspacing="1">
			  <tr>
			   <td style="background-color:#f5f5f5">Width: <input type="text" name="ofa[txt_box_width]" id="ofa_txt_box_width" value="<?php echo $ofa_txt_box_width;?>" size="3" maxlength="4" onblur="document.getElementById('ofa_pre_name_fld').style.width=this.value+'px';document.getElementById('ofa_pre_email_fld').style.width=this.value+'px';" />
			  </td>
			  <tr>
			   <td style="background-color:#f5f5f5" width="35%">Background Color: <input type="text" name="ofa[txt_box_bg_color]" id="ofa_txt_box_bg_color" value="<?php echo $ofa_txt_box_bg_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_name_fld').style.backgroundColor=this.value;document.getElementById('ofa_pre_email_fld').style.backgroundColor=this.value;"   />
			   <input type="button" name="ofa_txt_box_bg_color_btn" id="ofa_txt_box_bg_color_btn" title="Select Text Box Background Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_txt_box_bg_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_txt_box_bg_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />			   </td>
			  </tr>
			  <tr style="background-color:#f5f5f5">
			   <td>Border Color: <input type="text" name="ofa[txt_box_border_color]" id="ofa_txt_box_border_color" value="<?php echo $ofa_txt_box_border_color;?>" class="widefat" style="width:70px" maxlength="7" onblur="document.getElementById('ofa_pre_name_fld').style.borderColor=this.value;document.getElementById('ofa_pre_email_fld').style.borderColor=this.value;" />
			   <input type="button" name="ofa_txt_box_border_color_btn" id="ofa_txt_box_border_color_btn" title="Select Text Box Border Color" style="line-height:8px;width:20px;cursor:pointer;cursor:hand;background-color:<?php echo $ofa_txt_box_border_color;?>" onclick='window.open("<?php echo OFA_LIBPATH;?>include/pickcolor.html?pid=ofa_txt_box_border_color","colorpicker","left=300,top=200,width=240,height=170,resizable=0");' />			   </td>
			  </tr>
			</table>
		   </div></td>
		  </tr>
	      
		  <tr>
		   <td style="background-color:#ffffff" colspan="2"><a onclick="__ofaShowHide('ofa_edt3','ofa_edt3_img',3)" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus-small.gif" id="ofa_edt3_img" border="0" /><strong>Footer Text</strong></a>
		   <div id="ofa_edt3" style="display:none"><textarea name="ofa[footer_txt]" id="ofa_footer_txt" class="ofa_footer_txt" style="height:120px;width:250px;"><?php echo stripslashes($ofa_footer_txt);?></textarea></div></td>
		  </tr>
		  <tr>
		   <td style="background-color:#f5f5f5" colspan="2">Width: <input type="text" name="ofa[width]" id="ofa_width" value="<?php echo $ofa_width;?>" class="widefat" style="width:60px" maxlength="3" onblur="document.getElementById('ofa_pre_form').style.width=this.value+'px';" /></td>
		  </tr>
		</table>
	   </td>
	  </tr>
	</table>
  </td>
 </tr>
 <tr><td style="background-color:#ffffff" height="10"></td></tr>
 
 <tr>
  <td>
	<table cellpadding="3" cellspacing="1" width="255" style="border:1px solid #dfdfdf; background-color:#ffffff">
	  <tr><td><strong>Preview &raquo;</strong> &nbsp;&nbsp;&nbsp; <input type="button" value="Update Preview" onclick="__ofaLivePreviewUpdate()" class="button" />
	  <br /><br />
	  <table align="center" id="ofa_pre_form" cellpadding="3" cellspacing="1" width="<?php echo $ofa_width;?>" height="<?php echo $ofa_height;?>" style="border:<?php echo $ofa_border_thickness;?>px solid <?php echo $ofa_border_color;?>; background-color:<?php echo $ofa_bg_color;?>; text-align:left;">
        <tr><td colspan="2" id="ofa_pre_headline"><?php echo $ofa_pre_headline;?></td></tr>
        <tr><td colspan="2" id="ofa_pre_body_txt"><?php echo $ofa_pre_body_txt;?></td></tr>
        <tr><td id="ofa_pre_name_fld_td" width="<?php echo (strlen($ofa_name_field_txt)*9);?>"><span id="ofa_pre_name_fld_txt" <?php echo $ofa_field_txt_style;?>><?php echo $ofa_name_field_txt;?></span></td>
		<td><input type="text" id="ofa_pre_name_fld" name="name" style="width:<?php echo $ofa_txt_box_width;?>px; border:1px solid <?php echo $ofa_txt_box_border_color;?>; background-color:<?php echo $ofa_txt_box_bg_color;?>" /></td></tr>
        <tr><td><span id="ofa_pre_email_fld_txt" <?php echo $ofa_field_txt_style;?>><?php echo $ofa_email_field_txt;?></span></td>
		<td><input type="text" id="ofa_pre_email_fld" name="from" style="width:<?php echo $ofa_txt_box_width;?>px; border:1px solid <?php echo $ofa_txt_box_border_color;?>; background-color:<?php echo $ofa_txt_box_bg_color;?>" /></td></tr>
        <tr><td>&nbsp;</td><td><input name="button" type="button" id="ofa_pre_btn" style="border:1px solid <?php echo $ofa_submit_btn_border_color;?>; border-right-width:2px; border-bottom-width:2px; background-color:<?php echo $ofa_submit_btn_bg_color;?>; color:<?php echo $ofa_submit_btn_txt_color;?>; font-weight:normal" value="<?php echo $ofa_submit_button_txt;?>" /></td></tr>
        <tr><td colspan="2" id="ofa_pre_footer_txt"><?php echo $ofa_pre_footer_txt;?><?php echo $OptinFormAdderPlugin->ofap1;?> style="font-size:xx-small;color:<?php echo $ofa_field_txt_color;?>"><?php echo $OptinFormAdderPlugin->ofap2;?>
      </td>
	  </tr>
	</table>
  </td>
 </tr>
</table>