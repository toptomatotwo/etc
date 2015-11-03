<style type="text/css">
table, tbody, tfoot, thead, tr, th, td {
	padding: 3px;
}
</style>
<?php
if ( $wizard == 1 ) echo '<h3 class="ofa_h3">Step 3 of 3: Place your optin form in your blog</h3>'; 
else '<br>';
?>
<form name="ofa_form3" method="post" action="">
<table cellpadding="7" cellspacing="1" width="100%" style="border:1px solid #dddddd; background-color:#f1f1f1; padding:0">
 <tr>
  <td style="background-color:#f1f1f1"><strong>Where to place the optin form: </strong></td>
 </tr>
 <tr>
   <td style="background-color:#ffffff"><input type="checkbox" name="ofa[within_post]" id="ofa_within_post" value="1" <?php echo $ofa_within_post_chk;?> onclick="__ofaShowHideRow(this,'ofa_wp_1','ofa_wp_main');">
   <strong>Within Post</strong> (<a style="cursor:hand;cursor:pointer" onclick="__ofaShowHideWP('ofa_wp_main','ofa_wp_1','ofa_wp_2')">Adjust Alignment</a>)
	 <div id="ofa_wp_main" style="display:<?php echo $ofa_wp_main_display;?>">
	 <table cellpadding="3" cellspacing="1" align="right" border="0" width="97%" style="border:1px solid #f1f1f1; background-color:#f8f8f8">
	   <tr id="ofa_wp_1" style="display:<?php echo $ofa_wp_1_display;?>">
		 <td width="100%" valign="top">Show in post: 
		 <input type="checkbox" name="ofa[wp_show_in_all]" id="ofa_wp_show_in_all" value="1" <?php echo $wp_show_in_all_chk;?> onclick="__ofaDisableOtherPosts(this);"> All &nbsp; 
		 <?php 
		 for ( $i=1; $i<=10; $i++ ) { 
			$fld_wp_show_in = 'wp_show_in_'.$i;
			$wp_show_in_checked = ($$fld_wp_show_in == 1) ? 'checked' : '';
			?>
			<input type="checkbox" name="ofa[wp_show_in_<?php echo $i;?>]" id="wp_show_in_<?php echo $i;?>" value="1" <?php echo $wp_show_in_checked;?>> <?php echo $i;?> &nbsp; 
		 <?php } ?>	</td>
	   </tr>
	   <tr id="ofa_wp_2" style="display:none">
		 <td valign="top">
		   <table cellpadding="3" cellspacing="1" border="0" width="100%" style="border:1px solid #f1f1f1">
			<tr>
			 <td style="background-color:#ffffff" width="8%">Position: </td>
			 <td style="background-color:#ffffff">
			 <select name="ofa[wp_position]" id="ofa_wp_position">
			  <option value="top" <?php echo $wp_position_top;?>>Top</option>
			  <option value="bottom" <?php echo $wp_position_bottom;?>>Bottom</option>
			 </select>
			 </td>
			</tr>
			<tr>
			 <td style="background-color:#fcfcfc">Alignment: </td>
			 <td style="background-color:#fcfcfc">
			 <select name="ofa[wp_alignment]" id="ofa_wp_alignment">
			  <option value="left" <?php echo $wp_alignment_left;?>>Left</option>
			  <option value="center" <?php echo $wp_alignment_center;?>>Center</option>
			  <option value="right" <?php echo $wp_alignment_right;?>>Right</option>
			 </select>
			 </td>
			</tr>
			<tr>
			 <td style="background-color:#ffffff" colspan="2"> 
			 <input type="checkbox" name="ofa[wp_wrap]" id="wp_wrap" value="1" <?php echo $wp_wrap_chk;?> /> Wrap Text &nbsp;
			 <a href="#" onMouseover="tooltip('<?php echo $ofa_wrap_txt_tooltip;?>',220)" onMouseout="hidetooltip()" style="border-bottom:none;"><img src="<?php echo OFA_LIBPATH;?>images/help.gif" border="0" align="absmiddle" /></a>
			 </td>
			</tr>
		   </table>
		  </td>
	   </tr>
	 </table>
	 </div></td>
 </tr>
 
 <tr>
   <td style="background-color:#f8f8f8"><input type="checkbox" name="ofa[within_single_post]" id="ofa_within_single_post" value="1" <?php echo $ofa_within_single_post_chk;?> onclick="__ofaShowHideRow(this,'ofa_wsp_1','ofa_wsp_main');">
   <strong>Within Single Post </strong> (<a style="cursor:hand;cursor:pointer" onclick="__ofaShowHideWP('ofa_wsp_main','ofa_wsp_1','ofa_wsp_2')">Adjust Alignment</a>)
	 <div id="ofa_wsp_main" style="display:<?php echo $ofa_wsp_main_display;?>">
	 <table cellpadding="3" cellspacing="1" align="right" border="0" width="97%" style="border:1px solid #f1f1f1">
	   <tr id="ofa_wsp_1" style="display:<?php echo $ofa_wsp_1_display;?>">
		 <td style="background-color:#ffffff" width="100%" valign="top">Position: &nbsp;  
			<select name="ofa[wsp_position]" id="ofa_wsp_position">
			<option value="top" <?php echo $wsp_position_top;?>>Top</option>
			<option value="bottom" <?php echo $wsp_position_bottom;?>>Bottom</option>
			</select>
		 </td>
	   </tr>
	   <tr id="ofa_wsp_2" style="display:none">
		 <td style="background-color:#ffffff" valign="top">
		   <table cellpadding="3" cellspacing="1" border="0" width="100%" style="border:1px solid #f8f8f8">
			<tr>
			 <td style="background-color:#f8f8f8" width="8%">Alignment: </td>
			 <td style="background-color:#f8f8f8">
			 <select name="ofa[wsp_alignment]" id="ofa_wsp_alignment">
			  <option value="left" <?php echo $wsp_alignment_left;?>>Left</option>
			  <option value="center" <?php echo $wsp_alignment_center;?>>Center</option>
			  <option value="right" <?php echo $wsp_alignment_right;?>>Right</option>
			 </select>
			 </td>
			</tr>
			<tr>
			 <td style="background-color:#fcfcfc" colspan="2"> 
			 <input type="checkbox" name="ofa[wsp_wrap]" id="ofa_wsp_wrap" value="1" <?php echo $wsp_wrap_chk;?> /> Wrap Text &nbsp;
			 <a href="#" onMouseover="tooltip('<?php echo $ofa_wrap_txt_tooltip;?>',220)" onMouseout="hidetooltip()" style="border-bottom:none;"><img src="<?php echo OFA_LIBPATH;?>images/help.gif" border="0" align="absmiddle" /></a>
			 </td>
			</tr>
		   </table>
		  </td>
	   </tr>
	 </table>
	 </div></td>
 </tr>
 
 <tr>
  <td style="background-color:#ffffff"><strong><a href="<?php echo OFA_SITEURL;?>/wp-admin/widgets.php" target="_blank">Sidebar Widget</a></strong>
  <a href="#" onMouseover="tooltip('<?php echo $ofa_in_widget_tooltip;?>',440)" onMouseout="hidetooltip()" style="border-bottom:none;"><img src="<?php echo OFA_LIBPATH;?>images/help.gif" border="0" align="absmiddle" /></a></td>
 </tr>
 <tr>
  <td style="background-color:#f8f8f8">
  <input type="hidden" name="s" value="4" />
  <input type="submit" name="ofa[finish]" value="<?php echo $btn_txt;?>" class="button" style="font-weight:bold" /></td>
 </tr>
 
</table>
<br />
</form>