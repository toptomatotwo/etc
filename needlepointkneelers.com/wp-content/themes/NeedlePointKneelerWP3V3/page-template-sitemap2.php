<?php
/*
Template Name: Sitemap #2
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
<div class="art-blockheader">
		    <div class="l"></div>
		    <div class="r"></div>
		     <div class="t"><?php _e('By Page', 'kubrick'); ?></div>
		</div>
		
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>
<div class="art-blockheader">
		    <div class="l"></div>
		    <div class="r"></div>
		     <div class="t"><?php _e('By Month', 'kubrick'); ?></div>
		</div>
		
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
<div class="art-blockheader">
		    <div class="l"></div>
		    <div class="r"></div>
		     <div class="t"><?php _e('By Category', 'kubrick'); ?></div>
		</div>
		
			<ul>
				<?php wp_list_categories('sort_column=name&title_li='); ?>
			</ul>
<div class="art-blockheader">
		    <div class="l"></div>
		    <div class="r"></div>
		     <div class="t"><?php _e('Available RSS Feeds', 'kubrick'); ?></div>
		</div>
			
			<ul>
				<li><a href="<?php bloginfo('rdf_url'); ?>" title="RDF/RSS 1.0 feed"><acronym title="Resource Description Framework">RDF</acronym>/<acronym title="Really Simple Syndication">RSS</acronym> 1.0 feed</a></li>
				<li><a href="<?php bloginfo('rss_url'); ?>" title="RSS 0.92 feed"><acronym title="Really Simple Syndication">RSS</acronym> 0.92 feed</a></li>
				<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS 2.0 feed"><acronym title="Really Simple Syndication">RSS</acronym> 2.0 feed</a></li>
				<li><a href="<?php bloginfo('atom_url'); ?>" title="Atom feed">Atom feed</a></li>
			</ul>
	</div>
	<div class="right-col">
	
<div class="art-blockheader">
	    <div class="l"></div>
	    <div class="r"></div>
	     <div class="t"><?php _e('Blog Posts: (newest first)', 'kubrick'); ?></div>
	</div>
	
			<ul>
	<?php $archive_query = new WP_Query('showposts=100&order=ASC');
		while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> <strong><?php comments_number('0', '1', '%'); ?></strong></li>
	<?php endwhile; ?>
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