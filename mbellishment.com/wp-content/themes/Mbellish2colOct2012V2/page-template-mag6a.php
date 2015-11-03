<?php
/*
Template Name: Magazine 6a
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_mag6;
$meta_test1 = $custom_metabox_mag6->the_meta();
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
$blog_content = $meta_test1['blog_content'];
$blog_character_count = $meta_test1['blog_character_count'];
$blog_post_exclude = $meta_test1['blog_post_exclude'];
$blog_block_header = $meta_test1['blog_block_header'];
$blog_thumb_width = $meta_test1['blog_thumb_width'];
$blog_thumb_height = $meta_test1['blog_thumb_height'];
$blog_post_num = $meta_test1['blog_post_num'];
$blog_right_block = $meta_test1['blog_right_block'];
$show = $meta_test1['show'];
$m6_sidebar = $meta_test1['m6_sidebar'];
$sl_show = $meta_test1['sl_show'];
$sl_pos = $meta_test1['sl_pos'];
?>
<style type='text/css'>
<?php if ($hp_top_margin_choose == 'Yes'&& $home_page_widget_size == 'home_page_header_wide') { ?>#home-top-bg {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
<?php if ($hp_top_margin_choose == 'Yes' && $home_page_widget_size == 'home_page_header') { ?>.home-top-left {padding: <?php echo $hp_top_margin ; ?>;}<?php } ?>
.art-post ul li, .art-post ol ul li {overflow:visible;}
<?php if ($blog_block_header == 'Yes') { ?>.art-blockheader {margin-bottom:5px;} <?php } ?>
.alignleft img, img.alignleft {margin:5px 10px 0 0;float:left;} 
.art-post ul li, .art-post ol ul li {overflow:visible;}
.art-postmetadataheader {overflow:hidden;}
.content-left {float:left;width:58.9%;padding-right:5px;border-right:1px dotted #666;}
.content-right {float:right;width:38.9%;min-height:<?php echo $blog_right_block; ?>px;}
.art-post h2.art-postheader a, .art-post h2.art-postheader a:link, .art-post h2.art-postheader a:visited, .art-post h2.art-postheader a.visited, .art-post h2.art-postheader a:hover, .art-post h2.art-postheader a.hovered {font-size:75%;}
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
<?php
$cat_args = array('orderby' => 'name','order' => 'ASC','child_of' => 0 ,'exclude' => $blog_post_exclude );
$categories =   get_categories($cat_args); 
foreach($categories as $category) :
     $post_args = array('numberposts' => 1, 'category' => $category->term_id, );
    $posts = get_posts($post_args);	foreach($posts as $post) : 	setup_postdata($post); 
?>
<?php tt_post_head(); ?> 
<?php if ($blog_block_header  =='Yes') { ?>

<?php tt_block_title_head(); ?>
			<?php $cat_desc = category_description($category->term_id);  if ($cat_desc == "" ) {	echo $category->name; } else { echo $cat_desc;} ?>
<?php tt_block_title_tail(); ?>
<div style="height:10px;"></div>
<?php } ?>
<div class="content-left">
	<?php tt_post_content_head(); ?>
		<?php tt_thumb($blog_thumb_width,$blog_thumb_height);  ?>
		<?php tt_postheader(); ?>
		<?php if ($blog_content == 'excerpt') { the_excerpt(); } else { the_content_limit($blog_character_count, ""); } ?>
	<?php tt_post_content_tail(); ?>
</div>

<div class="content-right art-postcontent">
<?php $cat_new = $category->slug;$cat_name = $category->name; ?>
<strong><?php _e('Recent posts from ', THEME_NS); echo $cat_name; ?></strong>
 <ul>
 <?php

 $postslist = get_posts('category_name='.$cat_new.'&numberposts='.$blog_post_num.'&orderby=date&offset=1');
 foreach ($postslist as $post) : setup_postdata($post);
 ?> 
 <div>
<li>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', THEME_NS), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?></a>  
</li>
 </div>
 <?php endforeach; ?>
 </ul>
<div style="position:absolute;bottom:0px;padding-bottom:10px;">
<?php $cat_id = $category->cat_ID; $category_link = get_category_link( $cat_id ); ?>
<?php _e('View more from ', THEME_NS) ; ?><a href="<?php echo $category_link; ?>"><?php echo $cat_name; ?></a>
</div>
</div>


</div>

		<div class="cleared"></div>
    </div>
</div>
	<?php endforeach; ?>
<?php endforeach; ?>
<?php
$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', THEME_NS));
$next_link = get_next_posts_link(__('&laquo; Older Entries', THEME_NS));
?>
<?php if ($prev_link || $next_link): ?>
<?php tt_post_head(); ?>
<?php tt_post_content_head(); ?>
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
<?php tt_post_content_tail(); ?>
<?php tt_post_tail(); ?>
<?php endif; ?>


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