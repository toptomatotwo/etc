<?php 
$enable_nav_mods = theme_get_option('enable_nav_mods');
$nav_mod_type = theme_get_option('nav_mod_type');
$image_content = theme_get_option('image_content');
$nav_bar_width = theme_get_option('nav_bar_width');
$image_bar_width = theme_get_option('image_bar_width');
$logo_margin = theme_get_option('nav_mod_margin');

$rm_image = theme_get_option('rm_image_margin');
$sbox_padding = $logo_margin['t'] . 'px ' .$logo_margin['r'] . 'px ' . $logo_margin['b'] . 'px ' . $logo_margin['l'] . 'px'; 

$faq = theme_get_option('faq_border');
$faq_font = theme_get_option('faq_font');
$faq_headline = theme_get_option('faq_headline');
?>
<style type='text/css'>

div.faq { 
background-color:<?php echo theme_get_option('faq_background_color'); ?>;
border:<?php echo $faq[width].'px  '.$faq[style].' '.$faq[color]; ?> ;
color:<?php echo $faq_font[color]; ?>;
font-style:<?php echo $faq_font[style]; ?>;
font-family:<?php echo $faq_font[face]; ?>;
font-size:<?php echo $faq_font[size]; ?>;
}
div.page_template_faq h3.faq{
color:<?php echo $faq_headline[color]; ?>;
font-style:<?php echo $faq_headline[style]; ?>;
font-family:<?php echo $faq_headline[face]; ?>;
font-size:<?php echo $faq_headline[size]; ?>;
}
.read-more-image{margin:0px 0 0 0;}
.read-more-image {
margin:<?php echo $rm_image['t'].'px '.$rm_image['r'].'px '.$rm_image['b'].'px '.$rm_image['l'].'px'; ?> !important;
float:<?php echo theme_get_option('float_choice'); ?>  !important;
border:none;
}
</style>
<?php if ($enable_nav_mods == 1) { ?>
<style type='text/css'>
.art-vmenublockcontent-body .sbox	{
display:none;
}

.sbox	{
margin:<?php echo $sbox_padding; ?>;
width:<?php echo $image_bar_width; ?>px;
float:right;
list-style:none;
}

.sbox form.search > input[type="text"] {
    float: right;
    position: relative;
	height: 20px;

}

.sbox form.search > input[type="submit"] {
	margin-top: 2px;
}

.sbox .search	{

}

.art-nav-outer {
    float: left;

}

.sbox input.art-search-text{
 /*height:16px;
 padding:4px;
 font-size:12px;
 width: 100%;*/

}


</style>
<?php } ?>