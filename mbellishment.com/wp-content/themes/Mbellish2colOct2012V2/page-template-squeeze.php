<?php
/*
Template Name: Squeeze Page
*/
?>
<?php get_header();
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_squeeze;
$meta_test1 = $custom_metabox_squeeze->the_meta();
$show_header = $meta_test1['show_header'];
$show_glare = $meta_test1['show_glare'];
$show_nav = $meta_test1['show_nav'];
$show_footer = $meta_test1['show_footer'];
$change_sheet_width = $meta_test1['change_sheet_width'];
$sheet_width = $meta_test1['sheet_width'];
$show_squeeze_nav = $meta_test1['show_squeeze_nav'];
$this_post_id = $post->ID; if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');}

?>
<style type='text/css'>
<?php if ($show_glare) {echo '#art-page-background-glare {display:none;}';} ?>
<?php if ($show_header) {echo '.art-header, .art-header:after {display:none;}';}
if ($show_nav) {echo '.art-bar.art-nav {display:none;} .art-bar.art-nav.art-squeeze{display:block;}';}
if ($change_sheet_width) { ?> .art-sheet {width:<?php echo $sheet_width; ?>px;} body { min-width:<?php echo $sheet_width; ?>px;}"<?php } ?>
.art-bar.art-nav.art-squeeze .sbox {display:none;}
</style>
<?php if ($show_footer) {echo '<style type="text/css">.art-footer {display:none;} </style>';} ?>
<?php if ($sb_change == 'Yes' ) { ?>
<!-- Start sidebar modifications --> 
 <div class="art-content-layout">
    <div class="art-content-layout-row">
 <?php include(get_template_directory()."/sb-layouts/".$sb_style."-t.php"); ?>
         <div class="art-layout-cell art-content">
<!-- End sidebar modifications   --> 
<?php } else { ?>
<?php tt_get_header_layout();
} 
?>
<?php if ($show_squeeze_nav && has_nav_menu( 'alt-menu' )) { ?>
            <div class="art-bar art-nav art-squeeze">
                <div class="art-nav-outer">
            	<?php 
            		echo theme_get_menu(array(
            				'source' => theme_get_option('theme_menu_source'),
            				'depth' => theme_get_option('theme_menu_depth'),
            				'menu' => 'alt-menu',
            				'class' => 'art-hmenu'	
            			)
            		);
            	?>
                </div>
            </div>
            <div class="cleared reset-box"></div>
<?php } ?>


			<?php  if ( theme_get_meta_option($this_post_id, 'theme_show_sb_top') && !theme_get_meta_option($this_post_id, 'theme_show_sb_top_wide') ) {get_sidebar('top');} ?>
			<?php 
				if(have_posts()) {
					
					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
						get_template_part('content', 'minimum');
						comments_template();
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
<?php } else { tt_get_footer_layout(); } ?>
<?php 
if ( theme_get_meta_option($this_post_id, 'theme_show_sb_bot') && theme_get_meta_option($this_post_id, 'theme_show_sb_bot_wide') ) {get_sidebar('bottom');}
get_footer(); ?>