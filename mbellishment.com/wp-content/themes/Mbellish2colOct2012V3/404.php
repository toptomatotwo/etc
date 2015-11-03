<?php get_header(); ?>
<?php global $sb_primary,$sb_secondary ;$sb_primary = 'default';$sb_secondary = 'secondary'; ?>
<?php if (theme_get_option('top_sidebar_404') && theme_get_option('top_sidebar_wide_404')) {get_sidebar('top');} ?>
<?php tt_get_header_layout(); ?>
<?php if (theme_get_option('top_sidebar_404') && !theme_get_option('top_sidebar_wide_404')) {get_sidebar('top');} ?>
<?php if(theme_get_option('error_404') == 1 ) { 
      $page_404 = theme_get_option('page_404_source'); 

      $custom_query = new WP_Query(array ('pagename' => $page_404));
	query_posts($custom_query);
	while($custom_query->have_posts()) : $custom_query->the_post();
	theme_post_wrapper(
		array(
			'id' => theme_get_post_id(),
			'title' => theme_get_meta_option($post->ID, 'theme_show_page_title') ? get_the_title() : '',
			'class' => theme_get_post_class(),
			'content' => theme_get_content()
));	 


endwhile;  
wp_reset_query();?> 				
				
        <?php } else { 
ob_start();		
$title_404 = __('I can\'t seem to find what you think you\'re looking for.', 'THEME_NS');
?>
<p><strong><?php _e( 'What the heck just happened?', 'THEME_NS' ) ?></strong></p>
<p><?php _e( 'Well unfortunately, I think you\'ve just experienced what we webmasters refer to as a "Big Problem".  This could be caused by several factors including:', 'THEME_NS' ); ?></p>
<ol style = "list-style-position: outside;">
	<li><?php _e( 'The material you are looking for is no longer available.', 'THEME_NS' ); ?></li>
	<li><?php _e( 'The material you are looking for was really never available.', 'THEME_NS' ); ?></li>
	<li><?php _e( 'The material you are looking for is around here someplace, but we have cleverly hidden it in a location called "<em>somewhere else</em>".', 'THEME_NS' ); ?></li>
</ol></p>
<p><strong><?php _e( 'What should I do now?', 'THEME_NS' ); ?></strong></p>
<p><?php _e( 'Well, that depends.  If you believe the material is actually on this site, we would recommend that you click the logo at the top of the page and try again.  If you think the material is in fact not on this site, well, try "Googleing" for it.  Also, you could hit "F5" or "refresh" to repeatedly reload the page.  That rarely works, but you never know.', 'THEME_NS' ); ?></p>
<p><strong><?php _e( 'OK, who\'s fault is this anyway?  Who can I blame for this mess?', 'THEME_NS' ); ?></strong></p>
<p><?php _e( 'In the most existential sense, isn\'t it really everyone\'s fault?  No. More than likely it\'s your own darn fault.  However, if you would use the contact form and explain the error you received we would be very appreciative and happily remove you from our "people who caused massive, time consuming irreparable errors" list. That\'s one list you don\'t want to be on.', 'THEME_NS' ); ?></p>
<br /><br />
				
				<form id="searchform-404" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Let\'s try again', 'THEME_NS' ) ?>" />
					</div>
				</form>
				
<?php
	theme_post_wrapper(
		array(

			'title' => $title_404, 
			'content' => ob_get_clean()
		)
	);
?>
				
<?php } ?>
<?php if (theme_get_option('bot_sidebar_404') && !theme_get_option('bot_sidebar_wide_404')) {get_sidebar('bottom');} ?>
<?php tt_get_footer_layout(); ?>
<?php if (theme_get_option('bot_sidebar_404') && theme_get_option('bot_sidebar_wide_404')) {get_sidebar('bottom');} ?>
<?php get_footer(); ?>