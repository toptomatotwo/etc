	<div id="tabwp3a" title="">
		<div class="metabox-holder-wide metabox-holder">
		<div class="postbox">
		<h3 class="postbox-header">Wordpress 3.0 Custom Navigation</h3>
		<div class="inside">
		<?php if (tt_option('nav_mods') == 'Yes') { ?><p><font color="red">You need to turn off the <strong><em>Navigation Mods</em></strong> feature in the <strong>Everthing Else</strong> tab before using the Wordpress 3.0 navigation mods. </font></p><?php } ?>
		<p> 
		This feature enables the custom navigation function of Wordpress 3.0 that allows you to create custom navigation lists for both the horizontal and vertical navigation menu on your theme.
		</p>		
	
			<hr class="seperator" />
			<p>
			<input type="checkbox" name="<?php echo $settings; ?>[cust_nav]" value="Yes" <?php checked('Yes',tt_option('cust_nav')); ?> /> Check to enable custom navigation.<br />
			</p>
			<hr class="seperator" />
			
			<p>When you first enable this feature your horizontal menu may be blank. Just create a new menu structure using the new <strong>WP 3 Menus</strong> item under the <strong>Appearance</strong> tab to the left. </p>
			<h4>Custom Navigation Notes</h4>
			<p>What this modification will do is create a primary menu location in your theme in place of the default horizonatal menu. You would then go to the <strong>Menus</strong> option link under the <strong>Appearance</strong> tab. From 
			there you would create a menu structure and then assign it as your Primary Navigation. </p>
			
			<p>You can create as many different menus as you want and assign any one of them to the <strong>Primary Menu</strong> (horizontal). </p>
			<p>If you go to the <strong>Widgets</strong> link under the <strong>Appearance</strong> tab you can drag the <strong>Vertical Menu</strong> widget to the sidebar. From there you can choose a name and which menu to use for that menu widget. </p>
			<p>You can have as many different vertical menu widgets as you want with each using a different menu that has been created in the menu panel. </p>
			</div>
		</div>
				<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p> 
		<p><strong>Reset</strong> will reset all tabs to their default values.</p> 
	</div>

	</div>