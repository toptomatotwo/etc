<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Custom Sidebar As Content Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/blog-small.png" />
		</p>
		</div>

        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
		<div class="accordion-header"><?php _e('Custom Sidebar Locations', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		

<a style="float:right; margin:0 10px;" href="#" class="dodelete-docs button">Remove All Sidebar Locations</a>
 
<p>Add documents to the library by entering in a title,
URL and selecting a level of access. Upload new documents
using the "Add Media" box.</p>
 
<?php 
$options = array('length' => 1, 'limit' => 10);
while($mb->have_fields_and_multi('docs',$options)): ?>
<?php $mb->the_group_open(); ?>
 <?php $selected = ' selected="selected"'; ?>
    <?php $mb->the_field('custom_sidebar_title'); ?>
    
    <p class="required-check">
        <strong><?php _e("Sidebar Name", THEME_NS); ?></strong><br />
        <?php $mb->the_field('custom_sidebar_title'); ?>
                    <select name="<?php $metabox->the_name(); ?>">
                        <option value=""><?php _e("Select A Sidebar", THEME_NS); ?></option>    
                        <?php global $theme_sidebars; foreach ( $theme_sidebars as $key=>$sidebar ) { ?>
                        <option value="<?php echo ( $key ); ?>"<?php if ($metabox->get_the_value() ==  $key ) echo $selected; ?>><?php echo ( $sidebar['name'] ); ?></option>
                        <?php } ?>
                    </select>
    <span><?php _e("This is a custom sidebar that you created in the Custom Sidebars under Appearance.", THEME_NS); ?></span>
    </p>
		<p class="required-check">
		<strong><?php _e("Sidebar Style", THEME_NS); ?></strong><br />
		<?php $mb->the_field('custom_sidebar_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';} ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>
 

    <p>

        <a href="#" class="dodelete button">Remove This Sidebar</a>
    </p>
 <hr />
<?php $mb->the_group_close(); ?>
<?php endwhile; ?>
 
<p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-docs button">Add A Sidebar Location</a></p>
                    
		
		</div>
 
	</div>
</div>