<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
?>
<style type='text/css'>
.left-col, .right-col	{width:50%;float:left;position:relative;}
.left-col li ol, .left-col li ul,.right-col li ol, .right-col li ul  {margin:0.5em 0 0.5em 0.3em;padding:0;}
.left-col .art-blockheader 	{margin-right:10px;}
.art-post ul li, .art-post ol ul li {overflow:visible;}
</style>
<!--[if IE ]>
<style type='text/css'>
.left-col, .right-col	{width:49.9%;float:left;position:relative;}
</style>
<![endif]--> 
<?php
$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} 
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
<?php tt_post_head(); ?>
<?php tt_post_content_head(); ?>	
        
    	<div class="left-col">
<?php tt_block_title_head(); ?>
			 <?php _e('By Page', THEME_NS); ?>
<?php tt_block_title_tail(); ?>
		
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
<?php tt_block_title_head(); ?>
			 <?php _e('By Month', THEME_NS); ?>
<?php tt_block_title_tail(); ?>
		
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
<?php tt_block_title_head(); ?>
			 <?php _e('By Category', THEME_NS); ?>
<?php tt_block_title_tail(); ?>
		
			<ul>
				<?php wp_list_categories('sort_column=name&title_li='); ?>
			</ul>
<?php tt_block_title_head(); ?>
			 <?php _e('Available RSS Feeds', THEME_NS); ?>
<?php tt_block_title_tail(); ?>
			
			<ul>
				<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
				<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
				<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
			</ul>
	</div>
	<div class="right-col">
	
<?php tt_block_title_head(); ?>
		 <?php _e('Blog Posts', THEME_NS); ?>
<?php tt_block_title_tail(); ?>
	
			<ul>
	<?php $archive_query = new WP_Query('showposts=100&order=ASC');
		while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> </li>
	<?php endwhile; ?>
</ul>
	</div>    
<?php tt_post_content_tail(); ?>
<?php tt_post_tail(); ?>

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