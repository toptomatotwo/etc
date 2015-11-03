<?php 
$header_widget_margin = (tt_option('header_widget_t')) . 'px ' .(tt_option('header_widget_r')) . 'px ' . (tt_option('header_widget_b')) . 'px ' . (tt_option('header_widget_l')) . 'px';
$header_image_margin = (tt_option('header_image_t')) . 'px ' .(tt_option('header_image_r')) . 'px ' . (tt_option('header_image_b')) . 'px ' . (tt_option('header_image_l')) . 'px'; 
?>
<style type='text/css'>
.art-logo	{top:0px;left:0px;width:<?php echo tt_option('header_width'); ?>px;height:<?php echo tt_option('header_height'); ?>px;}
.art-logo #imageheader {height:<?php echo tt_option('logo_height'); ?>px;margin:<?php echo $header_image_margin; ?>;width:<?php echo tt_option('logo_width'); ?>px;background:url("<?php bloginfo('template_url'); ?>/images/<?php echo tt_option('logo_name'); ?>") no-repeat scroll left top transparent;text-indent:-10000px;float:left;}
.art-logo .headerleft {height:<?php echo tt_option('logo_height'); ?>px;margin:<?php echo $header_image_margin; ?>;width:<?php echo tt_option('logo_width'); ?>px;float:left;}
.art-logo .widget-area {float:right;margin:<?php echo $header_widget_margin; ?>;height:<?php echo tt_option('widget_height'); ?>px;width:<?php echo tt_option('widget_width'); ?>px;overflow:hidden;}
.art-logo #imageheader a {display:block;height:<?php echo tt_option('logo_height'); ?>px;}
</style>
