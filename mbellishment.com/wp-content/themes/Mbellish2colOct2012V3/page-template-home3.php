<?php
/*
Template Name: Home Page #3
*/
?>
<?php get_header();
include get_template_directory()."/includes/tt_meta.php"; 
global $custom_metabox_homepage3;
$meta_test1 = $custom_metabox_homepage3->the_meta();
$home_page_sheet_style = $meta_test1['home_page_sheet_style'];
$hp_widgetized_show = $meta_test1['hp_widgetized_show'];
$hp_widgetized_position = $meta_test1['hp_widgetized_position'];
$home_page_top = $meta_test1['home_page_top'];
$home_page_widget_style = $meta_test1['home_page_widget_style'];
$home_page_mid_style = $meta_test1['home_page_mid_style'];
$hp_top_margin_choose = $meta_test1['hp_top_margin_choose'];
$hp_top_margin_t = $meta_test1['hp_top_margin_t']; if ($hp_top_margin_t == '') $hp_top_margin_t = 0; $hp_top_margin_r = $meta_test1['hp_top_margin_r']; if ($hp_top_margin_r == '') $hp_top_margin_r = 0; $hp_top_margin_b = $meta_test1['hp_top_margin_b']; if ($hp_top_margin_b == '') $hp_top_margin_b = 0; $hp_top_margin_l = $meta_test1['hp_top_margin_l']; if ($hp_top_margin_l == '') $hp_top_margin_l = 0;
$hp_top_margin = $hp_top_margin_t.'px '.$hp_top_margin_r.'px '.$hp_top_margin_b.'px '.$hp_top_margin_l.'px' ;
$hp_mid_content_length = $meta_test1['hp_mid_content_length'];
$hp_top_show = $meta_test1['hp_top_show'];
$info_box_search = $meta_test1['info_box_search'];
$home_page_widget_size = $meta_test1['home_page_widget_size'];
$info_box_bg_color = $meta_test1['info_box_bg_color'];
$info_box_border_color = $meta_test1['info_box_border_color'];
$info_box_color_choose = $meta_test1['info_box_color_choose'];
$info_box_font_color = $meta_test1['info_box_font_color'];
$info_box_font_big_color = $meta_test1['info_box_font_big_color'];
$hp3_info1 = $meta_test1['hp3_info1'];
if ($hp3_info1 =='') {$hp3_info1 = 'Welcome To Our Site (change this in the page template options area for Home Page #3)';};
$hp3_info2 = $meta_test1['hp3_info2'];
if ($hp3_info2 =='') {$hp3_info2 = 'Donec metus lacus, porta id, auctor sit amet, aliquam eu, lacus. Quisque sagittis vulputate orci.';}
$home_page_mid_style = $meta_test1['home_page_mid_style'];
$hp_mid_img_width = $meta_test1['hp_mid_img_width'];
$hp_mid_img_height = $meta_test1['hp_mid_img_height'];
$query_choice = $meta_test1['query_choice'];
$m1_cat = $meta_test1['m1_cat'];
$m1_totalposts = $meta_test1['m1_totalposts'];
$home_page_1 = $meta_test1['home_page_1'];
$home_page_2 = $meta_test1['home_page_2'];
$home_page_3 = $meta_test1['home_page_3'];
$home_page_4 = $meta_test1['home_page_4'];
$m1_block_margin_choose = $meta_test1['m1_block_margin_choose'];
$m1_block_margin_t = $meta_test1['m1_block_margin_t']; if ($m1_block_margin_t == '') $m1_block_margin_t = 0; $m1_block_margin_r = $meta_test1['m1_block_margin_r']; if ($m1_block_margin_r == '') $m1_block_margin_r = 0; $m1_block_margin_b = $meta_test1['m1_block_margin_b']; if ($m1_block_margin_b == '') $m1_block_margin_b = 0; $m1_block_margin_l = $meta_test1['m1_block_margin_l']; if ($m1_block_margin_l == '') $m1_block_margin_l = 0;
$m1_block_margin = $m1_block_margin_t.'px '.$m1_block_margin_r.'px '.$m1_block_margin_b.'px '.$m1_block_margin_l.'px' ;
$hp_mid_content_length = $meta_test1['hp_mid_content_length'];
$hp_mid_image_shadow = $meta_test1['hp_mid_image_shadow'];
$hp_bottom_show = $meta_test1['hp_bottom_show'];
$home_page_mid_style = $meta_test1['home_page_mid_style'];
$mid_h5_choose = $meta_test1['mid_h5_choose'];
$mid_h5 = $meta_test1['mid_h5'];
$home_page_mid_overall_style = $meta_test1['home_page_mid_overall_style'];
$hp3_mid_title = $meta_test1['hp3_mid_title'];
$m1_block_height_choose = $meta_test1['m1_block_height_choose'];
$m1_block_height = $meta_test1['m1_block_height'];
$m1_h2_choose = $meta_test1['m1_h2_choose'];
$m1_h2 = $meta_test1['m1_h2'];

				
?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/includes/css/home3-style.css" type="text/css" media="screen" />
<style type='text/css'>
.index-cols img, div.art-block img	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
<?php if ($info_box_color_choose == 'Yes') { ?>
.graybox {background-color:#<?php echo $info_box_bg_color; ?> ;border-color:#<?php echo $info_box_border_color; ?> ;}
.graybox p {color:#<?php echo $info_box_font_color; ?> ;}
.graybox p big {color:#<?php echo $info_box_font_big_color; ?> ;}
<?php } ?>
<?php if ($m1_block_height_choose) { ?>.index-col1-3 .art-post-inner, .index-col1-3 .art-blockcontent	{height:<?php echo $m1_block_height; ?>px;} <?php } ?>
<?php if ($m1_h2_choose) { ?>.index-col1-3 h2.art-postheader a, .index-col1-3 h2.art-postheader a:link, .index-col1-3 h2.art-postheader a:visited, .index-col1-3 h2.art-postheader a.visited, .index-col1-3 h2.art-postheader a:hover, .index-col1-3 h2.art-postheader a.hovered {font-size:<?php echo $m1_h2; ?>px;}<?php } ?>
<?php if ( $info_box_search ) { ?>.search-h3 {display:none;} <?php } ?>
<?php if ( $mid_h5_choose == 'Yes' && $home_page_mid_overall_style == 'theme_simple_wrapper') { ?>.art-postcontent h5, h5.art-widget-title {font-size: <?php echo $mid_h5; ?>px }<?php } ?>
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
<?php ob_start(); ?>
<div class="leader3" style="margin-top:20px;padding:0 10px;">

    <div class="search-h3" style ="display:none1;">
      <form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <fieldset id="search">

    <span>
    <input type="text" value="<?php echo esc_attr(get_search_query()); ?>" onclick="this.value='';" name="s" id="s" class="keywords" />    
    <input name="searchsubmit" type="image" src="<?php bloginfo('template_url'); ?>/includes/images-home/search.png" value="Go" id="searchsubmit" class="btn"  />
    </span>
  </fieldset>
</form>
  </div>

  <div class="graybox" style="-moz-border-radius: 6px 6px 6px 6px;">
    <p><big><?php echo stripslashes($hp3_info1);  ?></big><br />

      <?php echo stripslashes($hp3_info2); ?></p>
  </div>
 </div> <!--/searchform -->
<?php  
	theme_simple_wrapper(
		array(
				'content' => ob_get_clean()
		))		
			 ?>


  <div class="underslider" style ="display:none;">

  	  <?php
	theme_block_wrapper(
		array(

				'content' => '<p class="us_text">Welcome To Our New Site<br />
      Donec metus lacus, porta id, auctor sit amet, aliquam .</p>'
		))		
			 ?>
  
  
    

    <div class="cleared"></div>

  </div>
<div id="columns3">
  <div class="index-cols">
    <div class="content">
	<?php ob_start(); ?>

			<?php 
				if ($query_choice == 'cat') {$custom_query = new WP_Query(array ('category_name' => cat_id_to_name($m1_cat), 'showposts' => $m1_totalposts));}
				if ($query_choice == 'page') {$custom_query = new WP_Query(array ('orderby' =>'menu_order', 'order' =>'asc','post_type' => 'page','post__in' => array($home_page_1,$home_page_2,$home_page_3,$home_page_4)));}
				query_posts($custom_query);
				while($custom_query->have_posts()) : $custom_query->the_post();	 
			?>

		<div class="index-col1-3"> 
			<?php 
			$home_page_mid_style( array(
				'id' => theme_get_post_id(),
				'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a>' ,
				'class' => theme_get_post_class(),
				'content' => tt_get_content_sh($hp_mid_content_length,$hp_mid_img_width,$hp_mid_img_height,'',$hp_mid_image_shadow)
				))		
			 ?>

		</div>
	  
<?php endwhile;  wp_reset_query();  ?> 
     
      <div class="cleared"></div>
	  	<?php  
		while (have_posts()) {
		the_post();
		get_template_part('content', 'minimum');
		}
	
	?>
      <!-- <div class="post-title art-post"><h2 class="art-postheader">Our Services</h2> -->
	  <?php
	$home_page_mid_overall_style(
		array(
				'title' => $hp3_mid_title,
				'content' => ob_get_clean()
		))		
			 ?>	  
	  
    </div>
<div class="cleared"></div>
	
  </div>

		
	
<?php $home3_content = ob_get_clean();?>
<?php
	$home_page_sheet_style(
		array(

				'content' => $home3_content
		))		
			 ?>		
		
</div>

<?php tt_get_simple_footer_layout(); ?>
<?php get_footer(); ?>