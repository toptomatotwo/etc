	<div id="tab8a" title=""><!-- Template Blog Options Start -->
	<?php // first column ?>
 	<div class="metabox-holder">
		<div class="postbox">
		<h3 class="postbox-header">Header Options</h3>
			<div class="inside">
							
				
				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[header_mods_enable]" value="Yes" <?php checked('Yes',tt_option('header_mods_enable')); ?> /> Check to enable header modifications.<br />
				</p>
				<p>Choose to display text or a logo image:<br />
				<select name="<?php echo $settings; ?>[header_blog_title]">
					<option style="padding-right:10px;" value="Text" <?php selected('Text', tt_option('header_blog_title')); ?>>Dynamic Text</option>
					<option style="padding-right:10px;" value="Image" <?php selected('Image', tt_option('header_blog_title')); ?>>Logo Image</option>
				</select></p>
				<input type="text" name="<?php echo $settings; ?>[header_width]" value="<?php echo tt_option('header_width'); ?>" size="4" />
				 Width of header background image.
				</p>
																<p>
				<input type="text" name="<?php echo $settings; ?>[header_height]" value="<?php echo tt_option('header_height'); ?>" size="4" />
				 Height of header background image.
				</p>
				
				<h4>Blog Title & Description</h4>
				<p>Below are the parameters needed to position a logo image within the header area. The logo can be as wide as the header area. Just be aware that 
				the wider the logo the less room will be available for the widget area. This is especially important if you plan to put a 468x60 ad in the widget area.</p>
				<p>
				<input type="text" name="<?php echo $settings; ?>[logo_width]" value="<?php echo tt_option('logo_width'); ?>" size="4" />
				 Width of your logo image.
				</p>
				<?php $header_width = 200;$header_height = 200; ?> 												<p>
				<input type="text" name="<?php echo $settings; ?>[logo_height]" value="<?php echo tt_option('logo_height'); ?>" size="4" />
				 Height of your logo image.
				</p>
				<p>
				<input type="text" name="<?php echo $settings; ?>[logo_name]" value="<?php echo tt_option('logo_name'); ?>" size="12" />
				 Enter name of your logo image. It must be located in the images folder of your theme to display properly.
				</p>
				<p>Select margin values to position your logo image:
				</p><p>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_image_t]" value="<?php echo tt_option('header_image_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_image_r]" value="<?php echo tt_option('header_image_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_image_b]" value="<?php echo tt_option('header_image_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_image_l]" value="<?php echo tt_option('header_image_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>
				
				
				</p>
				<div class="clearfix"></div><p></p>
				<h4>Right Side Widget Area</h4>
				<p>
				<input type="text" name="<?php echo $settings; ?>[widget_width]" value="<?php echo tt_option('widget_width'); ?>" size="4" />
				 Width of your header widget area.
				</p>
				<?php $header_width = 200;$header_height = 200; ?> 												<p>
				<input type="text" name="<?php echo $settings; ?>[widget_height]" value="<?php echo tt_option('widget_height'); ?>" size="4" />
				 Height of your header widget area.
				</p>				
				<p>Select margin values to position your widget area:
				</p><p>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_widget_t]" value="<?php echo tt_option('header_widget_t'); ?>" size="2" /> px<br /><div class="block-boxc"> Top</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_widget_r]" value="<?php echo tt_option('header_widget_r'); ?>" size="2" /> px<br /><div class="block-boxc"> Right</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_widget_b]" value="<?php echo tt_option('header_widget_b'); ?>" size="2" /> px<br /><div class="block-boxc"> Bottom</div></div>
				<div class="block-box"><input type="text" name="<?php echo $settings; ?>[header_widget_l]" value="<?php echo tt_option('header_widget_l'); ?>" size="2" /> px<br /><div class="block-boxc"> Left</div></div>
				<?php $header_widget_margin = (tt_option('header_widget_t')) . 'px ' .(tt_option('header_widget_r')) . 'px ' . (tt_option('header_widget_b')) . 'px ' . (tt_option('header_widget_l')) . 'px'; ?>
				</p>
				<div class="clearfix"></div>				
		<hr class="seperator" />
		<h4>Sample Header With Image Logo & Ad</h4>
		
		<img style="margin:0 0 20px 15px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/header-widget.jpg" />			
			
			
			</div>
		</div>	
			
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>
		<p><strong>Reset</strong> will reset all tabs to their default values.</p>  
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
            
	<div class="metabox-holder">
        <div class="postbox">
		<h3 class="postbox-header">Header Options Help</h3>
			<div class="inside">
			<h4> General Help</h4>
				<p>
				This option allows you to make some fundamental changes to the header. Thus it's a little more complicated and takes some trial and error to get things just right.. 
				</p>
				<p>
				The first thing that needs to be done is to enter the height and width of your default background image for the site. 
				Since we don't have easy access to these values you will need to look in your style.css file. Look for <strong><em>art-logo</em></strong>. The values there for
				 height and width will be the ones to use.
				</p>
				<h4>Blog Title & Description</h4>

				<p>
				The image needs to be named <strong><em>logo.png</em></strong> and must be a transparent png to look good. It also needs to reside in the images folder of your theme, 
				</p>
				<p>The next thing to do is assign some margin values. This is where the trial and error comes in. If you use Firefox then the Firebug add-on will make this much easier
				to get the best values.</p>
				<h4>Widgetized Header Area</h4>
				<p>
				This area gets it's information from the new header widget area that will appear in your widgets panel after you enable header modifications. You can put just about any widget in the area. A text widget with
				a 468x60 ad, a text widget with a couple of 125x125 ads or even a recent posts widget.
				</p>
				<p>Now assign some margin values. Again this is where the trial and error comes in. If you use Firefox then the Firebug add-on will make this much easier
				to get the best values.</p>

        		
			</div>
		</div>    
	</div>
    
	<?php // end second column ?>	
	</div>