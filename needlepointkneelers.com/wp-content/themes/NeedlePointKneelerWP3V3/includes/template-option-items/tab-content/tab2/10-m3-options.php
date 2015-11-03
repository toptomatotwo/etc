	<div id="tab3a" title=""><!-- Template Options Magazine Start -->
	<?php // first column ?>

 	<div class="metabox-holder">
	
		<div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #3 Template Options", 'kubrick'); ?></h3>
			<div class="inside">
			<h4>Featured Top Content Area</h4>

				<p><?php _e("Number of characters to limit the post content", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[featured_top_chars]" value="<?php echo tt_option('featured_top_chars'); ?>" size="3" /> characters</p>
				<p><?php _e("Number of posts to show", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[featured_top_num]" value="<?php echo tt_option('featured_top_num'); ?>" size="3" /></p>
				
				<p><?php _e("Thumbnail dimensions", 'kubrick'); ?> (<?php _e("Width x Height", 'kubrick'); ?>)<br />
				<input type="text" name="<?php echo $settings; ?>[featured_top_thumb_width]" value="<?php echo tt_option('featured_top_thumb_width'); ?>" size="3" /> px wide by <input type="text" name="<?php echo $settings; ?>[featured_top_thumb_height]" value="<?php echo tt_option('featured_top_thumb_height'); ?>" size="3" /> px high</p>
				
				<h4><?php _e("Featured Top Left", 'kubrick'); ?></h4>
				<p><?php _e("Select which category you want displayed", 'kubrick'); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => tt_option('featured_top_left'), 'name' => $settings.'[featured_top_left]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?></p>
				
				<h4><?php _e("Featured Top Right", 'kubrick'); ?></h4>
				<p><?php _e("Select which category you want displayed", 'kubrick'); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => tt_option('featured_top_right'), 'name' => $settings.'[featured_top_right]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?></p>
				
				<hr />
				<h4><?php _e("Featured Bottom", 'kubrick'); ?></h4>
				<p><?php _e("Select which category you want displayed", 'kubrick'); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => tt_option('featured_bottom'), 'name' => $settings.'[featured_bottom]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?></p>
				<p><?php _e("Number of characters to limit the post content", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[featured_bottom_chars]" value="<?php echo tt_option('featured_bottom_chars'); ?>" size="3" /> characters</p>
				<p><?php _e("Number of posts to show", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[featured_bottom_num]" value="<?php echo tt_option('featured_bottom_num'); ?>" size="3" /></p>
				
				<p><?php _e("Thumbnail dimensions", 'kubrick'); ?> (<?php _e("Width x Height", 'kubrick'); ?>)<br />
				<input type="text" name="<?php echo $settings; ?>[featured_bottom_thumb_width]" value="<?php echo tt_option('featured_bottom_thumb_width'); ?>" size="3" /> px wide by <input type="text" name="<?php echo $settings; ?>[featured_bottom_thumb_height]" value="<?php echo tt_option('featured_bottom_thumb_height'); ?>" size="3" /> px high</p>
				
				<hr />
				<p><?php _e("Do you want make the content blocks transparent?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[m3_block_transparent]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('m3_block_transparent')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('m3_block_transparent')); ?>>No</option>
				</select></p>
			</div>
		</div>
    
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save All Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset All Settings'); ?>" />
		</p>				
        <p><strong>Reset</strong> will reset all tabs to their default values.</p>
		<hr class="seperator" />
		<h4>Sample Template With vSlider Active</h4>
		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/mag3-img.jpg" />		
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
            
	<div class="metabox-holder">
        <div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #3 Template Help", 'kubrick'); ?></h3>
		<div class="inside">
		<p>
		The Magazine #3 template creates a page with two narrow post content blocks positioned above a normal width post content area.
		</p>
		<h4>Top Left & Right Post Content Areas</h4>
		<p>
		<ol>
		
		<li>Select the number of characters that you want for each post. You will need to adjust this value to get it looking just right. Applies to both columns </li>
		<li>Select the number of posts you want to display for each column. Applies to both columns</li>
		<li>Choose a thumbnail size (see note below)</li>
		<li>Select the category you want posts displayed from. Use a different category for each area</li>
		</ol>
		</p>
		<hr />
		<h4>Bottom Content Area</h4>
		<p>
		The lower content area has the same selections as the top.
		<ol>
		<li>Select the category to display </li>
		<li>Select the number of characters to display </li>
		<li>Select the number of posts to display </li>
		<li>Select a thumbnail size </li>
		</ol>
		</p>
		<p>
		The last choice is if you need to make the block content color transparent. Some layouts have a white or color background that shows up. If this is the case then you can make the background 
		transparent to attempt to fix this.
	
		</p>
		<hr class="seperator" />
		<h4>Image Slider</h4>
		<p>
		This template also supports the <a href="http://www.vibethemes.com/vslider-wordpress-image-slider-plugin/" target="blank">vSlider Image Slider</a> plugin. All you need to do is install and activate the plugin. The necessary code has been installed in the template. 
		After activation and configuration of the plugin, the images will appear at the top of the content area.
		</p>
		<hr />
		<p>
		<strong>Note on thumbnails:</strong> This template uses a great plugin by <em><a title="Opens in new window" href="http://justintadlock.com" target="_blank">Justin Tadlock</a></em> called <em><a title="Opens in new window" href="http://justintadlock.com/archives/2008/05/27/get-the-image-wordpress-plugin" target="_blank" >Get the Image</a></em> to display an image attached to the post. 
		Don't worry this plugin is automatically installed when the theme is activated. <a href="<?php bloginfo('template_url'); ?>/includes/get-the-image.html" target="_blank" title="Opens in new window">You can view the readme file here.</a> 
		</p><p>The readme file will show you the different ways to 
		attach an image. The easiest will be to use the built-in post_thumbnail option that appears in you post/page edit screen. But you now have some choises.
		</p> 
		<p>
		The default dimensions should work for most themes. Making them too large or too small may break the CSS layout. Play around until you get the look you want. 
		Try to keep all of the images full size the same or you may have size variations on each post.
		</p>
	
		</div>
        </div>		
            
	</div>
    
	<?php // end second column ?>
	</div><!-- tab 1 end --> 