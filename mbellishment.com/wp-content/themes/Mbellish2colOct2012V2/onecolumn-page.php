<?php
/*
Template Name: One Column
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} 
tt_get_simple_header_layout();
?>

<?php  if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && !theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} ?>
			<?php 
				if(have_posts()) {

					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
						get_template_part('content', 'page');
						if ( theme_get_option('theme_allow_page_comments')) {
							comments_template();
						}
					}
					
				
				} else {
				
					 theme_404_content();
					 
				} 
		    ?>
<?php if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && !theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');} ?>

<?php 
tt_get_simple_footer_layout();
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');}
get_footer(); ?>