<?php get_header(); ?>
<?php global $sb_primary,$sb_secondary ;$sb_primary = 'default';$sb_secondary = 'secondary'; ?>
<style type='text/css'>
.art-post ol {list-style-position:outside;}
.art-post ul li, .art-post ol ul li {overflow:visible;}
</style>
<?php if (theme_get_option('top_sidebar_search') && theme_get_option('top_sidebar_wide_search')) {get_sidebar('top');} ?>
<?php tt_get_header_layout(); ?>
			<?php if (theme_get_option('top_sidebar_search') && !theme_get_option('top_sidebar_wide_search')) {get_sidebar('top');} ?>
			<?php 
				if(have_posts()) {
				
					theme_post_wrapper(
			  			array('content' => '<h4 class="box-title">' . sprintf( __( 'Search Results for: %s', THEME_NS ), 
			  				'<span>' . get_search_query() . '</span>' ) . '</h4>' 
			  			)
			  		);
				
					/* Display navigation to next/previous pages when applicable */
					if (theme_get_option('theme_top_posts_navigation')) {
						theme_page_navigation();
					}
					
					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
						get_template_part('content', get_post_format());
					}
					
					/* Display navigation to next/previous pages when applicable */
					if (theme_get_option('theme_bottom_posts_navigation')) {
						 theme_page_navigation();
					}
				
				} else { ?>

<?php ob_start(); 
$title_search =  __('Sorry but I can\'t find the page you\'re looking for...', 'THEME_NS');?>

				
   		<p><?php _e('Let me help you find what you came here for:', 'THEME_NS'); ?></p>
		<?php 
			$s = preg_replace("/(.*)-(html|htm|php|asp|aspx)$/","$1",$wp_query->query_vars['name']);
			$posts = query_posts('post_type=post&name='.$s);
			$s = str_replace("-"," ",$s);
			if (count($posts) == 0) {
				$posts = query_posts('post_type=post&s='.$s);
			}
			if (count($posts) > 0) { ?>
				<ol><li>
				<p><?php _e('Were you looking for <strong>one of the following</strong> posts?', 'THEME_NS'); ?></p>
				<ul>
			<?php	foreach ($posts as $post) {
					echo '<li><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></li>';
				}
				echo "</ul>"; ?>
				<p><?php _e('If not, don\'t worry, I\'ve got a few more tips for you to find it:', 'THEME_NS'); ?></p></li>
			<?php } else { ?>
				<p><?php _e('<strong>Don\'t worry though!</strong> I\'ve got a few tips for you to find it:', 'THEME_NS'); ?></p>
				<ol>
			<?php }
		?>
			<li><p>
				<?php _e('<strong>Search</strong> for it:', 'THEME_NS'); ?>
				<form style="display:inline;" action="<?php bloginfo('siteurl');?>">
					<input type="text" value="<?php echo esc_attr($s); ?>" id="s" name="s"/> <input type="submit" value="Search"/>
				</form></p>
			</li>
			<li><p>
				<?php _e('<strong>If you typed in a URL...</strong> make sure the spelling, cApitALiZaTiOn, and punctuation are correct. Then try reloading the page.', 'THEME_NS'); ?></p>
				
			</li>
			<li><p>
				<?php _e('<strong>Look</strong> for it in the ', 'THEME_NS'); ?><a href="<?php bloginfo('siteurl');?>/sitemap/"><?php _e('sitemap', 'THEME_NS'); ?></a>.
				</p>
			</li>
			<li><p>
				<?php _e('<strong>Start over again</strong> at my ', 'THEME_NS'); ?><a href="<?php bloginfo('siteurl');?>"><?php _e('homepage', 'THEME_NS'); ?></a><?php _e(' (and please contact me to say what went wrong, so I can fix it).', 'THEME_NS'); ?></p>
			</li>
		</ol>	
<?php
	theme_post_wrapper(
		array(

			'title' => $title_search, 
			'content' => ob_get_clean()
		)
	);
?>
		
 <?php } ?>	
<?php if (theme_get_option('bot_sidebar_search') && !theme_get_option('bot_sidebar_wide_search')) {get_sidebar('bottom');} ?>
<?php tt_get_footer_layout(); ?>
<?php if (theme_get_option('bot_sidebar_search') && theme_get_option('bot_sidebar_wide_search')) {get_sidebar('bottom');} ?>
<?php get_footer(); ?>