<?php get_header(); 
global $sb_primary,$sb_secondary ;$sb_primary = 'default';$sb_secondary = 'secondary'; 
if (theme_get_option('top_sidebar_index') && theme_get_option('top_sidebar_wide_index')) {get_sidebar('top');}
 ?>
<?php tt_get_header_layout(); ?>
			<?php if (theme_get_option('top_sidebar_index') && !theme_get_option('top_sidebar_wide_index')) {get_sidebar('top');} ?>
			<?php 

				if(have_posts()) {
				
					/* Display navigation to next/previous pages when applicable */
					if ( theme_get_option('theme_' . (theme_is_home() ? 'home_' : '') . 'top_posts_navigation' ) ) {
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
				
				} else {
				
					 theme_404_content();
					 
				} 
		    ?>
			<?php if (theme_get_option('bot_sidebar_index') && !theme_get_option('bot_sidebar_wide_index')) {get_sidebar('bottom');} ?>
<?php tt_get_footer_layout(); ?>
<?php if (theme_get_option('bot_sidebar_index') && theme_get_option('bot_sidebar_wide_index')) {get_sidebar('bottom');} ?>
<?php get_footer(); ?>