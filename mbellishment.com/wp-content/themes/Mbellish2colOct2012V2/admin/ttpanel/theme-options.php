<?php
include get_template_directory() . '/library/defaults.php';

  //////////////////////////////////////////////////////////////////////////////
  // VARIABLES
  //////////////////////////////////////////////////////////////////////////////

$imagepath =  get_bloginfo('stylesheet_directory') . '/images/'; 

$theme_menu_source_options = array(
	"Pages"	=>	__("Pages", THEME_NS),
	"Categories"	=>	__("Categories", THEME_NS)
);

$theme_sidebars_style_options = array(
	"block"	=>	__("block", THEME_NS),
	"post"	=>	__("post", THEME_NS),
	"simple"	=>	__("simple", THEME_NS)
);

$theme_heading_options = array(
	'h1'	=>	__('h1', THEME_NS),
	'h2'	=>	__('h2', THEME_NS),
	'h3'	=>	__('h3', THEME_NS),
	'h4'	=>	__('h4', THEME_NS),
	'h5'	=>	__('h5', THEME_NS),
	'h6'	=>	__('h6', THEME_NS),
	'div'	=>	__('div', THEME_NS),
);

$theme_font_defaults = array(
							'size' => '12px',
							'face' => 'arial',
							'style' => 'normal',
							'color' => '#000000'
						);
$url =  get_stylesheet_directory_uri() . '/admin/ttpanel/img/';

// ==============================
ob_start(); ?>
	<?php _e("The image slider widget should be placed in <strong>Home Page Left Widget Area</strong>.", THEME_NS); ?><br /><br />
	<img src="<?php bloginfo('template_url'); ?>/includes/images/tt-home-page-left2.png" /><br />
	<?php _e("The <em>sidebar default</em> for the widget should be fine unless you changed the default in the <strong>Theme Options</strong>. The <em>Simple Text</em> styling works best for the image slider.", THEME_NS); ?><br /><br />
	<img src="<?php bloginfo('template_url'); ?>/includes/images/tt-home-page-left3.png" /><br />
	<?php _e("Additional parameters for the image slider area are entered on the options area of the page template that you are configuring.", THEME_NS); ?><br /><br />
	<img src="<?php bloginfo('template_url'); ?>/includes/images/tt-widget-areas2.png" /><br />
<?php $slider_desc = ob_get_clean();
// ==============================

// ==============================
ob_start(); ?>
<div>
<p><?php _e("The thumbnails for the page templates are aquired from your post in the following order...", THEME_NS); ?></p>


<ol>
<li>Looks for an image by custom field (thumbnail).</li>
<ul><li><img class="tt-img" src="<?php bloginfo('template_url'); ?>/includes/images/tt-custom-func-thumb.png" /></li></ul>
<li>If no image is added by custom field, check for a post/page featured image.</li>
<ul><li><img class="tt-img"  src="<?php bloginfo('template_url'); ?>/includes/images/tt-feat-image2.png" /></li></ul>
<li>If no image is found, it grabs an image attached to your post. If there are multiple images attached, just put the image you want to use as a thumbnail in position #1.</li>
<ul><li><img class="tt-img"  src="<?php bloginfo('template_url'); ?>/includes/images/tt-image-attach.png" /></li></ul>
<li>If no image is attached, it can extract an image from your post content. This might be an image that is linked from another location on your site and does not appear in the post/page gallery.</li>
<ul><li><img class="tt-img"  src="<?php bloginfo('template_url'); ?>/includes/images/tt-image-post.png" /></li></ul>
<li>If no image is found at this point, it will default. The default image is located in <strong>/includes/default-image.gif</strong> folder</li>
</ol>
<br /><br /><?php _e("In case your post thumbnails don't appear you should check the following:", THEME_NS); ?><br /><br />
<ol>
<li><?php _e("The first thing to do is check with your hosting provider and make sure that they change your <strong>mod_security</strong> to allow TimThumb to operate on your domain.", THEME_NS); ?></li>
<li><?php _e("Your server has the GD library compiled with its version of PHP. It is usually included with PHP 4.3 and higher. If you are not sure you should check with your hosting provider. ", THEME_NS); ?></li>
<li><?php _e("Make sure permissions for 'Cache' folder from your theme folder is 755. If this is not working try 777 but also check with your provider as 777 permission should usually be avoided due to security reasons. ", THEME_NS); ?></li>
<li><?php _e("Make sure the file 'timthumb.php' has the correct permissions needed for your server.In most cases this is '644' but it may vary depending on where you are hosted. If 644 does not work, try 755 or 777.", THEME_NS); ?></li>
</ol>

</div>
<?php $thumbnail_tt = ob_get_clean();

// ==============================

  //////////////////////////////////////////////////////////////////////////////
  // theme options settings
  //////////////////////////////////////////////////////////////////////////////
$options = array (

///////////////////////////////////////////////////////////////////////////////
// general options
///////////////////////////////////////////////////////////////////////////////
array( "name" => __("General", THEME_NS),
"type" => "navigation", "icon" => "general"),

//-----------------------------------------------------------------------------
// HEADER OPTION
//-----------------------------------------------------------------------------
    array( "name" => __('Header', THEME_NS),
    "type" => "tab"),

    array( "name" => __('Adjust your header options', THEME_NS),
    "type" => "info"),

	array(	
	'id'	=>	'theme_header_show_headline',
	'name'	=>	__('Show Headline', THEME_NS),
	'desc'	=>	__('Choose to show or disable the blog Title display. Leave this on if you are going to upload a custom logo from the Advanced Options. The display of the title will be taken care of then.', THEME_NS),
	'type'	=>	'checkbox',
	'std' => $theme_default_options['theme_header_show_headline']
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_header_show_slogan',
	'name'	=>	__('Show Slogan', THEME_NS),
	'desc'	=>	__('Choose to show or disable the blog Title display. Leave this on if you are going to upload a custom logo from the Advanced Options. The display of the slogan will be taken care of then.', THEME_NS),
	"std" => $theme_default_options['theme_header_show_slogan'],
	'type'	=>	'checkbox'
	),
	
    array( 
	"type" => "divider"),
/*					
	array(
	"name" => "Border",
	"desc" => "This is a border specific option.",
	"id" => "article_border",
	"std" => array(
		'width' => '2',
		'style' => 'dotted',
		'color' => '#444444'
		),
	"type" => "border"
	),	

    array( 
    "type" => "divider"),
*/	
    array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// footer options
//-----------------------------------------------------------------------------
    array( 'name'	=>	__("Footer", THEME_NS),
    "type" => "tab"),
	
    array( 'name'	=>	__("Customize your Footer Links", THEME_NS),
    "type" => "info"),
	
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'footer_html',
    'name'  =>  __('Show Full HTML In Footer', THEME_NS),
    'desc'  =>  __('Choose to show full HTML in the footer text box below or the limited <strong>XHTML</strong> with Shortcodes. Showing full HTML will allow you to use any valid HTML code but you will not be able to use any of the <strong>ShortTags</strong> listed under the textbox below.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox2'
    ),
    
    array( 
    "type" => "divider"),

    array( 
	'name'	=>	__("Footer Text", THEME_NS),
    'desc'	=>	sprintf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', THEME_NS), 'a, abbr, acronym, em, b, i, strike, strong, span') . '<br />'
  			. sprintf(__('<strong>ShortTags:</strong><code>%s</code>', THEME_NS), '[year], [top], [rss], [login-link], [blog-title], [xhtml], [css]'),
    "id" => 'theme_footer_content',
    "type" => "textarea",
    "std" => $theme_default_options['theme_footer_content']),
	
    array( 
    "type" => "divider"),

    array(  
	"type" => "tab-close"),
 	
//-----------------------------------------------------------------------------
// Reset options
//-----------------------------------------------------------------------------   

    array( 
	"name" => __("Reset", THEME_NS),
	"type" => "tab"),

    array( 
	"name" => __("If you want to reset the Theme Options to default values, please hit the red button below.", THEME_NS),
    "type" => "info"),

	
    array( 
    "type" => "divider"),

	array( 
	"name" => __("Reset", THEME_NS),
	"type" => "reset",
    "std" => "true"),
	
    array( 
    "type" => "divider"),
	
    array(  
	"type" => "tab-close"),
    
	array( 
	"type" => "navigation-close"),
	
//-----------------------------------------------------------------------------
// navigation options
//-----------------------------------------------------------------------------

	array( 
	"name" => __("Navigation", THEME_NS),
	"type" => "navigation", "icon" => "homepage"),

    array( "name" => __("General", THEME_NS),
    "type" => "tab"),

    array( "name" => __("Horizontal navigation options", THEME_NS),
    "type" => "info"),

	
    array( 
    "type" => "divider"),
	
    
        array( "name" => __("Show Home Item", THEME_NS),
        "desc" => __("Check to show the Home button on the navigation bar.", THEME_NS),
        "id" => 'theme_menu_showHome',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_menu_showHome']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Home Button Caption', THEME_NS),
        "desc" => __('Text which displays for the Home button.', THEME_NS),
        "id" => 'theme_menu_homeCaption',
        "type" => "text",
		"width" => '10',
        "std" => $theme_default_options['theme_menu_homeCaption']
		),
 	
    array( 
    "type" => "divider"),
	
       
        array( "name" => __('Highligh Active Categories', THEME_NS),
        "desc" => __('This option will keep the active category selection highlighted in the menu.', THEME_NS),
        "id" => 'theme_menu_highlight_active_categories',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_menu_highlight_active_categories']),
	
    array( 
    "type" => "divider"),

        array( "name" => __('Disable Parent Menu Link In Horizontal Menu', THEME_NS),
        "desc" => __('Check to disable the horizontal menu parent item. If the menu item has a sub-menu the parent item will become un-linked. ', THEME_NS),
        "id" => "theme_menu_disable_parent_hmenu",
        "type" => "checkbox",
        "std" => $theme_default_options['theme_menu_disable_parent_hmenu']),
 
     array( 
    "type" => "divider"),

        array( "name" => __('Disable Parent Menu Link In Vertical Menu', THEME_NS),
        "desc" => __('Check to disable the vertical menu parent item. If the menu item has a sub-menu the parent item will become un-linked. ', THEME_NS),
        "id" => "theme_menu_disable_parent_vmenu",
        "type" => "checkbox",
        "std" => 0),
 
     array( 
    "type" => "divider"),
	
        array( "name" => __('Disable Parent Menu Link In Other Menus', THEME_NS),
        "desc" => __('Check to disable the parent item of menus that use the wp_nav_menu function. Menus that use wp_nav_menu will typically appear in the sitemap page listing if available. If the menu item has a sub-menu the parent item will become un-linked. ', THEME_NS),
        "id" => "theme_menu_disable_parent_wp_nav",
        "type" => "checkbox",
        "std" => $theme_default_options['theme_menu_disable_parent_wp_nav']),
 
    array( 
    "type" => "divider"),
	
       
        array( "name" => __('Trim Long Menu Items', THEME_NS),
        "desc" => __('Enable this option to trim the length of long menu items.', THEME_NS),
        "id" => 'theme_menu_trim_title',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_menu_trim_title']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Menu Item Length', THEME_NS),
        "desc" => __('Limit Each Item To [N] Characters', THEME_NS),
        "id" => 'theme_menu_trim_len',
		'text' => ' characters',
        "type" => "numeric",
        "std" => $theme_default_options['theme_menu_trim_len']),
 	
    array( 
    "type" => "divider"),

        array( "name" => __('Menu Sub-Item Length', THEME_NS),
        "desc" => __('Limit Each Sub-Item To [N] Characters', THEME_NS),
        "id" => 'theme_submenu_trim_len',
		'text' => ' characters',
        "type" => "numeric",
        "std" => $theme_default_options['theme_submenu_trim_len']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Default Menu Source', THEME_NS),
               "desc" => __('Displayed when Appearance > Menu > Primary menu is not set', THEME_NS),
               "id" => 'theme_menu_source',
               "type" => "select",
               "options" => $theme_menu_source_options,
               "std" => $theme_default_options['theme_menu_source']),
	
    array( 
    "type" => "divider"),
	

	   array(  "type" => "tab-close"),


//-----------------------------------------------------------------------------
// posts & pages option
//-----------------------------------------------------------------------------

array( "type" => "navigation-close"),


array( "name" => "Posts & Pages",
"type" => "navigation", "icon" => "posts"),

// Posts OPTION

array( "name" => __('Posts', THEME_NS),
    "type" => "tab"),

        array( "name" => __('Options for single posts.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show Nav Links At Top Of Front Posts Page', THEME_NS),
        "desc" => __('Show navigation links at the top of front posts page.', THEME_NS),
        "id" => 'theme_home_top_posts_navigation',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_home_top_posts_navigation']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show Nav Links At Top Of Posts Page', THEME_NS),
        "desc" => __('Show navigation links at the top of regular posts page.', THEME_NS),
        "id" => 'theme_top_posts_navigation',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_top_posts_navigation']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show Nav Links At Bottom Of Posts Page', THEME_NS),
        "desc" => __('Show navigation links at the bottom of posts page.', THEME_NS),
        "id" => 'theme_bottom_posts_navigation',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_bottom_posts_navigation']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show Top Nav Links In Single Post View', THEME_NS),
        "desc" => __('Show top navigation links in single post view.', THEME_NS),
        "id" => 'theme_top_single_navigation',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_top_single_navigation']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show Bottom Nav Links In Single Post View', THEME_NS),
        "desc" => __('Show bottom navigation links in single post view.', THEME_NS),
        "id" => 'theme_bottom_single_navigation',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_bottom_single_navigation']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Trim Long navigation Links In Single Post View', THEME_NS),
        "desc" => __('Trim long navigation links in single post view.', THEME_NS),
        "id" => 'theme_single_navigation_trim_title',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_single_navigation_trim_title']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Limit Length Of Nav Links', THEME_NS),
        "desc" => __('Limit each link to [N] characters.', THEME_NS),
        "id" => 'theme_single_navigation_trim_len',
		'text' => ' characters',
        "type" => "numeric",
        "std" => $theme_default_options['theme_single_navigation_trim_len']
		),
	
    array( 
    "type" => "divider"),
	
		  
array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// comments options
//-----------------------------------------------------------------------------
    
array( "name" => "Comments",
    "type" => "tab"),
  array( "name" => __('Options for comments.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Allow Comments On Posts', THEME_NS),
        "desc" => __('Allow comments on posts.', THEME_NS),
        "id" => 'theme_allow_comments',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_allow_comments']),
	
    array( 
    "type" => "divider"),

        array( "name" => __('Allow Comments On Pages', THEME_NS),
        "desc" => __('Allow comments on pages.', THEME_NS),
        "id" => 'theme_allow_page_comments',
        "type" => "checkbox",
        "std" => 1,
		),
	
    array( 
    "type" => "divider"),	

        array( "name" => __('Use Smilies In Comments', THEME_NS),
        "desc" => __('Use smilies in comments.', THEME_NS),
        "id" => 'theme_comment_use_smilies',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_comment_use_smilies']
		),
	
    array( 
    "type" => "divider"),

        array( "name" => __('Remove notes at bottom of comment form', THEME_NS),
        "desc" => __('Use smilies in comments.', THEME_NS),
        "id" => 'comment_notes',
        "type" => "checkbox",
        "std" => 'No'
		),
	
    array( 
    "type" => "divider"),
	
		  
			  
array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// pages options
//-----------------------------------------------------------------------------

 array( "name" => __('Pages', THEME_NS),
    "type" => "tab"),
  array( "name" => __('Options for single pages.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show random posts on 404 page', THEME_NS),
        "desc" => __('Show random posts on 404 page.', THEME_NS),
        "id" => 'theme_show_random_posts_on_404_page',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_show_random_posts_on_404_page']),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Title for random posts', THEME_NS),
        "desc" => __('Used when \"Show random posts on 404 page\" is enabled.', THEME_NS),
        "id" => 'theme_show_random_posts_title_on_404_page',
        "type" => "text",
        "std" => $theme_default_options['theme_show_random_posts_title_on_404_page']
		),
	
    array( 
    "type" => "divider"),
	

        array( "name" => __('Show tags on 404 page', THEME_NS),
        "desc" => __('Show tags on 404 page.', THEME_NS),
        "id" => 'theme_show_tags_on_404_page',
        "type" => "checkbox",
        "std" => $theme_default_options['theme_show_tags_on_404_page']),
	
    array( 
    "type" => "divider"),
	

        array( 
		"name" => __('Title for tags', THEME_NS),
        "desc" => __('Used when \"Show tags on 404 page\" is enabled.', THEME_NS),
        "id" => 'theme_show_tags_title_on_404_page',
        "type" => "text",
        "std" => $theme_default_options['theme_show_tags_title_on_404_page']
		),
	
    array( 
    "type" => "divider"),
	

    array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// featured images options
//-----------------------------------------------------------------------------
    
array( "name" => __('Featured Image', THEME_NS),
    "type" => "tab"),
  array( "name" => __('Adjust the size of the default thumbnail image. You can also choose to use the Featured Image as thumbnail.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	

	array(	
	"id"	=>	"theme_metadata_use_featured_image_as_thumbnail",
	"name"	=>	__("Use Featured Image As Thumbnail", THEME_NS),
	"desc"	=>	__("Turn on to use the Featured Image as the post thumbnail when viewing blog posts. This is typically used when the blog page has been set to a static page or when the index.php is used as the default front page.", THEME_NS),
	"std" => $theme_default_options['theme_metadata_use_featured_image_as_thumbnail'],
	"type"	=>	"checkbox"
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	"id"	=>	"theme_metadata_thumbnail_auto",
	"name"	=>	__("Use Auto Thumbnails", THEME_NS),
	"desc"	=>	__("Generate post thumbnails automatically (use the first image from the post gallery)", THEME_NS),
	"std" => $theme_default_options['theme_metadata_thumbnail_auto'],
	"type"	=>	"checkbox"
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	"id"	=>	"theme_metadata_thumbnail_width",
	"name"	=>	__("Thumbnail Width", THEME_NS),
	"desc"	=>	__("Enter the width of the thumbnail image.", THEME_NS),
	"text" => 'px',
	"width" => '5',
	"std" => $theme_default_options['theme_metadata_thumbnail_width'],
	"type"	=>	"numeric"
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	"id"	=>	"theme_metadata_thumbnail_height",
	"name"	=>	__("Thumbnail Height", THEME_NS),
	"desc"	=>	__("Enter the width of the thumbnail image.", THEME_NS),
	"text" => 'px',
	"width" => '5',
	"std" => $theme_default_options['theme_metadata_thumbnail_height'],
	"type"	=>	"numeric"
	),
	
    array( 
    "type" => "divider"),
	
			  
array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// excerpts options
//-----------------------------------------------------------------------------
    
array( "name" => __('Excerpts', THEME_NS),
    "type" => "tab"),
  array( "name" => __('Choose options for how the excerpt is displayed.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	
		
	array(	
	'id'	=>	'theme_metadata_excerpt_auto',
	'name'	=>	__('Use Auto Excerpts', THEME_NS),
	'desc'	=>	__('Generate post excerpts automatically (When neither more-tag or post excerpt is used)', THEME_NS),
	"std" => $theme_default_options['theme_metadata_excerpt_auto'],
	'type'	=>	'checkbox'
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_metadata_excerpt_words',
	'name'	=>	__('Excerpt Length', THEME_NS),
	'desc'	=>	__('The total number of words to limit the length of the excerpt to.', THEME_NS),
	"text" => 'words',
	"std" => $theme_default_options['theme_metadata_excerpt_words'],
	'type'	=>	'numeric'
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_metadata_excerpt_min_remainder',
	'name'	=>	__('Excerpt Balance', THEME_NS),
	'desc'	=>	__('The number of words to use to balance the excerpt.', THEME_NS),
	"text" => 'words',
	"std" => $theme_default_options['theme_metadata_excerpt_min_remainder'],
	'type'	=>	'numeric'
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_metadata_excerpt_use_tag_filter',
	'name'	=>	__('Apply Excerpt Tag Filter', THEME_NS),
	'desc'	=>	__('Turn on to enable the excerpt tag filter below.', THEME_NS),
	"std" => $theme_default_options['theme_metadata_excerpt_use_tag_filter'],
	'type'	=>	'checkbox'
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_metadata_excerpt_allowed_tags',
	'name'	=>	__('Allowed Excerpt Tags', THEME_NS),
	'desc'	=>	__('Used when "Apply excerpt tag filter" is enabled', THEME_NS),
	"std" => $theme_default_options['theme_metadata_excerpt_allowed_tags'],
	'type'	=>	'textarea'
	),
	
    array( 
    "type" => "divider"),
	
			  
array(  "type" => "tab-close"),

//-----------------------------------------------------------------------------
// footer options
//-----------------------------------------------------------------------------
    array( 'name'   =>  __("Custom Post Types", THEME_NS),
    "type" => "tab"),
    
    array( 'name'   =>  __("This feature allows you to add the Sidebar Modification and Custom Header and Custom Background functions to the custom posts types that may have been created for your theme.", THEME_NS),
    "type" => "info"),
    
    array( 
    "type" => "divider"),


    array( 
    'name'  =>  __("Custom Post Types", THEME_NS),
    'desc'  =>  __("Choose the post types that you want to have the Custom Sidebar and Custom Header & Background enabled on. Use the custom post type slug and seperate the post types with a comma.", THEME_NS),
    "id" => 'theme_post_types',
    "type" => "textarea"
    ),
    
    
    array( 
    "type" => "divider"),

    array(  
    "type" => "tab-close"),
    

array( "type" => "navigation-close"),

////////////////////////////////////////////////////////////////////////////////
// Sidebars
////////////////////////////////////////////////////////////////////////////////
array( "name" => __('Sidebars', THEME_NS),
"type" => "navigation", "icon" => "sidebar"),

 array( "name" => __('General', THEME_NS),
    "type" => "tab"),
        array( "name" => __('Select the style to use for each sidebar area.', THEME_NS),
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	
	
	array(	
	'id'	=>	'theme_sidebars_style_default',
	'name'	=>	__('Primary sidebar', THEME_NS),
	'type'	=>	'select',
	'desc' => __("This is the default sidebar, visible on 2 or 3 column layouts. If no widgets are active, the default theme widgets will be displayed instead.", THEME_NS),
	'options'	=>	$theme_sidebars_style_options,
	"std" => $theme_default_options['theme_sidebars_style_default']
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_sidebars_style_secondary',
	'name'	=>	__('Secondary sidebar', THEME_NS),
	'type'	=>	'select',
	'desc' => __("This sidebar is active only on a 3 column setup.", THEME_NS),
	'options'	=>	$theme_sidebars_style_options,
	"std" => $theme_default_options['theme_sidebars_style_secondary']
	),
	
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'tb_sidebar_onoff',
    'name'  =>  __('Top & Bottom Sidebar Default', THEME_NS),
    'desc'  =>  __('Turn off to make top and bottom sidebars default to the off state when creating a new page or post.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
    
    array( 
    "type" => "divider"),

	
	array(	
	'id'	=>	'theme_sidebars_style_top',
	'name'	=>	__('Top sidebars', THEME_NS),
	'type'	=>	'select',
	'desc' => __("This sidebar is displayed above the main content.", THEME_NS),
	'options'	=>	$theme_sidebars_style_options,
	"std" => $theme_default_options['theme_sidebars_style_top']
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_sidebars_style_bottom',
	'name'	=>	__('Bottom sidebars', THEME_NS),
	'type'	=>	'select',
	'desc' => __("This sidebar is displayed below the main content.", THEME_NS),
	'options'	=>	$theme_sidebars_style_options,
	"std" => $theme_default_options['theme_sidebars_style_bottom']
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_sidebars_style_footer',
	'name'	=>	__('Footer sidebars', THEME_NS),
	'type'	=>	'select',
	'desc' => __("This is the widget area in the footer.", THEME_NS),
	'options'	=>	$theme_sidebars_style_options,
	"std" => $theme_default_options['theme_sidebars_style_footer']
	),
	
    array( 
    "type" => "divider"),
	

    array(  "type" => "tab-close"),

////////////////////////////////////////////////////////////////////////////////
// Top and Bottom Widget Areas
////////////////////////////////////////////////////////////////////////////////

 array( "name" => __('Top/Bottom Widget Area', THEME_NS),
    "type" => "tab"),
        array( "name" => __('Select whether you want to display the Top and Bottom widget areas on the index, 404, archive, search and author pages. You can also choose to have the Top/Bottom widget area display the full width of the page instead of just over/under the content area. ', THEME_NS),
        "type" => "info"),
    
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'top_sidebar_index',
    'name'  =>  __('Top Widget Area - index.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Top widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
     
   
    array(  
    'id'    =>  'top_sidebar_wide_index',
    'name'  =>  __('Top Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Top widget area will be placed above the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
     
    array(  
    'id'    =>  'bot_sidebar_index',
    'name'  =>  __('Bottom Widget Area - index.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Bottom widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'bot_sidebar_wide_index',
    'name'  =>  __('Bottom Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Bottom widget area will be placed below the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
         
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'top_sidebar_404',
    'name'  =>  __('Top Widget Area - 404.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Top widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'top_sidebar_wide_404',
    'name'  =>  __('Top Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Top widget area will be placed above the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
      
    array(  
    'id'    =>  'bot_sidebar_404',
    'name'  =>  __('Bottom Widget Area - 404.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Bottom widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'bot_sidebar_wide_404',
    'name'  =>  __('Bottom Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Bottom widget area will be placed below the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
      
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'top_sidebar_archive',
    'name'  =>  __('Top Widget Area - archive.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Top widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'top_sidebar_wide_archive',
    'name'  =>  __('Top Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Top widget area will be placed above the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
           
    array(  
    'id'    =>  'bot_sidebar_archive',
    'name'  =>  __('Bottom Widget Area - archive.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Bottom widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'bot_sidebar_wide_archive',
    'name'  =>  __('Bottom Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Bottom widget area will be placed below the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
           
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'top_sidebar_search',
    'name'  =>  __('Top Widget Area - search.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Top widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
   
    array(  
    'id'    =>  'top_sidebar_wide_search',
    'name'  =>  __('Top Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Top widget area will be placed above the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
    
    array(  
    'id'    =>  'bot_sidebar_search',
    'name'  =>  __('Bottom Widget Area - search.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Bottom widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
  
    array(  
    'id'    =>  'bot_sidebar_wide_search',
    'name'  =>  __('Bottom Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Bottom widget area will be placed below the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
     
    array( 
    "type" => "divider"),
    
    array(  
    'id'    =>  'top_sidebar_author',
    'name'  =>  __('Top Widget Area - author.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Top widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
    
    array(  
    'id'    =>  'top_sidebar_wide_author',
    'name'  =>  __('Top Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Top widget area will be placed above the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
    
    array(  
    'id'    =>  'bot_sidebar_author',
    'name'  =>  __('Bottom Widget Area - author.php', THEME_NS),
    'desc'  =>  __('Turn off so that the Bottom widget area will not appear.', THEME_NS),
    "std" => 1,
    'type'  =>  'checkbox'
    ),
  
    array(  
    'id'    =>  'bot_sidebar_wide_author',
    'name'  =>  __('Bottom Widget Area Position', THEME_NS),
    'desc'  =>  __('Turn on to make the Bottom widget area will be placed below the sidebar/content area.', THEME_NS),
    "std" => 0,
    'type'  =>  'checkbox'
    ),
    
    array( 
    "type" => "divider"),






 
    array(  "type" => "tab-close"),   

array( "type" => "navigation-close"),

array( "name" => __('Ad Shortcodes', THEME_NS),
"type" => "navigation", "icon" => "contactform"),
    
    array( "name" => __('General', THEME_NS),
    "type" => "tab"),
    
        array( "name" => sprintf(__('Use the %s short code to insert these ads into posts, text widgets or footer. A reduced size image of your ad code will appear below the ad text box for reference.<br /><br />', THEME_NS),'<code>[ad]</code>') . '<span>' . __('Example:', THEME_NS) .'</span><code>[ad code=4 align=center]</code>',
        "type" => "info"),
	
    array( 
    "type" => "divider"),
	
		
	array(	
	'id'	=>	'theme_ad_code_1',
	'name'	=>	sprintf(__('Ad code #%s:', THEME_NS),1),
	'type'	=>	'textarea-ad',
	"std" => ""
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_ad_code_2',
	'name'	=>	sprintf(__('Ad code #%s:', THEME_NS),2),
	'type'	=>	'textarea-ad',
	"std" => ""
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_ad_code_3',
	'name'	=>	sprintf(__('Ad code #%s:', THEME_NS),3),
	'type'	=>	'textarea-ad',
	"std" => ""
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_ad_code_4',
	'name'	=>	sprintf(__('Ad code #%s:', THEME_NS),4),
	'type'	=>	'textarea-ad',
	"std" => ""
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'theme_ad_code_5',
	'name'	=>	sprintf(__('Ad code #%s:', THEME_NS),5),
	"desc" => __('Enter your custom ad code', THEME_NS),
	'type'	=>	'textarea-ad',
	"std" => ""
	),
	
    array( 
    "type" => "divider"),
	
        
    array(  "type" => "tab-close"),
array( "type" => "navigation-close"),

array( "name" => __('Headings', THEME_NS),
"type" => "navigation", "icon" => "translate"),


    ////////////////////////////////////////////////////////////////////////////
    // Posts page
    ////////////////////////////////////////////////////////////////////////////
    array( "name" => __('Posts page', THEME_NS),
    "type" => "tab"),

    array( "name" => __('Choose the tag to use for displaying headlines and titles on the posts page. This is typically the index.php page and is used when the Settings > Reading has been set to a static page for blog posts. This won\'t affect the actual size just the tag that is used.', THEME_NS),
    "type" => "info"),

	array(	
	'id'	=>	'theme_posts_headline_tag',
	'name'	=>	__('Tag for the headline', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_posts_headline_tag']
	),
	array(	
	'id'	=>	'theme_posts_slogan_tag',
	'name'	=>	__('Tag for the slogan', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_posts_slogan_tag']
	),
	array(	
	'id'	=>	'theme_posts_article_title_tag',
	'name'	=>	__('Tag for the article', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_posts_article_title_tag']
	),
	array(	
	'id'	=>	'theme_posts_widget_title_tag',
	'name'	=>	__('Tag for the widgets', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_posts_widget_title_tag']
	),


    array(  "type" => "tab-close"),


    array( "name" => __('Single post or page', THEME_NS),
    "type" => "tab"),

    array( "name" => __('Choose the tag to use for displaying headlines and titles on individual pages and single post pages. This won\'t affect the actual size just the tag that is used.', THEME_NS),
    "type" => "info"),
	array(	
	'id'	=>	'theme_single_headline_tag',
	'name'	=>	__('Tag for the headline', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_single_headline_tag']
	),
	array(	
	'id'	=>	'theme_single_slogan_tag',
	'name'	=>	__('Tag for the slogan', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_single_slogan_tag']
	),
	array(	
	'id'	=>	'theme_single_article_title_tag',
	'name'	=>	__('Tag for the article', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_single_article_title_tag']
	),
	array(	
	'id'	=>	'theme_single_widget_title_tag',
	'name'	=>	__('Tag for the widgets', THEME_NS),
	'type'	=>	'select',
	'options'	=>	$theme_heading_options,
	"std" => $theme_default_options['theme_single_widget_title_tag']
	),


    array(  "type" => "tab-close"),


array( "type" => "navigation-close"),



array( "name" => __('Custom CSS Code', THEME_NS),
"type" => "navigation", "icon" => "customcode"),


    array( "name" => "CSS",
    "type" => "tab"),
	
        array( "name" => __('You can include additional CSS code in the text area below. Use standard CSS syntax.<br /><br />Example: <font face="courier" color="#F2E299">body {color:#fff; font-size:14px;}</font>', THEME_NS),
        "type" => "info"),
		
        array( "name" => "CSS",
        "desc" => __('Enter your custom css code', THEME_NS),
        "id" => "custom_css_code",
        "type" => "textarea",
        "std" =>""),
        
    array( 
    "type" => "divider"),
    
    array(  "type" => "tab-close"),
    
array( "type" => "navigation-close"),

array( "name" => __('Advanced Options 1', THEME_NS),
"type" => "navigation", "icon" => "advanced"),

    array( "name" => __('Clickable Logo', THEME_NS),
    "type" => "tab"),
	
        array( "name" => __('This option allows you to make some fundamental changes to the header. Thus it\'s a little more complicated and takes some trial and error to get things just right.', THEME_NS),
        "type" => "info"),
		
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'header_mods_enable',
	'name'	=>	__('Enable Header Modifications', THEME_NS),
	'desc'	=>	__('Turn on to modify the default logo margin.', THEME_NS),
	"std" => 0,
	'type'	=>	'checkbox2'
	),

    array( 
	"name" => __('Header Logo Style', THEME_NS),
    "desc" => __('Choose to display text or a logo image.', THEME_NS),
    "id" => "header_blog_title",
    "type" => "select",
    "options" => array(
						"Text"	=>	__("Dynamic Text", THEME_NS),
						"Image"	=>	__("Logo Image", THEME_NS)
						),
    "std" => __("Logo Image", THEME_NS),
	),


	array(
	"name" => __('Header Diminsions', THEME_NS),
	"desc" => __('Enter the width and height of your header image.' , THEME_NS),
	"id" => "header_size",
	"caption" => __('Custom Logo Help', THEME_NS),
	"showsize" => 'yes',
	"type" => "diminsion"
	),
	
	array( "name" => __('Upload Your Custom Logo', THEME_NS),
					"desc" => __('Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)', THEME_NS),
					"id" => "logo",
					"std" => "",
					"type" => "upload"),
	
	
	array(
	"name" => __('Logo Image Diminsions', THEME_NS),
	"desc" => __('Enter the height and width of your logo image. You can view the image size while you are in the image uploader.', THEME_NS),
	"id" => "logo_size",
	"caption" => 'Custom Logo Help',
	"std" =>  array('width' => '0',	'height' => '0'	),
	"type" => "diminsion"
	),
	
	array(
	"name" => __('Logo Margin', THEME_NS),
	"desc" => __('Adjust the margin for the custom logo image. The image floats left by default so you only really need to specify left and top margin values. Leave the right and bottom at zero.', THEME_NS),
	"id" => "logo_margin",
	"caption" => 'Custom Logo Help',
	"std" =>  array(
		't' => '0',
		'r' => '0',
		'b' => '0',
		'l' => '0'
			),
	"type" => "marginbox"
	),
	
	
	array(
	"name" => __('Header Widget Diminsions', THEME_NS),
	"desc" => __('Specify the size in pixels that you want for the widget area.', THEME_NS),
	"id" => "widget_size",
	"caption" => 'Custom Logo Help',
	"std" =>  array('width' => '0',	'height' => '0'	),
	"type" => "diminsion"
	),
	
	
	array(
	"name" => __('Widget Margin', THEME_NS),
	"desc" => __('Adjust the margin for the widget area. The image floats right by default so you only really need to specify right and top margin values. Leave the left and bottom at zero.', THEME_NS),
	"id" => "widget_margin",
	"caption" => 'Custom Logo Help',
	"std" =>  array(
		't' => '0',
		'r' => '0',
		'b' => '0',
		'l' => '0'
			),
	"type" => "marginbox"
	),
	
	
    array( 
    "type" => "divider"),
	


    array(  "type" => "tab-close"),

    array( "name" => __('404 Page', THEME_NS),
    "type" => "tab"),
	
        array( "name" => __('This option allows you to use a standard Wordpress page that you create as your 404 error page.', THEME_NS),
        "type" => "info"),

    array( 
    "type" => "divider"),
		
	array(	
	'id'	=>	'error_404',
	'name'	=>	__('Enable Custom 404 Error Page', THEME_NS),
	'desc'	=>	__('Turn on to modify the default 404 error page.', THEME_NS),
	"std" => 0,
	'type'	=>	'checkbox2'
	),
	
array( 
"name" => __('404 Error Page Source', THEME_NS),
"desc" => __('Choose the page to display for the 404 error page.', THEME_NS),
"id" => 'page_404_source',

"std" => 'Select A Page',
"type" => "select_page"
),
	
    array( 
    "type" => "divider"),
	
		
    array(  "type" => "tab-close"),

    array( "name" => __('Nav Mods', THEME_NS),
    "type" => "tab"),
	
    array( "name" => __('This option allows you to make some fundamental changes to the header. Thus it\'s a little more complicated and takes some trial and error to get things just right.<br /><br />You will be breaking the navigation bar into two sections. The section on the left will contain the normal nav menu and the section on the right will contain the search box/images.<br /><br />The two sections must equal the total width of the default horizontal nav bar. If your default nav bar is 1000px wide and you allocate 750px to the nav section then the search box/image section can not be wider than 250px (including any left and right margin). ', THEME_NS),
    "type" => "info"),
	
array( 
"type" => "divider"),
	
array(	
'id'	=>	'enable_nav_mods',
'name'	=>	__('Enable Horizontal Nav Bar Mods', THEME_NS),
'desc'	=>	__('Choose to show or disable the navigation bar modifications.', THEME_NS),
'std' => 0,
'type'	=>	'checkbox2'
),

array( 
"name" => __('Choose What You Want Displayed In Nav Bar', THEME_NS),
"desc" => __('Choose what you want to display in the horizontal navigation bar...', THEME_NS),
"id" => "nav_mod_type",
"std" => "search",
"options" => array("search" => __('Display a search box', THEME_NS),"image" => __('Display social icons or other images', THEME_NS)),
"type" => "radioorig"
),

array( 
'name'	=>	__("Code To Display In The Image Area", THEME_NS),
'desc'	=>	'',
"id" => 'image_content',
"std" => '',
"type" => "textarea",
),

array( 
"name" => __('New Width Of Nav Bar', THEME_NS),
"desc" => __('Enter the new width of the navigation bar.', THEME_NS),
"id" => 'nav_bar_width',
"width" => '10',
"text" => 'px',
"std" => '',
"type" => "text"
),

array( 
"name" => __('New Width Of Search Box/Image Area', THEME_NS),
"desc" => __('Enter the width to allocate to the search box/ image area.', THEME_NS),
"id" => 'image_bar_width',
"width" => '10',
"text" => 'px',
"std" => '',
"type" => "text"
),

array(
"name" => __('Search Box/Image Area Margin', THEME_NS),
"desc" => __('Enter margin values to adjust the search box/image area.', THEME_NS),
"id" => "nav_mod_margin",
"std" =>  array(
		't' => '0',
		'r' => '0',
		'b' => '0',
		'l' => '0'
			),
"type" => "marginbox"
),

array( 
"type" => "divider"),
	
    array(  "type" => "tab-close"),
	
    array( 
	"name" => __('Read More', THEME_NS),
    "type" => "tab"),
	
    array( "name" => __('You can replace the default text that appears at the end of an excerpt. The default theme phrase for posts and pages is: <strong>Continue reading &rarr;</strong> and for the page templates it is <strong>Read more</strong>. You can change this phrase to whatever you want just remember to keep it short.', THEME_NS),
    "type" => "info"
	),
	
    array( 
    "type" => "divider"),
	
	array(	
	'id'	=>	'read_more_change',
	'name'	=>	__('Modify Read More Link', THEME_NS),
	'desc'	=>	__('Do you want to replace the default read-more text with your own?', THEME_NS),
	"std" => 0,
	'type'	=>	'checkbox2'
	),

    array( 
	"id" => 'read_more_text',
	"name" => __('Read More Text', THEME_NS),
    "desc" => __('Enter your replacement read-more text above.', THEME_NS),
    "type" => "text",
	"width" => '10',
    "std" => __('Read more', THEME_NS)
	),
	
	array(	
	'id'	=>	'remove_elipse',
	'name'	=>	__('Remove Elipse...', THEME_NS),
	'desc'	=>	__('Check to remove the elipse (...) from the excerpt.', THEME_NS),
	"std" => 0,
	'type'	=>	'checkbox2'
	),
	
	array( 
	"name" => __('Read More Link', THEME_NS),
	"desc" => __('Choose how you want to display the Read More text.', THEME_NS),
	"id" => "read_more_choice",
	"std" => "none",
	"type" => "radioorig",
	"options" => array(
						"none" => "Do not make any changes to the Read More link",
						"image" => "Upload your own custom image",
						"button" => "Use the theme's button style"
						)
	),


	
	array( "name" => __('Upload Your Custom Read More Image', THEME_NS),
					"desc" => __('Upload an image to use for the Read More link or specify the address of your online image. (http://yoursite.com/logo.png)', THEME_NS),
					"id" => "read_more_img",
					"std" => "",
					"type" => "upload"),
	

		array(
	"name" => __('Read More Image Margin', THEME_NS),
	"desc" => __('Select margin values to position your Read More image:', THEME_NS),
	"id" => "rm_image_margin",
	"help" => "documentation.php",
	"caption" => 'Custom Logo Help',
	"std" =>  array(
		't' => '0',
		'r' => '0',
		'b' => '0',
		'l' => '0'
			),
	"type" => "marginbox"
	),
	
	array( 
	"name" => __('Read More Image Position', THEME_NS),
	"desc" => __('Choose the direction to float the Read More image.', THEME_NS),
	"id" => "float_choice",
	"std" => "right",
	"type" => "radioorig",
	"options" => array("left" => "Float image left","right" => "Float image right")
	),

    array( 
    "type" => "divider"),
	
    array(  "type" => "tab-close"
	),
	
	array( "type" => "navigation-close"
	),



array( "name" => __('Advanced Options 2', THEME_NS),
"type" => "navigation", "icon" => "advanced"),


array( 
"name" => __("FAQ Settings", THEME_NS),
"type" => "tab"),
	
array( 
"name" => __("These options allow you to change the style of the Simple FAQ shortcode.", THEME_NS),
"type" => "info"
),


    array( 
    "type" => "divider"),


	array(
	"name" =>  __("Simple FAQ Background Colour",THEMENAME),
	"desc" => __("Choose the background color for the Simple FAQ content box.",THEMENAME),
	"id" => "faq_background_color",
	"std" => "#ddd",
	"type" => "color"
		),

    array( 
    "type" => "divider"),


array(
"name" => __("Simple FAQ Border",THEMENAME),
"desc" => __("Choose the border color for the Simple FAQ content box.",THEMENAME),
"id" => "faq_border",
"std" => array(
		'width' => '1',
		'style' => 'dotted',
		'color' => '#444444'
		),
"type" => "border"
),


    array( 
    "type" => "divider"),
	
	array(
	"name" => __("Simple FAQ Typography",THEMENAME),
	"desc" => __("Specify the Simple FAQ font properties",THEMENAME),
	"id" => "faq_font",
	"std" => array(
			'size' => '12px',
			'face' => 'arial',
			'style' => 'normal',
			'color' => '#000000'
				),
	"type" => "typography"
					),

    array( 
    "type" => "divider"),
	
	array(
	"name" => __("Simple FAQ Headline Typography",THEMENAME),
	"desc" => __("Specify the Simple FAQ headline font properties",THEMENAME),
	"id" => "faq_headline",
	"std" => array(
			'size' => '18px',
			'face' => 'arial',
			'style' => 'normal',
			'color' => '#fff'
				),
	"type" => "typography"
					),
	

    array( 
    "type" => "divider"),


array(  
"type" => "tab-close"),


    array( "name" => __('WP Custom Header', THEME_NS),
    "type" => "tab"),
	
        array( "name" => __('This option will enable the Wordpress Custom Header Image functions that are built into Wordpress. After enabling a new option will appear under the Appearance tab. <br /><br />The custom header image function built into Wordpress 3.0 allows you to upload an image to replace the default image for your theme.<br /><br />The custom header function will allow you to take an image larger than your actual header area and crop it to fit the header space.<br /><br />This modification will also allow you to use the WP Featured Image function to use a different header image for as many different posts/pages as you want.', THEME_NS),
        "type" => "info"),
		
    array( 
    "type" => "divider"),
		
        array( "name" => __('Enable WP Custom Header Image', THEME_NS),
        "desc" => __('Check to enable the Wordpress Custom Header Image function. Do not enable this function if you intend to use a custom header plugin.', THEME_NS),
        "id" => "cust_header",
        "type" => "checkbox2",
        "std" => 0),
		
	array(
	"name" => __('Header Diminsions', THEME_NS),
	"desc" => __('Enter the width and height of your header area. The theme options engine tries to figure out your header diminsions and pre-populate the form field for you. If you know these these values are not correct then enter the correct values and hit \'Save\'.', THEME_NS),
	"id" => "cust_header_width",
	"help" => "",
	"caption" => 'Custom Logo Help',
	"showsize" => 'yes',
	"type" => "diminsion"
	),

    array( 
    "type" => "divider"),
	
 array( "name" => __('Enable WP Custom Header Image For Pages & Posts', THEME_NS),
        "desc" => __('This will enable the ability to assign a custom header image to a specific page or post by using the Featured Image function in the page/post edit screen.', THEME_NS),
        "id" => "cust_header_post",
        "type" => "checkbox2",
        "std" => 0),
		
    array( 
    "type" => "divider"),





    array(  "type" => "tab-close"),

    array( "name" => __('WP Custom Background', THEME_NS),
    "type" => "tab"),
	
        array( "name" => __('This feature enables the custom background function of Wordpress 3.0 that allows you to upload a background image that is independant of the original themes default background image.

<br /><br />Once enabled, simply click on the background menu item under the Appearance tab to the left.', THEME_NS),
        "type" => "info"),
		
    array( 
    "type" => "divider"),
	
array( "name" => __('Enable WP Custom Background', THEME_NS),
        "desc" => __('Check to enable the Wordpress Custom Background function. <br /><br />Do not enable this function if you intend to use a custom background plugin or plan to use the custom background feature available on the page/post edit screen. <br /><br />The custom background function will not work properly if your theme has a background glare and/or a background gradient.', THEME_NS),
        "id" => "cust_back",
        "type" => "checkbox2",
        "std" => 0),	
		
    array( 
    "type" => "divider"),
	
    array(  "type" => "tab-close"),

    array( "name" => __('Author Page', THEME_NS),
    "type" => "tab"),
    
        array( "name" => __('This option will enable a personalized author page. If you use an editor plugin for the user bio section of the user admin page you will be able to display styled author information at the top of the page with the author\'s avatar. Below the bio the new author page will display the titles of the author\'s most recent posts', THEME_NS),
        "type" => "info"),
        
    array( 
    "type" => "divider"),
        
        array( "name" => __('Enable Informative Author Page', THEME_NS),
        "desc" => __('Check to enable more distinctive author page. ', THEME_NS),
        "id" => "tt_author_page",
        "type" => "checkbox2",
        "std" => 0),
        
    array( 
    "type" => "divider"),
    
    array(  "type" => "tab-close"),

array( "type" => "navigation-close"),


array( "name" => __('Theme Help', THEME_NS),
"type" => "navigation", "icon" => "customcode"),


    array( "name" => "Shortcodes",
    "type" => "tab"),
	
        array( "name" => __('Below is some help on using the shortcodes that are included with this theme.', THEME_NS),
        "type" => "info"),
		

array( 
"type" => "divider"),
    
array( 
"name" => __("Simple FAQ Shortcode How To Video", THEME_NS),
"std" => array(
		'url' => 'http://www.youtube.com/v/QMs2XZRufds',
		'width' => '450',
		'height' => '253'
		),
"type" => "help2"
),

    array( 
    "type" => "divider"),
	
array( 
"name" => __("Visitor Only Content", THEME_NS),
"desc" => '<strong>[visitor]</strong><br />Only visitors (not logged in) can see what is between the shortcode brackets<br /><strong>[/visitor]</strong><br /><br />Users logged into your blog will not see what is between the [visitor] shortcode.',

"type" => "help2"
),

    array( 
    "type" => "divider"),
	
array( 
"name" => __("Member Only Content", THEME_NS),
"desc" => '<strong>[member]</strong><br />Only users that are logged in can see what is between the shortcode brackets<br /><strong>[/member]</strong><br /><br />Users not logged into your blog will not see what is between the [member] shortcode.',

"type" => "help2"
),

    array( 
    "type" => "divider"),
	
array( 
"name" => __("Tool Tip", THEME_NS),
"desc" => '<strong>[tooltip tip="Tooltip text goes here"]</strong><br />Whatever is between the tags will be the tooltip trigger<br /><strong>[/tooltip]</strong>',

"type" => "help2"
),

    array( 
    "type" => "divider"),
	
array( 
"name" => __("Current Year", THEME_NS),
"desc" => '<strong>[year]</strong> Will display the current year at the shortcodes location.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("RSS Feed", THEME_NS),
"desc" => '<strong>[rss]</strong> Will display a default styled button as a link to the site RSS feed.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("Got To Top Of Page", THEME_NS),
"desc" => '<strong>[top]</strong> Will display a default styled button as a link to the top of the page. Good to put at the bottom of a long post/page or in teh footer.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("Login Link", THEME_NS),
"desc" => '<strong>[login-link]</strong> Will display a text link to the site admin panel.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("Blog Title", THEME_NS),
"desc" => '<strong>[blog-title]</strong> Will display name of the blog as defined in Settings > General.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("Valid CSS Link", THEME_NS),
"desc" => '<strong>[val-css]</strong> Will display a default styled button as a link to the W3 CSS validator page.',

"type" => "help2"
),

array( 
"type" => "divider"),
	
array( 
"name" => __("Valid XHTML Link", THEME_NS),
"desc" => '<strong>[val-xhtml]</strong> Will display a default styled button as a link to the W3 XHTML validator page.',

"type" => "help2"
),

array( 
"type" => "divider"),

    array(  "type" => "tab-close-nosave"),

array( 
"name" => __("Image Sliders", THEME_NS),
"type" => "tab"),
	
array( 
"name" => __("The page templates in your theme include support for most image sliders. As long as the image slider plugin provides a widget then it should work.", THEME_NS),
"type" => "info"),
	

array( 
"type" => "divider"),    

array( 
"name" => __("Image Slider With Page Templates", THEME_NS),
"desc" => $slider_desc,
"type" => "help2"
),

array( 
"type" => "divider"),

array(  
"type" => "tab-close-nosave"),
    
array( 
"name" => __("Thumbnail Images", THEME_NS),
"type" => "tab"),
	
array( 
"name" => __("This theme uses TimThumb for better image resizing.
<br /><br />
The thumbnail by default is cropped from the top left corner. If your original image is 500px by 200px and you choose an image size of 200px by 100px, the thumbnail image will be cropped and display an image representing the upper left corner of the original image.", THEME_NS),
"type" => "info"),

array( 
"type" => "divider"),
	
array( 
"name" => __("Thumbnails Images In Page Templates", THEME_NS),
"desc" => $thumbnail_tt,
"type" => "help3"
),

array( 
"type" => "divider"),

array(  
"type" => "tab-close-nosave"),
    
array( "type" => "navigation-close"),


);
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" && get_option('ff_theme_was_activated') !="true") {
    add_option('ff_theme_was_activated', 'true');
    update_option('ff_theme_was_activated', 'true');
    foreach ($options as $one_option)
    {
        if($one_option['id'] != '') update_option( $one_option['id'],$one_option['std'] );
    }
}
?>