<?php
/*
Template Name: Magazine 4a
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_mag4;
$meta_test1 = $custom_metabox_mag4->the_meta();
$home_page_sheet_style = $meta_test1['home_page_sheet_style'];
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
$m4_img_height = $meta_test1['m4_img_height'] ;
$m4_img_width = $meta_test1['m4_img_width'];  
$m4_content_length = $meta_test1['m4_content_length'] ;
$m4_totalposts = $meta_test1['m4_totalposts'] ;
$m4_contentheight = $meta_test1['m4_contentheight'] ;
$m4_heading_text = $meta_test1['m4_heading_text'] ;
$m4_header_text_include = $meta_test1['m4_header_text_include'] ;
$h2_change = $meta_test1['h2_change'] ;
$h2_size = $meta_test1['h2_size'] ;
$m4_block_transparent = $meta_test1['m4_block_transparent'] ;
$m4w_content_length = $meta_test1['m4w_content_length'] ;
$m4w_img_height = $meta_test1['m4w_img_height'] ;
$m4w_img_width = $meta_test1['m4w_img_width'] ;
$all_cats = $meta_test1['all_cats'];
$m4_cat = $meta_test1['m4_cat'] ;
if ($all_cats == 'Yes') {$m4_cat = '';}
$m4w_featured_qty = $meta_test1['m4w_featured_qty'] ;
$m4w_block_padding_choose = $meta_test1['m4w_block_padding_choose'] ;
$m4w_block_margin_choose = $meta_test1['m4w_block_margin_choose'] ;
$m4_block_padding_choose = $meta_test1['m4_block_padding_choose'] ;
$m4_block_margin_choose = $meta_test1['m4_block_margin_choose'] ;
$m4_style = $meta_test1['m4_style'] ;
$m4_header_style = $meta_test1['m4_header_style'] ;
$m4_block_padding_t = $meta_test1['m4_block_padding_t']; if ($m4_block_padding_t == '') $m4_block_padding_t = 0; $m4_block_padding_r = $meta_test1['m4_block_padding_r']; if ($m4_block_padding_r == '') $m4_block_padding_r = 0; $m4_block_padding_b = $meta_test1['m4_block_padding_b']; if ($m4_block_padding_b == '') $m4_block_padding_b = 0; $m4_block_padding_l = $meta_test1['m4_block_padding_l']; if ($m4_block_padding_l == '') $m4_block_padding_l = 0;
$m4_block_padding = $m4_block_padding_t.'px '.$m4_block_padding_r.'px '.$m4_block_padding_b.'px '.$m4_block_padding_l.'px' ;
$m4_block_margin_t = $meta_test1['m4_block_margin_t']; if ($m4_block_margin_t == '') $m4_block_margin_t = 0; $m4_block_margin_r = $meta_test1['m4_block_margin_r']; if ($m4_block_margin_r == '') $m4_block_margin_r = 0; $m4_block_margin_b = $meta_test1['m4_block_margin_b']; if ($m4_block_margin_b == '') $m4_block_margin_b = 0; $m4_block_margin_l = $meta_test1['m4_block_margin_l']; if ($m4_block_margin_l == '') $m4_block_margin_l = 0;
$m4_block_margin = $m4_block_margin_t.'px '.$m4_block_margin_r.'px '.$m4_block_margin_b.'px '.$m4_block_margin_l.'px' ;
$m4w_block_padding_t = $meta_test1['m4w_block_padding_t']; if ($m4w_block_padding_t == '') $m4w_block_padding_t = 0; $m4w_block_padding_r = $meta_test1['m4w_block_padding_r']; if ($m4w_block_padding_r == '') $m4w_block_padding_r = 0; $m4w_block_padding_b = $meta_test1['m4w_block_padding_b']; if ($m4w_block_padding_b == '') $m4w_block_padding_b = 0; $m4w_block_padding_l = $meta_test1['m4w_block_padding_l']; if ($m4w_block_padding_l == '') $m4w_block_padding_l = 0;
$m4w_block_padding = $m4w_block_padding_t.'px '.$m4w_block_padding_r.'px '.$m4w_block_padding_b.'px '.$m4w_block_padding_l.'px' ;
$m4w_block_margin_t = $meta_test1['m4w_block_margin_t']; if ($m4w_block_margin_t == '') $m4w_block_margin_t = 0; $m4w_block_margin_r = $meta_test1['m4w_block_margin_r']; if ($m4w_block_margin_r == '') $m4w_block_margin_r = 0; $m4w_block_margin_b = $meta_test1['m4w_block_margin_b']; if ($m4w_block_margin_b == '') $m4w_block_margin_b = 0; $m4w_block_margin_l = $meta_test1['m4w_block_margin_l']; if ($m4w_block_margin_l == '') $m4w_block_margin_l = 0;
$m4w_block_margin = $m4w_block_margin_t.'px '.$m4w_block_margin_r.'px '.$m4w_block_margin_b.'px '.$m4w_block_margin_l.'px' ;
$show = $meta_test1['show'];
$feat_img = $meta_test1['feat_img'];
$feat_img1 = $meta_test1['feat_img1'];
$hp_mid_image_shadow = $meta_test1['hp_mid_image_shadow'];
$hp_mid_image_shadow1 = $meta_test1['hp_mid_image_shadow1'];
if (is_paged()) $is_paged = true; ?>
<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
.top-page	{padding:10px 0 0 10px;}
.top-page .art-block-body	{padding:4px;}
.top-title .art-blockheader	{margin-bottom:0;}
<?php if ($h2_change == 'Yes') { ?>.mini-post h2.art-postheader,.mini-post h2.art-postheader a, h2.art-postheader a:link {font-size: <?php echo $h2_size; ?>px;}<?php } ?>
.mini-post	{float:left;overflow:hidden;width:50%;}
.mini-post .art-blockheader	{overflow:hidden;margin-bottom: 0;}
.mini-post .art-block img	{float:left;<?php if ($m4_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4_block_margin; ?>;<?php } ?>}
.mini-post .art-article img	{float:left;<?php if ($m4_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4_block_margin; ?>;<?php } ?>}
.mini-post .art-block a:link,.mini-post .art-block a:visited	{text-decoration:none;color:inherit;}
.mini-post .art-blockcontent {height: <?php echo $m4_contentheight.'px;' ; ?>px;}
.mini-post .art-post-body{height: <?php echo $m4_contentheight.'px;' ; ?>px;}
<?php if ($m4_block_padding_choose == 'Yes') { ?>.mini-post .art-blockcontent-body 	{padding:<?php echo $m4_block_padding; ?>;}<?php } ?>
<?php if ($m4w_block_padding_choose == 'Yes') { ?>.wide-post .art-blockcontent-body 	{padding:<?php echo $m4w_block_padding; ?>;}<?php } ?>
.wide-post .art-block a:link,.wide-post .art-block a:visited	{color:inherit;	text-decoration:none;}
<?php if ($m4w_block_padding_choose == 'Yes') { ?>.wide-post .art-postcontent  {padding:<?php echo $m4w_block_padding; ?>}<?php } ?>
<?php if ($m4_block_padding_choose == 'Yes') { ?>.mini-post .art-postcontent  {padding:<?php echo $m4_block_padding; ?>}<?php } ?>
.wide-post .art-article img	{float:left;<?php if ($m4w_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4w_block_margin; ?>;<?php } ?>}
.wide-post .art-block img	{float:left;<?php if ($m4w_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4w_block_margin; ?>;<?php } ?>}
<?php if ($m4_block_transparent == 'Yes') { ?>
.art-content-layout .art-content .mini-post .art-block {background-color:transparent;}
.art-content-layout .art-content .wide-post .art-block	{background-color:transparent;}
<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">

.mini-post	{float:left;overflow:hidden;width:49.9%;}
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
		the_post();
		get_template_part('content', 'minimum');
			}

}	?>

		<?php
		$temp_query = clone $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$postnum = 0;
			$m4_query = ('cat='.$m4_cat.'&showposts='.$m4_totalposts.'&paged='.$paged);

			$wp_query = new WP_Query($m4_query);
			while($wp_query->have_posts()) : $wp_query->the_post();$postnum++;
		
		if ( $postnum <= $m4w_featured_qty && !$is_paged ) { ?>
		
<div class="wide-post">
<?php 
	global $post;
	$m4_style(
		array(
			'id' => theme_get_post_id(), 
			'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>', 
			'class' => theme_get_post_class(),
			'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img1,
											'image_width' => $m4w_img_width,
											'image_height' => $m4w_img_height,
											'img_pos' => 'Before',
											'img_shad' => $hp_mid_image_shadow,
											'content_length' => $m4w_content_length
											)
		)
	));
 
  ?>

</div>		
	<?php } else { ?>		
<div class="mini-post">
<?php 
	global $post;
	$m4_style(
		array(
				'id' => theme_get_post_id(), 
				'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>', 
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img,
											'image_width' => $m4_img_width,
											'image_height' => $m4_img_height,
											'img_pos' => 'Before',
											'img_shad' => $hp_mid_image_shadow1,
											'content_length' => $m4_content_length
											)
		)
	));
 ?>

</div>	
<?php } endwhile; ?>
<div class="cleared"></div>
<?php theme_page_navigation();?>
<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} 
  $wp_query = clone $temp_query; ?>
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
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>
<?php include (get_template_directory().'/footer.php'); ?>