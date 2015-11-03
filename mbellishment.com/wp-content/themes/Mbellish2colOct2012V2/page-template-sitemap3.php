<?php
/*
Template Name: Sitemap SlickCSS
*/
?>
<?php 
get_header();
include get_template_directory()."/includes/tt_meta.php";
 ?>
<link rel="stylesheet" type="text/css" media="screen, print" href="<?php bloginfo('template_url'); ?>/includes/slickmap.css" />
<style type='text/css'>
#menu-sitemap .sbox {display:none;}
.art-post ul li, .art-post ol ul li {overflow:visible;}
</style>
<?php 
$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} 
 ?>
<?php tt_get_simple_header_layout(); ?>

<?php  if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && !theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} ?>
<?php ob_start(); ?>

<div class="sitemap-wrapper">        
<div class="slick-title">
<ul id="primaryNav" class="col1">
	<li id="home"><a>Sitemap for <?php bloginfo('name'); ?></a>
</ul>
</div>
<div class="slick">
			<ul id="primaryNav" class="col1">
				<li id="home"><a>Pages</a>

						<?php  wp_nav_menu( array(
													'menu' => 'sitemap',
													'container' => false,
													'fallback_cb' => 'wp_list_pages("title_li=")'
												  )); ?>

				</li>
			</ul>
</div>					
<div class="slick" >
			<ul id="primaryNav" class="col1">
				<li id="home"><a>Monthly Archives</a>	
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</li>
			</ul>
</div>								
<div class="slick" >
			<ul id="primaryNav" class="col1">
			<li id="home"><a>Categories</a>	
					<ul>
				<?php wp_list_categories('sort_column=name&title_li='); ?>
				</ul>
				</li>
			</ul>
</div>			
<div class="slick" >
<ul id="primaryNav" class="col1">
	<li id="home"><a>Available RSS Feeds</a>
	<ul>
	<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
	<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
	<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
	<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
	</ul>
	</li>
</ul>
</div>

</div>

<?php $sitemap = ob_get_clean(); ?>
<?php
	theme_post_wrapper(
		array(
		 
			'content' => $sitemap
		)
	);
?>


<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>

<?php tt_get_simple_footer_layout(); ?>
<?php 
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');}
get_footer(); ?>