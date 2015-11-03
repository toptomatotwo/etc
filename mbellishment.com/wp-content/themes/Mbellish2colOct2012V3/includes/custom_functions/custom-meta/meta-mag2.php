<div class="my_meta_control">
<div id="accordion-container">	
		<div class="accordion-header"><?php _e('Magazine #2 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/mag2-small.png" />
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Main Content Area', THEME_NS); ?> </div> 
		<div class="accordion-content">
		<p>
		<strong><?php _e('Content area above post blocks', THEME_NS); ?></strong>
		</p>
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above post blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Post Block Settings', THEME_NS); ?></div>
		<div class="accordion-content">
		<p class="required">
		<strong><?php _e('Post block style', THEME_NS); ?></strong><br />
		<?php $mb->the_field('m2_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name('m2_style'); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Use sidebar block style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name('m2_style'); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Use post article style', THEME_NS); ?>
		<span><?php _e('Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks. Choose whichever style looks best with your theme design.', THEME_NS); ?></span>
		</p>

		<p class="required">
		<strong><?php _e('How many posts per page to display', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m2_totalposts'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m2_totalposts'); ?>" size="2" value="<?php $metabox->the_value('m2_totalposts'); ?>"/><?php _e('posts per page.', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display per page. This overrides the Settings > Reading value.', THEME_NS); ?></span>
		</p>

		<p class="required">
		<strong><?php _e('Content source', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('all_cats'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to display all posts from all categories.', THEME_NS); ?>
		<span><?php _e('This option allows you to display all of the posts from all of the categories. Checking this will ignore the category selection below. Diplsaying all categories will also allow the Sticky post feature to function.', THEME_NS); ?></span>

		<br />
		<?php $metabox->the_field('m2_cat'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed.", THEME_NS); ?></span>
    	</p>
		<p>
		<strong><?php _e('Block transparency', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m2_block_transparent'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to make the block background transparent.', THEME_NS); ?>
		<span><?php _e('This option allows you to make the background of the content block transparent. This is sometimes necessary when you have rounded corners. Occasionally the background color will show up on the corners making the block look odd.', THEME_NS); ?></span>
		</p>
				

		<p class="required">
		<strong><?php _e('How many characters to display', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('m2_content_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m2_content_length'); ?>" size="3" value="<?php $metabox->the_value('m2_content_length'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>		
		<strong><?php _e('Turn off featured image', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('feat_img'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="No"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check if you do not want to display the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to turn off the display of the featured image.', THEME_NS); ?></span>
		</p>			
		<p>
		<strong><?php _e('Show a shadow under image', THEME_NS); ?></strong><br />
		<span><?php _e('Choose whether you want a shadow under the image or not.', THEME_NS); ?></span>
		<?php $metabox->the_field('hp_mid_image_shadow'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show a shadow under the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to display a shadow under the image to give it a curl effect. This looks best on a wide image but give it a try and see what you think.', THEME_NS); ?></span>
		</p>		
		<p>
		<strong><?php _e('Image size', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m2_img_width'); ?>
		<input type="text" name="<?php $metabox->the_name('m2_img_width'); ?>" size="2" value="<?php $metabox->the_value('m2_img_width'); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('m2_img_height'); ?>
		<input type="text" name="<?php $metabox->the_name('m2_img_height'); ?>" size="2" value="<?php $metabox->the_value('m2_img_height'); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust paragraph margin', THEME_NS); ?> </strong>
		</p>
		<p>
		<input type="checkbox" name="<?php $metabox->the_name('m2_block_padding_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value(m2_block_padding_choose)) echo ' checked="checked"'; ?> />	<?php _e('Check to modify the default content paragraph margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the paragraphs that reside in the content boxes. If you want a zero margin value enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_padding_t'); ?>" value="<?php $metabox->the_value('m2_block_padding_t'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_padding_r'); ?>" value="<?php $metabox->the_value('m2_block_padding_r'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_padding_b'); ?>" value="<?php $metabox->the_value('m2_block_padding_b'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_padding_l'); ?>" value="<?php $metabox->the_value('m2_block_padding_l'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust image margin', THEME_NS); ?> </strong>	
		</p>		
		<p>	
		<input type="checkbox" name="<?php $metabox->the_name('m2_block_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value(m2_block_margin_choose)) echo ' checked="checked"'; ?> />	<?php _e('Check to modify the default image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the images that reside in the content boxes. If you want a zero margin value enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_margin_t'); ?>" value="<?php $metabox->the_value('m2_block_margin_t'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_margin_r'); ?>" value="<?php $metabox->the_value('m2_block_margin_r'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_margin_b'); ?>" value="<?php $metabox->the_value('m2_block_margin_b'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m2_block_margin_l'); ?>" value="<?php $metabox->the_value('m2_block_margin_l'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
		</div>
	</div>
</div>