	<div id="tab4a" title=""><!-- Template Options Magazine Start -->
	<?php // first column ?>

 	<div class="metabox-holder">
	
		<div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #4 Template Options", 'kubrick'); ?></h3>
			<div class="inside">
				<h4>General Settings</h4>
				
				<p>Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks.</p>
				<p> 
				<label><input type="radio" name="<?php echo $settings; ?>[m4_style]" value="Yes" <?php checked('Yes', tt_option('m4_style')); ?> />
					Use sidebar block style</label><br />
				<label><input type="radio" name="<?php echo $settings; ?>[m4_style]" value="No" <?php checked('No', tt_option('m4_style')); ?> />
					Use post article style</label>
				</p>
				

				
				<p><?php _e("Number of posts to show per page", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4_totalposts]" value="<?php echo tt_option('m4_totalposts'); ?>" size="3" /></p>
				<p><?php _e("Select which category you want displayed", 'kubrick'); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => tt_option('m4_cat'), 'name' => $settings.'[m4_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?></p>
				<p><?php _e("Do you want make the content block transparent?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[m4_block_transparent]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('m4_block_transparent')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('m4_block_transparent')); ?>>No</option>
				</select></p>
				<p><?php _e("Do you want a title at the top of the page?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[m4_header_text_include]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('m4_header_text_include')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('m4_header_text_include')); ?>>No</option>
				</select></p>
				<p><?php _e("Title for page", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4_heading_text]" value="<?php echo tt_option('m4_heading_text'); ?>" size="45" /></p>								
				<p><?php _e("Block body padding (in pixels)", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4_block_padding]" value="<?php echo tt_option('m4_block_padding'); ?>" size="3" /></p>
				<hr class="seperator" />
				<h4>Featured Post Settings</h4>
				<p><?php _e("Number of featured posts to display", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4w_featured_qty]" value="<?php echo tt_option('m4w_featured_qty'); ?>" size="3" /></p>
				<p><?php _e("Number of characters to limit the post content", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4w_content_length]" value="<?php echo tt_option('m4w_content_length'); ?>" size="3" /> characters</p>
				<p><?php _e("Thumbnail dimensions", 'kubrick'); ?> (<?php _e("Width x Height", 'kubrick'); ?>)<br />
				<input type="text" name="<?php echo $settings; ?>[m4w_img_width]" value="<?php echo tt_option('m4w_img_width'); ?>" size="3" /> px wide by <input type="text" name="<?php echo $settings; ?>[m4w_img_height]" value="<?php echo tt_option('m4w_img_height'); ?>" size="3" /> px high</p>

				<p><?php echo "<strong>Content paragraph padding:</strong>"; ?><br />
			
				<input type="checkbox" name="<?php echo $settings; ?>[m4w_block_padding_choose]" value="Yes" <?php checked('Yes',tt_option('m4w_block_padding_choose')); ?> /> Check to modify the default padding values<br />
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_padding_t]" value="<?php echo tt_option('m4w_block_padding_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_padding_r]" value="<?php echo tt_option('m4w_block_padding_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_padding_b]" value="<?php echo tt_option('m4w_block_padding_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_padding_l]" value="<?php echo tt_option('m4w_block_padding_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>
				</p>
				<div class="clearfix"></div>
				
				<p><?php echo "<strong>Image margin:</strong>"; ?><br />
				<input type="checkbox" name="<?php echo $settings; ?>[m4w_block_margin_choose]" value="Yes" <?php checked('Yes',tt_option('m4_block_margin_choose')); ?> /> Check to modify the default image margin values<br />

				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_margin_t]" value="<?php echo tt_option('m4w_block_margin_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_margin_r]" value="<?php echo tt_option('m4w_block_margin_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_margin_b]" value="<?php echo tt_option('m4w_block_margin_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4w_block_margin_l]" value="<?php echo tt_option('m4w_block_margin_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>

				</p>
				<div class="clearfix"></div>				
				
				<hr class="seperator" />
				<h4>Two Column Post Settings</h4>
				<p><?php _e("Number of characters to limit the post content", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4_content_length]" value="<?php echo tt_option('m4_content_length'); ?>" size="3" /> characters</p>
				<p><?php _e("Thumbnail dimensions", 'kubrick'); ?> (<?php _e("Width x Height", 'kubrick'); ?>)<br />
				<input type="text" name="<?php echo $settings; ?>[m4_img_width]" value="<?php echo tt_option('m4_img_width'); ?>" size="3" /> px wide by <input type="text" name="<?php echo $settings; ?>[m4_img_height]" value="<?php echo tt_option('m4_img_height'); ?>" size="3" /> px high</p>

				<p><?php echo "<strong>Content paragraph padding:</strong>"; ?><br />
			
				<input type="checkbox" name="<?php echo $settings; ?>[m4_block_padding_choose]" value="Yes" <?php checked('Yes',tt_option('m4_block_padding_choose')); ?> /> Check to modify the default padding values<br />
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_padding_t]" value="<?php echo tt_option('m4_block_padding_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_padding_r]" value="<?php echo tt_option('m4_block_padding_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_padding_b]" value="<?php echo tt_option('m4_block_padding_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_padding_l]" value="<?php echo tt_option('m4_block_padding_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>
				</p>
				<div class="clearfix"></div>
				
				<p><?php echo "<strong>Image margin:</strong>"; ?><br />
				<input type="checkbox" name="<?php echo $settings; ?>[m4_block_margin_choose]" value="Yes" <?php checked('Yes',tt_option('m4_block_margin_choose')); ?> /> Check to modify the default image margin values<br />

				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_margin_t]" value="<?php echo tt_option('m4_block_margin_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_margin_r]" value="<?php echo tt_option('m4_block_margin_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_margin_b]" value="<?php echo tt_option('m4_block_margin_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[m4_block_margin_l]" value="<?php echo tt_option('m4_block_margin_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>

				</p>
				<div class="clearfix"></div>				
				
				<p><?php _e("The height (in pixels) of content block", 'kubrick'); ?>:<br />
				<input type="text" name="<?php echo $settings; ?>[m4_contentheight]" value="<?php echo tt_option('m4_contentheight'); ?>" size="3" /> px</p>
			</div>
		</div>
    
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>				
        <p><strong>Reset</strong> will reset all tabs to their default values.</p> 
		<hr class="seperator" />
		<h4>Sample Template Output</h4>
		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/mag4-img.jpg" />

		
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
            
	<div class="metabox-holder">
        <div class="postbox">
		<h3 class="postbox-header"><?php _e("Magazine #4 Template Help", 'kubrick'); ?></h3>
		<div class="inside">
		<p>
		The Magazine #4 template creates a page with a user determined number of normal width posts above two columns of post content blocks. You can control how many characters to display per 
		post and from which category. You can also display a thumbnail image with each post and control the block height.
		</p>
		<h4>General Settings</h4>
		<p>
		<ol>
		<li>Choose whether to use the post article style or the sidebar block style. Try both types because every theme is different so choose what looks best. Not all themes will look good with this layout style.</li>
		<li>Select the number of posts you want to display per page. This over-rides the dashboard default</li>
		<li>Select which category to display posts from</li>
		<li>You can choose to make the color of the background block transparent or not. Some themes cause a white or colored background to be present. If that's the case you can make it transparent and get rid of it.</li>
		<li>You can have a heading at the top of the page. Or you can turn it off </li>
		<li>You can add padding to the top and bottom of the post content area. Sometimes this is needed to make it look balanced </li>
		</ol>
		</p>
		<h4>Featured Post Settings</h4>
		<p>
		<ol>
		
		<li>Select the number of featured posts you want to display on the first page.</li>
		<li>Select the number of characters that you want for each featured post. You will need to adjust this value to get it looking just right </li>
		<li>Choose a thumbnail size (see note below)</li>
		<li>You can add padding to all sides of the post content area. Sometimes this is needed to make it look balanced. </li>
		<li>You can also add margin to all for sides of the image.</li>
		</ol>
		</p>
		<h4>Two Column Post Settings</h4>
		<p>
		<ol>
		<li>Select the number of characters that you want for each post. You will need to adjust this value to get it looking just right </li>
		<li>Choose a thumbnail size (see note below)</li>
		<li> Block height (in pixels). Adjust this if you need larger blocks</li>
		<li>You can add padding to all sides of the post content area. Sometimes this is needed to make it look balanced. </li>
		<li>You can also add margin to all for sides of the image.</li>
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
		
		</div>
        </div>		
            
	</div>
    
	<?php // end second column ?>
	</div><!-- tab 1 end --> 