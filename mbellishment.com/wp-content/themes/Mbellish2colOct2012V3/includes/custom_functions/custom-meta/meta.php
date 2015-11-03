<style type='text/css'>
#_custom_meta_test_metabox	{background-color:#fcfce5;}
#poststuff .inside .my_meta_control p {font-size:12px;}
#poststuff .my_meta_control-inner h2 { margin-top:0px;margin-bottom:0px;}
.my_meta_control .description { display:none; }
.my_meta_control label { display:block; font-weight:bold; margin:6px; margin-bottom:0; margin-top:12px; }
.my_meta_control label span { display:inline; font-weight:normal; }
.my_meta_control span {color:#777; display:block; }
.my_meta_control p { padding-left:10px; }
.my_meta_control textarea, .my_meta_control input[type='text'] { margin-bottom:3px;  }
.my_meta_control h4 { color:#999; font-size:1em; margin:15px 6px; text-transform:uppercase; }
.my_meta_control-inner {margin:0 10px;background-color:#dbf9fc;padding:0 10px 10px 10px;border:1px dotted #ccc; }
.section-title {background-color:#dbf9fc;padding:5px;margin:0;font-size:12px;font-weight:bold;}
#poststuff .inside .my_meta_control .block-box	{float:left;margin:0 0 10px 0;}
#poststuff .inside .my_meta_control .block-boxc	{color:#666;font-size:10px;float:left;padding-left:5px;}
#poststuff .inside .my_meta_control .block-box-pos {margin-left:10px;}
.clearfix	{clear:both;}
</style>
<div class="my_meta_control">

		<p>
		<strong><?php _e('Content and slider above post blocks', THEME_NS); ?></strong>
		</p>
		<p>
		<?php $metabox->the_field('show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content above post blocks.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content that you enter in the page edit area above.', THEME_NS); ?></span>
		<p>
		<span><?php _e('This site map template uses the Wordpress custom menu (wp_nav_menu) to display the pages. By using the custom menu you can present just the pages you want on your sitemap and prevent the display of pages that you don\'t want the general site visitor to see. Even if you are not using the custom menu on your site you should still create one just for the site map.', THEME_NS); ?></span>
		</p><p>
 		<?php $metabox->the_field('page_list_source'); // text field ?>
		<?php _e('Enter the name of the custom menu: ', THEME_NS); ?><input type="text" name="<?php $metabox->the_name(); ?>" size="15" value="<?php $metabox->the_value(); ?>"/>
		<span><?php _e('If you do not define a custom menu then leave the above blank and the site map will use wp_list_pages and display every page that is published.', THEME_NS); ?></span>
		</p>
		<p>
		<strong><?php _e('Content Style', THEME_NS); ?></strong>
		</p>
		<p>
		<?php $mb->the_field('layout_style'); // radio buttons ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="Yes"<?php echo $mb->is_value('Yes')?' checked="checked"':''; ?>/> <?php _e('Use sidebar block style', THEME_NS); ?>

		<input type="radio" name="<?php $mb->the_name(); ?>" value="No"<?php echo $mb->is_value('No')?' checked="checked"':''; ?>/> <?php _e('Use post article style', THEME_NS); ?>
		</p>
		<p>		
		<span><?php _e('Choose the style you want for the post blocks. You can choose the styling from the post article or the style from the sidebar blocks. Choose whichever style looks best with your theme design.', THEME_NS); ?></span>
		</p>
		<p>
		<?php $mb->the_field('extra_content'); ?>
		<div class="customEditor"><textarea name="<?php $mb->the_name(); ?>"><?php echo wpautop($mb->get_the_value()); ?></textarea></div>
		</p>

</div>
