<?php
/*
Template Name: Home Page
*/
?>
<?php get_header();
include get_template_directory()."/includes/tt_meta.php"; 
global $custom_metabox_homepage1;
$meta_test1 = $custom_metabox_homepage1->the_meta();
$home_page_sheet_style = $meta_test1['home_page_sheet_style'];
$hp_widgetized_show = $meta_test1['hp_widgetized_show'];
$hp_widgetized_position = $meta_test1['hp_widgetized_position'];
$home_page_top = $meta_test1['home_page_top'];
$home_page_widget_size = $meta_test1['home_page_widget_size'];
$home_page_widget_style = $meta_test1['home_page_widget_style'];
$home_page_top_style = $meta_test1['home_page_top_style'];
$hp_top_margin_choose = $meta_test1['hp_top_margin_choose'];
$hp_top_margin_t = $meta_test1['hp_top_margin_t']; if ($hp_top_margin_t == '') $hp_top_margin_t = 0; $hp_top_margin_r = $meta_test1['hp_top_margin_r']; if ($hp_top_margin_r == '') $hp_top_margin_r = 0; $hp_top_margin_b = $meta_test1['hp_top_margin_b']; if ($hp_top_margin_b == '') $hp_top_margin_b = 0; $hp_top_margin_l = $meta_test1['hp_top_margin_l']; if ($hp_top_margin_l == '') $hp_top_margin_l = 0;
$hp_top_margin = $hp_top_margin_t.'px '.$hp_top_margin_r.'px '.$hp_top_margin_b.'px '.$hp_top_margin_l.'px' ;
$home_page_mid_style = $meta_test1['home_page_mid_style'];
$hp_mid_img_width = $meta_test1['hp_mid_img_width'];
$hp_mid_img_height = $meta_test1['hp_mid_img_height'];
$home_page_1 = $meta_test1['home_page_1'];
$home_page_2 = $meta_test1['home_page_2'];
$home_page_3 = $meta_test1['home_page_3'];
$m1_block_margin_choose = $meta_test1['m1_block_margin_choose'];
$m1_block_margin_t = $meta_test1['m1_block_margin_t']; if ($m1_block_margin_t == '') $m1_block_margin_t = 0; $m1_block_margin_r = $meta_test1['m1_block_margin_r']; if ($m1_block_margin_r == '') $m1_block_margin_r = 0; $m1_block_margin_b = $meta_test1['m1_block_margin_b']; if ($m1_block_margin_b == '') $m1_block_margin_b = 0; $m1_block_margin_l = $meta_test1['m1_block_margin_l']; if ($m1_block_margin_l == '') $m1_block_margin_l = 0;
$m1_block_margin = $m1_block_margin_t.'px '.$m1_block_margin_r.'px '.$m1_block_margin_b.'px '.$m1_block_margin_l.'px' ;
$hp_mid_content_length = $meta_test1['hp_mid_content_length'];
$img_pos1 = $meta_test1['img_pos1'];
$img_pos2 = $meta_test1['img_pos2'];
$img_pos3 = $meta_test1['img_pos3'];
$hp_mid_image_shadow = $meta_test1['hp_mid_image_shadow'];
$hp_bottom_show = $meta_test1['hp_bottom_show'];
$show_image = '';
$content_style = $meta_test1['content_style'];
if ($content_style == 'Yes') {$content_style = 'theme_block_wrapper';} else { $content_style = 'theme_post_wrapper';}
?>
<style type='text/css'>
.index-cols img, div.art-block img	{float:left;margin:0;}
.index-cols img, div.art-block img	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
<?php if ($hp_top_margin_choose == 'Yes') { ?>#home-top-bg {margin: <?php echo $hp_top_margin ; ?>;}<?php } ?>
</style>
<?php tt_get_simple_header_layout(); ?>
<?php  
if ($hp_widgetized_position == 'Above' && $hp_widgetized_show == 'Yes') { 
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<?php ob_start(); ?>
<?php
if ($hp_widgetized_position == 'Below' && $hp_widgetized_show == 'Yes') { 

	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<div class="cleared"></div>

<div class="welcome-mid" style="margin-top:20px">
		<?php  
		$custom_query = new WP_Query(array ('page_id' => $home_page_top));
		query_posts($custom_query);
		while($custom_query->have_posts()) : $custom_query->the_post();
	$home_page_top_style(
		array(
				'id' => theme_get_post_id(),
				'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
				'class' => theme_get_post_class(),
				'content' => theme_get_content()
		))	 ?>
<?php endwhile;  wp_reset_query(); ?>
</div>
<div class="cleared"></div>
<div class="index-cols">
    <div class="index-col1 ">
		<?php $custom_query = new WP_Query(array ('page_id' => $home_page_1));
		query_posts($custom_query);
		while($custom_query->have_posts()) : $custom_query->the_post();
	$home_page_mid_style(
		array(
				'id' => theme_get_post_id(),
				'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
							array(
											'feat_img' => 'Yes',
											'image_width' => $hp_mid_img_width,
											'image_height' => $hp_mid_img_height,
											'img_pos' => $img_pos1,
											'img_shad' => $hp_mid_image_shadow,
											'content_length' => $hp_mid_content_length
											)
							)
		))	?>
	</div>
	<?php endwhile;  wp_reset_query(); ?> 
		<div class="index-col2">
		<?php $custom_query = new WP_Query(array ('page_id' => $home_page_2)); while($custom_query->have_posts()) : $custom_query->the_post(); 

		$home_page_mid_style(
		array(
				'id' => theme_get_post_id(),
				'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
							array(
											'feat_img' => 'Yes',
											'image_width' => $hp_mid_img_width,
											'image_height' => $hp_mid_img_height,
											'img_pos' => $img_pos2,
											'img_shad' => $hp_mid_image_shadow,
											'content_length' => $hp_mid_content_length
											)
							)
		))	?>
	    </div>
	<?php endwhile; ?><?php wp_reset_query(); ?> 
    <div class="index-col3">
		<?php $custom_query = new WP_Query(array ('page_id' => $home_page_3)); 
		while($custom_query->have_posts()) : $custom_query->the_post(); 	

		$home_page_mid_style(
		array(
				'id' => theme_get_post_id(),
				'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
							array(
											'feat_img' => 'Yes',
											'image_width' => $hp_mid_img_width,
											'image_height' => $hp_mid_img_height,
											'img_pos' => $img_pos3,
											'img_shad' => $hp_mid_image_shadow,
											'content_length' => $hp_mid_content_length
											)
							)
		))
				?>
    </div>
	<?php endwhile; ?><?php wp_reset_query(); ?> 
</div>
<div class="cleared"></div>
	<?php if ($hp_bottom_show == 'Yes') { 
		while (have_posts()) {
		the_post();
		get_template_part('content', 'minimum');
		}
	}
		$home_page_sheet_style(
			  			array(
								'id' => theme_get_post_id(), 
								'class' => theme_get_post_class(),
								'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
								'content' => ob_get_clean())
			  		);
	?>
<?php tt_get_simple_footer_layout(); ?>
<?php get_footer(); ?>