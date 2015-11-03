<?php
/*
Template Name: Sitemap
*/
?>
<?php get_header(); ?>
<style type='text/css'>
.left-col, .right-col	{width:50%;float:left;position:relative;}
.left-col li ol, .left-col li ul,.right-col li ol, .right-col li ul  {margin:0.5em 0 0.5em 0.3em;padding:0;}
.left-col .art-blockheader 	{margin-right:10px;}
</style>
<!--[if IE ]>
<style type='text/css'>
.left-col, .right-col	{width:49.9%;float:left;position:relative;}
</style>
<![endif]--> 
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">


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
        

    	<div class="left-col">
		<b>By Page:</b>
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
					
		<b>By Month:</b>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
								
		<b>By Category:</b>
			<ul>
				<?php wp_list_categories('sort_column=name&title_li='); ?>
			</ul>
			
		<b>Available RSS Feeds:</b>
<ul>
	<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
	<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
	<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
	<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
</ul>
	</div>
	<div class="right-col">
	<?php $posttype = 'postbypost' ?>
		<b>Blog Posts: (<?php echo $posttype; ?>)</b>
			<ul>
				<?php wp_get_archives('type='.$posttype); ?> 
			</ul>
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