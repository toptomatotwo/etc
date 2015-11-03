<?php 
add_action( 'admin_enqueue_scripts', 'tt_admin_init' );
function tt_admin_init() { 

    if(is_admin()) {
	$tt_template_dir = get_template_directory_uri();
	wp_enqueue_script( 'tt_jscolor', $tt_template_dir . '/includes/js/jscolor/jscolor.java' );
	wp_enqueue_script( 'tt_custom_css_builder', $tt_template_dir . '/includes/js/tt-custom-css-builder.js' );
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	}

}

if (file_exists(get_template_directory().'/includes/custom-sidebar-generator/tt-sidebar-generator.php'))
include ( get_template_directory().'/includes/custom-sidebar-generator/tt-sidebar-generator.php' );

if (file_exists(get_template_directory().'/featured-post-widget.php'))
require_once( get_template_directory() . '/featured-post-widget.php' );

if (file_exists(get_template_directory().'/featured-page-widget.php'))
require_once( get_template_directory() . '/featured-page-widget.php' );

if (file_exists(get_template_directory().'/includes/custom_functions.php'))
include(get_template_directory()."/includes/custom_functions.php");

function tt_custom_background_cb() {
	$background = get_background_image();
	$color = get_background_color();
	if ( ! $background && ! $color )
		return;

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url('$background');";

		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";

		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";

		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";

		$style .= $image . $repeat . $position . $attachment;
	}
?>
<style type="text/css">
body { <?php echo trim( $style ); ?> } #art-page-background-middle-texture {background: none;}
</style>
<?php
}
function tt_nav_menu_items() {
    $menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
    foreach ( $menus as $menu ) {
    $selected = get_option('theme_option') == $menu->term_id ? ' selected="selected"' : '';
    $my_menu[] = $selected . $menu->name ;
    }
	return($my_menu);
}

function tt_nav_mods() {
if (theme_get_option('enable_nav_mods') == 1) { 
   	$social_icons = stripslashes(theme_get_option('image_content'));
   	ob_start();
   	if (theme_get_option('nav_mod_type') == 'search') { get_search_form(); } else { echo '<div style="text-align:right;">' . $social_icons . '</div>';}
   	$nav_mods = ob_get_contents();
   	ob_end_clean();
	$items .= '<div class="sbox">' . $nav_mods . '</div>';
    echo $items;
            }
}
	
add_shortcode('shortcode_name', 'template_tag');

add_filter('body_class','tt_browser_body_class');
function tt_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}

function add_body_class( $classes )
{
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_body_class' );

include(get_template_directory()."/includes/shortcodes.php");

//include(get_template_directory()."/includes/theme-sidebars.php");
// load meta boxes
include(get_template_directory()."/includes/custom_functions/1-MetaBox.php");
include(get_template_directory()."/includes/custom_functions/MediaAccess.php");
$wpalchemy_media_access = NEW WPAlchemy_MediaAccess();include(get_template_directory()."/includes/custom_functions/tt-meta-boxes.php");
// load custom background function if option set
if(theme_get_option('cust_back') == 1) { add_custom_background(); }

// load custom header function if option set
if(theme_get_option('cust_header') == 1) { include(get_template_directory()."/includes/cust_header.php"); }

if(theme_get_option('comment_notes') == 0) {
add_filter('comment_form_defaults', 'remove_comment_styling_prompt');

function remove_comment_styling_prompt($defaults) {
	$defaults['comment_notes_after'] = '';
	return $defaults;
}
}

function tipsy($atts, $content = null){
		extract(shortcode_atts(array(
		'tip' => 'Tooltip Text',
		'align' => 'left'
	), $atts));
	return '<a class="south" href="#" title="' . $tip . '">' . $content . '</a>';
}
add_shortcode('tooltip', 'tipsy');

function tt_faq_title($atts, $content = null){
	return '<h3 class="faq">' . $content . '</h3>';
}

function tt_faq_content($atts, $content = null){
	return '<div class="faq" style="padding:10px;">' . $content . '</div>';
}

function tt_footer_menu($atts, $content = null){
	return wp_nav_menu( array( 'theme_location' => 'footer-menu' , 'container_class' => 'footer-menu','fallback_cb' => '' ));
}

add_shortcode('footer-menu', 'tt_footer_menu');
add_shortcode('faqtitle', 'tt_faq_title');
add_shortcode('faqcontent', 'tt_faq_content');
add_shortcode('member', 'tt_shortcode_member');
add_shortcode('visitor', 'tt_shortcode_visitor');
/**
 * Member only content
 * based on: http://justintadlock.com/archives/2009/05/09/using-shortcodes-to-show-members-only-content
 * example: [member] text [/member]
 *
 * @since 1.0
 *
 * @param mixed $atts Shortcode attributes
 * @param string $content Content to output
 * @return string content (html)
 */
function tt_shortcode_member($atts, $content = null){
  if (is_user_logged_in() && !is_null($content) && !is_feed()) return do_shortcode($content);
  return '';
}



/**
 * Visitor only content
 * based on: http://justintadlock.com/archives/2009/05/09/using-shortcodes-to-show-members-only-content
 * example: [visitor] text [/visitor]
 *
 * @since 1.0
 *
 * @param mixed $atts Shortcode attributes
 * @param string $content Content to output
 * @return string content (html)
 */
function tt_shortcode_visitor($atts, $content = null){
  if ((!is_user_logged_in() && !is_null($content)) || is_feed()) return do_shortcode($content);
  return '';
}

/** Button */
add_shortcode( 'button1', 'button1_shortcode' );
function button1_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array( "url" => '', "color" => '' ), $atts ) );
    return '<div class="button1a"><a href="' . $url . '" class="button1 ' . $color . '">' . do_shortcode($content) . '<span></span></a></div>';
}

/** Button2 */
add_shortcode( 'button2', 'button2_shortcode' );
function button2_shortcode( $atts, $content = null ) {
    extract( shortcode_atts( array( "url" => '', "color" => '' ), $atts ) );
    return '<div class="button2a"><a href="' . $url . '" class="button2 ' . $color . '">' . do_shortcode($content) . '<span></span></a></div>';
}

/**
 * Infobox
 */
 
/** Info */
function info_box_shortcode($atts, $content = null) {	
	return '<div class="info-box">' . do_shortcode($content) . '</div>';
}
add_shortcode('info_box', 'info_box_shortcode');

/** Warning */
function warning_box_shortcode($atts, $content = null) {	
	return '<div class="warning-box">' . do_shortcode($content) . '</div>';
}
add_shortcode('warning_box', 'warning_box_shortcode');


/** Note */
function note_box_shortcode($atts, $content = null) {	
	return '<div class="note-box">' . do_shortcode($content) . '</div>';
}
add_shortcode('note_box', 'note_box_shortcode');


/** Download */
function download_box_shortcode($atts, $content = null) {	
	return '<div class="download-box">' . do_shortcode($content) . '</div>';
}
add_shortcode('download_box', 'download_box_shortcode');

/**
 * Dropcap
 */
function dropcap_shortcode($atts, $content = null) {	
	return '<span class="dropcap">' . do_shortcode($content) . '</span>';
}
add_shortcode('dropcap', 'dropcap_shortcode');


// make editor buttons
function add_simple_buttons(){ 
    wp_print_scripts( 'quicktags' );
	$output = "<script type='text/javascript'>\n
	/* <![CDATA[ */ \n";
	
	$buttons = array();

	$buttons[] = array('name' => 'tooltip',
					'options' => array(
						'display_name' => 'tool tip',
						'open_tag' => '[tooltip tip="Tooltip Text"]',
						'close_tag' => '[/tooltip]',
						'key' => ''
					));
		
	$buttons[] = array('name' => 'faqtitle',
					'options' => array(
						'display_name' => 'faq title',
						'open_tag' => '\n[faqtitle]',
						'close_tag' => '[/faqtitle]\n',
						'key' => ''
					));

	$buttons[] = array('name' => 'faqcontent',
					'options' => array(
						'display_name' => 'faq content',
						'open_tag' => '\n[faqcontent]',
						'close_tag' => '[/faqcontent]\n',
						'key' => ''
					));

	$buttons[] = array('name' => 'faqcontainer',
					'options' => array(
						'display_name' => 'faq container',
						'open_tag' => '\n<div class="page_template_faq">\n',
						'close_tag' => '\n</div>\n',
						'key' => ''
					));

	$buttons[] = array('name' => 'member',
					'options' => array(
						'display_name' => 'member',
						'open_tag' => '\n[member]',
						'close_tag' => '[/member]\n',
						'key' => ''
					));

	$buttons[] = array('name' => 'visitor',
					'options' => array(
						'display_name' => 'visitor',
						'open_tag' => '\n[visitor]',
						'close_tag' => '[/visitor]\n',
						'key' => ''
					));
        
 	$buttons[] = array('name' => 'snapshot',
					'options' => array(
						'display_name' => 'snapshot',
						'open_tag' => '[snap url="http://" alt="" w="200" h="250" align=""]',
						'key' => 'url'
					));
					
					
	for ($i=0; $i <= (count($buttons)-1); $i++) {
		$output .= "edButtons[edButtons.length] = new edButton('ed_{$buttons[$i]['name']}'
			,'{$buttons[$i]['options']['display_name']}'
			,'{$buttons[$i]['options']['open_tag']}'
			,'{$buttons[$i]['options']['close_tag']}'
			,'{$buttons[$i]['options']['key']}'
		); \n";
	}
	
	$output .= "\n /* ]]> */ \n
	</script>";
	echo $output;
}
// make editor buttons

if(!function_exists('get_the_image')) {
include(get_template_directory()."/includes/get-the-image.php");}


add_action('admin_init', 'action_admin_init');
function action_admin_init(){
	if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
		if ( in_array(basename($_SERVER['PHP_SELF']), array('post-new.php', 'page-new.php', 'post.php', 'page.php') ) ) {
			add_action('admin_head','add_simple_buttons');

		}
	}
}

// Turn a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}


function tt_truncate_phrase($phrase, $max_characters) {
	$phrase = trim( $phrase );
	if ( strlen($phrase) > $max_characters ) {
		// Truncate $phrase to $max_characters + 1
		$phrase = substr($phrase, 0, $max_characters + 1);
		// Truncate to the last space in the truncated string.
		$phrase = trim(substr($phrase, 0, strrpos($phrase, ' ')));
	}
	return $phrase;
}

function get_the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0) {
global $elipse,$read_more_gtc;

$read_more_image = theme_get_option('read_more_change');
	$content = get_the_content('', $stripteaser);
	$content = strip_tags(strip_shortcodes($content), apply_filters('get_the_content_limit_allowedtags', '<script>,<style>'));
	$content = trim(preg_replace('#<(s(cript|tyle)).*?</\1>#si', '', $content));
	$read_more_choice = theme_get_option( 'read_more_choice' );
	$content = tt_truncate_phrase($content, $max_char);
	
	switch ( $read_more_choice ) {

		case 'none':
		ob_start(); echo $elipse; ?>
		<a class='more-link' href='<?php the_permalink(); ?>'><?php echo $read_more_gtc; ?> </a>	

		<?php $link = ob_get_clean(); $output = sprintf('<p>%s %s</p>', $content, $link);		
		return $output;
		break;
		
		case 'image':
		ob_start(); $read_more_img = theme_get_option('read_more_img'); ?><div class='read-more-image'><a class='more-link' href='<?php the_permalink(); ?>' ><img class='read-more-img' src="<?php echo $read_more_img; ?>" /></a></div>
		<?php $link = ob_get_clean() ; $output = sprintf('<p>%s </p>%s', $content, $link);
		return $output;
		break;
		
		case 'button':
		ob_start(); ?>
		<div class='read-more-image'>
		<form method="get" name="read-more" action="<?php the_permalink(); ?>">
        <span class="art-button-wrapper">
            <span class="art-button-l"> </span>
            <span class="art-button-r"> </span>
            <input class="art-button" type="submit" name="<?php echo $read_more_gtc; ?>" value="<?php echo $read_more_gtc; ?>" />
        </span>
		</form>
		</div>
		<?php $link = ob_get_clean(); $output = sprintf('<p>%s %s</p>', $content, $link);		

		return $output;
		break;
	}	
		}
if(!function_exists('the_content_limit')) {
// The content limit. Usage: the_content_limit(80, "")

function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0) {
if ($max_char == 0) { return; }
	$content = get_the_content_limit($max_char, $more_link_text, $stripteaser);
	echo apply_filters('the_content_limit', $content);

}
}
  


function tt_list_css_elements()
{
	$tt_css_elements = array(
		'-- Page Elements --' => array(
			'body',
			'#art-main',
			'.art-sheet',
			'.art-sheet-body'
		),
		'-- Header --' => array(
			'div.art-header',
			'div.art-header-jpeg',
			'div.art-logo',
			'h1.art-logo-name',
			'div.art-header-jpeg',
			'div.art-header-png',
			'.art-logo',
			'.art-logo-name',
			'.art-logo-text'
		),
		'-- Horiz Nav --' => array(
			'.art-hmenu',
			'.art-nav',
			'.art-nav-outer',
			'.art-nav-r',
			'.art-nav-l'
		),
		'-- Verticle Nav --' => array(
			'.art-vmenublock',
			'.art-vmenublock-body',
			'.art-vmenublockheader',
			'.art-vmenublockcontent',
			'.art-vmenublockcontent-body'
		),
		'-- Containers --' => array(
			'.art-content-layou',
			'.art-content-layout-row',
			'.art-layout-cell art-sidebar1',
			'.art-layout-cell art-sidebar2'
		),
		'-- Content --' => array(
			'.art-post',
			'.art-post-body',
			'.art-post-inner art-article',
			'.art-postcontent',
			'.mini-post',
			'.wide-post',
			'h2.art-postheader'
		),
		'-- Widgets Areas --' => array(
			'.art-block',
			'.art-block-body',
			'.art-blockheader',
			'.art-blockcontent'	,
			'.art-blockcontent-body'
		),
		'-- Comments --' => array(
			'#author, #email, #url',
			'#comment',
			'#commentform',
			'#commentform #submit',
			'#comments-title'			
		),
		'-- Footer --' => array(
			'.art-footer',
			'.art-footer-t',
			'.art-footer-body',
			'.art-footer-center',
			'.art-footer-wrapper',
			'.art-footer-text',
			'.art-page-footer',
			'.wp-footer'
		),
		'-- Images / Alignment --' => array(
			'.aligncenter',
			'.alignleft',
			'.alignright',
			'img.alignleft',
			'img.alignnone',
			'img.alignright',
			'img.centered',
			'img.wp-smiley, img.wp-wink',
			'.wp-caption',
			'.wp-caption p.wp-caption-text',
			'.wp-post-image'
		)
	);
	
	foreach( $tt_css_elements as $optgroup => $options )
	{
		echo '<optgroup style="font-size:14px;color:#57A18D;" label="' . $optgroup . '">';
		foreach( $options as $option )
		{
			$output = '<option style="color:#000000;" value="' . $option . ' {"';
			$output .= '>' . $option . '</option>';
			echo $output;
		}
		echo '</optgroup>';
	}
}

	
function tt_list_borders( $selected = '' )
{
	$tt_border_options = array( 'solid', 'dotted', 'dashed', 'double', 'groove', 'ridge', 'inset', 'outset' );

	foreach ( $tt_border_options as $border_option )
	{
		$option = '<option value="' . $border_option . '"';
		
		if( $border_option == $selected )
		{
			$option .= ' selected="selected"';
		}
		
		$option .= '>' . $border_option . '</option>';
		
		echo $option;
	}
}

function tt_build_font_menu( $selected = '' )
{
	$tt_font_array = tt_font_array();
	
	foreach( $tt_font_array as $font_type => $fonts )
	{
		echo '<optgroup label="' . $font_type . ' -------">';
		foreach( $fonts as $font_slug => $font_data )
		{
			$option = '<option value="' . $font_data . '"';
				
			if( $font_data == $selected )
			{
				$option .= ' selected="selected"';
			}
			
			if( $font_type == 'Google Fonts' )
			{
				$gee = ' [G]';
			}
			
			if( !empty( $gee ) )
			{
				$option .= '>' . $font_slug . $gee . '</option>';
			}
			else
			{
				$option .= '>' . $font_slug . '</option>';
			}
			
			echo $option;
		}
		echo '</optgroup>';
	}
}

function tt_font_array()
{
	$tt_font_array = array(
		"Standard Fonts" => array(
			"Arial" => "Arial, sans-serif",
			"Arial Black" => "'Arial Black', sans-serif",
			"Courier New" => "'Courier New', sans-serif",
			"Georgia" => "Georgia, serif",
			"Helvetica" => "Helvetica, sans-serif",
			"Impact" => "Impact, sans-serif",
			"Lucida Console" => "'Lucida Console', sans-serif",
			"Lucida Sans Unicode" => "'Lucida Sans Unicode', sans-serif",
			"Tahoma" => "Tahoma, sans-serif",
			"Times New Roman" => "'Times New Roman', serif",
			"Trebuchet MS" => "'Trebuchet MS', sans-serif",
			"Verdana" => "Verdana, sans-serif"
		)
	);
	
	return $tt_font_array;
}	
