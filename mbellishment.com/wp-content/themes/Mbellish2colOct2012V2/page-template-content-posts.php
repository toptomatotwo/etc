<?php
/*
Template Name: Page with Posts
*/
?>
<?php get_header();
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_page_posts;
$meta_test1 = $custom_metabox_page_posts->the_meta();
$home_page_sheet_style = $meta_test1['home_page_sheet_style'];
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
$all_cats = $meta_test1['all_cats'];
$blog_cat = $meta_test1['blog_cat'];
if ($all_cats == 'Yes') {$blog_cat = '';}
$number_posts = $meta_test1['number_posts'];
$hp_widgetized_position = $meta_test1['hp_widgetized_position'];
$show = $meta_test1['show'];
$main_content_style = $meta_test1['main_content_style'];
$show_sb_top = 'yes';
$meta_test3 = $custom_back->the_meta();
$back_change = $meta_test3['back_change'];
$background_color = $meta_test3['background_color'];
$background_url = $meta_test3['background_url'];
$background_repeat = $meta_test3['background_repeat']; 
global $back_change, $background_color, $background_url, $background_repeat;

if (is_paged()) $is_paged = true;
?>
<style type='text/css'>
.art-post ul li, .art-post ol ul li {overflow:visible;}
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
</style>
<?php if ($back_change) {?><style type='text/css'>body {background: #<?php echo $background_color ;?> url("<?php echo $background_url; ?>") <?php echo $background_repeat ;?>;}</style><?php } ?>
<?php
if ($hp_widgetized_position == 'Above') { 
if ( $hp_widgetized_show == 'Yes') {
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
}
} ?>
<?php if ($sb_change == 'Yes') { ?>
<!-- Start sidebar modifications --> 
 <div class="art-content-layout">
    <div class="art-content-layout-row">
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-t.php"); ?>
         <div class="art-layout-cell art-content">
<!-- End sidebar modifications   --> 
<?php } else { ?>
<?php tt_get_header_layout(); ?>
<?php } 
$this_post_id = $post->ID;if (theme_get_meta_option($this_post_id, 'theme_show_sb_top')) {get_sidebar('top');}
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
}
	?>
<?php
$temp_query = clone $wp_query;
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
			$query = ('cat='.$blog_cat.'&showposts='.$number_posts.'&paged='.$paged);
			If (is_front_page()) {
			$paged = (get_query_var('page')) ? get_query_var('page') : 1; 
			} else {$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;}
			query_posts($query);
			while ( have_posts() ) : the_post();
						get_template_part('content');
?>

	
<?php endwhile; ?>          <div class="cleared"></div>
<?php theme_page_navigation();  $wp_query = clone $temp_query;?>
			<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>
<?php if ($sb_change == 'Yes') { ?>
          <div class="cleared"></div>
        </div>
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-b.php"); ?>
     </div>
</div>
<div class="cleared"></div>
<?php } else { tt_get_footer_layout(); } ?>
<?php 
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');}
get_footer(); ?>