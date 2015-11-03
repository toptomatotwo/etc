<div class="my_meta_control">
	<div id="accordion-container">


		<div class="accordion-header"><?php _e('Squeeze Page Configuration', THEME_NS); ?></div>
		<div class="accordion-content"> 
		<p>
		<?php $metabox->the_field('show_header'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to remove the header.', THEME_NS); ?>
		</p>
		<p>
		<?php $metabox->the_field('show_glare'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to remove the blackground glare.', THEME_NS); ?>
		</p>
		<p>
		<?php $metabox->the_field('show_nav'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to remove the primary horizontal navigation bar.', THEME_NS); ?>
		</p>
		<?php if ( has_nav_menu( 'alt-menu' )) { ?>
		<p class="squeeze">
		<?php $metabox->the_field('show_squeeze_nav'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to display a special squeeze page navigation bar.', THEME_NS); ?>
		<span><?php _e("To use this feature you need to create a custom menu (Appearance > Menu) and assign it to the <strong>Alternate Navigation Menu</strong> location in the Menu Theme Location.", THEME_NS); ?></span>
		</p><?php } ?>	
		<p>
		<?php $metabox->the_field('show_footer'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to remove the footer.', THEME_NS); ?>
		</p>

		<p>
		<?php $metabox->the_field('change_sheet_width'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to modify sheet width.', THEME_NS); ?>
		</p>
		<p>
		<?php $metabox->the_field('sheet_width'); // text field ?>
		<?php _e('Enter the width in pixels for the new page width:', THEME_NS); ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="4" value="<?php $metabox->the_value(); ?>"/><?php _e('px.', THEME_NS); ?>

		</p>
		</div>
	</div>
</div>