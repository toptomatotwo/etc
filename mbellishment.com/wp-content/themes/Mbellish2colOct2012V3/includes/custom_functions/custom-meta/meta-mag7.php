<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Magazine #7 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/mag7-small.png" />
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
		<div class="accordion-header"><?php _e('Post Block Configuration', THEME_NS); ?> </div>
		<div class="accordion-content"> 
		<p class="required">
		<strong><?php _e('Post Content Block Appearance', THEME_NS); ?></strong><br />
		<?php $mb->the_field('m1_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Use sidebar block style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Use post article style', THEME_NS); ?>
		<span><?php _e('Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks. Choose whichever style looks best with your theme design.', THEME_NS); ?></span>
		</p>
		<p>
		<strong><?php _e('Change post title length', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('title_change'); // text field ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to change the title length to', THEME_NS); ?>
		<?php $metabox->the_field('title_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('characters', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to limit the displayed title. ', THEME_NS); ?></span>
		</p>		
		<p>
		<strong><?php _e('Change H2 font size', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_h2_change'); // text field ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to change the default H2 font size to', THEME_NS); ?>
		<?php $metabox->the_field('m1_h2_size'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px.', THEME_NS); ?>
		<span><?php _e('Enter the new font size for the H2 header text. ', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e('Number of posts to display per page', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_totalposts'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_totalposts'); ?>" size="2" value="<?php $metabox->the_value('m1_totalposts'); ?>"/><?php _e('posts per page.', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display per page. This overrides the Settings > Reading value.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e('Choose to display all posts', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('all_cats'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to display all posts from all categories.', THEME_NS); ?>
		<span><?php _e('This option allows you to display all of the posts from all of the categories. Checking this will ignore the category selection below. Displaying all categories will also allow the Sticky post feature to function.', THEME_NS); ?></span>
		<br />
		<strong><?php _e('Choose category to display', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_cat'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed.", THEME_NS); ?></span>
    	</p>
		
		<p>
		<strong><?php _e('Block transparency', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_block_transparent'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to make the block background transparent.', THEME_NS); ?>
		<span><?php _e('This option allows you to make the background of the content block transparent. This is sometimes necessary when you have rounded corners. Occasionally the background color will show up on the corners making the block look odd.', THEME_NS); ?></span>
		</p>		
		<div class="hr-meta"></div>
		<p class="required">
		<strong><?php _e('How much content to display', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('m1_content_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_content_length'); ?>" size="2" value="<?php $metabox->the_value('m1_content_length'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Featured image', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('feat_img'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="No"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check if you do not want to display the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to turn off the display of the featured image.', THEME_NS); ?></span>
		</p>
			
		<p class="required">
		<strong><?php _e('Featured image diminsions', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_img_width'); ?>
		<input type="text" name="<?php $metabox->the_name('m1_img_width'); ?>" size="2" value="<?php $metabox->the_value('m1_img_width'); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('m1_img_height'); ?>
		<input type="text" name="<?php $metabox->the_name('m1_img_height'); ?>" size="2" value="<?php $metabox->the_value('m1_img_height'); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e('Featured image shadow curl', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_image_shadow'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show a shadow under the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to display a shadow under the image to give it a curl effect. This looks best on a wide image but give it a try and see what you think.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e('Featured image position', THEME_NS); ?></strong><br />
		<span><?php _e('Choose where you want the featured image to appear.', THEME_NS); ?></span>
		<?php $mb->the_field('img_pos1');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'Before';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="After"<?php echo $mb->is_value('After')?' checked="checked"':''; ?>/> <?php _e('Position image after the content ', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Before"<?php echo $mb->is_value('Before')?' checked="checked"':''; ?>/> <?php _e('Position image before the content', THEME_NS); ?>
		<span><?php _e('You can have the featured page image appear before or after the content. Putting the image after the content tends to look better with a wide image.', THEME_NS); ?></span>		
    	</p>
		
		<p>
		<strong><?php _e('Post content box height', THEME_NS); ?></strong><br />
		<?php _e('Adjust the height of the content box:', THEME_NS); ?>
		<?php $metabox->the_field('m1_contentheight'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_contentheight'); ?>" size="2" value="<?php $metabox->the_value('m1_contentheight'); ?>"/><?php _e(' pixels', THEME_NS); ?>
		<span><?php _e('Determine the height of the two column content boxes. You can determine the height of the content block to match your image size and charater count.', THEME_NS); ?></span>
		</p>		
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust paragraph padding', THEME_NS); ?> </strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('m1_block_padding_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value(m1_block_padding_choose)) echo ' checked="checked"'; ?> />	<?php _e('Check to modify the default content paragraph padding values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the images that reside in the content boxes. If you want a zero padding value enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m1_block_padding_t'); ?>" value="<?php $metabox->the_value('m1_block_padding_t'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m1_block_padding_r'); ?>" value="<?php $metabox->the_value('m1_block_padding_r'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m1_block_padding_b'); ?>" value="<?php $metabox->the_value('m1_block_padding_b'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<div class="block-box"><input type="text" name="<?php $metabox->the_name('m1_block_padding_l'); ?>" value="<?php $metabox->the_value('m1_block_padding_l'); ?>" size=2 /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust image margin', THEME_NS); ?> </strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('m1_block_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('m1_block_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the default image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the images that reside in the content boxes. If you want a zero padding value enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<?php $mb->the_field('m1_block_margin_t'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_r'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_b'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_l'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
	<div class="clearfix"></div>			
		</div>	
	</div>
</div>