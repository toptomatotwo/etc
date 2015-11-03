	<div id="tab5a" title=""><!-- Template Blog Options Start -->
	<?php // first column ?>
    
	<div class="metabox-holder">
	
		<div class="postbox">
		<h3>Navigation Menu Customization</h3>
			<div class="inside">
			<?php if (tt_option('cust_nav') == 'Yes') { ?><p><font color="red">You need to turn off the <strong><em>WP 3.0 custom nav</em></strong> features in the <strong>Wordpress 3.0 Goodies</strong> tab before using these navigation mods. </font></p><?php } ?>
			
				<p><?php _e("Do you want enable horizontal & vertical navigation menu modifications?", 'kubrick'); ?><br />
				<select name="<?php echo $settings; ?>[nav_mods]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('nav_mods')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('nav_mods')); ?>>No</option>
				</select></p>
				<h4 style="border-bottom:1px dotted #ccc;border-top:1px dotted #ccc;padding:5px;background-color:#EEEEEE;">Horizontal Menu</h4>
				<p>Display pages or categories in horizontal menu?<br />
				<select name="<?php echo $settings; ?>[hmenu_source]">
					<option style="padding-right:10px;" value="Pages" <?php selected('Pages', tt_option('hmenu_source')); ?>>Pages</option>
					<option style="padding-right:10px;" value="Categories" <?php selected('Categories', tt_option('hmenu_source')); ?>>Categories</option>
				</select></p>

				<p>Show a <strong>Home</strong> button on horizontal menu?<br />
				<select name="<?php echo $settings; ?>[home_button]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('home_button')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('home_button')); ?>>No</option>
				</select></p>
				
				<p>Enter a name for the home button:<br />
				<input type="text" name="<?php echo $settings; ?>[home_button_name]" value="<?php echo tt_option('home_button_name'); ?>" size="40" /></p>
				<p>Do you want to show sub-menus?<br />
				<select name="<?php echo $settings; ?>[nav_h_submenu]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('nav_h_submenu')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('nav_h_submenu')); ?>>No</option>
				</select></p>				
	
					
				<h4 style="border-bottom:1px dotted #ccc;border-top:1px dotted #ccc;padding:5px;background-color:#EEEEEE;">Vertical Menu</h4>
				<p>Display pages or categories in Vertical menu?<br />
				<select name="<?php echo $settings; ?>[vmenu_source]">
					<option style="padding-right:10px;" value="Pages" <?php selected('Pages', tt_option('vmenu_source')); ?>>Pages</option>
					<option style="padding-right:10px;" value="Categories" <?php selected('Categories', tt_option('vmenu_source')); ?>>Categories</option>
				</select></p>

				<p>Do you want to show sub-menus?<br />
				<select name="<?php echo $settings; ?>[nav_v_submenu]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('nav_v_submenu')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('nav_v_submenu')); ?>>No</option>
				</select></p>

				<p>Do you want to show simple menus?<br />
				<select name="<?php echo $settings; ?>[nav_v_simple]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('nav_v_simple')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('nav_v_simple')); ?>>No</option>
				</select></p>
				
				<p>Do you want to show a title for the vertical menu?<br />
				<select name="<?php echo $settings; ?>[nav_v_title]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('nav_v_title')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('nav_v_title')); ?>>No</option>
				</select></p>
				
				<p>Title for vertical menu header:<br />
				<input type="text" name="<?php echo $settings; ?>[vmenu_header]" value="<?php echo tt_option('vmenu_header'); ?>" size="40" /></p>
            </div>
		</div>
    
		<p>
			<input type="submit" class="button-primary" value="<?php _e('Save Settings') ?>" />
			<input type="submit" class="button-highlighted" name="<?php echo $settings; ?>[reset]" value="<?php _e('Reset Settings'); ?>" />
		</p>				
                     
	</div>
    
	<?php // end first column ?>
    
	<?php // second column ?>
            
	<div class="metabox-holder">
        <div class="postbox">
		<h3 class="postbox-header"><?php _e("Navigation Menu Customization Help", 'kubrick'); ?></h3>
		<div class="inside">
		<p>
		The navigation customization tab allows you to change all the variables in the horizontal and vertical menus. You can choose to display categories or pages in either the vertical or horizontal position. 
You can also control whether or not to have a home page menu item plus choose the name for that menu item.	
		</p>
		<h4>Customizable Items</h4>
		<p>
		<ol>
		
		<li>Chose whether or not to enable the ability to customize the menus </li>
		<li>Choose pages or categories for the horizontal menu</li>
		<li>Choose to show a Home button for the horizontal menu</li>
		<li>Choose a name for the home page button for the horizontal menu</li>
		<li>Choose to show single or multi-level menus for the horizontal menu</li>
		<li>Choose pages or categories for the vertical menu</li>
		<li>Choose to show single or multi-level menus for the vertical menu</li>
		<li>Choose to show simple menus for the vertical menu (sub-menus expanded)</li>
		<li>Choose whether or not to display a title for the vertical menu. If you select 'No' then space for the title will disappear </li>
		<li>Choose to a title for the vertical menu</li>
		</ol>
		</p>
		<hr />
		<p>
		<strong>Note on the vertical menu:</strong> The customization of the vertical menu will apply to both the vertical menu widget and the 
		default vertical menu in the sidebar (when no widgets are selected) <strong>except</strong> for the vertical menu title. The vertical menu title for the default sidebar 
		menu is hard coded into the sidebar.  
		</p> 

		
		</div>
        </div>		
            
	</div>
    
	<?php // end second column ?>
	</div>