<?php
$settings = get_current_theme().'-options'; // do not change!
$settings = str_replace(" ","_",$settings);
$defaults = array( // define our defaults
		'tt_version' => "1.1.0",
		'tt_choices' => 'Yes',
		'tt_menu_position' => 'Yes',
		'featured_top_left' => 1,
		'featured_top_num' => 3,
		'featured_top_chars' => 140,
		'featured_top_thumb_width' => 70,
		'featured_top_thumb_height' => 70,
		'featured_top_right' => 1,
		'featured_bottom' => 1,
		'featured_bottom_num' => 3,
		'featured_bottom_chars' => 700,
		'featured_bottom_thumb_width' => 115,
		'featured_bottom_thumb_height' => 115,
		'm3_block_transparent' => 'No',
		'featured5_top_left' => 1,
		'featured5_top_num' => 3,
		'featured5_top_chars' => 140,
		'featured5_top_thumb_width' => 70,
		'featured5_top_thumb_height' => 70,
		'featured5_top_right' => 1,
		'featured5_bottom_left' => 1,
		'featured5_bottom_right' => 1,
		'm5_block_transparent' => 'No',
		'm1_style' => 'Yes',
		'm1_img_height' => 100,
		'm1_img_width' => 100,
		'm1_content_length' => 280,
		'm1_totalposts' => 10,
		'm1_contentheight' => 210,
		'm1_heading_text' => 'The Latest Posts',
		'm1_header_text_include' => 'No',
		'm1_block_transparent' => 'No',
		'm1_block_padding' => 5,
		'm2_style' => 'Yes',
		'm2_page_title_include' => 'No',
		'm2_page_title' => 'The Latest News',
		'm2_content_length' => 700,
		'm2_totalposts' => 10,
		'm2_img_height' => 150,
		'm2_img_width' => 150,
		'm2_block_transparent' => 'No',
		'm2_block_padding' => '0',
		'm4_img_height' => 100,
		'm4_img_width' => 100,  
		'm4_content_length' => 280,
		'm4_totalposts' => 10, 
		'm4_contentheight' => 210,
		'm4_heading_text' => 'The Latest Posts', 
		'm4_header_text_include' => 'No',
		'm4_block_transparent' => 'No',
		'm4_block_padding' => 0,
		'm4w_content_length' => 700,
		'm4w_img_height' => 150,
		'm4w_img_width' => 150,
		'm4w_featured_qty' => 2,
		'm4_cat' => 1,
		'nav_mods' => 'No',
		'blog_content' => 'content',
		'blog_number_posts' => 10,
		'v_items_to_include' => '',
		'h_items_to_include' => '2',
		'footer_widget_enable' => 'No',
		'header_mods_enable' => 'No',
		'comments_closed' => 'No',
		'header_type' => 'Text',
		'analytics' => 'No' // <-- no comma after the last option
);

//	push the defaults to the options database,
//	if options don't yet exist there.
add_option($settings, $defaults, '', 'yes');

/*
///////////////////////////////////////////////
This section hooks the proper functions
to the proper actions in WordPress
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*/
//	this function registers our settings in the db

add_action('admin_init', 'register_theme_settings');
function register_theme_settings() {
	global $settings;
	register_setting($settings, $settings);
}
//	this function adds the settings page to the Appearance tab
add_action('admin_menu', 'add_theme_options_menu');
function add_theme_options_menu() {
	global $menu;
	
	// Create the new separator

	$menu['58.995'] = array( '', 'administrator', 'separator-bts', '', 'wp-menu-separator' );
	add_menu_page('ArtTemplates', 'Theme Options', 'administrator', bts_template_admin, 'art_templates', get_bloginfo('template_url').'/includes/palette-icon-sm.png', '58.996');
	add_submenu_page(bts_template_admin, 'Template Options', 'Template Options', 8, 'bts_template_admin', 'theme_settings_admin');
}

function art_templates()
    { //echo '';
	} 

/*
///////////////////////////////////////////////
This section handles all the admin page
output (forms, update notifications, etc.)
\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
*/
function theme_settings_admin() { ?>
<?php theme_options_css_js(); ?>
<div class="wrap yui-skin-sam">
<?php

	// display the proper notification if Saved/Reset
	global $settings, $defaults;
	if(tt_option('reset')) {
		echo '<div class="updated fade" id="message"><p>'.__('Template Options', 'kubrick').' <strong>'.__('RESET TO DEFAULTS', 'kubrick').'</strong></p></div>';
		update_option($settings, $defaults);
	} elseif($_REQUEST['updated'] == 'true') {
		echo '<div class="updated fade" id="message"><p>'.__('Template Options', 'kubrick').' <strong>'.__('SAVED', 'kubrick').'</strong></p></div>';
	}
	// display icon next to page title
	//screen_icon('page');
?>
<div class="option-title">
	<h2><?php echo 'Theme Options for: ' . get_bloginfo(name); ?></h2>
</div>
	<form method="post" action="options.php">
	<?php settings_fields($settings); // important! ?>
	
<?php include (TEMPLATEPATH."/includes/tab-control.templateer"); ?>
 
	</form>
	<p style="color:#999;text-align:right;">Theme Options Version 1.1.0</p>
</div><!-- wrap end -->


<?php }

// add CSS and JS if necessary
function theme_options_css_js() {
echo <<<CSS

<style type="text/css">
body {margin:0;padding:0;}
	.option-title h2	{
	font:italic 24px/35px Georgia,"Times New Roman","Bitstream Charter",Times,serif;
	margin:0;
	padding:5px 15px 13px 0;
	text-shadow:0 1px 0 #FFFFFF;
	color:#464646;
	}
	h4.sub-title 	{
	margin:10px 0;
	font-weight:bold;
	}
	.metabox-holder { 
		width: 350px; float: left;
		margin: 0px; padding: 0px 10px 0px 0px;
	}
	.metabox-holder-wide { 
		width: 710px; float: left;
		margin: 0px; padding: 0px 10px 0px 0px;
	}
	.metabox-holder ol, .metabox-holder-wide ol {
		list-style-type:decimal;
		margin-left:4em;
	}
	.metabox-holder code, .metabox-holder-wide code {
	padding: 0 3px;
	background: #eee;
	}
	.metabox-holder pre code, .metabox-holder-wide pre code {
	padding: 0;
	}
	.metabox-holder pre, .metabox-holder-wide pre {
	padding: 9px;
	background: #eee;
	border: 1px solid #ccc;
	}
	
	.metabox-holder .postbox .inside, .metabox-holder-wide .postbox .inside {
		padding: 0px 10px 0px 10px;
	}
	.title-postbox	h2 {
		padding: 10px 0px 10px 0px;
		font-size:20px;
		margin-top:10px;
		border-top:1px #ccc dotted;
		}
	p.small-red 	{
		color:#ff0000;
		font-size:11px;
		line-height:12px;
		font-style:italic;
		margin: 0;
	}
		.block-box	{
	float:left;
	margin:0 5px;
	}
	
	.block-boxc	{
	color:#666;
	font-size:10px;
	padding-left:5px;
	}
	
	.clearfix	{
	clear:both;
	}
	hr.seperator {
		border-color:1px dotted ;
		border-style:none none dotted;
		border-width:medium medium 1px;
		margin:0 0 10px;
		padding:0 0 5px;
	}
	pre{overflow:auto;font:.9em Monaco,monospace,Courier,"Courier New";line-height:25px;margin-bottom:25px;padding:9px;background:#eee;border:1px solid #ccc;}
code{font:.9em Monaco,monospace,Courier,"Courier New";padding:0 3px;background:#eee;}
	
	
</style>

CSS;
echo <<<JS

<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".fade").fadeIn(1000).fadeTo(1000, 1).fadeOut(1000);
});
</script>

<script type="text/javascript">
var tabView = new YAHOO.widget.TabView('tab-master');
    var tabView = new YAHOO.widget.TabView('tab-mag-sub');
	var tabView = new YAHOO.widget.TabView('tab-templates-sub');
	var tabView = new YAHOO.widget.TabView('tab-misc-sub');
	var tabView = new YAHOO.widget.TabView('tab-wp3-sub');
</script>
JS;
}


?>