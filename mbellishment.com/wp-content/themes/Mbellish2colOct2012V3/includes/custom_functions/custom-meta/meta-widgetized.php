<div class="accordion-header"><?php _e('Widgetized Area Below Header/Navigation', THEME_NS); ?> </div>
<div class="accordion-content"> 
		<p>
		<?php $metabox->the_field('hp_widgetized_show'); // checkbox ?>
		<input id="checkme" type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show the widgetized sub-header area.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the home page widgetized area. This section displays the widgets that are placed in the Home Page Left and Home Page Right widget areas in Admin > Widgets.', THEME_NS); ?></span>
		</p>
		<div id="extra">
		<p class="required-check">
		<strong><?php _e("Widgetized Area Position", THEME_NS); ?></strong><br />
		<?php $mb->the_field('hp_widgetized_position');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'Above';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Above"<?php echo $mb->is_value('Above')?' checked="checked"':''; ?>/> <?php _e('Above sidebar and content areas', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Below"<?php echo $mb->is_value('Below')?' checked="checked"':''; ?>/> <?php _e('Above the content area only', THEME_NS); ?>
		<span><?php _e("Choose where you want the widgetized area to appear. Above the sidebar/content area, directly below header or within the content area only.", THEME_NS); ?></span>
		</p>

		<p class="required-check">
		<strong><?php _e("Widgetized Area Style", THEME_NS); ?></strong><br />
		<?php $mb->the_field('home_page_widget_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio"  name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>

		<p class="required-check">
		<strong><?php _e("Widgetized Area Size", THEME_NS); ?></strong><br />
		<?php $mb->the_field('home_page_widget_size');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'home_page_header_wide';}  ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="home_page_header"<?php echo $mb->is_value('home_page_header')?' checked="checked"':''; ?>/> <?php _e('Two widget areas - 66%/33% split', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="home_page_header_wide"<?php echo $mb->is_value('home_page_header_wide')?' checked="checked"':''; ?>/> <?php _e('One widget area - Full width', THEME_NS); ?>
		<span><?php _e("Choose the size you would like for the widgetized are.", THEME_NS); ?></span>
		</p>
		
		<div class="hr-meta"></div>
		<p>	
		<strong><?php _e("Widgetized Area Margin", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('hp_top_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('hp_top_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the widgetized area margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the home page widgetized area. If you want a zero margin value either enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<?php $mb->the_field('hp_top_margin_t'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<?php $mb->the_field('hp_top_margin_r'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<?php $mb->the_field('hp_top_margin_b'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<?php $mb->the_field('hp_top_margin_l'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
		</div>
               </div>