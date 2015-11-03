<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Multi Column Post Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/multi-content-small.png" />
<?php $my_temp = get_post_meta( $post->ID,'_wp_post_template',false);var_dump($my_temp); ?>		
		</p>
		</div>
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Main Page Content', THEME_NS); ?></div>
		<div class="accordion-content">
		
		<p class="required">
		<strong><?php _e('Column count', THEME_NS); ?></strong><br />
		<?php $metabox->the_field('column_count'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e('columns.', THEME_NS); ?>
		<span><?php _e('Enter the number of columns to split content into. ', THEME_NS); ?></span>
		</p>
		<p>
		<span><?php _e('Enter the number of columns that want the page content above split into. You can choose two to six columns. Wordpress does a lot of parsing to the page content so 
		some content elements such as images and embeded videos may not allow the columns to break properly. You will have to experiment until you get the page looking the way you want.', THEME_NS); ?></span>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Upper Additional Content Areas', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p>
		<span><?php _e("The WYSIWYG editor below are somewhat experimental. The Upload/Insert options will appear when in fullscreen editor mode (WP3.1+). ", THEME_NS); ?></span>
		</p>

		<p>
		<?php $mb->the_field('extra_content_upper'); ?>
		<div class="customEditor"><textarea name="<?php $mb->the_name(); ?>"><?php echo wp_richedit_pre($mb->get_the_value()); ?></textarea></div>
		</p>
		</div>
		<div class="accordion-header"><?php _e('Lower Additional Content Areas', THEME_NS); ?></div>
		<div class="accordion-content">
		<p>
		<span><?php _e("The WYSIWYG editor below are somewhat experimental. The Upload/Insert options will appear when in fullscreen editor mode (WP3.1+). ", THEME_NS); ?></span>
		</p>
		<p>
		<?php $mb->the_field('extra_content_lower'); ?>
		<div class="customEditor"><textarea name="<?php $mb->the_name(); ?>"><?php echo wp_richedit_pre($mb->get_the_value()); ?></textarea></div>
		</p>
		</div>
	</div>
</div>