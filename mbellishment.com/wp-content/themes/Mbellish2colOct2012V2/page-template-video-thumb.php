<?php
/*
Template Name: Video Thumbnail Gallery
*/
?>
<?php 
get_header();
include get_template_directory()."/includes/tt_meta.php"; 
global $custom_metabox_video_thumb;
$meta_test1 = $custom_metabox_video_thumb->the_meta();
$hp_widgetized_position = $meta_test1['hp_widgetized_position'];
$hp_top_margin_choose = $meta_test1['hp_top_margin_choose'];
$hp_top_margin_t = $meta_test1['hp_top_margin_t']; if ($hp_top_margin_t == '') $hp_top_margin_t = 0; 
$hp_top_margin_r = $meta_test1['hp_top_margin_r']; if ($hp_top_margin_r == '') $hp_top_margin_r = 0; 
$hp_top_margin_b = $meta_test1['hp_top_margin_b']; if ($hp_top_margin_b == '') $hp_top_margin_b = 0; 
$hp_top_margin_l = $meta_test1['hp_top_margin_l']; if ($hp_top_margin_l == '') $hp_top_margin_l = 0;
$hp_top_margin = $hp_top_margin_t.'px '.$hp_top_margin_r.'px '.$hp_top_margin_b.'px '.$hp_top_margin_l.'px' ;
$hp_widgetized_show = $meta_test1['hp_widgetized_show'];
$home_page_top = $meta_test1['home_page_top'];
$home_page_widget_size = $meta_test1['home_page_widget_size'];
$home_page_widget_style = $meta_test1['home_page_widget_style'];
$m1_h2_change = $meta_test1['m1_h2_change'];
$m1_h2_size = $meta_test1['m1_h2_size'];
$all_cats = $meta_test1['all_cats'];
$column_count = $meta_test1['column_count'];
$m1_cat = $meta_test1['m1_cat'];
if ($all_cats == 'Yes') {$m1_cat = '';}
$m2_img_height = $meta_test1['m1_img_height'];
$m2_img_width = $meta_test1['m1_img_width']; 
$hp_mid_image_shadow = $meta_test1['hp_mid_image_shadow'];
$img_pos1 = $meta_test1['img_pos1'];
if ( $img_pos1 =='' ) {$img_pos1 = 'Above';}
$m2_content_length = $meta_test1['m1_content_length'];
$m1_totalposts = $meta_test1['m1_totalposts']; 
$m1_contentheight = $meta_test1['m1_contentheight'];
$m1_heading_text = $meta_test1['m1_heading_text'];
$m1_block_transparent = $meta_test1['m1_block_transparent'];
$m1_block_padding_choose = $meta_test1['m1_block_padding_choose'];
$m1_block_margin_choose = $meta_test1['m1_block_margin_choose'];
$m2_style = $meta_test1['m1_style'];
if ($m2_style == '') {$m2_style = 'theme_post_wrapper';}
$m1_block_padding_t = $meta_test1['m1_block_padding_t']; if ($m1_block_padding_t == '') $m1_block_padding_t = '0'; $m1_block_padding_r = $meta_test1['m1_block_padding_r']; if ($m1_block_padding_r == '') $m1_block_padding_r = '0'; $m1_block_padding_b = $meta_test1['m1_block_padding_b']; if ($m1_block_padding_b == '') $m1_block_padding_b = '0'; $m1_block_padding_l = $meta_test1['m1_block_padding_l']; if ($m1_block_padding_l == '') $m1_block_padding_l = '0';
$m1_block_padding = $m1_block_padding_t.'px '.$m1_block_padding_r.'px '.$m1_block_padding_b.'px '.$m1_block_padding_l.'px' ;
$m1_block_margin_t = $meta_test1['m1_block_margin_t']; if ($m1_block_margin_t == '') $m1_block_margin_t = 0; $m1_block_margin_r = $meta_test1['m1_block_margin_r']; if ($m1_block_margin_r == '') $m1_block_margin_r = 0; $m1_block_margin_b = $meta_test1['m1_block_margin_b']; if ($m1_block_margin_b == '') $m1_block_margin_b = 0; $m1_block_margin_l = $meta_test1['m1_block_margin_l']; if ($m1_block_margin_l == '') $m1_block_margin_l = 0;
$m1_block_margin = $m1_block_margin_t.'px '.$m1_block_margin_r.'px '.$m1_block_margin_b.'px '.$m1_block_margin_l.'px' ;
$show = $meta_test1['show'];
$video_width = $meta_test1['video_width'];
$video_height = $meta_test1['video_height'];
$feat_img = $meta_test1['feat_img'];
if (is_paged()) $is_paged = true;
?>
<style type='text/css'>
.video-thumb {width:<?php echo $video_width; ?>px;height:<?php echo $video_height; ?>px;}
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
.top-page	{padding:10px 0 0 10px;}
.top-page .art-block-body	{padding:4px;}
.top-title .art-blockheader	{margin-bottom:0;}
.mini-post	{float:left;overflow:hidden;width:<?php echo $column_count; ?>%;}
<?php if ($m1_h2_change == 'Yes') { ?>
.mini-post .art-post h2.art-postheader, .mini-post .art-post h2.art-postheader a, .mini-post .art-post h2.art-postheader a:link, .mini-post .art-post h2.art-postheader a:visited, .mini-post .art-post h2.art-postheader a.visited, .mini-post .art-post h2.art-postheader a:hover, .mini-post .art-post h2.art-postheader a.hovered {font-size:<?php echo $m1_h2_size; ?>px;} <?php } ?>
.mini-post .art-block a:link,.mini-post .art-block a:visited	{text-decoration:none;color:inherit;}
.mini-post .art-block img 	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
<?php if ($m1_block_padding_choose == 'Yes') { ?>.mini-post .art-blockcontent-body {padding:<?php echo $m1_block_padding ; ?>;}<?php } ?>
.mini-post .art-blockcontent-body {height: <?php echo $m1_contentheight.'px;' ; ?>px;}
<?php if ($m1_block_transparent == 'Yes') { ?>.art-content-layout .art-content .mini-post .art-block {background-color:transparent;}<?php } ?>
.mini-post .art-post img	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
.mini-post .art-post	 {height: <?php echo $m1_contentheight.'px;' ; ?>px;}
<?php if ($m1_block_padding_choose == 'Yes') { ?>.mini-post .art-postcontent p {padding:<?php echo $m1_block_padding ; ?>;}<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">
.mini-post .art-blockheader, .wide-post .art-blockheader	{margin-bottom:10px;}

</style>
<![endif]--> 
<?php 
if ($hp_widgetized_position == 'Above') { 
if ( $hp_widgetized_show == 'Yes') {
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
}
} 
$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} 
?>
<?php if ($sb_change == 'Yes') { ?>
<!-- Start sidebar modifications --> 
 <div class="art-content-layout">
    <div class="art-content-layout-row">
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-t.php"); ?>
         <div class="art-layout-cell art-content">
<!-- End sidebar modifications   --> 
<?php } else { ?>
<?php tt_get_header_layout(); ?>
<?php } ?>
<?php  if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && !theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} ?>
<?php 
if ($hp_widgetized_position == 'Below') { 
if ( $hp_widgetized_show == 'Yes') {
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
}
} ?>
	<?php 
	if (!is_paged())  {
	if ($show == 'Yes') { 
		while (have_posts()) {
		the_post();
		get_template_part('content', 'minimum');
		}
	}

}	?>
<?php $temp_query = clone $wp_query;
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}

			$query = ('cat='.$m1_cat.'&showposts='.$m1_totalposts.'&paged='.$paged);
			If (is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			} else {$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
			query_posts($query);
			while ( have_posts() ) : the_post();
			
			tt_get_post_content();
		?>
<div class="mini-post">
<?php 
	global $post;ob_start();the_content_limit($m2_content_length,'');$video_content =ob_get_clean();
		ob_start();if ( function_exists( 'video_thumbnail' ) ) {video_thumbnail();}$video_thumbnail = ob_get_clean();
	$m2_style(
		array(
			'id' => theme_get_post_id(), 
			'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>', 
			'class' => theme_get_post_class(),
			'content' => '<a href="' . get_permalink( $post->ID ) . '" ><img class="video-thumb" src="' . $video_thumbnail . '" /></a>' . $video_content
	));
	

?>
</div>
<?php endwhile; ?>

<div class="cleared"></div>
<?php theme_page_navigation(); $wp_query = clone $temp_query;?>
<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>
<div class="cleared"></div>
<?php if ($sb_change == 'Yes') { ?>
          <div class="cleared"></div>
        </div>
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-b.php"); ?>
     </div>
</div>
<div class="cleared"></div>
<?php } else { ?>
<?php tt_get_footer_layout(); ?>
<?php } ?>
<?php 
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');}
get_footer(); ?>