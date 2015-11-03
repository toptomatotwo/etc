<?php if (file_exists(TEMPLATEPATH.'/page-template-mag1.php')) { ?>
	<div id="tab1a" title=""><!-- Template Options Magazine Start -->
	<?php // first column ?>

 	<div class="metabox-holder">
	
		<div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #1 Template Options", 'kubrick'); ?></h3>
			<div class="inside">

				<p>Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks.</p>
				<p> 
				<label><input type="radio" name="<?php echo $settings; ?>[m1_style]" value="Yes" <?php checked('Yes', tt_option('m1_style')); ?> />
					Use sidebar block style</label><br />
				<label><input type="radio" name="<?php echo $settings; ?>[m1_style]" value="No" <?php checked('No', tt_option('m1_style')); ?> />
					Use post article style</label>
				</p>			
			
				<p><?php _e("Number of characters to limit the post content", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m1_content_length]" value="<?php echo tt_option('m1_content_length'); ?>" size="3" /> characters</p>
				<p><?php _e("Number of posts to show per page", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m1_totalposts]" value="<?php echo tt_option('m1_totalposts'); ?>" size="3" /></p>
				
				<p><?php _e("Thumbnail dimensions", 'kubrick'); ?> (<?php _e("Width x Height", 'kubrick'); ?>)<br />
				<input type="text" name="<?php echo $settings; ?>[m1_img_width]" value="<?php echo tt_option('m1_img_width'); ?>" size="3" />px wide by <input type="text" name="<?php echo $settings; ?>[m1_img_height]" value="<?php echo tt_option('m1_img_height'); ?>" size="3" />px high</p>

				<p><?php _e("The height (in pixels) of content block", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m1_contentheight]" value="<?php echo tt_option('m1_contentheight'); ?>" size="3" /> px</p>

				<p><?php echo "<strong>Block body padding:</strong>"; ?><br />
			
				<input type="checkbox" name="<?php echo $settings; ?>[m1_block_padding_choose]" value="Yes" <?php checked('Yes',tt_option('m1_block_padding_choose')); ?> /> Check to modify the default padding values<br />
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_padding_t]" value="<?php echo tt_option('m1_block_padding_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top   </div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_padding_r]" value="<?php echo tt_option('m1_block_padding_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right </div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_padding_b]" value="<?php echo tt_option('m1_block_padding_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_padding_l]" value="<?php echo tt_option('m1_block_padding_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left  </div></div>
				</p>
				<div class="clearfix"></div>
				
				<p><?php echo "<strong>Block content margin:</strong>"; ?><br />
				<input type="checkbox" name="<?php echo $settings; ?>[m1_block_margin_choose]" value="Yes" <?php checked('Yes',tt_option('m1_block_margin_choose')); ?> /> Check to modify the default paragraph margin values<br />

				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_margin_t]" value="<?php echo tt_option('m1_block_margin_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_margin_r]" value="<?php echo tt_option('m1_block_margin_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_margin_b]" value="<?php echo tt_option('m1_block_margin_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m1_block_margin_l]" value="<?php echo tt_option('m1_block_margin_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>

				</p>
				<div class="clearfix"></div>

				<p><?php _e("Do you want make the content block transparent?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[m1_block_transparent]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('m1_block_transparent')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('m1_block_transparent')); ?>>No</option>
				</select></p>

				<p><?php _e("Do you want a title at the top of the page?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[m1_header_text_include]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('m1_header_text_include')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('m1_header_text_include')); ?>>No</option>
				</select></p>
				<p><?php _e("Title for page", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m1_heading_text]" value="<?php echo tt_option('m1_heading_text'); ?>" size="45" /></p>								
				
			</div> <!-- Inside End -->
		</div>
    
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>				
        <p><strong>Reset</strong> will reset all tabs to their default values.</p> 
		<hr class="seperator" />
		<h4>Sample Template With vSlider Active</h4>
		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/mag1-img.jpg" />

		
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
            
	<div class="metabox-holder">
        <div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #1 Template Help", 'kubrick'); ?></h3>
		<div class="inside">
		<p>
		The Magazine #1 template creates a page with two columns of post content blocks that can contain a thumbnail image. You can control the how many characters to display per 
		post. You can also display a thumbnail image with each post and control the block height.
		</p>
		<h4>Customizable Items</h4>
		<p>
		<ol>
		<li>Choose a style type for the post blocks. You can choose either the style from the post article or from the sidebar widget block. Try both types because every theme is different so choose what looks best. Not all themes will look good with this layout style.</li>
		<li>Select the number of characters that you want for each post. You will need to adjust this value to get it looking just right </li>
		<li>Select the number of posts you want to display per page. This over-rides the dashboard default.</li>
		<li>Choose a thumbnail size (see note below).</li>
		<li>Block height (in pixels). Adjust this if you need larger blocks.</li>
		<li>You can modify the padding to all sides of the post content area. Sometimes this is needed to make it look balanced. </li>
		<li>You can also modify the margin for the images.</li>
		<li>You can choose to make the color of the background block transparent or not. Some themes cause a white or colored background to be present. If that's the case you can make it transparent and get rid of it.</li>
		<li>You can have a heading at the top of the page. Or you can turn it off. </li>
		</ol>
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
		<hr class="seperator" />
		<h4>Image Slider</h4>
		<p>
		This template also supports the <a href="http://www.vibethemes.com/vslider-wordpress-image-slider-plugin/" target="blank">vSlider Image Slider</a> plugin. All you need to do is install and activate the plugin. The necessary code has been installed in the template. 
		After activation and configuration of the plugin, the images will appear at the top of the content area.
		</p>		
		</div>
        </div>		
            
	</div>
    
	<?php // end second column ?>
	</div><!-- tab 1 end --> 
	<?php } ?>