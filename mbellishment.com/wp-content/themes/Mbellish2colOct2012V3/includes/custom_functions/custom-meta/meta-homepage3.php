<script>
    jQuery(document).ready(function(){
	   jQuery("#extra2").css("display","none");
        if (jQuery("#checkme2").is(":checked")) { jQuery("#extra2").show("slow"); }
       jQuery("#checkme2").click(function(){ if (jQuery("#checkme2").is(":checked")) { jQuery("#extra2").show("slow");jQuery("#extra3").hide("slow"); } else { jQuery("#extra2").hide("slow"); }
      });
       jQuery("#extra3").css("display","none");
        if (jQuery("#checkme3").is(":checked")) { jQuery("#extra3").show("slow"); }
       jQuery("#checkme3").click(function(){ if (jQuery("#checkme3").is(":checked")) { jQuery("#extra3").show("slow");jQuery("#extra2").hide("slow"); } else { jQuery("#extra3").hide("slow"); }
      });
    });
</script>
<div class="my_meta_control">
	<div id="accordion-container">
		<div class="accordion-header"><?php _e('Home Page #3 Example Layout', THEME_NS); ?> </div>		
		<div class="accordion-content"> 		
		<p>		
		<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/custom_functions/images/home3-small.png" />
		</p>
		</div>
	<div class="accordion-header"><?php _e('Overall Page Style', THEME_NS); ?> </div>
		<div class="accordion-content"> 		
		<p class="required">
		<strong><?php _e("Choose a style for the page", THEME_NS); ?></strong><br />
		<?php $mb->the_field('home_page_sheet_style');   if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';}  ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?>
		<span><?php _e("Choose the style you would like for the overall page. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>		
		</p>
		</div>
	</div>
	
        <!-- widgetized meta  -->
        <?php require_once( get_template_directory() . '/includes/custom_functions/custom-meta/meta-widgetized.php' ); ?>
        
	<div class="accordion-header"><?php _e('Top Info Box', THEME_NS); ?></div>
		<div class="accordion-content">
		<p>		
		<strong><?php _e("Info Box Search Form", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('info_box_search'); ?>" value="Yes"<?php if ($metabox->get_the_value('info_box_search')) echo ' checked="checked"'; ?> /> <?php _e('Check to remove the search form from the Info Box', THEME_NS); ?>
		</p>
		
		<p class="required">		
		<strong><?php _e("Info Box Text", THEME_NS); ?></strong><br />
		<span><?php _e("Enter the text you want displayed in the Info Box at the top of the content area.", THEME_NS); ?></span><br />
		<input type="text" name="<?php $metabox->the_name('hp3_info1'); ?>" size="70" value="<?php $metabox->the_value('hp3_info1'); ?>"/><span><?php _e('Line #1 (bold) ', THEME_NS); ?></span>
		<input type="text" name="<?php $metabox->the_name('hp3_info2'); ?>" size="70" value="<?php $metabox->the_value('hp3_info2'); ?>"/><span><?php _e('Line #2 (smaller) ', THEME_NS); ?></span>
    	</p>
		
		<p>		
		<strong><?php _e("Info Box Background & Border Color", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('info_box_color_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('info_box_color_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the background & border colors of Info Box', THEME_NS); ?>
		</p>
		<p>
		<?php $metabox->the_field('info_box_bg_color'); // text field ?>
		#<input type="text"  class="color {pickerFaceColor:'#ffffff',pickerPosition:'right'}" name="<?php $metabox->the_name(); ?>" size="6" value="<?php $metabox->the_value(); ?>"/><?php _e('Choose a color for the background of the info box.', THEME_NS); ?>
		<span><?php _e('Use the color picker to select a color to use for the background of the info box. The default background color is light grey (ECECEC). ', THEME_NS); ?></span>
		</p>
		<p>
		<?php $metabox->the_field('info_box_border_color'); // text field ?>
		#<input type="text"  class="color {pickerFaceColor:'#ffffff',pickerPosition:'right'}" name="<?php $metabox->the_name(); ?>" size="6" value="<?php $metabox->the_value(); ?>"/><?php _e('Choose a color for the border of the info box.', THEME_NS); ?>
		<span><?php _e('Use the color picker to select a color to use for the border of the info box. The default border color is dark grey (DADADA). ', THEME_NS); ?></span>
		</p>
		<p>
		<?php $metabox->the_field('info_box_font_color'); // text field ?>
		#<input type="text"  class="color {pickerFaceColor:'#ffffff',pickerPosition:'right'}" name="<?php $metabox->the_name(); ?>" size="6" value="<?php $metabox->the_value(); ?>"/><?php _e('Choose a color for the small text in the info box.', THEME_NS); ?>
		<span><?php _e('Use the color picker to select a color to use for the text in the info box. The default text color is dark grey (9A9A9A). ', THEME_NS); ?></span>
		</p>
		<p>
		<?php $metabox->the_field('info_box_font_big_color'); // text field ?>
		#<input type="text"  class="color {pickerFaceColor:'#ffffff',pickerPosition:'right'}" name="<?php $metabox->the_name(); ?>" size="6" value="<?php $metabox->the_value(); ?>"/><?php _e('Choose a color for the big text in info box.', THEME_NS); ?>
		<span><?php _e('Use the color picker to select a color to use for the big text in the info box. The default big text color is dark grey (565656). ', THEME_NS); ?></span>
		</p>
		</div>
	<div class="accordion-header"><?php _e('Middle Content Area', THEME_NS); ?></div>
		<div class="accordion-content">
		<p class="required">
		<strong><?php _e("Overall Mid Content Style", THEME_NS); ?></strong><br />
		
		<?php $mb->the_field('home_page_mid_overall_style');  if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';}  ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?><br />
		<span><?php _e("Choose the style you would like for the overall page. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>

		
		<p class="required">		
		<strong><?php _e("Mid Content Area Title", THEME_NS); ?></strong><br />
		<span><?php _e("Enter the text you want displayed in the title area of the middle content area.", THEME_NS); ?></span><br />
		<input type="text" name="<?php $metabox->the_name('hp3_mid_title'); ?>" size="70" value="<?php $metabox->the_value('hp3_mid_title'); ?>"/><span><?php _e('Mid content title', THEME_NS); ?></span>
    	</p>
		<p>
		<strong><?php _e("Modify H5 title font size", THEME_NS); ?></strong><br />
		<input type="checkbox" name="<?php $metabox->the_name('mid_h5_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('mid_h5_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the size of the H5 title when using Simple Style.', THEME_NS); ?>
		<span><?php _e('When using the Simple Style for the overal page layout the H5 title default size may not be the size you want. You can change that here.', THEME_NS); ?></span>
		</p>
		<p>
		
		<?php $metabox->the_field('mid_h5'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('mid_h5'); ?>" size="2" value="<?php $metabox->the_value('mid_h5'); ?>"/><?php _e('px', THEME_NS); ?>
		<span><?php _e('Enter a new H5 size in pixels.', THEME_NS); ?></span>
		</p>		
		
		
		<p class="required">
		<strong><?php _e("Individual Content Block Style", THEME_NS); ?></strong><br />
		
		<?php $mb->the_field('home_page_mid_style'); if(is_null($mb->get_the_value())) { $mb->meta[$mb->name] = 'theme_post_wrapper';}  ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_simple_wrapper"<?php echo $mb->is_value('theme_simple_wrapper')?' checked="checked"':''; ?>/> <?php _e('Simple style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_post_wrapper"<?php echo $mb->is_value('theme_post_wrapper')?' checked="checked"':''; ?>/> <?php _e('Post style', THEME_NS); ?>
		<input type="radio" name="<?php $mb->the_name(); ?>" value="theme_block_wrapper"<?php echo $mb->is_value('theme_block_wrapper')?' checked="checked"':''; ?>/> <?php _e('Block style', THEME_NS); ?><br />
		<span><?php _e("Choose the style you would like for the content blocks. Simple: no styling. Post: styled like to post articles. Block: styled like the sidebar blocks. Choose whichever style looks good for your theme.", THEME_NS); ?></span>
		</p>
		<p class="required">
		<strong><?php _e("Featured image diminsions", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_img_width'); ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_img_width'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_img_width'); ?>"/><?php _e('px wide X ', THEME_NS); ?>
		<?php $metabox->the_field('hp_mid_img_height'); ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_img_height'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_img_height'); ?>"/><?php _e('px high', THEME_NS); ?>
		<span><?php _e('Enter the width and height of the post thumbnail image you want to display.', THEME_NS); ?></span>
		</p>
		<p>
		<strong><?php _e("Image shadow curl", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('hp_mid_image_shadow'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show a shadow under the featured image.', THEME_NS); ?>
		<span><?php _e('This option allows you to display a shadow under the image to give it a curl effect. This looks best on a wide image but give it a try and see what you think.', THEME_NS); ?></span>
		</p>
		<p class="required">
		<strong><?php _e("Choose how much content do you want to display", THEME_NS); ?></strong><br />
		<?php _e('Limit the content by', THEME_NS); ?>
		<?php $metabox->the_field('hp_mid_content_length'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('hp_mid_content_length'); ?>" size="2" value="<?php $metabox->the_value('hp_mid_content_length'); ?>"/><?php _e(' charcters per post.', THEME_NS); ?>
		<span><?php _e('Enter the number of characters to display in each post content area.', THEME_NS); ?></span>
		</p>
		<div class="hr-meta"></div>
		<p class="required">
		<?php $mb->the_field('query_choice'); // radio buttons ?>
		<strong><?php _e("Show Content From A Category Or From Pages", THEME_NS); ?></strong><br />
		
		<input id="checkme2" type="radio" name="<?php $mb->the_name('query_choice'); ?>" value="cat"<?php echo $mb->is_value('cat')?' checked="checked"':''; ?>/> <?php _e('Display posts from category ', THEME_NS); ?>
		<span><?php _e('This option allows you to display posts from a specific category instead of the page selection below.', THEME_NS); ?></span>
		
		<input id="checkme3" type="radio" name="<?php $metabox->the_name('query_choice'); ?>" value="page"<?php echo $mb->is_value('page')?' checked="checked"':''; ?>/> <?php _e('Display pages', THEME_NS); ?>
		<span><?php _e('This option allows you to display content from four seperate pages instead of from a category.', THEME_NS); ?></span>
		</p>
		<div id="extra2">
		
		<p class="required-check">
		<strong><?php _e("Choose Category", THEME_NS); ?></strong><br />
		<?php $metabox->the_field('m1_cat'); ?>
		<?php wp_dropdown_categories(array('selected' => $metabox->get_the_value('m1_cat') , 'name' => $metabox->get_the_name('m1_cat'), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<span><?php _e("Select which category you want displayed.", THEME_NS); ?></span>

		<?php $metabox->the_field('m1_totalposts'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_totalposts'); ?>" size="2" value="<?php $metabox->the_value('m1_totalposts'); ?>"/><?php _e('The number of posts to display.', THEME_NS); ?>
		<span><?php _e('Enter the number of posts to display.', THEME_NS); ?></span>
		</p>
		</div>
		<div id="extra3">	
		<p class="required-check">
		
		
		<strong><?php _e("First Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed in the first content box.", THEME_NS); ?></span>
		<?php $metabox->the_field('home_page_1'); ?>
		<?php wp_dropdown_pages(array('show_option_none' => 'Select A Page','selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?><br />

		<strong><?php _e("Second Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed in the second content box.", THEME_NS); ?></span>		
		<?php $metabox->the_field('home_page_2'); ?>
		<?php wp_dropdown_pages(array('show_option_none' => 'Select A Page','selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<br />
		<strong><?php _e("Third Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed in the third content box.", THEME_NS); ?></span>		
		<?php $metabox->the_field('home_page_3'); ?>
		<?php wp_dropdown_pages(array('show_option_none' => 'Select A Page','selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
		<br />
		<strong><?php _e("Fourth Content Block", THEME_NS); ?></strong><br />
		<span><?php _e("Select which page you want displayed in the fourth content box.", THEME_NS); ?></span>		
		<?php $metabox->the_field('home_page_4'); ?>
		<?php wp_dropdown_pages(array('show_option_none' => 'Select A Page','selected' => $metabox->get_the_value() , 'name' => $metabox->get_the_name(), 'orderby' => 'Name' , 'hierarchical' => 1, 'hide_empty' => '0', 'show_count' => 1 )); ?>
    	</p>
		</div>
		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust the size of the H2 title of content blocks', THEME_NS); ?> </strong>	
		</p>
		<p>
		<input type="checkbox" name="<?php $metabox->the_name('m1_h2_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('m1_h2_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the height of the content blocks', THEME_NS); ?><br />
		<span><?php _e('This option wil allow you to adjust the size of the H2 title in the content boxes.', THEME_NS); ?></span>
		</p>
		<p>
		<?php $metabox->the_field('m1_h2'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_h2'); ?>" size="2" value="<?php $metabox->the_value('m1_h2'); ?>"/><?php _e('px', THEME_NS); ?>
		<span><?php _e('Enter a new H2 size in pixels.', THEME_NS); ?></span>
		</p>		

		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust the height of the content blocks', THEME_NS); ?> </strong>	
		</p>
		<p>
		<input type="checkbox" name="<?php $metabox->the_name('m1_block_height_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('m1_block_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the height of the content blocks', THEME_NS); ?><br />
		<span><?php _e('This option wil allow you to adjust the height of the content boxes so that they all have the same height.', THEME_NS); ?></span>
		</p>
		<p>
		<?php $metabox->the_field('m1_block_height'); // text field ?>
		<input type="text" name="<?php $metabox->the_name('m1_block_height'); ?>" size="2" value="<?php $metabox->the_value('m1_block_height'); ?>"/><?php _e('px', THEME_NS); ?>
		<span><?php _e('Enter the height of the content box in pixels.', THEME_NS); ?></span>
		</p>		

		<div class="hr-meta"></div>
		<p>
		<strong><?php _e('Adjust image margin', THEME_NS); ?> </strong>	
		</p>
		<p>	
		<input type="checkbox" name="<?php $metabox->the_name('m1_block_margin_choose'); ?>" value="Yes"<?php if ($metabox->get_the_value('m1_block_margin_choose')) echo ' checked="checked"'; ?> /> <?php _e('Check to modify the default image margin values', THEME_NS); ?><br />
		<span><?php _e('Here you can modify the margin around the images that reside in the content boxes. If you want a zero margin value either enter a \'0\' or you can just leave it blank.', THEME_NS); ?></span>
		<div class="block-box-pos">
		<?php $mb->the_field('m1_block_margin_t'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Top', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_r'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Right', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_b'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Bottom', THEME_NS); ?></div></div>
		<?php $mb->the_field('m1_block_margin_l'); // text field ?>
		<div class="block-box"><input type="text" name="<?php $mb->the_name(); ?>" value="<?php $mb->the_value(); ?>" size="2" /> <?php _e('px', THEME_NS); ?><br /><div class="block-boxc"> <?php _e('Left', THEME_NS); ?></div></div>
		</div>
		</p>
		<div class="clearfix"></div>
		</div>
		<div class="accordion-header"><?php _e('Bottom Wide Content Area', THEME_NS); ?></div>
		<div class="accordion-content">
		<p>
		<?php $metabox->the_field('hp_bottom_show'); // checkbox ?>
		<input type="checkbox" name="<?php $metabox->the_name(); ?>" value="Yes"<?php if ($metabox->get_the_value()) echo ' checked="checked"'; ?>/><?php _e(' Check to show page content area below the main page content.', THEME_NS); ?>
		<span><?php _e('This option allows you to display the page content (from the edit box above) at the bottom of the page.', THEME_NS); ?></span>
		</p>
		</div>

</div>