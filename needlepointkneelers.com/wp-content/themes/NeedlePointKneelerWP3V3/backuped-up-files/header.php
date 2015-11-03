<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php if (is_home () ) { bloginfo('name'); } elseif ( is_category() ) { single_cat_title(); if(get_bloginfo('name') != "") echo ' - ' ; bloginfo('name'); }
elseif (is_single() ) { single_post_title(); }
elseif (is_page() ) { bloginfo('name'); if(get_bloginfo('name') != "") echo ': '; single_post_title(); }
 else { wp_title('',true); } ?></title>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'kubrick'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" /> 
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="art-main">
<div class="art-sheet">
    <div class="art-sheet-tl"></div>
    <div class="art-sheet-tr"></div>
    <div class="art-sheet-bl"></div>
    <div class="art-sheet-br"></div>
    <div class="art-sheet-tc"></div>
    <div class="art-sheet-bc"></div>
    <div class="art-sheet-cl"></div>
    <div class="art-sheet-cr"></div>
    <div class="art-sheet-cc"></div>
    <div class="art-sheet-body">
<div class="art-header">
    <div class="art-header-jpeg"></div>

</div>
<div class="art-nav">
	<div class="l"></div>
	<div class="r"></div>
	<ul class="art-menu">
		<?php art_menu_items(); ?>
	</ul>
</div>
