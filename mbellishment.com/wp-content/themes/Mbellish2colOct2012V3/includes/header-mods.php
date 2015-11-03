<?php 
$header_size = (theme_get_option('header_size'));
$logo_size = (theme_get_option('logo_size'));
$logo_margin = (theme_get_option('logo_margin'));
$widget_margin = (theme_get_option('widget_margin'));
$widget_size = (theme_get_option('widget_size'));

$logo = theme_get_option('logo');
$logo_width = $logo_size['width'];
$logo_height = $logo_size['height'];
$header_width = $header_size['width'];
$header_height = $header_size['height'];
$header_image_margin = $logo_margin['t'] . 'px ' .$logo_margin['r'] . 'px ' . $logo_margin['b'] . 'px ' . $logo_margin['l'] . 'px';
$header_widget_margin = $widget_margin['t'] . 'px ' .$widget_margin['r'] . 'px ' . $widget_margin['b'] . 'px ' . $widget_margin['l'] . 'px'; 
?>
<style type='text/css'>
div.art-logo{top:0;left:0;margin-left:0;width:<?php echo $header_width; ?>px;}
.art-logo	{top:0px;left:0px;width:<?php echo $header_width; ?>px;height:<?php echo $header_height; ?>px;}
.art-logo #imageheader {height:<?php echo $logo_height; ?>px;margin:<?php echo $header_image_margin; ?>;width:<?php echo $logo_width; ?>px;background:url("<?php echo $logo; ?>") no-repeat scroll left top transparent;text-indent:-10000px;float:left;}
.art-logo .headerleft {height:<?php echo $logo_height; ?>px;margin:<?php echo $header_image_margin; ?>;width:<?php echo $logo_width; ?>px;float:left;}
.art-logo .widget-area {float:right;margin:<?php echo $header_widget_margin; ?>;height:<?php echo $widget_size['height']; ?>px;width:<?php echo $widget_size['width']; ?>px;overflow:hidden;}
.art-logo #imageheader a {display:block;height:<?php echo $logo_height; ?>px;}
.art-logo-text #imageheader {text-indent:-10000px;}
</style>
