<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Page With Posts Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/blog-small.png" />
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Main Page Content', THEME_NS); ?></div>
		<div class="accordion-content">
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above post blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Blog Category Configuration', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p>
		<?php $metabox->the_field('all_cats'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to display all posts from all categories.', THEME_NS); ?>
		<span><?php _e('This option allows you to display all of the posts from all of the categories. Checking this will ignore the category selection below. Diplsaying all categories will also allow the Sticky post feature to function.', THEME_NS); ?></span>
		</p>
<div class="hr-meta"></div>		
		<p>
		<?php $metabox->the_field('blog_cat'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed.", THEME_NS); ?></span>
    	</p>
<div class="hr-meta"></div>		
		<p>
		<?php $metabox->the_field('number_posts'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('posts per page.', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display per page. This overrides the Settings > Reading value.', THEME_NS); ?></span>
		</p>
		</div>
	</div>
</div>