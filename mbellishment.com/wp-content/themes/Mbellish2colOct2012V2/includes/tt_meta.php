<?php
global $custom_sidebar_style,$custom_sidebar,$custom_back,$sb_primary,$sb_secondary,$sidebar_swap,$sb_change ;
$meta_test2 = $custom_sidebar->the_meta();
$sb_change = $meta_test2['sidebar_change'];
$sb_primary = $meta_test2['sb_primary'];
$sb_secondary = $meta_test2['sb_secondary'];
$sidebar_swap = $meta_test2['sidebar_swap'];
if ($sidebar_swap != 'Yes') {$sb_primary = 'default'; $sb_secondary = 'secondary';}
$sb_style = $meta_test2['sl_pos'];
$primary_width = $meta_test2['primary_width'];
$secondary_width = $meta_test2['secondary_width'];
$special_width = $meta_test2['special_width'];
global $primary_width, $secondary_width, $special_width;
$meta_test3 = $custom_back->the_meta();
$back_change = $meta_test3['back_change'];
$background_color = $meta_test3['background_color'];
$background_url = $meta_test3['background_url'];
$background_repeat = $meta_test3['background_repeat'];
$header_change = $meta_test3['header_change'];
$header2_change = $meta_test3['header2_change'];
$header_url = $meta_test3['header_url']; 
$header_position = $meta_test3['header_position'];
$header_position2 = $meta_test3['header_position2'];
$header_url2 = $meta_test3['header_url2'];
$css_prefix = ttsbg_option('css_prefix');
switch ( $header_position ) {case 'div.art-header' : $header_position1 = 'div.'.$css_prefix . 'header'; break; case '.art-header:after': $header_position1 = '.'.$css_prefix . 'header:after'; break;  case '.art-header:before': $header_position1 = '.'.$css_prefix . 'header:before'; break;}
switch ( $header_position2 ) {case 'div.art-header' : $header_pos2 = 'div.'.$css_prefix . 'header'; break;  case '.art-header:after': $header_pos2 = '.'.$css_prefix . 'header:after';break; case '.art-header:before':$header_pos2 = '.'.$css_prefix . 'header:before'; break;}
global $back_change, $background_color, $background_url, $background_repeat;
if ($back_change) {?><style type='text/css'>body {background: #<?php echo $background_color; ?> url("<?php echo $background_url; ?>") <?php echo $background_repeat ;?>;} #art-page-background-middle-texture {background: none;}</style><?php } 
if ($header2_change) { ?><style type='text/css'><?php echo $header_pos2; ?>{background-image: url('<?php echo $header_url2; ?>'); } </style> <?php } 
if ($header_change) { ?> <style type='text/css'><?php echo $header_position1; ?>{ background-image: url('<?php echo $header_url; ?>'); }  </style> <?php } 
if ($sb_change == 'Yes' ) { ?><style type='text/css'>.art-content-layout .art-sidebar2 {width:<?php echo $secondary_width;?>px;} .art-content-layout .art-sidebar1{width: <?php echo $primary_width;?>px;}</style><?php } 
?>
