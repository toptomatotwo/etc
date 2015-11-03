<link rel="stylesheet" type="text/css" href="<?php echo OFA_LIBPATH;?>include/style.css" />
<link href="<?php echo OFA_LIBPATH;?>include/tooltip.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo OFA_LIBPATH;?>include/tooltip.js"></script>
<script type="text/javascript"><!--
function __ofaSelectTab(currtab) {
	for ( i=1; i<=4; i++ ) {
		if ( i == currtab ) {
			document.getElementById('ofatab-'+i).style.display = 'block';
			document.getElementById('ofatabhead-'+i).style.position = 'relative';
			document.getElementById('ofatabhead-'+i).style.top = '1px';
			document.getElementById('ofatabhead-'+i).style.borderBottomColor = '#ffffff';
			document.getElementById('ofatabhead-'+i).style.background = "#ffffff url('<?php echo OFA_LIBPATH;?>images/tab-active.gif') top left repeat-x";
		} else {
			document.getElementById('ofatab-'+i).style.display = 'none';
			document.getElementById('ofatabhead-'+i).style.position = 'relative';
			document.getElementById('ofatabhead-'+i).style.top = '0';
			document.getElementById('ofatabhead-'+i).style.borderBottomColor = '#999999';
			document.getElementById('ofatabhead-'+i).style.background = "#ffffff url('<?php echo OFA_LIBPATH;?>images/tab.gif') top left repeat-x";
		}
	}
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
function __ofaShowHideWP(div1, row1, row2) {
	var ofaShowRow = 'block'
	if ( navigator.appName.indexOf('Microsoft') == -1 ) ofaShowRow = 'table-row';
	var div1 = document.getElementById(div1);
	var row1 = document.getElementById(row1);
	var row2 = document.getElementById(row2);
	if ( div1.style == '' || div1.style.display == 'none' ) {
		div1.style.display = 'block';
		row1.style.display = ofaShowRow;
		row2.style.display = ofaShowRow;
	} else if ( div1.style != '' || div1.style.display == 'block' ) { 
		if ( row2.style.display == 'none' ) row2.style.display = ofaShowRow;
		else row2.style.display = 'none';
	}
}
//--></script>
<br /><br />
<ul class="ofatabs">
<li onclick="__ofaSelectTab(1)"><a id="ofatabhead-1" class="<?php echo $ofatabhead_1_cls;?>">Home</a></li>
<li onclick="__ofaSelectTab(2)"><a id="ofatabhead-2" class="<?php echo $ofatabhead_2_cls;?>">Optin Form Settings</a></li>
<li onclick="__ofaSelectTab(3)"><a id="ofatabhead-3" class="<?php echo $ofatabhead_3_cls;?>">Optin Form Format</a></li>
<li onclick="__ofaSelectTab(4)"><a id="ofatabhead-4" class="<?php echo $ofatabhead_4_cls;?>">Optin Form Placement</a></li>
</ul>

<div style="border:1px solid #999999;width:97%;padding:10px 10px 0px 10px">
	<div id="ofatab-1" style="display:<?php echo $ofatab_1_show;?>">
	<?php require_once('form-home.php');?>
	</div>
	<div id="ofatab-2" style="display:<?php echo $ofatab_2_show;?>">
	<?php require_once('form-settings.php');?>
	</div>
	<div id="ofatab-3" style="display:<?php echo $ofatab_3_show;?>">
	<?php require_once('form-format.php');?>
	</div>
	<div id="ofatab-4" style="display:<?php echo $ofatab_4_show;?>">
	<?php require_once('form-placement.php');?>
	</div>
</div>