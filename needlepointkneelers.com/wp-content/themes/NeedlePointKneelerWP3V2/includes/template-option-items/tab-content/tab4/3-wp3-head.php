	<div id="tabwp3c" title="">
	<div class="metabox-holder-wide metabox-holder">
	<div class="postbox">
		<h3 class="postbox-header">Wordpress 3.0 Custom Header Image</h3>
	<div class="inside">
			<p> 
		This feature enables the custom header image function of Wordpress 3.0 that allows you to upload a header image that is 
			independant of the original themes default header image.
		</p> 
			<p>The custom header image function built into Wordpress 3.0 allows you to upload an image to replace the default image for your theme. </p>
			<p>The custom header function will allow you to take an image larger than you actual header area and crop it to fit the header space. </p>
			<p>This modification will also allow you to use the WP post_thumbnail function to use a different header image for as many different posts/pages as you want.</p>
		<hr class="seperator" />
			<p>
			<input type="checkbox" name="<?php echo $settings; ?>[cust_header]" value="Yes" <?php checked('Yes',tt_option('cust_header')); ?> /> Check here to enable custom header image and to indicate that you've modified the header.php file.<br />
			</p>
			<input type="text" name="<?php echo $settings; ?>[cust_header_width]" value="<?php echo tt_option('cust_header_width'); ?>" size="4" />
				 Width of header background image.
			<input type="text" name="<?php echo $settings; ?>[cust_header_height]" value="<?php echo tt_option('cust_header_height'); ?>" size="4" />
				 Height of header background image.
				</p>

		<hr class="seperator" />
			<h4> Custom Header Image Notes</h4>
			<p>Before this feature can be activated (and function properly) you need to make one modification to the header.php file. The reason for the mod is because this location could not accessed during theme export. 
			</p>
			
			<p>Find the following code in your header.php file... </p>
			<pre><code>&lt;div class="art-header-jpeg">&lt;/div></code></pre>
			<p>Then put the following code between the opening and closing DIV... </p>
			<pre><code>&lt;?php include(TEMPLATEPATH."/includes/tt-header.php"); ?> </code></pre>
			<p>So that it looke like this... </p>
			<pre><code>&lt;div class="art-header-jpeg">&lt;?php include(TEMPLATEPATH."/includes/tt-header.php"); ?>&lt;/div></code></pre>

			<p> </p>
	</div>
	</div>
			<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p> 
		<p><strong>Reset</strong> will reset all tabs to their default values.</p> 
	</div>

	</div>