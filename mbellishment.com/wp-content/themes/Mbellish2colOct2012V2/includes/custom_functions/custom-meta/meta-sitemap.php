<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Site Map Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/sitemap-small.png" />
		</p>
		</div>
		<div class="accordion-header"><?php _e('Setup Site Map', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above site map blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<span><?php _e('This site map template uses the Wordpress custom menu (wp_nav_menu) to display the pages. By using the custom menu you can present just the pages you want on your sitemap and prevent the display of pages that you don\'t want the general site visitor to see. Even if you are not using the custom menu on your site you should still create one just for the site map.', THEME_NS); ?></span>
		</p>
		
		<p>
 		<?php $metabox->the_field('page_list_source'); // text field ?>
		<?php _e('Enter the name of the custom menu: ', THEME_NS); ?><input type="text" name="<?php $metabox->the_name(); ?>" size="15" value="<?php $metabox->the_value(); ?>"/>
		<span><?php _e('If you do not define a custom menu then leave the above blank and the site map will use wp_list_pages and display every page that is published.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Content Style', THEME_NS); ?></strong>
		</p>
		<p>
		<?php $mb->the_field('layout_style'); // radio buttons ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Yes"<?php echo $mb->is_value('Yes')?' checked="checked"':''; ?>/> <?php _e('Use sidebar block style', THEME_NS); ?>

		<input type="radio" name="<?php $mb->the_name(); ?>" value="No"<?php echo $mb->is_value('No')?' checked="checked"':''; ?>/> <?php _e('Use post article style', THEME_NS); ?>
		</p>
		<p>		
		<span><?php _e('Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks. Choose whichever style looks best with your theme design.', THEME_NS); ?></span>
		</p>
		</div>
	</div>
</div>