<?php
//	Pull theme options from database
function tt_option($key) {
	global $settings;
	$option = get_option($settings);
	if(isset($option[$key])) return $option[$key];
	else return FALSE;
}
// load theme options page
if (file_exists(TEMPLATEPATH.'/includes/theme-options.php'))
include(TEMPLATEPATH."/includes/theme-options.php");
// load some more goodies
if (file_exists(TEMPLATEPATH.'/includes/core-additions.php'))
include(TEMPLATEPATH."/includes/core-additions.php");
// load footer widget function
if (file_exists(TEMPLATEPATH.'/includes/footer-functions.php'))
include(TEMPLATEPATH."/includes/footer-functions.php");
// load anything in teh custom_functions folder
foreach (glob(TEMPLATEPATH."/includes/custom_functions/*.php") as $filename) { include $filename; };
// load custom background function if option set
if(tt_option('cust_back') == 'Yes') { add_custom_background(); }
// load custom header function if option set
if(tt_option('cust_header') == 'Yes') { include(TEMPLATEPATH."/includes/cust_header.php"); }
// load function for FAQ page template
function tt_theme_faq_footer(){
  echo ('<script type="text/javascript">
    $(document).ready(function() {
      $("div.page_template_faq p").hide();
      $("div.page_template_faq").find("p:eq(0)").show();
      $("div.page_template_faq h3").click(function() {
        $(this).next("p").slideToggle("fast").siblings("p:visible").slideUp("fast");
      });
    });
  </script>');
}

	
load_theme_textdomain('kubrick');

if(tt_option('nav_mods') == 'Yes') {
	if ((tt_option('home_button'))  == 'Yes')  ($hbutton = true); else ($hbutton = false) ;
	if ((tt_option('nav_h_submenu'))  == 'Yes')  ($nav_h_submenu = true); else ($nav_h_submenu = false) ;
	if ((tt_option('nav_v_submenu'))  == 'Yes')  ($nav_v_submenu = true); else ($nav_v_submenu = false) ;
	if ((tt_option('nav_v_simple'))  == 'Yes')  ($nav_v_simple = true); else ($nav_v_simple = false) ;
	$artThemeSettings = array(
		'menu.showSubmenus' => $nav_h_submenu,
		'menu.homeCaption' => (tt_option('home_button_name')),
		'menu.showHome' => $hbutton,
		'menu.topItemBegin' => "<span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">",
		'menu.topItemEnd' => "</span>",
		'menu.source' => (tt_option('hmenu_source')),
		'vmenu.showSubmenus' => $nav_v_submenu,
		'vmenu.simple' => $nav_v_simple,
		'vmenu.source' => (tt_option('vmenu_source')),
	);
}
else {

if(tt_option('cust_nav') == 'Yes') {
$artThemeSettings = array(
	'menu.showSubmenus' => true,
	'menu.homeCaption' => "Home",
	'menu.showHome' => true,
	'menu.topItemBegin' => "<span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">",
	'menu.topItemEnd' => "</span>",
	'menu.source' => "Categories",
	'menu.use_menu_navi' => function_exists('wp_nav_menu'),
	'vmenu.showSubmenus' => false,
	'vmenu.simple' => false,
	'vmenu.source' => "Pages",
	'vmenu.use_menu_navi' => function_exists('wp_nav_menu'),
);
}
else {
$artThemeSettings = array(
	'menu.showSubmenus' => true,
	'menu.homeCaption' => "Home",
	'menu.showHome' => true,
	'menu.topItemBegin' => "<span class=\"l\"></span><span class=\"r\"></span><span class=\"t\">",
	'menu.topItemEnd' => "</span>",
	'menu.source' => "Categories",
	'vmenu.showSubmenus' => false,
	'vmenu.simple' => false,
	'vmenu.source' => "Pages",
);
}
}
$themename = "NeedlePointKneelerWP3V2";
$shortname = "artisteer";
$default_footer_content = "<a href='#'>Contact Us</a> | <a href='#'>Terms of Use</a> | <a href='#'>Trademarks</a> | <a href='#'>Privacy Statement</a><br />Copyright &copy; 2010 ".get_bloginfo('name').". All Rights Reserved.";


$options = array (
                array(  "name" => "HTML",
                        "desc" => sprintf(__('<strong>XHTML:</strong> You can use these tags: <code>%s</code>', 'kubrick'), 'a, abbr, acronym, em, b, i, strike, strong, span'),
                        "id" => "art_footer_content",
                        "std" => $default_footer_content,
                        "type" => "textarea")
          );
       
	
function art_update_option($key, $value){
	update_option($key, (get_magic_quotes_gpc()) ? stripslashes($value) : $value);
}

function art_add_admin() {
	global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
   
        if ('save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    if($value['type'] != 'multicheck'){
                        art_update_option( $value['id'], $_REQUEST[ $value['id'] ] );
                    }else{
                        foreach($value['options'] as $mc_key => $mc_value){
                            $up_opt = $value['id'].'_'.$mc_key;
                            art_update_option($up_opt, $_REQUEST[$up_opt] );
                        }
                    }
                }
                foreach ($options as $value) {
                    if($value['type'] != 'multicheck'){
                        if( isset( $_REQUEST[ $value['id'] ] ) ) { art_update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
                    }else{
                        foreach($value['options'] as $mc_key => $mc_value){
                            $up_opt = $value['id'].'_'.$mc_key;
                            if( isset( $_REQUEST[ $up_opt ] ) ) { art_update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); }
                        }
                    }
                }
                header("Location: themes.php?page=functions.php&saved=true");
                die;
        } 
    }

    add_theme_page("Footer", "Footer", 'edit_themes', basename(__FILE__), 'art_admin');

}

function art_admin() {
    global $themename, $shortname, $options;
    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
?>
<div class="wrap">
	<h2>Footer</h2>

	<form method="post">

		<table class="optiontable" style="width:100%;">

<?php foreach ($options as $value) {
   
    switch ( $value['type'] ) {
        case 'text':
        option_wrapper_header($value);
        ?>
                <input style="width:100%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
        <?php
        option_wrapper_footer($value);
        break;
       
        case 'select':
        option_wrapper_header($value);
        ?>
                <select style="width:70%;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                    <?php foreach ($value['options'] as $option) { ?>
                    <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                    <?php } ?>
                </select>
        <?php
        option_wrapper_footer($value);
        break;
       
        case 'textarea':
        $ta_options = $value['options'];
        option_wrapper_header($value);
        ?>
                <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width:100%;height:100px;"><?php
                if( get_settings($value['id']) !== false) {
                        echo stripslashes(get_settings($value['id']));
                    }else{
                        echo $value['std'];
                }?></textarea>
        <?php
        option_wrapper_footer($value);
        break;

        case "radio":
        option_wrapper_header($value);
       
        foreach ($value['options'] as $key=>$option) {
                $radio_setting = get_settings($value['id']);
                if($radio_setting != ''){
                    if ($key == get_settings($value['id']) ) {
                        $checked = "checked=\"checked\"";
                        } else {
                            $checked = "";
                        }
                }else{
                    if($key == $value['std']){
                        $checked = "checked=\"checked\"";
                    }else{
                        $checked = "";
                    }
                }?>
                <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
        <?php
        }
        
        option_wrapper_footer($value);
        break;
       
        case "checkbox":
        option_wrapper_header($value);
                        if(get_settings($value['id'])){
                            $checked = "checked=\"checked\"";
                        }else{
                            $checked = "";
                        }
                    ?>
                    <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
        <?php
        option_wrapper_footer($value);
        break;

        case "multicheck":
        option_wrapper_header($value);
       
        foreach ($value['options'] as $key=>$option) {
                 $pn_key = $value['id'] . '_' . $key;
                $checkbox_setting = get_settings($pn_key);
                if($checkbox_setting != ''){
                    if (get_settings($pn_key) ) {
                        $checked = "checked=\"checked\"";
                        } else {
                            $checked = "";
                        }
                }else{
                    if($key == $value['std']){
                        $checked = "checked=\"checked\"";
                    }else{
                        $checked = "";
                    }
                }?>
                <input type="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />
        <?php
        }
        
        option_wrapper_footer($value);
        break;
       
        case "heading":
        ?>
        <tr valign="top">
            <td colspan="2" style="text-align: center;"><h3><?php echo $value['name']; ?></h3></td>
        </tr>
        <?php
        break;
       
        default:

        break;
    }
}
?>

		</table>

		<p class="submit">
			<input name="save" type="submit" value="Save changes" />
			<input type="hidden" name="action" value="save" />
		</p>
	</form>
</div>
<?php
}

function option_wrapper_header($values){
    ?>
    <tr valign="top">
        <th scope="row" style="width:1%;white-space: nowrap;"><?php echo $values['name']; ?>:</th>
        <td>
    <?php
}

function option_wrapper_footer($values){
    ?>
        </td>
    </tr>
    <tr valign="top">
        <td>&nbsp;</td><td><small><?php echo $values['desc']; ?></small></td>
    </tr>
    <?php
}


add_action('admin_menu', 'art_add_admin'); 

if (!function_exists('get_search_form')) {
	function get_search_form()
	{
		include (TEMPLATEPATH . "/searchform.php");
	}
}

if (!function_exists('get_previous_posts_link')) {
	function get_previous_posts_link($label)
	{
		ob_start();
		previous_posts_link($label);
		return ob_get_clean();
	}
}

if (!function_exists('get_next_posts_link')) {
	function get_next_posts_link($label)
	{
		ob_start();
		next_posts_link($label);
		return ob_get_clean();
	}
}

if (!function_exists('get_previous_post_link')) {
	function get_previous_post_link($label)
	{
		ob_start();
		previous_post_link($label);
		return ob_get_clean();
	}
}

if (!function_exists('get_next_post_link')) {
	function get_next_post_link($label)
	{
		ob_start();
		next_post_link($label);
		return ob_get_clean();
	}
}

function art_comment($comment, $args, $depth)
{
	 $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
<div class="art-post">
         <div class="art-post-tl"></div>
         <div class="art-post-tr"></div>
         <div class="art-post-bl"></div>
         <div class="art-post-br"></div>
         <div class="art-post-tc"></div>
         <div class="art-post-bc"></div>
         <div class="art-post-cl"></div>
         <div class="art-post-cr"></div>
         <div class="art-post-cc"></div>
         <div class="art-post-body">
     <div class="art-post-inner art-article">
     
<div class="art-postcontent">
         <!-- article-content -->
     
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48'); ?>
         <cite class="fn"><?php comment_author_link(); ?>:</cite>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e('Your comment is awaiting moderation.') ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link('('.__('Edit', 'kubrick').')','  ','') ?></div>

      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>

          <!-- /article-content -->
      </div>
      <div class="cleared"></div>
      

      </div>
      
      		<div class="cleared"></div>
          </div>
      </div>
      
     </div>
<?php
}


if (function_exists('register_sidebars')) {
	register_sidebars(1, array(
		'description' => 'Widgets placed here will replace the default widgets that normally appear in the sidebar(s) when no widgets are active.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">'.'<!--- BEGIN Widget --->',
		'before_title' => '<!--- BEGIN WidgetTitle --->',
		'after_title' => '<!--- END WidgetTitle --->',
		'after_widget' => '<!--- END Widget --->'.'</div>'
	));
}

function art_normalize_widget_style_tokens($content, $bw, $bwt, $ewt, $bwc, $bwc, $ewc, $ew) {
	$result = '';
	$startBlock = 0;
	$endBlock = 0;
	while (true) {
		$startBlock = strpos($content, $bw, $endBlock);
		if (false === $startBlock) {
			$result .= substr($content, $endBlock);
			break;
		}
		$result .= substr($content, $endBlock, $startBlock - $endBlock);
		$endBlock = strpos($content, $ew, $startBlock);
		if (false === $endBlock) {
			$result .= substr($content, $endBlock);
			break;
		}
		$endBlock += strlen($ew);
		$widgetContent = substr($content, $startBlock, $endBlock - $startBlock);
		$beginTitlePos = strpos($widgetContent, $bwt);
		$endTitlePos = strpos($widgetContent, $ewt);
		if ((false == $beginTitlePos) xor (false == $endTitlePos)) {
			$widgetContent = str_replace($bwt, '', $widgetContent);
			$widgetContent = str_replace($ewt, '', $widgetContent);
		} else {
			$beginTitleText = $beginTitlePos + strlen($bwt);
			$titleContent = substr($widgetContent, $beginTitleText, $endTitlePos - $beginTitleText);
			if ('&nbsp;' == $titleContent) {
				$widgetContent = substr($widgetContent, 0, $beginTitlePos)
					. substr($widgetContent, $endTitlePos + strlen($ewt));
			}
		}
		if (false === strpos($widgetContent, $bwt)) {
			$widgetContent = str_replace($bw, $bw . $bwc, $widgetContent);
		} else {
			$widgetContent = str_replace($ewt, $ewt . $bwc, $widgetContent);
		}
		$result .= str_replace($ew, $ewc . $ew, $widgetContent);
	}
	return $result;
}

function art_sidebar($index = 1)
{
	if (!function_exists('dynamic_sidebar')) return false;
	ob_start();
	$success = dynamic_sidebar($index);
	$content = ob_get_clean();
	if (!$success) return false;
	$bw = '<!--- BEGIN Widget --->';
	$bwt = '<!--- BEGIN WidgetTitle --->';
	$ewt = '<!--- END WidgetTitle --->';
	$bwc = '<!--- BEGIN WidgetContent --->';
	$ewc = '<!--- END WidgetContent --->';
	$ew = '<!--- END Widget --->';
	$content = art_normalize_widget_style_tokens($content, $bw, $bwt, $ewt, $bwc, $bwc, $ewc, $ew);
	$replaces = array(
		$bw => "<div class=\"art-block\">\r\n    <div class=\"art-block-tl\"></div>\r\n    <div class=\"art-block-tr\"></div>\r\n    <div class=\"art-block-bl\"></div>\r\n    <div class=\"art-block-br\"></div>\r\n    <div class=\"art-block-tc\"></div>\r\n    <div class=\"art-block-bc\"></div>\r\n    <div class=\"art-block-cl\"></div>\r\n    <div class=\"art-block-cr\"></div>\r\n    <div class=\"art-block-cc\"></div>\r\n    <div class=\"art-block-body\">\r\n",
		$bwt => "<div class=\"art-blockheader\">\r\n    <div class=\"l\"></div>\r\n    <div class=\"r\"></div>\r\n     <div class=\"t\">",
		$ewt => "</div>\r\n</div>\r\n",
		$bwc => "<div class=\"art-blockcontent\">\r\n    <div class=\"art-blockcontent-body\">\r\n<!-- block-content -->\r\n",
		$ewc => "\r\n<!-- /block-content -->\r\n\r\n		<div class=\"cleared\"></div>\r\n    </div>\r\n</div>\r\n",
		$ew => "\r\n		<div class=\"cleared\"></div>\r\n    </div>\r\n</div>\r\n"
	);
	if ('' == $replaces[$bwt] && '' == $replaces[$ewt]) {
		$startTitle = 0;
		$endTitle = 0;
		$result = '';
		while (true) {
			$startTitle = strpos($content, $bwt, $endTitle);
			if (false == $startTitle) {
				$result .= substr($content, $endTitle);
				break;
			}
			$result .= substr($content, $endTitle, $startTitle - $endTitle);
			$endTitle = strpos($content, $ewt, $startTitle);
			if (false == $endTitle) {
				$result .= substr($content, $startTitle);
				break;
			}
			$endTitle += strlen($ewt);
		}
		$content = $result;
	}
	$content = str_replace(array_keys($replaces), array_values($replaces), $content);
	echo $content;
	return true;
}

/* horizontal menu */
function art_menu_items()
{
	global $artThemeSettings;
if(tt_option('cust_nav') == 'Yes') {	
	if ($artThemeSettings['menu.use_menu_navi']) 
	{
		art_menu_get_navi_menu();
		return;
	}
}
	if ('Pages' === $artThemeSettings['menu.source']) 
	{
		art_print_homepage();
		
		add_action('get_pages', 'art_menu_get_pages_filter');
		add_action('wp_list_pages', 'art_menu_list_pages_filter');
		
		wp_list_pages('title_li=&sort_column=menu_order');
		
		remove_action('wp_list_pages', 'art_menu_list_pages_filter');
		remove_action('get_pages', 'art_menu_get_pages_filter');
	}
	else 
	{
		add_action('get_terms', 'art_menu_get_terms_filter');
		add_action('wp_list_categories', 'art_menu_wp_list_categories_filter');
		
		wp_list_categories('title_li=');
		
		remove_action('wp_list_categories', 'art_menu_wp_list_categories_filter');
		remove_action('get_terms', 'art_menu_get_terms_filter');
	}
}
/* end horizontal menu */

/* horizontal menu filters */
function art_menu_get_pages_filter($pages)
{
	global $artThemeSettings;
	art_move_frontpage($pages);
	$artThemeSettings['menu.blogID'] = art_blogID($pages);
	$artThemeSettings['menu.activeID'] = art_active_pageID($pages);
	if (!$artThemeSettings['menu.showSubmenus'])
	{
		art_remove_subpage($pages);
	}
	$artThemeSettings['menu.topIDs'] = art_top_pageIDs($pages);
	return $pages;
}

function art_menu_list_pages_filter($output)
{
	global $artThemeSettings;
	
	$pref ='page-item-';
	
	if($artThemeSettings['menu.topIDs'])
	{
		foreach($artThemeSettings['menu.topIDs'] as $id)
		{
			$output = preg_replace('~<li class="([^"]*)\b(' 
				. $pref 
				. $id 
				. ')\b([^"]*)"><a ([^>]+)>([^<]*)</a>~',
				'<li class="$1$2$3"><a $4>' 
				. $artThemeSettings['menu.topItemBegin']
				. '$5' 
				. $artThemeSettings['menu.topItemEnd'] 
				. '</a>', $output, 1);
		}
	}
	$frontID = null;
	$blogID = null;
	
	if('page' == get_option('show_on_front')) 
	{
		$frontID = get_option('page_on_front');
		$blogID = $artThemeSettings['menu.blogID'];
	}
	
	if ($frontID) 
	{
		$output = preg_replace('~<li class="([^"]*)\b(' 
			. $pref . $frontID 
			. ')\b([^"]*)"><a href="([^"]*)" ~',
			'<li class="$1$2$3"><a href="'
			. get_option('home') 
			.'" ', $output, 1); 
	}
	
	$activeID = $artThemeSettings['menu.activeID'];
	
	if (is_home() && $blogID) 
	{
		$activeID = $blogID;	
	}
	
	if ($activeID)
	{
		$output = preg_replace('~<li class="([^"]*)\b('
			.$pref .$activeID. ')\b([^"]*)"><a ~',
			'<li class="$1$2$3"><a class="active" ', $output, 1);
	}
	
	return $output;
}

function art_menu_get_terms_filter($terms)
{
	global $artThemeSettings;
	
	$artThemeSettings['menu.activeID'] = art_active_catID($terms);
	
	if (!$artThemeSettings['menu.showSubmenus'])
	{
		art_remove_subcat($terms);
	}
			
	$artThemeSettings['menu.topIDs'] = art_top_catIDs($terms);

	return $terms;
}

function art_menu_wp_list_categories_filter($output)
{
	global $artThemeSettings;
	$pref ='cat-item-';
	if($artThemeSettings['menu.topIDs']) 
	{
		foreach($artThemeSettings['menu.topIDs'] as $id)
		{
			
			$output = preg_replace('~<li class="([^"]*)\b(' 
				. $pref . $id 
				. ')\b([^"]*)"><a ([^>]+)>([^<]*)</a>~',
				'<li class="$1$2$3"><a $4>' 
				. $artThemeSettings['menu.topItemBegin']
				. '$5' 
				. $artThemeSettings['menu.topItemEnd'] 
				. '</a>', $output, 1);
			
		}
	}
	if($artThemeSettings['menu.activeID'])
	{
		$output = preg_replace('~<li class="([^"]*)\b('
			. $pref . $artThemeSettings['menu.activeID']
			.')\b([^"]*)"><a ~',
			'<li class="$1$2$3"><a class="active" ',
			 $output, 1);
	}
	return $output;
}
/* end horizontal menu filters*/

/* vertical menu */
function art_vmenu_items()
{
	global $artThemeSettings;
if(tt_option('cust_nav') == 'Yes') {
	if ($artThemeSettings['vmenu.use_menu_navi']) 
	{
		art_menu_get_navi_menu(true);
		return;
	}
}
	
	if ('Pages' === $artThemeSettings['vmenu.source']) 
	{
		art_print_homepage();
		
		add_action('get_pages', 'art_vmenu_get_pages_filter');
		add_action('wp_list_pages', 'art_vmenu_list_pages_filter');
		
		wp_list_pages('title_li=&sort_column=menu_order');
		
		remove_action('wp_list_pages', 'art_vmenu_list_pages_filter');
		remove_action('get_pages', 'art_vmenu_get_pages_filter');
	}
	else 
	{
		add_action('get_terms', 'art_vmenu_get_terms_filter');
		add_action('wp_list_categories', 'art_vmenu_wp_list_categories_filter');
		
		wp_list_categories('title_li=');
		
		remove_action('wp_list_categories', 'art_vmenu_wp_list_categories_filter');
		remove_action('get_terms', 'art_vmenu_get_terms_filter');
	}
}
/* end vertical menu */

/* vertical menu filters */
function art_vmenu_get_pages_filter($pages)
{
	global $artThemeSettings;
	art_move_frontpage($pages);
	$artThemeSettings['vmenu.blogID'] = art_blogID($pages);
	$artThemeSettings['vmenu.activeIDs'] = art_active_pageIDs($pages);
	if (!$artThemeSettings['vmenu.showSubmenus'])
	{
		art_remove_subpage($pages);
	}
	$artThemeSettings['vmenu.topIDs'] = art_top_pageIDs($pages);
	if (!$artThemeSettings['vmenu.simple'])
	{ 
		art_process_simple_pages($pages, $artThemeSettings['vmenu.activeIDs'], $artThemeSettings['vmenu.topIDs']);
	}
	
	return $pages;
}

function art_vmenu_list_pages_filter($output)
{
	global $artThemeSettings;
	
	$pref ='page-item-';
	
	if($artThemeSettings['vmenu.topIDs'])
	{
		foreach($artThemeSettings['vmenu.topIDs'] as $id)
		{
			$output = preg_replace('~<li class="([^"]*)\b(' 
				. $pref 
				. $id 
				. ')\b([^"]*)"><a ([^>]+)>([^<]*)</a>~',
				'<li class="$1$2$3"><a $4>' 
				. $artThemeSettings['menu.topItemBegin']
				. '$5' 
				. $artThemeSettings['menu.topItemEnd'] 
				. '</a>', $output, 1);
		}
	}
	$frontID = null;
	$blogID = null;
	
	if('page' == get_option('show_on_front')) 
	{
		$frontID = get_option('page_on_front');
		$blogID = $artThemeSettings['vmenu.blogID'];
	}
	
	if ($frontID) 
	{
		$output = preg_replace('~<li class="([^"]*)\b(' 
			. $pref . $frontID 
			. ')\b([^"]*)"><a href="([^"]*)" ~',
			'<li class="$1$2$3"><a href="'
			. get_option('home') 
			.'" ', $output, 1); 
	}
	
	$activeIDs = array();
	
	if (is_home() && $blogID) 
	{
		$activeIDs[] = $blogID;	
	} else {
		$activeIDs = $artThemeSettings['vmenu.activeIDs'];
	}
	
	if ($activeIDs)
	{
		foreach($activeIDs as $id)
		{
			$output = preg_replace('~<li class="([^"]*)\b('
				.$pref .$id. ')\b([^"]*)"><a ~',
				'<li class="$1$2$3"><a class="active" ', $output, 1);
		}
	}
	
	return $output;
}

function art_vmenu_get_terms_filter($terms)
{
	global $artThemeSettings;
	
	$artThemeSettings['vmenu.activeIDs'] = art_active_catIDs($terms);
	$artThemeSettings['vmenu.topIDs'] = art_top_catIDs($terms);
	if (!$artThemeSettings['vmenu.showSubmenus'])
	{
		art_remove_subcat($terms, $artThemeSettings['vmenu.topIDs']);
	}
	if (!$artThemeSettings['vmenu.simple'])
	{ 
		art_process_simple_cats($terms, $artThemeSettings['vmenu.activeIDs'], $artThemeSettings['vmenu.topIDs']);
	}
	return $terms;
}

function art_vmenu_wp_list_categories_filter($output)
{
	global $artThemeSettings;
	$pref ='cat-item-';
	if($artThemeSettings['vmenu.topIDs']) 
	{
		foreach($artThemeSettings['vmenu.topIDs'] as $id)
		{
			
			$output = preg_replace('~<li class="([^"]*)\b(' 
				. $pref . $id 
				. ')\b([^"]*)"><a ([^>]+)>([^<]*)</a>~',
				'<li class="$1$2$3"><a $4>' 
				. $artThemeSettings['menu.topItemBegin']
				. '$5' 
				. $artThemeSettings['menu.topItemEnd'] 
				. '</a>', $output, 1);
			
		}
	}
	if($artThemeSettings['vmenu.activeIDs'])
	{
		foreach($artThemeSettings['vmenu.activeIDs'] as $id)
		{
			$output = preg_replace('~<li class="([^"]*)\b('
				. $pref . $id
				.')\b([^"]*)"><a ~',
				'<li class="$1$2$3"><a class="active" ',
				$output, 1);
		}
	}

	return $output;
}
/* end vertical menu filters */

/* pages */
function art_print_homepage()
{
	global $artThemeSettings;
	if (true === $artThemeSettings['menu.showHome'] 
		&& ('page' != get_option('show_on_front') || 
			(!get_option('page_on_front') && !get_option('page_for_posts'))))
	{
		echo '<li><a' 
		. (is_home() ? ' class="active"' : '') 
		. ' href="' 
		. get_option('home') 
		. '">'
		.$artThemeSettings['menu.topItemBegin']
		. $artThemeSettings['menu.homeCaption'] 
		. $artThemeSettings['menu.topItemEnd'] 
		. '</a></li>';
	}
}

function art_move_frontpage(&$pages)
{
	if ('page' != get_option('show_on_front')) return;
	$frontID = get_option('page_on_front');
	if (!$frontID) return;
	foreach ($pages as $index => $page)
		if($page->ID == $frontID) {
			unset($pages[$index]);
			$page->post_parent = '0';
			$page->menu_order = '0';
			array_unshift($pages, $page);
			break;
		}
}

function art_remove_subpage(&$pages)
{
	foreach ($pages as $index => $page)
		if ($page->post_parent) unset($pages[$index]);
}

function art_top_pageIDs($pages)
{
	$page_IDs = array();
	foreach ($pages as $index => $page)
	{
		$page_IDs[] = $page->ID;
	}
	$result = array();
	foreach ($pages as $index => $page)
	{
		if (!$page->post_parent || !in_array($page->post_parent,$page_IDs))
		{
			$result[]=$page->ID;
		}
	}
	return $result;
}

function art_blogID($pages)
{
	$result = null;
	
	if(!'page' == get_option('show_on_front')) 
	{
		return $result;
	}
	
	$blogID = get_option('page_for_posts');
	
	if (!$blogID) 
	{
		return $result;
	}
	
	foreach ($pages as $page)
	{
		if ($page->ID == $blogID) 
		{ 
			$result = $page;
			break;
		}
	}
	
	while($result && $result->post_parent) 
	{
		foreach ($pages as $page)
		{
			if ($page->ID == $result->post_parent) 
			{
				$result = $page;
				break;
			}
		}
	}
	return ($result ? $result->ID : null);
}

function art_active_pageID($pages)
{
	$current_page = null;
	
	foreach ($pages as $index => $page)
	{
		if (is_page($page->ID)) 
		{ 
			$current_page = $page;
			break;
		}
	}

	while($current_page && $current_page->post_parent) 
	{
		$parent_page = get_page($current_page->post_parent);
		if ($parent_page && $parent_page->post_status == 'private') 
		{
			break;
		}
		$current_page = $parent_page;
	}
	
	return ($current_page ? $current_page->ID : null);
}

function art_active_pageIDs($pages)
{
	$current_page = null;
	foreach ($pages as $index => $page)
	{
		if (is_page($page->ID)) 
		{ 
			$current_page = $page;
			break;
		}
	}

	$result = array();
	if (!$current_page)
	{
		return $result;
	}
	
	$result[] = $current_page->ID;

	while($current_page->post_parent) 
	{
		$current_page = get_page($current_page->post_parent);
		$result[] = $current_page->ID;
	}
	return $result;
}

function art_process_simple_pages(&$pages, $activeIDs, $topIds)
{
	foreach ($pages as $index => $page)
	{
		if ($page->post_parent && !in_array($page->post_parent,$activeIDs) 
			&& !in_array($page->ID,$topIds))
		{
			unset($pages[$index]);
		}
	}
}
/* end pages */

/* categories */
function art_active_catID($categories)
{
	global $wp_query;
	
	$result = null;
	
	if (!$wp_query->is_category)
	{
		return $result;
	}
	
	$cat_obj = $wp_query->get_queried_object();
	
	if (!$cat_obj) 
	{
		return $result;
	}
	
	$result = $cat_obj->term_id;
	while ($cat_obj->parent != '0')
	{
		foreach ($categories as $index => $cat)
			if ($cat_obj->parent == $cat->term_id) {
				$cat_obj = $cat;
				break;
			}
		$result = $cat_obj->term_id;
	} 
	return $result;
}

function art_active_catIDs($categories)
{
	global $wp_query;
	
	$result = array();
	
	if (!$wp_query->is_category)
	{
		return $result;
	}
	
	$cat_obj = $wp_query->get_queried_object();
	
	if (!$cat_obj) 
	{
		return $result;
	}
	
	$result[] = $cat_obj->term_id;
	while ($cat_obj->parent != '0')
	{
		foreach ($categories as $index => $cat)
			if ($cat_obj->parent == $cat->term_id) {
				$cat_obj = $cat;
				break;
			}
		$result[] = $cat_obj->term_id;
	} 
	return $result;
}

function art_remove_subcat(&$terms, $topIds)
{
	foreach ($terms as $index => $cat)
	{
		if (!in_array($cat->term_id,$topIds)) 
		{
			unset($terms[$index]);
		}
	}
}

function art_top_catIDs($categories)
{
	$result = array();
	$catIds = array();
	foreach ($categories as $index => $cat)
	{
		$catIds[] = $cat->term_id;
	}
	foreach ($categories as $index => $cat)
	{
		if (!in_array($cat->parent,$catIds )) 
		{
			$result[] = $cat->term_id;
		}
	}
	return $result;
}

function art_process_simple_cats(&$terms, $activeIDs, $topIds)
{
	foreach ($terms as $index => $cat)
	{
		if (!in_array($cat->term_id,$topIds) && !in_array($cat->parent,$activeIDs))
		{
			unset($terms[$index]);
		}
	}
}
/* end categories */

add_filter('comments_template', 'legacy_comments');  
function legacy_comments($file) {  
    if(!function_exists('wp_list_comments')) : // WP 2.7-only check  
    $file = TEMPLATEPATH.'/legacy.comments.php';  
    endif;  
    return $file;  
}  

// WP 3.0 nav menu start
if(tt_option('cust_nav') == 'Yes') {
/* set this theme support navi menu */
if (function_exists('add_theme_support')) add_theme_support('nav-menus');
// This theme uses wp_nav_menu() in one location.
if (function_exists('register_nav_menus')) register_nav_menus(array('primary' => 'Primary Navigation'));

function art_menu_get_navi_menu($vertical_menu = false,$select_menu = '')
{
	if (empty($select_menu)){
		$str = wp_nav_menu( array( 'container' => 'ul','echo'=>0, 'theme_location' => 'primary') );
	} else {
		$str = wp_nav_menu( array( 'container' => 'ul','echo'=>0,'menu' => $select_menu, 'theme_location' => 'primary') );
	}
	if (preg_match('/^<div.*?>/',$str)){
		$str = preg_replace('/^<div.*?>/','',$str );
	}
	if (preg_match('/<\/div>$/',$str)){
		$str = preg_replace('/<\/div>$/','',$str );
	}
	require_once('includes/class.php');
	$htmlParser = new htmlParser();
	$htmlParser->parse($str);
	$menu_nodes = $htmlParser->RootNode->ChildNodes[0]->ChildNodes;
	$parrent_active = true;
	$menu_array = get_menu_array($menu_nodes,$parrent_active);
	$output_html = menu_array_to_html($menu_array,$vertical_menu);
	echo $output_html;
}

function get_menu_array(&$menu_nodes,$parrent_active=false){
	$menu_array = array();
	foreach ($menu_nodes as $node){ // li list
		if 	($node->TagName !== 'li') continue;

		$submenu_arry = null;
		$sub_menu_active = false;
		$li_tag_class = $node->getAttribute('class');
		$li_tag_id = $node->getAttribute('id');
		$this_menu_active = preg_match('/current-menu-item/',$li_tag_class);
		$sub_ul_tag_class='';
		$sub_ul_tag_id='';
		$child_menu_active = false;
		foreach ($node->ChildNodes as $child_node){
			switch($child_node->TagName){
				case 'a':
					$title = $child_node->getText();
					$a_tag_href =	$child_node->getAttribute('href');
					$a_tag_id =	$child_node->getAttribute('id');
					$a_tag_class =	$child_node->getAttribute('class');
					break;
				case 'ul':
					$sub_ul_tag_class = $child_node->getAttribute('class');
					$sub_ul_tag_id = $child_node->getAttribute('id');
					$submenu_arry = get_menu_array($child_node->ChildNodes,$parrent_active);
					if ($submenu_arry && $parrent_active){
						foreach ($submenu_arry as $child_menu){
							if ($child_menu['active']){
								$sub_menu_active = true;
								break;
							}
						}
					}
					break;
				default:
			}
		}

		$menu['active'] = $this_menu_active || $sub_menu_active;
		$menu['li_tag_class']= $li_tag_class;
		$menu['li_tag_id']= $li_tag_id;
		$menu['a_tag_class'] = $a_tag_class;
		$menu['a_tag_id'] = $a_tag_id;
		$menu['a_tag_href']= $a_tag_href;
		$menu['title'] = $title;
		$menu['sub_ul_tag_class'] = $sub_ul_tag_class;
		$menu['sub_ul_tag_id'] = $sub_ul_tag_id;
		$menu['sub_menu_array'] = $submenu_arry;
		$menu_array[]=$menu;
	}
	return $menu_array;
}

function menu_array_to_html($menu_array,$vertical_menu = false,$is_sub = false,$tab = ''){
	global $artThemeSettings;
	if (!$vertical_menu){
		$theme_show_submenu = $artThemeSettings['menu.showSubmenus'];
	} else {
		$theme_show_submenu = $artThemeSettings['vmenu.showSubmenus'];
	}
	$output = '';
	foreach ($menu_array as $menu){
		$output .= "{$tab}<li";
		if (!empty($menu['li_tag_id'])) $output .= " id=\"{$menu['li_tag_id']}\"";
		if (!empty($menu['li_tag_class'])) $output .= " class=\"{$menu['li_tag_class']}\"";
		$output .= ">\n";

		$output .= "{$tab}\t<a";
		if (!empty($menu['a_tag_id'])) $output .= " id=\"{$menu['a_tag_id']}\"";
		$a_class = '';
		if ($menu['active'])$a_class = 'active';
		if (!empty($menu['a_tag_class'])) $a_class .= "".$menu['a_tag_class'];
		if (!empty($a_class)) $output .= " class=\"{$a_class}\"";
		if (!empty($menu['a_tag_href'])) $output .= " href=\"{$menu['a_tag_href']}\"";
		$output .= ">\n";

		if ($is_sub && $vertical_menu) {
			$output .= "{$tab}\t\t{$menu['title']}\n";
		} else {
			$output .= "{$tab}\t\t{$artThemeSettings['menu.topItemBegin']}{$menu['title']}{$artThemeSettings['menu.topItemEnd']}\n";
		}
		$output .= "{$tab}\t</a>\n";

		$vertical_not_open_submenu = $vertical_menu && (!$menu['active'] && !$artThemeSettings['vmenu.simple']);
		if ($theme_show_submenu && !$vertical_not_open_submenu && $menu['sub_menu_array']){
			$output .= "{$tab}\t<ul";
			if (!empty($menu['sub_ul_tag_id'])) $output .= " id=\"{$menu['sub_ul_tag_id']}\"";
			if (empty($menu['sub_ul_tag_class'])) {
				$output .= " class=\"children\"";
			} else {
				$output .= " class=\"children {$menu['sub_ul_tag_class']}\"";
			}
			$output .= ">\n";
			$output	.= 	menu_array_to_html($menu['sub_menu_array'],$vertical_menu,true,$tab."\t\t");
			$output .= "{$tab}\t</ul>\n";
		}
		$output .= "{$tab}</li>\n";
	}
	return $output;
}

class Vertical_Menu_Widget extends WP_Widget
{
	function Vertical_Menu_Widget(){
		$widget_ops = array( 'description' => __('Use this widget to add one of your custom menus as a widget.') );
		parent::WP_Widget( 'Vertical_menu', __('Vertical menu'), $widget_ops );

	}
	function widget($args, $instance){
		global $artThemeSettings;
		// Get menu
		if ($artThemeSettings['vmenu.use_menu_navi'] && $instance['nav_menu'] >= 0){
			$nav_menu = wp_get_nav_menu_object( $instance['nav_menu'] );
			if ( !$nav_menu )
				return;
		}

//		echo $args['before_widget'];
		$bw = "";
		$bwt = "";
		$ewt = "";
		$bwc = "";
		$ewc = "";
		$ew = "";
		echo $bw;
		if ('' != $bwt && '' != $ewt) {
			if ( !empty($instance['title']) ){
				echo $bwt;
				echo $instance['title'];
				echo $ewt;
			} else { 
				echo $bwt;
				_e($artThemeSettings['vmenu.source'], 'kubrick');
				echo $ewt;
			}
		}
		echo $bwc;

		echo "<ul class=\"art-vmenu\">\n";
		if ($artThemeSettings['vmenu.use_menu_navi'] && $instance['nav_menu'] >= 0){
			art_menu_get_navi_menu(true,$nav_menu);
		} else {
			$org_vmenu_source=$artThemeSettings['vmenu.source'];
			$org_vmenu_use_menu_navi=$artThemeSettings['vmenu.use_menu_navi'];
			if ($instance['nav_menu'] == -1) $artThemeSettings['vmenu.source'] = "Categories";
			if ($instance['nav_menu'] == -2) $artThemeSettings['vmenu.source'] = "Pages";
			$artThemeSettings['vmenu.use_menu_navi'] = false;
			art_vmenu_items();
			$artThemeSettings['vmenu.source'] = $org_vmenu_source;
			$artThemeSettings['vmenu.use_menu_navi'] = $org_vmenu_use_menu_navi;
		}
		echo "\n</ul>\n";
		echo $ewc;
		echo $ew;
	}
	function update($new_instance, $old_instance){
		global $artThemeSettings;

		$instance['title'] = strip_tags( stripslashes($new_instance['title']) );
		if ($artThemeSettings['vmenu.use_menu_navi']){
				$instance['nav_menu'] = (int) $new_instance['nav_menu'];
		}
		return $instance;
	}
	function form($instance){
		global $artThemeSettings;
		$title = isset( $instance['title'] ) ? $instance['title'] : '';
		if ($artThemeSettings['vmenu.use_menu_navi']){
			$nav_menu = isset( $instance['nav_menu'] ) ? $instance['nav_menu'] : '';
			// Get menus
			$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
			// If no menus exists, direct the user to go and create some.
//			if ( !$menus ) {
//				echo '<p>'. sprintf( __('No menus have been created yet. <a href="%s">Create some</a>.'), admin_url('nav-menus.php') ) .'</p>';
//				return;
//			}
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:') ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" />
		</p>
		<?php
		if ($artThemeSettings['vmenu.use_menu_navi']){
		?>
			<p>
				<label for="<?php echo $this->get_field_id('nav_menu'); ?>"><?php _e('Select Menu:'); ?></label>
				<select id="<?php echo $this->get_field_id('nav_menu'); ?>" name="<?php echo $this->get_field_name('nav_menu'); ?>">
			<?php
				foreach ( $menus as $menu ) {
					$selected = $nav_menu == $menu->term_id ? ' selected="selected"' : '';
					echo '<option'. $selected .' value="'. $menu->term_id .'">'. $menu->name .'</option>';
				}
				$selected = $nav_menu == -1 ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="-1">'. __('Artisteer Categorie Menu') .'</option>';
				$selected = $nav_menu == -2 ? ' selected="selected"' : '';
				echo '<option'. $selected .' value="-2">'. __('Artisteer Page Menu') .'</option>';
			?>
				</select>
			</p>
		<?php
		}
	}

}// END class

function widget_verticalmenu_init() {
	if ( !is_blog_installed() )
		return;
	register_widget('Vertical_Menu_Widget');
}
add_action('widgets_init', 'widget_verticalmenu_init');
} else {
function widget_verticalmenu($args) {
	extract($args);
	global $artThemeSettings;
	$bw = "";
	$bwt = "";
	$ewt = "";
	$bwc = "";
	$ewc = "";
	$ew = "";
	echo $bw;
	if ('' != $bwt && '' != $ewt) {
		if(tt_option('nav_mods') == 'Yes') {
			if(tt_option('nav_v_title') == 'Yes') {
				echo $bwt;
					echo tt_option('vmenu_header');
				echo $ewt;
			} else {
			}
		}	else	{
		
			echo $bwt;
			_e($artThemeSettings['vmenu.source'], 'kubrick');
			echo $ewt;
		}	
	}
	echo $bwc;
?>
<ul class="art-vmenu">
<?php art_vmenu_items(); ?>
</ul>
<?php
	echo $ewc;
	echo $ew;
}
function widget_verticalmenu_init() {
	if ( !function_exists('register_sidebar_widget') ) return;
	register_sidebar_widget(array('Vertical menu', 'widgets'), 'widget_verticalmenu');
}
add_action('widgets_init', 'widget_verticalmenu_init');
}
// WP 3.0 nav menu end
if ( function_exists('make_header_widget') )
make_header_widget();
if ( function_exists('cms_make_footers') )
cms_make_footers();
