<?php
/*
Template Name: Multi-Column Page
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php"; 
global $custom_metabox_multi_column;
$meta_test1 = $custom_metabox_multi_column->the_meta();
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
$extra_content_upper = $meta_test1['extra_content_upper'];
$extra_content_lower = $meta_test1['extra_content_lower'];
$column_count = $meta_test1['column_count'];


$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');}

?>
<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>

.columns {
	-moz-column-count: <?php echo $column_count ; ?>; 
	-moz-column-gap: 20px;
	/*-moz-column-rule: 1px dotted #666;*/
	-webkit-column-count: <?php echo $column_count ; ?>; 
	-webkit-column-gap: 20px;
	/*-webkit-column-rule: 1px dotted #666;*/
	column-count: <?php echo $column_count ; ?>; 
	column-gap: 20px;
	*/column-rule: 1px dotted #666;*/

}

</style>
<!--[if IE ]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/includes/css/multi2-<?php echo $column_count ; ?>.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/includes/js/css3-multi-column.js"></script>
<![endif]--> 
<?php
if ($hp_widgetized_position == 'Above' && $hp_widgetized_show == 'Yes') { 
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<?php if ($sb_change == 'Yes') { ?>
 <div class="art-content-layout">
    <div class="art-content-layout-row">
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-t.php"); ?>
         <div class="art-layout-cell art-content">
<?php } else { ?>
<?php tt_get_header_layout(); ?>
<?php
if ($hp_widgetized_position == 'Below' && $hp_widgetized_show == 'Yes') { 

	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<?php } ?>
			<?php $this_post_id = $post->ID;if (theme_get_meta_option($this_post_id, 'theme_show_sb_top')) {get_sidebar('top');}  ?>
			<?php 
				if(have_posts()) {
					
					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
	theme_post_wrapper(
					array(
						'id' => theme_get_post_id(), 
						'class' => theme_get_post_class(),
						'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',  
						'content' => '<div class="art-postcontent upper-content">'.$extra_content_upper.'</div><div class="columns">'.theme_get_content().'</div><div class="cleared"></div><div class="art-postcontent lower-content">'.$extra_content_lower.'</div>'
						)
					);
						comments_template();
					}

				} else {
				
					 theme_404_content();
					 
				} 
		    ?>
		
			
			<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>
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