<?php
/*
Template Name: Magazine 5a
*/
?>
<?php get_header();
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_mag5;
$meta_test1 = $custom_metabox_mag5->the_meta();
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
$featured5_top_num = $meta_test1['blog_post_num'];
$featured5_top_chars = $meta_test1['blog_character_count'];
$featured5_top_thumb_width = $meta_test1['blog_thumb_width'];
$featured5_top_thumb_height = $meta_test1['blog_thumb_height'];
$featured5_top_left = $meta_test1['blog_top_left'];
$featured5_top_right = $meta_test1['blog_top_right'];
$featured5_bottom_left = $meta_test1['blog_bottom_left'];
$featured5_bottom_right = $meta_test1['blog_bottom_right'];
$m5_block_transparent = $meta_test1['blog_trans'];
$more_text = $meta_test1['more_text']; if ($more_text == '') { $more_text = 'View more from ';}
$show = $meta_test1['show'];
$m6_sidebar = $meta_test1['m6_sidebar'];
$sl_show = $meta_test1['sl_show'];
$sl_pos = $meta_test1['sl_pos'];
?>

<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
.more-like a:visited, .more-like a.visited, .more-like .art-post li a:visited, .more-like .art-post li a.visited {
color:#000;
}
#homepagetop p{font-size:12px;margin:0;padding:0 0 0 10px;}
#homepagebottom{margin:0 0 10px 0;padding:0;}
#homepageleft, #homepageleft-lower{float:left;width:50%;padding:0;}
#homepageright, #homepageright-lower{float:right;width:50%;padding:0;}
#homepageleft,#homepageright,#homepageright-lower, #homepageleft-lower {margin:0 0 10px 0}
.art-blockcontent-body .post-image-m5 hr{clear:both;border-color:#1px dotted;border-style:none none dotted;border-width:medium medium 1px;margin:0 0 10px;padding:0 0 10px;}
.art-blockcontent-body .post-image-m5 img{margin:0 10px 0 0;}
.art-blockcontent .post-right{float:left;position:relative;}
.block-bottom .art-blockheader .t{font-size:14px;}
#homepageright .art-block,#homepageleft .art-block,#homepageright-lower .art-block, #homepageright-lower .art-block{margin-bottom:0;}
.more-like{padding:0 5px 10px 10px;}
div.more-like a:visited, div.more-like a:link, div.more-like a:hover   {color:inherit;}
.block-bottom{margin-bottom:10px;}
#homepageleft-lower p,#homepageright-lower p,#homepageleft p,#homepageright p{font-size:12px;margin:0;padding:0;}
<?php if ($m5_block_transparent == 'Yes') { ?>#homepageright .art-block, #homepageleft .art-block, #homepageright-lower .art-block, #homepageleft-lower .art-block	{background-color:transparent;}<?php } ?>
</style>
<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/includes/css/m5-ie.css" type="text/css" media="screen" />
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
	if ($show == 'Yes') { 
		while (have_posts()) {
		the_post();
		get_template_part('content', 'minimum');
		}
	}
	?>
<div id="homepageleft">
<?php tt_block_head(); ?>
<?php tt_block_title_head(); ?>
	 <?php echo cat_id_to_name($featured5_top_left); ?>
<?php tt_block_title_tail(); ?>
<?php tt_block_content_head(); ?>
<div class="post-image-m5">
	<?php $recent = new WP_Query("cat=".$featured5_top_left."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wl = $featured5_top_thumb_width;
			$hl = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'default_image' => $default_image,'width' => $wl, 'height' => $hl, 'image_class' => 'alignleft','image_scan' => true)); }
?>
				<p class="m5-link"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
				<?php 
				//ob_start();the_content_limit($featured5_top_chars, "");$my_content = ob_get_clean();
				//echo strlen($my_content);
				//ob_start();short_content($featured5_top_chars).'<br />';$my_content = ob_get_clean();echo strlen($my_content).'<br />'.$my_content;
				//$my_new_content = substr($my_content,0,strpos($my_content," ",230));echo strlen($my_new_content);echo $my_new_content;
				the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_top_left); ?>
				<strong><a href="<?php echo get_category_link($featured5_top_left); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>
		
</div>
		<div class="cleared"></div>
    </div>
</div>
</div> <!-- /hpleft -->
<div id="homepageright">
<?php tt_block_head(); ?>
<?php tt_block_title_head(); ?>
	<?php echo cat_id_to_name($featured5_top_right); ?>
<?php tt_block_title_tail(); ?>
<?php tt_block_content_head(); ?>
<div class="post-image-m5">
	<?php $recent = new WP_Query("cat=".$featured5_top_right."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wr = $featured5_top_thumb_width;
			$hr = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'default_image' => $default_image,'width' => $wr, 'height' => $hr, 'image_class' => 'alignleft','image_scan' => true)); }
?>
				<p class="m5-link"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
				<?php 
				the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_top_right); ?>
				<strong><a href="<?php echo get_category_link($featured5_top_right); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></strong>
</div>
</div>			
    </div>
	
</div>
		<div class="cleared"></div>
    </div>
</div>
</div><!-- /hpright -->
	 <div class="cleared"></div>		
<div id="homepageleft-lower">
<?php tt_block_head(); ?>
<?php tt_block_title_head(); ?>
<?php echo cat_id_to_name($featured5_bottom_left); ?>
<?php tt_block_title_tail(); ?>
<?php tt_block_content_head(); ?>
<div class="post-image-m5">
	<?php $recent = new WP_Query("cat=".$featured5_bottom_left."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wl = $featured5_top_thumb_width;
			$hl = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'default_image' => $default_image,'width' => $wl, 'height' => $hl, 'image_class' => 'alignleft','image_scan' => true)); }
?>
				<p class="m5-link"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_bottom_left); ?>
				<strong><a href="<?php echo get_category_link($featured5_bottom_left); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></strong>
</div>
</div>			
    </div>
	
</div>
		<div class="cleared"></div>
    </div>
</div>
</div> <!-- /hpleft -->
<div id="homepageright-lower">
<?php tt_block_head(); ?>
<?php tt_block_title_head(); ?>
	<?php echo cat_id_to_name($featured5_bottom_right); ?>
<?php tt_block_title_tail(); ?>
<?php tt_block_content_head(); ?>
<div class="post-image-m5">
			<?php $recent = new WP_Query("cat=".$featured5_bottom_right."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wr = $featured5_top_thumb_width;
			$hr = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'default_image' => $default_image,'width' => $wr, 'height' => $hr, 'image_class' => 'alignleft','image_scan' => true)); }
?>
				<p class="m5-link"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></p>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_bottom_right); ?>
				<strong><a href="<?php echo get_category_link($featured5_bottom_right); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></strong>
</div>
</div>		
    </div>
		
</div>
		<div class="cleared"></div>
    </div>
</div>
</div><!-- /hpright -->
	 <div class="cleared"></div>
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