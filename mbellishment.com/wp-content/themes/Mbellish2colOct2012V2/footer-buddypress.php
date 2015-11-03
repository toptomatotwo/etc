<?php  
$buddypress_content = ob_get_clean();
	global $post;
	theme_post_wrapper(
		array(
			'id' => theme_get_post_id(), 
			'class' => theme_get_post_class(),
			'title' => '', 
			'heading' => '', 
			'before' => '',
			'content' => $buddypress_content
		)
	);
tt_get_footer_layout();
?>
<?php tt_footer_before(); ?>
                <div class="art-footer">
                    <div class="art-footer-body">
                    <?php get_sidebar('footer'); ?>
                        <a href="<?php bloginfo('rss2_url'); ?>" class='art-rss-tag-icon' title="<?php printf(__('%s RSS Feed', THEME_NS), get_bloginfo('name')); ?>"></a>
                                <div class="art-footer-text">
                <?php tt_footer(); ?>
                                    <?php  
                                    	tt_footer_inside();
                                    	wp_nav_menu( array( 'theme_location' => 'footer-menu' , 'container_class' => 'footer-menu','fallback_cb' => '' ));
                                    	if (!theme_get_option('footer_html')) {
                                    	echo do_shortcode(theme_get_option('theme_footer_content')); }
                                    	else {echo stripslashes(theme_get_option('theme_footer_content'));}
                                    ?>
                                </div>
                        <div class="cleared"></div>
                    </div>
                </div>
                <?php tt_footer_after(); ?>
        		<div class="cleared"></div>
            </div>
        </div>
        <div class="cleared"></div>
        <p class="art-page-footer"></p>
        <div class="cleared"></div>
    </div>
    <div id="wp-footer">
	        <?php wp_footer(); ?>
	        <!-- <?php printf(__('%d queries. %s seconds.', THEME_NS), get_num_queries(), timer_stop(0, 3)); ?> -->
    </div>
</body>
</html>

