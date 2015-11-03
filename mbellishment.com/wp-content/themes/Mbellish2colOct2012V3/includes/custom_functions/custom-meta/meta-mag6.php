<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Magazine #6 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/mag6-small.png" />
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Main Content Area', THEME_NS); ?> </div>
		<div class="accordion-content"> 
		<p>
		<strong><?php _e('Content above post blocks', THEME_NS); ?></strong><br />
		</p>
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above post blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Category/Post Content Area', THEME_NS); ?> </div>
		<div class="accordion-content"> 
		<p class="required">
		<strong><?php _e('How much content do you want to display?', THEME_NS); ?></strong><br />
		<?php $mb->the_field('blog_content');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'excerpt';} ?>
			<input type="radio" name="<?php $mb->the_name(); ?>" value="excerpt"<?php echo $mb->is_value('excerpt')?' checked="checked"':''; ?>/> <?php _e('Display just the excerpt', THEME_NS); ?>
			<span><?php _e('Choose whether you want to display the excerpt or to display a specific number of characters per custom post.', THEME_NS); ?></span>

		<input type="radio" name="<?php $mb->the_name(); ?>" value="characters"<?php echo $mb->is_value('characters')?' checked="checked"':''; ?>/> <?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('blog_character_count'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('blog_character_count'); ?>" size="2" value="<?php $metabox->the_value('blog_character_count'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('If you chose to limit the content by characters then enter the number of characters to display in the box above.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e('Categories To Exclude', THEME_NS); ?></strong><br />
		</p>
		<p>		
		<?php $metabox->the_field('blog_post_exclude'); // text field ?>
		<?php _e('Exclude these category ID\'s: ', THEME_NS); ?><input type="text" name="<?php $metabox->the_name('blog_post_exclude'); ?>" size="20" value="<?php $metabox->the_value('blog_post_exclude'); ?>"/>
		<span><?php _e('Normally this template will include all top level categories. You can enter a list of categories to exclude from the display. Enter the ID of each category seperated with a space or a comma. 
		Do not use the category name or slug.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e('Post Thumbnail Size', THEME_NS); ?></strong><br />
		
		<?php $metabox->the_field('blog_thumb_width'); ?>
		<input type="text" name="<?php $metabox->the_name('blog_thumb_width'); ?>" size="2" value="<?php $metabox->the_value('blog_thumb_width'); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('blog_thumb_height'); ?>
		<input type="text" name="<?php $metabox->the_name('blog_thumb_height'); ?>" size="2" value="<?php $metabox->the_value('blog_thumb_height'); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e('Number Of Post Title To Display On Right Side RecentPost Area', THEME_NS); ?></strong><br />
		
		<?php $metabox->the_field('blog_post_num'); // text field ?>
		<?php _e('Number of post titles to display: ', THEME_NS); ?><input type="text" name="<?php $metabox->the_name('blog_post_num'); ?>" size="2" value="<?php $metabox->the_value('blog_post_num'); ?>"/>
		<span><?php _e('Enter the number of post titles to display in the right side post area.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Minimum Height Of Right Side Recent Post Area', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('blog_right_block'); // text field ?>
		<?php _e('Minimum height of recent post area: ', THEME_NS); ?><input type="text" name="<?php $metabox->the_name('blog_right_block'); ?>" size="3" value="<?php $metabox->the_value('blog_right_block'); ?>"/> px
		<span><?php _e('Specify the minimum heigth of the recent post area. This is so the \'View more\' link will appear at the bottom of the block.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Use Block Header', THEME_NS); ?></strong><br />
		
		<?php $metabox->the_field('blog_block_header'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to display the block header above each post block.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the block hader style from the sidebar above each post block. It will also include the name of the category as the title.', THEME_NS); ?></span>
		</p>
		</div>
	</div>
</div>