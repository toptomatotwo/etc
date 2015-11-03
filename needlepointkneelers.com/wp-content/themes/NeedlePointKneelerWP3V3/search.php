<?php get_header(); ?>
<style type='text/css'>
.art-post ol {
list-style-position:outside;
}
</style>
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

	<?php if (have_posts()) : ?>
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
        
		<h2><?php _e('Search Results', 'kubrick'); ?></h2>
		<?php
		$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
		$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
		?>
		<?php if ($prev_link || $next_link): ?>
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
		<?php endif; ?>

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		
		<?php while (have_posts()) : the_post(); ?>
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
			<?php ob_start(); ?>
			<?php $page_title = get_post_meta($post->ID, 'page_title', TRUE); ?>
			<?php if (!$page_title == 'No') { ?>
			<h2 class="art-postheader">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
			<?php the_title(); ?>
			</a>
			</h2>
			 <?php } ?>
			<?php $metadataContent = ob_get_clean(); ?>
			<?php if (trim($metadataContent) != ''): ?>
			<div class="art-postmetadataheader">
			<?php echo $metadataContent; ?>
			
			</div>
			<?php endif; ?>
			<div class="art-postcontent">
			    <!-- article-content -->
			
			          <?php if (is_search()) the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
			          <?php if (is_page() or is_single()) wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			        
			    <!-- /article-content -->
			</div>
			<div class="cleared"></div>
			
			</div>
			
					<div class="cleared"></div>
			    </div>
			</div>
			
		<?php endwhile; ?>
		<?php if ($prev_link || $next_link): ?>
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
        
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		
		<?php endif; ?>
	<?php else : ?>
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
        
<h2 class="art-PostHeader">
Sorry but I can't find the page you're looking for...
</h2>
		<p>Let me help you find what you came here for:</p>
		<?php 
			$s = preg_replace("/(.*)-(html|htm|php|asp|aspx)$/","$1",$wp_query->query_vars['name']);
			$posts = query_posts('post_type=post&name='.$s);
			$s = str_replace("-"," ",$s);
			if (count($posts) == 0) {
				$posts = query_posts('post_type=post&s='.$s);
			}
			if (count($posts) > 0) {
				echo "<ol><li>";
				echo "<p>Were you looking for <strong>one of the following</strong> posts or pages?</p>";
				echo "<ul>";
				foreach ($posts as $post) {
					echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				}
				echo "</ul>";
				echo "<p>If not, don't worry, I've got a few more tips for you to find it:</p></li>";
			} else {
				echo "<p><strong>Don't worry though!</strong> I've got a few tips for you to find it:</p>";
				echo "<ol>";
			}
		?>
			<li><p>
				<label for="s"><strong>Search</strong> for it:</label>
				<form style="display:inline;" action="<?php bloginfo('siteurl');?>">
					<input type="text" value="<?php echo esc_attr($s); ?>" id="s" name="s"/> <input type="submit" value="Search"/>
				</form></p>
			</li>
			<li><p>
				<strong>If you typed in a URL...</strong> make sure the spelling, cApitALiZaTiOn, and punctuation are correct. Then try reloading the page.</p>
				
			</li>
			<li><p>
				<strong>Look</strong> for it in the <a href="<?php bloginfo('siteurl');?>/sitemap/">sitemap</a>.
				</p>
			</li>
			<li><p>
				<strong>Start over again</strong> at my <a href="<?php bloginfo('siteurl');?>">homepage</a> (and please contact me to say what went wrong, so I can fix it).</p>
			</li>
		</ol>	

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

		</div>
		
				<div class="cleared"></div>
		    </div>
		</div>
		
	<?php endif; ?>

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>