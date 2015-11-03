<style type="text/css">
table, tbody, tfoot, thead, tr, th, td {
	padding: 3px;
}
</style>
<h4 class="ofa_h4"><?php echo $this->img_wand;?> <a href="<?php echo OFA_SITEURL;?>/wp-admin/<?php echo $this->plugin_pg;?>?<?php echo $ofa_get_vars;?>w=1&s=1">Run Quick Setup Wizard &raquo;</a></h4>

&nbsp;&nbsp;&nbsp;&nbsp;&raquo; <a href="<?php echo OFA_SITEURL;?>/wp-admin/<?php echo $this->plugin_pg;?>?<?php echo $ofa_get_vars;?>s=1"><strong>Optin Form Settings</strong></a><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&raquo; <a href="<?php echo OFA_SITEURL;?>/wp-admin/<?php echo $this->plugin_pg;?>?<?php echo $ofa_get_vars;?>s=2"><strong>Optin Form Format</strong></a><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&raquo; <a href="<?php echo OFA_SITEURL;?>/wp-admin/<?php echo $this->plugin_pg;?>?<?php echo $ofa_get_vars;?>s=3"><strong>Optin Form Placement</strong></a><br /><br />

<h3><a onclick="__ofaShowHide('ofa_cb_div','ofa_cb_div_img', 1);" style="cursor:hand;cursor:pointer"><img src="<?php echo OFA_LIBPATH?>images/plus.gif" id="ofa_cb_div_img" border="0" />More Options</a></strong>
<div id="ofa_cb_div" style="display:none">
 <table width="100%" cellspacing="0" cellpadding="3" style="border:1px solid #f1f1f1; background-color:#f8f8f8; padding:0">
  <form action="" method="post">
  <tr>
   <td><strong>Clickbank ID:</strong>
   <input type="text" name="ofa[cb_id]" id="ofa_cb_id" value="<?php echo $this->ofa_cbid;?>" style="width:120px;" /> 
   <a href="#" onMouseover="tooltip('<?php echo $ofa_cb_tooltip;?>',320)" onMouseout="hidetooltip()" style="border-bottom:none;"><img src="<?php echo OFA_LIBPATH;?>images/help.gif" border="0" align="absmiddle" /></a> &nbsp; 
   <a href="http://www.maxblogpress.com/affiliate-signup/" target="_blank">Join our affiliate program</a></td>
 </tr>
 <tr><td><input type="hidden" name="s" value="home" />
 <input type="submit" name="ofa[more_options]" value="Save" class="button" /></td></tr>
 </form>
</table>
</div>