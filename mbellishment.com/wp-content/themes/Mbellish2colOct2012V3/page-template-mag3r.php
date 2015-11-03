<?php
/*
Template Name: Magazine 3a Reloaded
*/
?>
<?php 
get_header();
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_mag3r;
$meta_test1 = $custom_metabox_mag3r->the_meta();
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
$featured_top_margin_choose = $meta_test1['featured_top_margin_choose'];
$featured_top_margin_t = $meta_test1['featured_top_margin_t']; if ($featured_top_margin_t == '') $featured_top_margin_t = 0; 
$featured_top_margin_r = $meta_test1['featured_top_margin_r']; if ($featured_top_margin_r == '') $featured_top_margin_r = 0; 
$featured_top_margin_b = $meta_test1['featured_top_margin_b']; if ($featured_top_margin_b == '') $featured_top_margin_b = 0; 
$featured_top_margin_l = $meta_test1['featured_top_margin_l']; if ($featured_top_margin_l == '') $featured_top_margin_l = 0;
$featured_top_margin = $featured_top_margin_t.'px '.$featured_top_margin_r.'px '.$featured_top_margin_b.'px '.$featured_top_margin_l.'px' ; 
$home_page_top_style = $meta_test1['home_page_top_style'];
$hp_top_margin_choose = $meta_test1['hp_top_margin_choose'];
$hp_top_margin_t = $meta_test1['hp_top_margin_t']; if ($hp_top_margin_t == '') $hp_top_margin_t = 0; $hp_top_margin_r = $meta_test1['hp_top_margin_r']; if ($hp_top_margin_r == '') $hp_top_margin_r = 0; $hp_top_margin_b = $meta_test1['hp_top_margin_b']; if ($hp_top_margin_b == '') $hp_top_margin_b = 0; $hp_top_margin_l = $meta_test1['hp_top_margin_l']; if ($hp_top_margin_l == '') $hp_top_margin_l = 0;
$hp_top_margin = $hp_top_margin_t.'px '.$hp_top_margin_r.'px '.$hp_top_margin_b.'px '.$hp_top_margin_l.'px' ; 
$featured_top_content_style = $meta_test1['featured_top_content_style'];
$featured_top_style = $meta_test1['featured_top_style'];
$featured_bottom_content_style = $meta_test1['featured_bottom_content_style'];
$featured_bottom_style = $meta_test1['featured_bottom_style'];
$featured_top_left = $meta_test1['featured_top_left'];
$featured_top_num = $meta_test1['featured_top_num'];
$featured_top_chars = $meta_test1['featured_top_chars'];
$featured_top_thumb_width = $meta_test1['featured_top_thumb_width'];
$featured_top_thumb_height = $meta_test1['featured_top_thumb_height'];
$featured_top_right = $meta_test1['featured_top_right'];
$featured_bottom = $meta_test1['featured_bottom'];
$featured_bottom_num = $meta_test1['featured_bottom_num'];
$featured_bottom_chars = $meta_test1['featured_bottom_chars'];
$featured_bottom_thumb_width = $meta_test1['featured_bottom_thumb_width'];
$featured_bottom_thumb_height = $meta_test1['featured_bottom_thumb_height'];
$featured_bottom_margin_choose = $meta_test1['featured_top_margin_choose'];
$featured_bottom_margin_t = $meta_test1['featured_bottom_margin_t']; if ($featured_bottom_margin_t == '') $featured_bottom_margin_t = 0; 
$featured_bottom_margin_r = $meta_test1['featured_bottom_margin_r']; if ($featured_bottom_margin_r == '') $featured_bottom_margin_r = 0; 
$featured_bottom_margin_b = $meta_test1['featured_bottom_margin_b']; if ($featured_bottom_margin_b == '') $featured_bottom_margin_b = 0; 
$featured_bottom_margin_l = $meta_test1['featured_bottom_margin_l']; if ($featured_bottom_margin_l == '') $featured_bottom_margin_l = 0;
$featured_bottom_margin = $featured_bottom_margin_t.'px '.$featured_bottom_margin_r.'px '.$featured_bottom_margin_b.'px '.$featured_bottom_margin_l.'px' ; 
$m3_block_transparent = $meta_test1['m3_block_transparent'];
$post_swap = $meta_test1['post_swap'];
$h2_size_change = $meta_test1['h2_size_change'];
if ($h2_size_change) {$h2_size = $meta_test1['h2_size'];} else {$h2_size = '';}
$feat_img = $meta_test1['feat_img'];
$more_text = $meta_test1['more_text']; if ($more_text == '') { $more_text = 'View more from ';}
$show = $meta_test1['show'];
$main_content_style = $meta_test1['main_content_style'];
?>
<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($featured_top_margin_choose == 'Yes') { ?>#homepageleft div.art-block img, #homepageright div.art-block img, #homepageleft img.alignleft, #homepageright img.alignleft{margin:<?php echo $featured_top_margin; ?>;} <?php } ?>
<?php if ($featured_bottom_margin_choose == 'Yes') { ?>#homepagebottom div.art-block img, #homepagebottom img.alignleft{margin:<?php echo $featured_bottom_margin; ?>;} <?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
#homepagetop p{font-size:12px;margin:0;padding:0 0 0 10px;}
#homepageleft{float:left;width:50%;margin:0;padding:0;}
#homepageright{float:right;width:50%;margin:0;padding:0;}
#homepagebottom{margin:0 0 10px 0;padding:0;}
#homepageleft{float:left;width:50%;margin:0;padding:0;}
.art-post ul li, .art-post ol ul li {overflow:visible;}
hr.m3-hr {clear:both;border-color:#1px dotted;border-style:none none dotted;border-width:medium medium 1px;margin:0 0 10px;padding:0 0 10px;}
.art-blockcontent-body .post-image-m3 img{margin:0 10px 0 0;}
.art-blockcontent .post-right{float:left;position:relative;}
.block-bottom .art-blockheader .t{font-size:14px;}
#homepageright .art-block,#homepageleft .art-block,#homepagebottom .art-block{margin-bottom:0;}
#homepageright .art-block a:link,#homepageright .art-block a:visited,#homepageleft .art-block a:link,#homepageleft .art-block a:visited,#homepagebottom .art-block a:link,#homepagebottom .art-block a:visited{text-decoration:none;color:inherit;font-weight:bold;}
.more-like a:link{text-decoration:none;}
.block-bottom{margin-bottom:10px;}
#homepagebottom p,#homepageleft p,#homepageright p{font-size:12px;margin:0;padding:0 0 10px 0;}
<?php if ($m3_block_transparent == 'Yes') { ?>#homepageright .art-block, #homepageleft .art-block, #homepagebottom .art-block	{background-color:transparent;}<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">
#homepageright, #homepageleft	{width:49.9%;}
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
<?php 
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && !theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');}
if ($hp_widgetized_position == 'Below') { 
if ( $hp_widgetized_show == 'Yes') {
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
}
} ?>
	<?php if ($show == 'Yes') { 
		while (have_posts()) {
		the_post();
		get_template_part('content', 'page');
		}
	}

	?>
<?php ob_start(); ?>	
<div id="homepageleft">
<?php ob_start(); ?>
	<?php $recent = new WP_Query("cat=".$featured_top_left."&showposts=".$featured_top_num); while($recent->have_posts()) : $recent->the_post();?>
<?php 
	global $post;
	$featured_top_style(
		array(
				'id' => theme_get_post_id(), 
				'title' => '<a style="font-size:' . $h2_size . 'px;" href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img,
											'image_width' => $featured_top_thumb_width,
											'image_height' => $featured_top_thumb_height,
											'img_pos' => 'Before',
											'img_shad' => '',
											'content_length' => $featured_top_chars
											)
		)
		) )
?>
<?php endwhile; ?>

<div class='more-like'>
<?php ob_start(); ?>
	 <?php $cat = get_category($featured_top_left); ?>

				<p><a href="<?php echo get_category_link($featured_top_left); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></p>

<?php $block2_title = ob_get_clean(); ?>
<?php
	theme_basic_wrapper(
		array(
			'title' => $block2_title 
			
		)
	);
?>
</div>
<?php 
ob_start(); $cat = get_category($featured_top_left);?>
<?php echo $cat->name; ?>
<?php
$block_title = ob_get_clean();
	$featured_top_content_style(
		array(
			'title' => $block_title, 
			'content' => ob_get_clean()
		)
	);
?>
	

</div> <!-- /hpleft -->

<div id="homepageright">
<?php ob_start(); ?>
	<?php $recent = new WP_Query("cat=".$featured_top_right."&showposts=".$featured_top_num); while($recent->have_posts()) : $recent->the_post();?>
<?php 
	global $post;
	$featured_top_style(
		array(
				'id' => theme_get_post_id(), 
				'title' => '<a style="font-size:' . $h2_size . 'px;" href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img,
											'image_width' => $featured_top_thumb_width,
											'image_height' => $featured_top_thumb_height,
											'img_pos' => 'Before',
											'img_shad' => '',
											'content_length' => $featured_top_chars
											)
		)
		) )
?>
<?php endwhile; ?>

<div class='more-like'>
<?php ob_start(); ?>
	 <?php $cat = get_category($featured_top_right); ?>
				<p><a href="<?php echo get_category_link($featured_top_right); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a></p>
<?php $block2_title = ob_get_clean(); ?>
<?php
	theme_basic_wrapper(
		array(
			'title' => $block2_title 
			
		)
	);
?>
</div>
<?php ob_start(); $cat = get_category($featured_top_right);?>
<?php echo $cat->name; ?>
<?php
$block_title = ob_get_clean();
	$featured_top_content_style(
		array(
			'title' => $block_title, 
			'content' => ob_get_clean()
		)
	);
?>


</div><!-- /hpright -->
	 <div class="cleared"></div>
<?php $column_content = ob_get_clean(); ?>

<?php ob_start(); ?>	 
<div id="homepagebottom">
<?php ob_start(); ?>
	<?php $recent = new WP_Query("cat=".$featured_bottom."&showposts=".$featured_top_num); while($recent->have_posts()) : $recent->the_post();?>
<?php 
	global $post;
	$featured_bottom_style(
		array(
				'id' => theme_get_post_id(), 
				'title' => '<a style="font-size:' . $h2_size . 'px;"   href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>',
				'class' => theme_get_post_class(),
				'content' => tt_get_content_all(
											array(
											'feat_img' => $feat_img,
											'image_width' => $featured_bottom_thumb_width,
											'image_height' => $featured_bottom_thumb_height,
											'img_pos' => 'Before',
											'img_shad' => '',
											'content_length' => $featured_bottom_chars
											)
		)
		) )
?>
<?php endwhile; ?>

<div class='more-like'>
<?php ob_start(); ?>
	 <?php $cat = get_category($featured_bottom); ?>
				<a href="<?php echo get_category_link($featured_bottom); ?>" rel="bookmark"><?php echo $more_text." ".$cat->name; ?></a>
<?php $block2_title = ob_get_clean(); ?>
<?php
	theme_basic_wrapper(
		array(
			'title' => $block2_title 
			
		)
	);
?>
</div>
<?php ob_start(); $cat = get_category($featured_bottom);?>
<?php echo $cat->name; ?>
<?php
$block_title = ob_get_clean();
	$featured_bottom_content_style(
		array(
			'title' => $block_title, 
			'content' => ob_get_clean()
		)
	);
?>

</div><!-- /hpbottom -->				
<?php $wide_content = ob_get_clean(); 
if ($post_swap) {echo $wide_content; echo $column_content;  } else {echo $column_content; echo $wide_content; }

?>
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