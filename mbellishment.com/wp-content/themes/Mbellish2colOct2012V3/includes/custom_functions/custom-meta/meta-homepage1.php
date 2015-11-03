<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Home Page #1 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/home1-small.png" />
		</p>
		</div>
		<div class="accordion-header"><?php _e('Overall Page Style', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p class="required">
		<strong><?php _e("Overall page style", THEME_NS); ?></strong><br />
                
		<?php $mb->the_field('home_page_sheet_style'); 
                    if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';}?>
                
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the overall page. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
		
		<div class="accordion-header"><?php _e('Top Wide Content Area', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p class="required">
		<strong><?php _e("Choose page", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed for the top wide content area.", THEME_NS); ?></span>
		<?php $metabox->the_field('home_page_top'); ?>
		<?php wp_dropdown_pages(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?><br />
		</p>
		
		<p class="required">
		<strong><?php _e("Choose block style", THEME_NS); ?></strong><br />
		<?php $mb->the_field('home_page_top_style'); if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
    	</p>
		</div>
		<div class="accordion-header"><?php _e('Middle Content Area', THEME_NS); ?></div>		
		<div class="accordion-content"> 
		<p class="required">
		<strong><?php _e("Content Block Style", THEME_NS); ?></strong><br />
		
		<?php $mb->the_field('home_page_mid_style'); if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?><br />
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e("image diminsions", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_img_width'); ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_img_width'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_img_width'); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('hp_mid_img_height'); ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_img_height'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_img_height'); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e("Image border", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_image_border'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to remove the default image border.', THEME_NS); ?>
		<span><?php _e('This option allows you to remove the theme defaul timage border. Sometime an image with no border looks better when used with the shadow curl.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e("image shadow curl", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_image_shadow'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show a shadow under the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to display a shadow under the image to give it a curl effect. This looks best on a wide image but give it a try and see what you think.', THEME_NS); ?></span>
		</p>
		
		<p class="required">
		<strong><?php _e("How much content to display", THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('hp_mid_content_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_content_length'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_content_length'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in each post content area.', THEME_NS); ?></span>
		</p>
		
		<p class="required">

		<strong><?php _e("Left Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed on the left side.", THEME_NS); ?></span>
		<?php $metabox->the_field('home_page_1'); ?>
		<?php wp_dropdown_pages(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>

		<?php $mb->the_field('img_pos1'); if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'Before';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="After"<?php echo $mb->is_value('After')?' checked="checked"':''; ?>/> <?php _e('Position image after', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Before"<?php echo $mb->is_value('Before')?' checked="checked"':''; ?>/> <?php _e('Position image before', THEME_NS); ?>
		<span><?php _e('You can have the featured page image appear before or after the content.', THEME_NS); ?></span>		
    	<br />
		<strong><?php _e("Middle Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed in the center.", THEME_NS); ?></span>		
		<?php $metabox->the_field('home_page_2'); ?>
		<?php wp_dropdown_pages(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<?php $mb->the_field('img_pos2');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'Before';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="After"<?php echo $mb->is_value('After')?' checked="checked"':''; ?>/> <?php _e('Position image after', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Before"<?php echo $mb->is_value('Before')?' checked="checked"':''; ?>/> <?php _e('Position image before', THEME_NS); ?>
		<span><?php _e('You can have the featured page image appear before or after the content.', THEME_NS); ?></span>
    	<br />
		<strong><?php _e("Right Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed on the right side.", THEME_NS); ?></span>		
		<?php $metabox->the_field('home_page_3'); ?>
		<?php wp_dropdown_pages(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<?php $mb->the_field('img_pos3');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'Before';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="After"<?php echo $mb->is_value('After')?' checked="checked"':''; ?>/> <?php _e('Position image after', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Before"<?php echo $mb->is_value('Before')?' checked="checked"':''; ?>/> <?php _e('Position image before', THEME_NS); ?>
		<span><?php _e('You can have the featured page image appear before or after the content.', THEME_NS); ?></span>
    	</p>
		
		<p>
		<strong><?php _e('Adjust image margin', THEME_NS); ?> </strong>	
		</p>
		<p>	
		<input type="checkbox" name="<?php $metabox->the_name('m1_block_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('m1_block_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the default image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the images that reside in the content boxes. If you want a zero margin value either enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
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
		<div class="accordion-header"><?php _e('Bottom Wide Content Area', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p>
		<?php $metabox->the_field('hp_bottom_show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content area below the main page content.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content (from the edit box above) at the bottom of the page.', THEME_NS); ?></span>
		</p>
	</div>
	</div>
</div>