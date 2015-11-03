	<div id="tab8b" title=""><!-- Template Blog Options Start -->
	<?php // first column ?>
 	<div class="metabox-holder">
		<div class="postbox">
		<h3 class="postbox-header">Blog Page Options</h3>
			<div class="inside">
			
				<h4>Posts To Display</h4>
				<p>Enter the number of posts per page that you would like to display:
				<input type="text" name="<?php echo $settings; ?>[blog_number_posts]" value="<?php echo stripslashes(tt_option('blog_number_posts')); ?>" size ="3" /></p>
				
				<p>Choose whether to display the complete post or the excerpt.</p>
				<p> 
				<label><input type="radio" name="<?php echo $settings; ?>[blog_content]" value="content" <?php checked('content', tt_option('blog_content')); ?> />
					Display the full content</label><br />
				<label><input type="radio" name="<?php echo $settings; ?>[blog_content]" value="excerpt" <?php checked('excerpt', tt_option('blog_content')); ?> />
					Display the excerpt</label>
				</p>

				<h4>Categories To Display</h4>
				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[blog_cat_enable]" value="Yes" <?php checked('Yes',tt_option('blog_cat_enable')); ?> /> Check to enable category selection for blog page.<br />
				</p>
			
				<p><?php _e("Select which category you want displayed", 'kubrick'); ?>:<br />
    			<?php wp_dropdown_categories(array('selected' => tt_option('blog_cat'), 'name' => $settings.'[blog_cat]', 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?></p>
				<p></p>
				<h4>Post Header & Footer Icon Display</h4>
				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[post_header_icon_enable]" value="Yes" <?php checked('Yes',tt_option('post_header_icon_enable')); ?> /> Check to enable post header icons.<br />
				</p>
				<p>
				<input type="checkbox" name="<?php echo $settings; ?>[post_footer_icon_enable]" value="Yes" <?php checked('Yes',tt_option('post_footer_icon_enable')); ?> /> Check to enable post footer icons.<br />
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
		<h3 class="postbox-header">Blog Page Options Help</h3>
			<div class="inside">
			<p>
			The blog page template allows you to create a blog page to display posts from the category of your choice. 
			</p>
				<h4>Posts To Display</h4>
					<p>Choose the number of posts to display per page. The default value is ten posts per page.</p>
					<p>You can also choose to display the full content of teh posts or to display the excerpt. The default value if to display the full content. </p>

				<h4>Categories To Display</h4>
					<p>
					By default the blog page shows all post from all categories with the newest first.
					</p>
					<p>
					By checking the box to enable category selection you can choose a single category to display for the blog page.
					</p>
        		<h4>Post Header & Footer Icon Display</h4>
					<p>
					Some themes have small icons in the post header and post footer. These icons are associated with the date, author, category etc.
					</p>
					<p>
					If your theme has the icons you can select the checkbox to have these icons displayed.
					</p>
        </div>
		</div>
	</div>
    
	<?php // end second column ?>	
	</div>