<div class="my_meta_control">

		<p>
		<?php $metabox->the_field('sidebar_swap'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to change the Primary/Secondary sidebar widget source.', THEME_NS); ?>
		</p>

	<div id="accordion-container2">
		<div class="accordion-header2"><?php _e('Sidebar Source', THEME_NS); ?></div>
		<div class="accordion-content2">                
                    <h4 class="sb"><?php _e('Primary Sidebar', THEME_NS); ?></h4>
                  <p>  
                    <?php $selected = ' selected="selected"'; $no_change = 'Choose Sidebar'; ?>
                    <?php $metabox->the_field('sb_primary'); ?><?php _e('Use:', THEME_NS); ?>
                    <select name="<?php $metabox->the_name(); ?>">
                        <option value="<?php echo ( $no_change ); ?>"<?php if ($metabox->get_the_value() ==  $no_change ) echo $selected; ?>><?php echo ( $no_change ); ?></option>    
                        <?php global $theme_sidebars; foreach ( $theme_sidebars as $key=>$sidebar ) { ?>
                        <option value="<?php echo ( $key ); ?>"<?php if ($metabox->get_the_value() ==  $key ) echo $selected; ?>><?php echo ( $sidebar['name'] ); ?></option>
                        <?php } ?>
                    </select>
                    <span><?php _e('Choose the sidebar source to use for the primary sidebar.', THEME_NS); ?></span>
                 </p>
                
                    <h4 class="sb"><?php _e('Secondary Sidebar', THEME_NS); ?></h4>
                 <p>
                    <?php $metabox->the_field('sb_secondary'); ?><?php _e('Use:', THEME_NS); ?>
                    <select name="<?php $metabox->the_name(); ?>">
                        <option value="<?php echo ( $no_change ); ?>"<?php if ($metabox->get_the_value() ==  $no_change ) echo $selected; ?>><?php echo ( $no_change ); ?></option>
                        <?php global $theme_sidebars; foreach ( $theme_sidebars as $key=>$sidebar ) { ?>
                        <option value="<?php echo ( $key ); ?>"<?php if ($metabox->get_the_value() ==  $key ) echo $selected; ?>><?php echo ( $sidebar['name'] ); ?></option>
                        <?php } ?>
                    </select> 
                     <span><?php _e('If you do not use the secondary sidebar you do not need to change this selection.', THEME_NS); ?></span>
                </p>
                </div></div>
                <div class="hr-meta"><hr /></div>
		<p>
		<?php $metabox->the_field('sidebar_change'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to change the location of the sidebar(s).', THEME_NS); ?>
		</p>
		<p>
		<span><?php _e('This option allows you to change the position and number of the sidebars.', THEME_NS); ?></span>
		</p>
                
                <div id="accordion-container2">
		<div class="accordion-header2"><?php _e('Sidebar Styles', THEME_NS); ?></div>
		<div class="accordion-content2">
		<p>

		<?php $mb->the_field('sl_pos');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'c';} ?>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/c.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="c"<?php echo $mb->is_value('c')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/cs.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="cs"<?php echo $mb->is_value('cs')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/css.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="css"<?php echo $mb->is_value('css')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/sc.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="sc"<?php echo $mb->is_value('sc')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/scs.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="scs"<?php echo $mb->is_value('scs')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/ssc.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="ssc"<?php echo $mb->is_value('ssc')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/3l.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="3l"<?php echo $mb->is_value('3l')?' checked="checked"':''; ?>/> </div></div>
		<div class="block-box"><img style="margin:0 0 0 10px;" src="<?php bloginfo('template_url'); ?>/includes/layouts/3r.gif"  /><div class="block-box-pos"><input type="radio" name="<?php $mb->the_name(); ?>" value="3r"<?php echo $mb->is_value('3r')?' checked="checked"':''; ?>/> </div></div>

		<div style="clear:both;"></div>
		</p>
		<p>
		<?php _e('Use the radio button to choose the sidebar style for this page.', THEME_NS); ?>
		</p>
		</div>
		<div class="accordion-header2"><?php _e('Sidebar Dimensions', THEME_NS); ?></div>
		<div class="accordion-content2">
		<p>
		<span><?php _e('The Special sidebar equals the width of the Primary sidebar plus the width of the Secondary sidebar.', THEME_NS); ?></span>
		</p>
		<p>
		<?php _e('Primary width', THEME_NS); ?>
		<?php $metabox->the_field('primary_width'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' px', THEME_NS); ?>
		<span><?php _e('Enter the width in pixels that you want for the Primary sidebar.', THEME_NS); ?></span>		
		</p>
		<p>
		<?php _e('Secondary width', THEME_NS); ?>
		<?php $metabox->the_field('secondary_width'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' px', THEME_NS); ?>
		<span><?php _e('Enter the width in pixels that you want for the Secondary sidebar.', THEME_NS); ?></span>		
		</p>
		<p>
		<?php _e('Special width', THEME_NS); ?>
		<?php $metabox->the_field('special_width'); // text field ?>
		<input type="text" name="<?php $metabox->the_name(); ?>" size="2" value="<?php $metabox->the_value(); ?>"/><?php _e(' px', THEME_NS); ?>
		<span><?php _e('Enter the width in pixels that you want for the Special sidebar. This is the sidebar that is positioned above the Primary and Secondary sidebars.', THEME_NS); ?></span>		
		</p>
		</div>
	</div>
</div>
