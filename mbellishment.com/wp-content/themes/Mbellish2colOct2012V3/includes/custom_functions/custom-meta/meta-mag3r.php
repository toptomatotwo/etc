<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Magazine #3 Reloaded Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/mag3r-small.png" />
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
		<div class="accordion-header"><?php _e('Upper Post Area Configuration', THEME_NS); ?></div>
		<div class="accordion-content"> 
		
		<p class="required">
		<strong><?php _e('Upper Post Area Style', THEME_NS); ?></strong><br />
		<?php $mb->the_field('featured_top_content_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_basic_wrapper"<?php echo $mb->is_value('theme_basic_wrapper')?' checked="checked"':''; ?>/> <?php _e('Basic style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the overall upper post area. This is the block that the group of posts are displayed in. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>

		
		<p class="required">
		<strong><?php _e('Upper Post Box Style', THEME_NS); ?></strong><br />
		<?php $mb->the_field('featured_top_style'); if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the upper post area. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>

		<p class="required">
		<strong><?php _e('How much content to display', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('featured_top_chars'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>
		
		<p><strong><?php _e('Post Thumbnail Size', THEME_NS); ?></strong></p>
		<p>		
		<?php $metabox->the_field('featured_top_thumb_width'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('featured_top_thumb_height'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>		
		<strong><?php _e("Upper Post Area Image Margin", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('featured_top_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('featured_top_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the upper post area image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the upper featured post area images. If you want a zero margin value either enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<?php $mb->the_field('featured_top_margin_t'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_top_margin_r'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_top_margin_b'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_top_margin_l'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
			
		
		<p class="required">
		<strong><?php _e('Number of posts to display in each content block', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_top_num'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' posts per block', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display in each post block area.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e('Featured Upper Left Category', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_top_left'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed in the upper left content block", THEME_NS); ?></span>
    	</p>
		
		
		<p class="required">
		<strong><?php _e('Featured Upper Right Category', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_top_right'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed in the upper right content block", THEME_NS); ?></span>
    	</p>
		</div>
		<div class="accordion-header"><?php _e('Lower Post Area Configuration', THEME_NS); ?></div>
		<div class="accordion-content"> 
		
		<p class="required">
		<strong><?php _e('Lower Post Area Style', THEME_NS); ?></strong><br />
		<?php $mb->the_field('featured_bottom_content_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_basic_wrapper"<?php echo $mb->is_value('theme_basic_wrapper')?' checked="checked"':''; ?>/> <?php _e('Basic style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the overall lower post area. This is the block that the group of posts are displayed in. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>
		
		
		<p class="required">
		<strong><?php _e('Lower Post Box Style', THEME_NS); ?></strong><br />
		<?php $mb->the_field('featured_bottom_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the lower post area. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>
		
		
		<p class="required">
		<strong><?php _e('How much content do you want to display?', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('featured_bottom_chars'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p><strong><?php _e('Post Thumbnail Size', THEME_NS); ?></strong></p>
		<p>
		<?php $metabox->the_field('featured_bottom_thumb_width'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('featured_bottom_thumb_height'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>		
		<strong><?php _e("Lower Post Area Image Margin", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('featured_botom_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('featured_botom_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the lower post area image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the lower featured post area images. If you want a zero margin value either enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<?php $mb->the_field('featured_bottom_margin_t'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_bottom_margin_r'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_bottom_margin_b'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<?php $mb->the_field('featured_bottom_margin_l'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		<div class="clearfix"></div>
		</p>
		
		<p class="required">
		<strong><?php _e('Number of posts to display in each content block', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_bottom_num'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' posts per block', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display in the bottom post block area.', THEME_NS); ?></span>
		</p>

		<p class="required">
		<strong><?php _e('Featured Lower Category', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_bottom'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed in the bottom left content block", THEME_NS); ?></span>
    	</p>
		</div>
		<div class="accordion-header"><?php _e('General Configuration (applies to upper and lower)', THEME_NS); ?></div>
		<div class="accordion-content"> 		
		<p>		
		<strong><?php _e('Swap Upper and Lower Post Areas', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('post_swap'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="No"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check if you want to swap the post area positions.', THEME_NS); ?>
		<span><?php _e('Checking this will swap the upper and lower content areas. The wide post area will appear on top and the upper content area (two columns) will appear on the bottom of the page.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>		
		<strong><?php _e('Change H2 Font Size', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('h2_size_change'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="No"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check if you change the font size of the H2 title.', THEME_NS); ?>
		</p>		
		<p>
		<?php $metabox->the_field('h2_size'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px. ', THEME_NS); ?>
		<span><?php _e('Enter the new pixel height for the H2 title.', THEME_NS); ?></span>
		
		</p>
		<div class="hr-meta"></div>
		<p>		
		<strong><?php _e('Featured Image', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('feat_img'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="No"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check if you do not want to display the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to turn off the display of the featured image.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>		
		<?php $metabox->the_field('more_text'); // text field ?>
		<?php _e('Enter the text to appear before the category link. The default is "View more from". ', THEME_NS); ?><br /><input type="text" name="<?php $metabox->the_name(); ?>" size="40" value="<?php $metabox->the_value(); ?>"/>
		<span><?php _e('You can change the text that is displayed from the default "View more from" to whatever phrase you want.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<?php $metabox->the_field('m3_block_transparent'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to make the block background transparent.', THEME_NS); ?>
		<span><?php _e('This option allows you to make the background of the content block transparent. This is sometimes necessary when you have rounded corners. Occasionally the background color will show up on the corners making the block look odd.', THEME_NS); ?></span>
		</p>
		</div>
	</div>
</div>