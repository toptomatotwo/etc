	<div id="tab85" title=""><!-- Template Blog Options Start -->
	<?php // first column ?>
 	<div class="metabox-holder">
		<div class="postbox">
		<h3 class="postbox-header">Comments Are Closed</h3>
		<p> </p>
			<div class="inside">
			
				
				<p>This option allows you to turn off the notice 'Comments are closed' at the end of the post page when you have comments turned off.</p>
								<select name="<?php echo $settings; ?>[comments_closed]">
					<option style="padding-right:10px;" value="Yes" <?php selected('Yes', tt_option('comments_closed')); ?>>Yes</option>
					<option style="padding-right:10px;" value="No" <?php selected('No', tt_option('comments_closed')); ?>>No</option>
				</select>
				</p>
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
		<h3 class="postbox-header">Miscellaneous Options Help</h3>
			<div class="inside">

				<h4>Comments Are Closed</h4>
			<p>
			Just click the checkbox to turn off the "Comments are closed" notice at the bottom of your post page.
			</p><p>&nbsp; </p>
        </div>
		</div>
	</div>
    
	<?php // end second column ?>	
	</div>