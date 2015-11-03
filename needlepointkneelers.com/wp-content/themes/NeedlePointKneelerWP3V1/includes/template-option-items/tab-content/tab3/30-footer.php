	<div id="tab8f" title=""><!-- Template Blog Options Start -->
	<?php // first column ?>
 	<div class="metabox-holder">
		<div class="postbox">
		<h3 class="postbox-header">Footer Options</h3>
			<div class="inside">
			
				<h4>Widgetized Footer Area</h4>
				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[footer_widget_enable]" value="Yes" <?php checked('Yes',tt_option('footer_widget_enable')); ?> /> Check to enable widgetized footer area.<br />
				</p>

				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[footer_widget_colorize]" value="Yes" <?php checked('Yes',tt_option('footer_widget_colorize')); ?>"> Check to assign a background color to widgetized footer area.<br />
				</p>
				<p>
				<input type="text" name="<?php echo $settings; ?>[footer_widget_color]" value="<?php echo tt_option('footer_widget_color'); ?>" size="6" /> Enter hex color for background.
				</p>
				
								<p>
				<input type="text" name="<?php echo $settings; ?>[footer_widget_margin]" value="<?php echo tt_option('footer_widget_margin'); ?>" size="2" />px.  Enter number of pixels to add to the top margin of widget area.
				</p>
		<hr class="seperator" />
		<h4>Sample Footer With 4 Widgets and Backgorund Color</h4>
		
		<img style="margin:0 0 20px 15px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/footer-widget.jpg" />			
			
			
			</div>
		</div>	
				<div class="postbox">
		<h3><?php _e("Analytics/Stat Tracker Code", 'kubrick'); ?></h3>
			<div class="inside">
				<p><?php _e("Do you want to include analytics/stat tracker code?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[analytics]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('analytics')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('analytics')); ?>>No</option>
				</select></p>
                
				<p><?php _e("Enter your analytics/stat tracker code:", 'kubrick'); ?><br />
				<textarea name="<?php echo $settings; ?>[analytics_code]" cols=40 rows=5><?php echo stripslashes(tt_option('analytics_code')); ?></textarea></p>
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
		<h3 class="postbox-header">Footer Options Help</h3>
			<div class="inside">
			<h4> Widgetized Footer Options</h4>
				<p>
				This option allows you to have up to four widgets in the footer area. The styling will be the same as your sidebar widgets. 
				The widgets will auto-size to fill the entire area equally. 
				</p>
				<p>
				You can also add a background color to match your lower footer area or your sidebar.
				</p>
				<p>
				The color must be entered in hexadecimal format without the leading # symbol.
				</p>
				<p>
				If you need to add some margin to the top of the new widget area you can enter the number of pixels in the next box.
				</p>
				<h4>Analytics Options</h4>
				<p>
				Pretty easy. Not many options. Just select whether you want to include your analytics tracker code or not.
				</p>
				<p>
				Paste the tracker code provided by your analytics provider in the option box and it will be included at the very bottom of teh footer.
				</p>
        		
			</div>
		</div>    
	</div>
    
	<?php // end second column ?>	
	</div>