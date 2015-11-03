<?php
/*
Template Name: Sitemap Slick
*/
?>
<?php get_header(); ?>
<link rel="stylesheet" type="text/css" media="screen, print" href="<?php bloginfo('template_url'); ?>/includes/slickmap.css" />
<div class="art-content-layout">
    <div class="art-content-layout-row">
<div class="art-layout-cell art-content-wide">
<div class="art-post">
    <div class="art-post-tl"></div>
    <div class="art-post-tr"></div>
    <div class="art-post-bl"></div>
    <div class="art-post-br"></div>
    <div class="art-post-tc"></div>
    <div class="art-post-bc"></div>
    <div class="art-post-cl"></div>
    <div class="art-post-cr"></div>
    <div class="art-post-cc"></div>
    <div class="art-post-body">
<div class="art-post-inner art-article">

<div class="art-postcontent">
    <!-- article-content -->

<div class="sitemap-wrapper">        
<div class="slick-title">
<ul id="primaryNav" class="col1">
	<li id="home"><a>Sitemap for <?php bloginfo('name'); ?></a>
</ul>
</div>
<div class="slick">
			<ul id="primaryNav" class="col1">
				<li id="home"><a>Pages</a>
					<ul>
						<?php wp_list_pages('title_li='); ?>
					</ul>
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

    <!-- /article-content -->
</div>
<div class="cleared"></div>


</div>

		<div class="cleared"></div>
    </div>
</div>

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>