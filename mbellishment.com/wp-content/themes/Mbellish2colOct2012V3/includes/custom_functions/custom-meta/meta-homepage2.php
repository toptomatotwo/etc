<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Home Page #2 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/home2-small.png" />
		</p>
		</div>	
         <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
         
		<div class="accordion-header"><?php _e('Top Wide Content Area', THEME_NS); ?></div>
		<div class="accordion-content">
		<p>
		<?php $metabox->the_field('hp_top_show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content area below the main page content.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content (from the edit box above) at the top of the page.', THEME_NS); ?></span>
    	</p>
		</div>
		<div class="accordion-header"><?php _e('Middle Gallery Content Area', THEME_NS); ?></div>		
		<div class="accordion-content">
		<p class="required">
		<strong><?php _e("Gallery Category", THEME_NS); ?></strong><br />
		<span><?php _e("Select which category you want displayed.", THEME_NS); ?></span>
		<?php $metabox->the_field('home_page_1'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
    	</p>
		
		<p class="required">
		<strong><?php _e("Content Block Style", THEME_NS); ?></strong><br />
		<?php $mb->the_field('home_page_mid_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?><br />
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e("How much content to display", THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('hp_mid_content_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_content_length'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_content_length'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in each post content area.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e("Total number of posts to display", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_gal_totalposts'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('hp_gal_totalposts'); ?>" size="2" value="<?php $metabox->the_value('hp_gal_totalposts'); ?>"/><?php _e('posts per page.', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display per page. This overrides the Settings > Reading value.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e("Choose a background color", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_gal_bg_color'); // text field ?>
		#<input type="text" id="bg_color" class="color {pickerFaceColor:'#FFFFFF'}" name="<?php $metabox->the_name(); ?>" size="6" value="<?php $metabox->the_value(); ?>"/><?php _e('Choose a color for the background of the gallery image.', THEME_NS); ?>
		<span><?php _e('Use the color picker to select a color to use for the background under the gallery image. The default color is white (FFFFFF). ', THEME_NS); ?></span>
		</p>
		</div>
</div>
</div>