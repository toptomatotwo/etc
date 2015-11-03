<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
?>
<!-- Start sidebar modifications --> 
<?php if ($sb_change == 'Yes') { ?>
 <div class="art-content-layout">
    <div class="art-content-layout-row">
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-t.php"); ?>
         <div class="art-layout-cell art-content">
<!-- End sidebar modifications   --> 
<?php } else { ?>
<?php tt_get_header_layout(); ?>
<?php } ?>
			<?php $this_post_id = $post->ID;if (theme_get_meta_option($this_post_id, 'theme_show_sb_top')) {get_sidebar('top');}  ?>
			<?php 
				if (have_posts()){
					/* Display navigation to next/previous posts when applicable */
					if (theme_get_option('theme_top_single_navigation')) {
						theme_page_navigation(
							array(
								'next_link' => theme_get_previous_post_link('&laquo; %link'),
								'prev_link' => theme_get_next_post_link('%link &raquo;')
							)
						);
					}
					
					while (have_posts())  
					{
						the_post();
										if(get_post_meta($post->ID, "background", "true")) { $meta_value = get_post_meta($post->ID, "background", "true"); ?> <style type='text/css'>body {    background-image: url("<?php echo $meta_value; ?>"); background-position: left top;background-repeat: repeat; }</style>
						<?php }
						get_template_part('content', 'single');
						if ( theme_get_option('theme_allow_comments')) {
							comments_template();
						}
					}
					
					/* Display navigation to next/previous posts when applicable */
					if (theme_get_option('theme_bottom_single_navigation')) {
						theme_page_navigation(
							array(
								'next_link' => theme_get_previous_post_link('&laquo; %link'),
								'prev_link' => theme_get_next_post_link('%link &raquo;')
							)
						);
					}
					
				} else {    
				  
					theme_404_content();
					
				} 
			?>
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