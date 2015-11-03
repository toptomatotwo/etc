<?php
add_action('wp_head','tt_head_functions');
function tt_head_functions() { 
	if ( theme_get_option('header_mods_enable') == 1 ) { include get_template_directory()."/includes/header-mods.php";}

	If (theme_get_option('custom_css_code') <> '') { ?> <style type="text/css"> <?php echo stripslashes(theme_get_option('custom_css_code')); ?> </style> <?php }

	include get_template_directory()."/additional-styles.php";
 }

add_action('tt_body_top','tt_body_top_functions');
function tt_body_top_functions() { 
	if ( theme_get_option('cust_header') == 1 ) { include get_template_directory()."/includes/cust_header_image.php";}
}

