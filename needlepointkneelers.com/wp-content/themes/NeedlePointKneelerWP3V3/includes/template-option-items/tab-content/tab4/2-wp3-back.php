	<div id="tabwp3b" title="">
 	<div class="metabox-holder-wide metabox-holder">
		        <div class="postbox">
		<h3 class="postbox-header">Wordpress 3.0 Custom Background</h3>
			<div class="inside">

			<p>
			This feature enables the custom background function of Wordpress 3.0 that allows you to upload a background image that is 
			independant of the original themes default background image.</p>
			<p>Once enabled, simply click on the <em><strong>background</strong></em> menu item under the <strong>Appearance</strong> tab to the left.</p>
			<hr class="seperator" />
			<p>
			<input type="checkbox" name="<?php echo $settings; ?>[cust_back]" value="Yes" <?php checked('Yes',tt_option('cust_back')); ?> /> Check to enable custom background.<br />
			</p>
			<hr class="seperator" />
			<h4> Custom Background Notes</h4>
			<p>The custom background function will not work properly if your theme has a background glare and/or a background gradient.  </p>
			<p>If your theme uses a background image or background color then that's OK because it is applied to the body of the theme which the custom background function modifies.  </p>
			<p>The WP 3.0 custom background function basically intercepts the body CSS selector and over writes it with a new custom image and color. </p>
			<p>You always have the option to restore the default theme background image and color. </p>
        </div>
		</div>

			
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p> 
		<p><strong>Reset</strong> will reset all tabs to their default values.</p> 
	</div>   

	</div>