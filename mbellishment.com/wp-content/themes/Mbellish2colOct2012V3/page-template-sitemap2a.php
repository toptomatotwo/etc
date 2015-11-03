<?php
/*
Template Name: Sitemap New
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
$meta_test1 = $custom_metabox_sitemap->the_meta();
$page_list_source = $meta_test1['page_list_source'];
$show = $meta_test1['show'];
$layout_style= $meta_test1['layout_style'];
if ($layout_style == 'Yes') { $layout_style = 'theme_block_wrapper'; } else { $layout_style = 'theme_post_wrapper'; }
?>
<style type='text/css'>
.left-col, .right-col	{width:50%;float:left;position:relative;}
.left-col li ol, .left-col li ul,.right-col li ol, .right-col li ul  {margin:0.5em 0 0.5em 0.3em;padding:0;}
.page-template-page-template-sitemap2a-php .art-blockcontent-body ul li {background-image:none;}
.page-template-page-template-sitemap2a-php .art-article .sbox {display:none;}
#site-map-nav .sbox {display:none;}
.art-post ul li, .art-post ol ul li {overflow:visible;}
</style>
<!--[if IE ]>
<style type='text/css'>
.left-col, .right-col	{width:49.9%;float:left;position:relative;}
</style>
<![endif]--> 
<?php $this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} 
if ($sb_change == 'Yes') { ?>
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
<?php ob_start(); ?>
<?php  
if ($show) {
	while (have_posts()) {
	the_post();
	theme_post_wrapper(
		array(
			'id' => theme_get_post_id(), 
			'class' => theme_get_post_class(),
			'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '', 
			'content' => theme_get_content()
		)
	);
	}
}
?>
   
    	<div class="left-col">
		
<?php	
// list pages
ob_start();
if ( $page_list_source == '') { ?>
	<ul><?php wp_list_pages('title_li='); ?></ul>
<?php } else {
 wp_nav_menu(  array('container_id' => 'site-map-nav','menu' => $page_list_source) ); 
 }
$page_listing = ob_get_clean();
ob_start();
_e('Pages', THEME_NS);
$page_heading_title = ob_get_clean();
$layout_style(
		array( 
				'title' => $page_heading_title,
				'content' => $page_listing
		)); 
//end
	
// archive
ob_start(); ?>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
<?php
$page_listing = ob_get_clean();
ob_start();
_e('Monthly Archive', THEME_NS);
$page_heading_title = ob_get_clean();
$layout_style(
		array( 
				'title' => $page_heading_title,
				'content' => $page_listing
		)); 
//end
	
// categories
ob_start(); ?>
<ul><?php wp_list_categories('sort_column=name&title_li='); ?></ul>
<?php
$page_listing = ob_get_clean();
ob_start();
_e('Available Categories', THEME_NS);
$page_heading_title = ob_get_clean();
$layout_style(
		array( 
				'title' => $page_heading_title,
				'content' => $page_listing
		)); 
//end
	
// RSS
ob_start(); ?>
			<ul>
				<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
				<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
				<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
			</ul>
<?php
$page_listing = ob_get_clean();
ob_start();
_e('Available RSS Feeds', THEME_NS);
$page_heading_title = ob_get_clean();
$layout_style(
		array( 
				'title' => $page_heading_title,
				'content' => $page_listing
		)); 
//end
?>

	</div>
	<div class="right-col">
<?php	
// posts
ob_start(); ?>
<ul>
	<?php $archive_query = new WP_Query('showposts=100&order=ASC');
		while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> </li>
	<?php endwhile; ?>
</ul>
<?php
$page_listing = ob_get_clean();
ob_start();
_e('Blog Posts - Newest First', THEME_NS);
$page_heading_title = ob_get_clean();
$layout_style(
		array( 
				'title' => $page_heading_title,
				'content' => $page_listing
		)); 
//end
?>	

	</div>    
<?php
	theme_simple_wrapper(
		array(
			'content' => ob_get_clean()
		)
	);
?>
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