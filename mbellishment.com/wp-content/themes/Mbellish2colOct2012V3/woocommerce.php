<?php get_header();
global $sb_primary,$sb_secondary ;$sb_primary = 'default';$sb_secondary = 'secondary'; 
ob_start();
woocommerce_content();
$woo_content = ob_get_clean(); ?>
<div class="art-layout-wrapper">
    <div class="art-content-layout">
        <div class="art-content-layout-row">
            <div class="art-layout-cell art-content">
			<?php get_sidebar('top'); ?>
			<?php 
			global $post;
			theme_post_wrapper(
				array(
						'id' => theme_get_post_id(), 
						'class' => theme_get_post_class(),
						'thumbnail' => theme_get_post_thumbnail(),
						'title' => '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . strip_tags(get_the_title()) . '">' . get_the_title() . '</a>', 
		        		'heading' => theme_get_option('theme_'.(is_single()?'single':'posts').'_article_title_tag'),
						'before' => theme_get_metadata_icons( '', 'header' ),
						'content' => $woo_content, 
						'after' => theme_get_metadata_icons( '', 'footer' )
				)
			);
		    ?>
			<?php get_sidebar('bottom'); ?>
              <div class="cleared"></div>
            </div>
            <div class="art-layout-cell art-sidebar1">
              <?php get_sidebar('default'); ?>
              <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
<div class="cleared"></div>
<?php get_footer(); ?>