<?php
load_theme_textdomain('kubrick');

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
		echo $bwt;
		_e($artThemeSettings['vmenu.source'], 'kubrick');
		echo $ewt;
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
