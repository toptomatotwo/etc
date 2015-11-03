<?php

function custom_types(){

$default_types = 'post,page';
$post_types2 = stripslashes(theme_get_option('theme_post_types'));
$post_types2 = $default_types . ',' . $post_types2;
$post_types2 = explode(",",$post_types2);
return $post_types2;
}

// important: note the priority of 99, the js needs to be placed after tinymce loads
add_action('admin_print_footer_scripts','my_admin_print_footer_scripts',99);
function my_admin_print_footer_scripts()
{
	?>
	<script type="text/javascript">/* <![CDATA[ */
		jQuery(function($)
		{
			var i=1;
			$('.customEditor textarea').each(function(e)
			{
				var id = $(this).attr('id');
 
				if (!id)
				{
					id = 'customEditor-' + i++;
					$(this).attr('id',id);
				}
 
				tinyMCE.execCommand('mceAddControl', false, id);
 
			});
		});
	/* ]]> */</script>
<?php
}
 
if (is_admin()) { 
	wp_enqueue_script('custom_meta_js', get_template_directory_uri() . '/includes/custom_functions/check-required.js'); 
	wp_enqueue_style('custom_meta_css', get_template_directory_uri() . '/includes/custom_functions/meta.css');
	wp_register_style( 'tt_meta_slide_css', get_template_directory_uri() . '/includes/custom_functions/tt-meta-slide.css' );
	wp_enqueue_style( 'tt_meta_slide_css' );
	wp_register_script( 'tt_meta_slide_js', get_template_directory_uri() . '/includes/custom_functions/tt-meta-slide.js' );
	wp_enqueue_script( 'tt_meta_slide_js' );

}
$custom_metabox_sidebar_content = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_sidebar_content',
	'title' => 'Custom Sidebars As Content Template Configuration',
	'types' => array('page'),
	'priority' => 'high',
	'include_template' => 'page-template-byosb.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-byosb.php'
));


$custom_metabox_homepage1 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_homepage1',
	'title' => 'Home Page #1 Template Configuration',
	'types' => array('page'),
	'priority' => 'high',
	'include_template' => 'page-template-home.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-homepage1.php'
));

$custom_metabox_homepage2 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_homepage2',
	'title' => 'Home Page #2 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-home2.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-homepage2.php'
));

$custom_metabox_homepage3 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_homepage3',
	'title' => 'Home Page #3 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-home3.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-homepage3.php'
));

$custom_metabox_mag1 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag1',
	'title' => 'Magazine 1 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag1a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag1.php'
));

$custom_metabox_mag2 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag2',
	'title' => 'Magazine 2 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag2a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag2.php'
));

$custom_metabox_mag3 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag3',
	'title' => 'Magazine 3 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag3a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag3.php'
));

$custom_metabox_mag3r = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag3r',
	'title' => 'Magazine 3 Reloaded Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag3r.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag3r.php'
));

$custom_metabox_mag4 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag4',
	'title' => 'Magazine 4 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag4a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag4.php'
));

$custom_metabox_mag5 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag5',
	'title' => 'Magazine 5 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag5a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag5.php'
));

$custom_metabox_mag6 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag6',
	'title' => 'Magazine 6 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag6a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag6.php'
));

$custom_metabox_mag7 = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_mag7',
	'title' => 'Magazine 7 Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-mag7a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-mag7.php'
));

$custom_metabox_video = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_video',
	'title' => 'Video Gallery Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-video.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-video.php'
));

$custom_metabox_video_thumb = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_video_thumb',
	'title' => 'Video Thumbnail Gallery Template Configuration',
	'types' => array('page'),
	'priority' => 'high',
	'include_template' => 'page-template-video-thumb.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-video-thumb.php'
));

$custom_metabox_multi_column = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_multi_column',
	'title' => 'Multi Column Template Configuration',
	'types' => array('page'), 
	'priority' => 'high', 
	'include_template' => 'page-template-multi-column.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-multi-column.php'
));

$custom_metabox_multi_column_post = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_multi_column_post',
	'title' => 'Multi Column Post Template Configuration',
	'types' => array('post'), 
	'priority' => 'high', 
	'include_template' => 'post-template-multi-column.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-multi-column-post.php'
));

$custom_metabox_page_posts = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_page_posts',
	'title' => 'Page With Posts Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-content-posts.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-page-posts.php'
));

$custom_metabox_squeeze = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_squeeze',
	'title' => 'Squeeze Page Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-squeeze.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-squeeze.php'
));

$custom_metabox_quicksand = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_quicksand',
	'title' => 'Quicksand jQuery Filterable Template Configuration',
	'types' => array('page'), 
	'priority' => 'high',
	'include_template' => 'page-template-quick.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-quicksand.php'
));

$custom_sidebar = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_sidebar',
	'title' => 'Sidebar Modifications',
	'types' => custom_types(),
	'exclude_template' => array(
								
								'page-template-home2.php',
								'page-template-home3.php',
								'onecolumn-page.php',
								'page-template-sitemap3.php'								
								),
	'priority' => 'low',
	'context' => 'side',
	
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-sidebar.php'
));


$custom_back = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_background',
	'title' => 'Custom Header & Background',
	'types' => custom_types(),
	'priority' => 'low',
	'context' => 'side',
	
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-background.php'
));

$custom_metabox_sitemap = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_sitemap',
	'title' => 'Site Map Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-sitemap2a.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-sitemap.php'
));

$custom_metabox_slider = new WPAlchemy_MetaBox(array
(
	'id' => '_custom_meta_slider',
	'title' => 'Slider Template Configuration',
	'types' => array('page'), // added only for pages and to custom post type "events"
	'priority' => 'high', // same as above, defaults to "high"
	'include_template' => 'page-template-slider.php',
	'template' => get_template_directory() . '/includes/custom_functions/custom-meta/meta-slider.php'
));



?>