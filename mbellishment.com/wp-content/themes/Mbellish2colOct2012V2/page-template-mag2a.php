<?php
/*
Template Name: Magazine 2a
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_mag2;
$meta_test1 = $custom_metabox_mag2->the_meta();
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
$m2_page_title = $meta_test1['m2_page_title'];
$m2_content_length = $meta_test1['m2_content_length'] ; 
$m2_totalposts = $meta_test1['m2_totalposts'];
$all_cats = $meta_test1['all_cats']; 
$m2_cat = $meta_test1['m2_cat'];
if ($all_cats == 'Yes') {$m2_cat = '';}
$m2_img_height = $meta_test1['m2_img_height'];
$m2_img_width = $meta_test1['m2_img_width'];
$m2_header_text_include = $meta_test1['m2_page_title_include'];
$m2_block_transparent = $meta_test1['m2_block_transparent'];
$m2_block_padding_choose = $meta_test1['m2_block_padding_choose'];
$m2_block_margin_choose = $meta_test1['m2_block_margin_choose'];
$m2_block_padding_t = $meta_test1['m2_block_padding_t']; if ($m2_block_padding_t == '') $m2_block_padding_t = 0; 
$m2_block_padding_r = $meta_test1['m2_block_padding_r']; if ($m2_block_padding_r == '') $m2_block_padding_r = 0; 
$m2_block_padding_b = $meta_test1['m2_block_padding_b']; if ($m2_block_padding_b == '') $m2_block_padding_b = 0; 
$m2_block_padding_l = $meta_test1['m2_block_padding_l']; if ($m2_block_padding_l == '') $m2_block_padding_l = 0; 
$m2_block_padding = $m2_block_padding_t.'px '.$m2_block_padding_r.'px '.$m2_block_padding_b.'px '.$m2_block_padding_l.'px' ;
$m2_block_margin_t = $meta_test1['m2_block_margin_t']; if ($m2_block_margin_t == '') $m2_block_margin_t = 0; 
$m2_block_margin_r = $meta_test1['m2_block_margin_r']; if ($m2_block_margin_r == '') $m2_block_margin_r = 0; 
$m2_block_margin_b = $meta_test1['m2_block_margin_b']; if ($m2_block_margin_b == '') $m2_block_margin_b = 0; 
$m2_block_margin_l = $meta_test1['m2_block_margin_l']; if ($m2_block_margin_l == '') $m2_block_margin_l = 0;
$m2_block_margin = $m2_block_margin_t.'px '.$m2_block_margin_r.'px '.$m2_block_margin_b.'px '.$m2_block_margin_l.'px' ;
$m2_style = $meta_test1['m2_style'];
$show = $meta_test1['show'];
$feat_img = $meta_test1['feat_img'];
$hp_mid_image_shadow = $meta_test1['hp_mid_image_shadow'];

if (is_paged()) $is_paged = true;
?>
<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
.wide-post .art-block a:link,.wide-post .art-block a:visited	{color:inherit;	text-decoration:none;}
<?php if ($m2_block_padding_choose == 'Yes') { ?>.wide-post .art-blockcontent-body {padding:<?php echo $m2_block_padding; ?>;}<?php } ?>
.wide-post .art-blockcontent-body img	{float:left;<?php if ($m2_block_margin_choose == 'Yes') { ?>margin:<?php echo $m2_block_margin; ?>;<?php } ?>}
<?php if ($m2_block_padding_choose == 'Yes') { ?>.wide-post .art-postcontent {padding:<?php echo $m2_block_padding; ?>;}<?php } ?>
.wide-post .art-article img {float:left;<?php if ($m2_block_margin_choose == 'Yes') { ?>margin:<?php echo $m2_block_margin; ?>;<?php } ?>}
<?php if ($m2_block_transparent == 'Yes') { ?>
.art-content-layout .art-content .wide-post .art-block	{background-color:transparent;}
<?php } ?>
</style>
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
			$query = ('cat='.$m2_cat.'&showposts='.$m2_totalposts.'&paged='.$paged);
			If (is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			} else {$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
			query_posts($query);
			while ( have_posts() ) : the_post();
		
		?>
<div class="wide-post">
 <?php
	global $post;
	$m2_style(
		array(
			'id' => theme_get_post_id(), 
			'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>', 
			'class' => theme_get_post_class(),
			'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img,
											'image_width' => $m2_img_width,
											'image_height' => $m2_img_height,
											'img_shad' => $hp_mid_image_shadow,
											'img_pos' => 'Before',
											'content_length' => $m2_content_length
											)
		)
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