<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Magazine #3 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/mag3-small.png" />
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Main Content Area', THEME_NS); ?> </div>
		<div class="accordion-content">
		<p>
		<strong><?php _e('Content above post blocks', THEME_NS); ?></strong>
		</p>
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above post blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Upper Post Area', THEME_NS); ?> </div>
		<div class="accordion-content">
		<p class="required">
		<strong><?php _e('Number of characters to display per post', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('featured_top_chars'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>

		<p class="required">
		<strong><?php _e('Post Thumbnail Size', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_top_thumb_width'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('featured_top_thumb_height'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
	
		<p class="required"><strong><?php _e('Number of posts to display in each content block', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_top_num'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' posts per block', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display in each post block area.', THEME_NS); ?></span>
		</p>
		<p class="required"><strong><?php _e('Featured Upper Left Category', THEME_NS); ?></strong><br />

		<?php $metabox->the_field('featured_top_left'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed in the upper left content block", THEME_NS); ?></span>
    	</p>
		<p class="required"><strong><?php _e('Featured Upper Right Category', THEME_NS); ?></strong><br />

		<?php $metabox->the_field('featured_top_right'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed in the upper right content block", THEME_NS); ?></span>

		</div>
		<div class="accordion-header"><?php _e('Lower Post Area Configuration', THEME_NS); ?></div>
		<div class="accordion-content">
		<p class="required"><strong><?php _e('How much content do you want to display?', THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('featured_bottom_chars'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in the each post content area.', THEME_NS); ?></span>
		</p>

		<p class="required"><strong><?php _e('Post Thumbnail Size', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_bottom_thumb_width'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('featured_bottom_thumb_height'); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>

		<p class="required"><strong><?php _e('Number of posts to display in each content block', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('featured_bottom_num'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' posts per block', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display in the bottom post block area.', THEME_NS); ?></span>
		</p>

		<p class="required"><strong><?php _e('Featured Lower Category', THEME_NS); ?></strong><br />
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
		<strong><?php _e('Change View More text', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('more_text'); // text field ?>
		<?php _e('Enter the text to appear before the category link. The default is "View more from". ', THEME_NS); ?><br /><input type="text" name="<?php $metabox->the_name(); ?>" size="40" value="<?php $metabox->the_value(); ?>"/>
		<span><?php _e('You can change the text that is displayed from the default "View more from" to whatever phrase you want.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Block Transparency', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m3_block_transparent'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to make the block background transparent.', THEME_NS); ?>
		<span><?php _e('This option allows you to make the background of the content block transparent. This is sometimes necessary when you have rounded corners. Occasionally the background color will show up on the corners making the block look odd.', THEME_NS); ?></span>
		</p>
		</div>
	</div>
</div>