<?php global $wpalchemy_media_access; ?>
<div class="my_meta_control">
		<div class="accordion-header2"><?php _e('Header Image Properties', THEME_NS); ?></div>
		<div class="accordion-content2" >		

		<p>
		<span><?php _e('This option allows you to change the header image for this page or post only.', THEME_NS); ?></span>
		</p>
<?php if (!theme_get_option('cust_header'))  { ?>
		<p>
		<strong><?php _e('Header Primary Image URL', THEME_NS); ?></strong><br />
		</p>
		<p>
		<?php $metabox->the_field('header_change'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Change the header image.', THEME_NS); ?>
		</p>
		
		<p>
		<?php $mb->the_group_open(); ?>		
		<?php $metabox->the_field('header_url'); // text field ?>
		<?php $wpalchemy_media_access->setGroupName('url')->setInsertButtonLabel('Insert Image'); ?>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(); ?>	
		
		<span class="below-button"><?php _e('This is the main header image. If the header has square corners then this is typically the only header image needed.', THEME_NS); ?></span>
		<?php if ($metabox->get_the_value('header_change')  == 'Yes') { ?>
		<div class="uploaded-image" ><img style="max-width:220px;margin:0;" src="<?php $metabox->the_value(); ?>"  /></div>
		<?php } ?>
		</p>
		<p>
		<strong><?php _e("Primary Header Placement", THEME_NS); ?></strong><br />
		<?php $mb->the_field('header_position');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'div.art-header';} ?>
                <input type="radio" name="<?php $mb->the_name(); ?>" value="div.art-header"<?php echo $mb->is_value('div.art-header')?' checked="checked"':''; ?>/> <?php _e('Place image in DIV', THEME_NS); ?><br />
		<input type="radio" name="<?php $mb->the_name(); ?>" value=".art-header:before"<?php echo $mb->is_value('.art-header:before')?' checked="checked"':''; ?>/> <?php _e('Place image :before', THEME_NS); ?><br />
		<input type="radio" name="<?php $mb->the_name(); ?>" value=".art-header:after"<?php echo $mb->is_value('.art-header:after')?' checked="checked"':''; ?>/> <?php _e('Place image :after', THEME_NS); ?>
		<span><?php _e("This determines which CSS class to use to position the header image.", THEME_NS); ?></span>
		</p>
		<p>
		<strong><?php _e('Header Secondary Image URL', THEME_NS); ?></strong><br />
		</p>
		<p>
		<?php $metabox->the_field('header2_change'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Change secondary image.', THEME_NS); ?>
		</p>
		<p>
		
		<?php $metabox->the_field('header_url2'); // text field ?>
		<?php $wpalchemy_media_access->setGroupName('url2')->setInsertButtonLabel('Add Image'); ?>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(); ?>	
		<?php $mb->the_group_close(); ?>
		<span class="below-button"><?php _e('This image is a transparent PNG associated with a header that has rounded corners.', THEME_NS); ?></span>
		</p>
		<?php if ($metabox->get_the_value('header2_change')  == 'Yes') { ?>
		<div class="uploaded-image" ><img style="max-width:220px;margin:0;" src="<?php $metabox->the_value(); ?>"  /></div>
		<?php } ?>
		<p>
		<strong><?php _e("Secondary Header Placement", THEME_NS); ?></strong><br />
		<?php $mb->the_field('header_position2');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'div.art-header';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="div.art-header"<?php echo $mb->is_value('div.art-header')?' checked="checked"':''; ?>/> <?php _e('Place image in DIV', THEME_NS); ?><br />
		<input type="radio" name="<?php $mb->the_name(); ?>" value=".art-header:before"<?php echo $mb->is_value('.art-header:before')?' checked="checked"':''; ?>/> <?php _e('Place image :before', THEME_NS); ?><br />
		<input type="radio" name="<?php $mb->the_name(); ?>" value=".art-header:after"<?php echo $mb->is_value('.art-header:after')?' checked="checked"':''; ?>/> <?php _e('Place image :after', THEME_NS); ?>
		<span><?php _e("You need to choose before or after. This determines which CSS pseudo class to use to position the header image.", THEME_NS); ?></span>
		</p>
		<?php } else { ?>

		<p style='color:red; font-size:12px;'>
		<?php _e('You need to disable the Wordpress Custom Header Image feature in the Theme Options->Advanced Options 2 tab before you can use this feature.', THEME_NS); ?>
		</p>			
		<?php } ?>

		</div>
	<div id="accordion-container2">
		<div class="accordion-header2"><?php _e('Background Image Properties', THEME_NS); ?></div>
		<div class="accordion-content2">
			<?php if (!theme_get_option('cust_back'))  { ?>
		<p>
		<?php $metabox->the_field('back_change'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Change background image.', THEME_NS); ?>
		</p>
		<p>
		<span><?php _e('This option allows you to change the background image for this page/post only.', THEME_NS); ?></span>
		</p>
		
		<p>
		<strong><?php _e('Background Image', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('background_url'); // text field ?>
		<?php $wpalchemy_media_access->setGroupName('backurl')->setInsertButtonLabel('Insert Image'); ?>
        <?php echo $wpalchemy_media_access->getField(array('name' => $mb->get_the_name(), 'value' => $mb->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(); ?>		
		<span class="below-button"><?php _e('Enter the background image URL. ', THEME_NS); ?></span>
		<?php if ($metabox->get_the_value('back_change')  == 'Yes') { ?>
		<div class="uploaded-image" ><img style="max-width:220px;margin:0;" src="<?php $metabox->the_value(); ?>"  /></div>
		<?php } ?>
		</p>
		<p>
		<strong><?php _e('Background Repeat', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('background_repeat'); ?>
		<?php $selected = ' selected="selected"'; ?>
		<select name="<?php $metabox->the_name(); ?>">
			<option value="no-repeat"<?php if ($metabox->get_the_value() == '_no_repeat') echo $selected; ?>>no-repeat</option>
			<option value="top center no-repeat"<?php if ($metabox->get_the_value() == 'top center no-repeat') echo $selected; ?>>top center no-repeat</option>
			<option value="top right no-repeat"<?php if ($metabox->get_the_value() == 'top right no-repeat') echo $selected; ?>>top right no-repeat</option>
			<option value="fixed no-repeat"<?php if ($metabox->get_the_value() == 'fixed no-repeat') echo $selected; ?>>fixed no-repeat</option>
			<option value="top center fixed no-repeat"<?php if ($metabox->get_the_value() == 'top center fixed no-repeat') echo $selected; ?>>top center fixed no-repeat</option>
			<option value="top right fixed no-repeat"<?php if ($metabox->get_the_value() == 'top right fixed no-repeat') echo $selected; ?>>top right fixed no-repeat</option>
			<option value="top left repeat-x"<?php if ($metabox->get_the_value() == 'top left repeat-x') echo $selected; ?>>top left repeat-x</option>
			<option value="top center repeat-x"<?php if ($metabox->get_the_value() == 'top center repeat-x') echo $selected; ?>>top center repeat-x</option>
			<option value="top right repeat-x"<?php if ($metabox->get_the_value() == 'top right repeat-x') echo $selected; ?>>top right repeat-x</option>
			<option value="top left fixed repeat-x"<?php if ($metabox->get_the_value() == 'top left fixed repeat-x') echo $selected; ?>>top left fixed repeat-x</option>
			<option value="top center fixed repeat-x"<?php if ($metabox->get_the_value() == 'top center fixed repeat-x') echo $selected; ?>>top center fixed repeat-x</option>
			<option value="top right fixed repeat-x"<?php if ($metabox->get_the_value() == 'top right fixed repeat-x') echo $selected; ?>>top right fixed repeat-x</option>				
			<option value="top left repeat-y"<?php if ($metabox->get_the_value() == 'top left repeat-y') echo $selected; ?>>top left repeat-y</option>
			<option value="top center repeat-y"<?php if ($metabox->get_the_value() == 'top center repeat-y') echo $selected; ?>>top center repeat-y</option>
			<option value="top right repeat-y"<?php if ($metabox->get_the_value() == 'top right repeat-y') echo $selected; ?>>top right repeat-y</option>
			<option value="top left fixed repeat-y"<?php if ($metabox->get_the_value() == 'top left fixed repeat-y') echo $selected; ?>>top left fixed repeat-y</option>
			<option value="top center fixed repeat-y"<?php if ($metabox->get_the_value() == 'top center fixed repeat-y') echo $selected; ?>>top center fixed repeat-y</option>
			<option value="top right fixed repeat-y"<?php if ($metabox->get_the_value() == 'top right fixed repeat-y') echo $selected; ?>>top right fixed repeat-y</option>				
			<option value="repeat"<?php if ($metabox->get_the_value() == 'repeat') echo $selected; ?>>repeat</option>
			<option value="fixed repeat"<?php if ($metabox->get_the_value() == 'fixed repeat') echo $selected; ?>>fixed repeat</option>
		</select>
		<span><?php _e('Enter the background position. ', THEME_NS); ?></span>
		</p>
		<p>
		<strong><?php _e('Background Color', THEME_NS); ?></strong><br />
		<?php $mb->the_field('background_color'); ?>
		<input type="text" class="color {pickerFaceColor:'#FFFFFF'} color-box-230" name="<?php $metabox->the_name(); ?>" size="10" value="<?php $metabox->the_value(); ?>"/><?php _e('', THEME_NS); ?>
		<span><?php _e('Enter the background color. ', THEME_NS); ?></span>
		</p>
		<?php } else { ?>

		<p style='color:red; font-size:12px;'>
		<?php _e('You need to disable the Wordpress Custom background feature in the Theme Options->Advanced Options 2 tab before you can use this feature.', THEME_NS); ?>
		</p>			
		<?php } ?>
		</div>


	</div>
</div>