<?php
/*
Plugin Name: WP Legal Pages
Plugin URI: http://wplegalpages.com
Description: Wp Legal Pages is a simple 1 click legal page management plugin. You can quickly add in legal pages to your wordpress sites, manage templates, edit templates, create disclosure snippets, create pages all driven off custom short codes. Furthermore the business information you fill in the general settings will be automatically filled into the appropriate places within the pages due to our custom integration system we have. The icing on the cake is the hosting of unlimited popups that force the visitor to agree to your terms before the page unlocks. This plugin is truly unique and according to our buyers 'Truly Awesome'!
Author: Jameson Brandon
Version: 2.0
Author URI: http://offlineattack.com
*/
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once( 'legalPages.php' );
global $wp_version;

$exit_msg = 'WP Legal Pages has been tested and implemented only on WP 2.0 and higher. To ensure usability <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

if(version_compare($wp_version, "2.0", "<"))
	echo $exit_msg;

$lpObj = new legalPages();
if (isset($lpObj))
{
	register_activation_hook( __FILE__, array($lpObj,	'install') );
	register_deactivation_hook( __FILE__, array($lpObj,	'deactivate') );
}


require 'plugin-updates/plugin-update-checker.php';
$lpPluginUpdateChecker = new lpPluginUpdateChecker(
	'http://offlineattack.com/updates/legalpages.json', 
	__FILE__
);

function lpaddSecretKey($query){
	$query['secret'] = 'legalPages';
	return $query;
}
$lpPluginUpdateChecker->addQueryArgFilter('lpaddSecretKey');

define('LP_PLUGIN_DIR', dirname(__FILE__));
define('LP_OPTION_NAME', 'lp_exclude_pages');
define('LP_OPTION_SEP', ',');
define( 'LP_TD', 'exclude-pages' );

function lp_exclude_pages( $pages ) {
	$bail_out = ( ( defined( 'WP_ADMIN' ) && WP_ADMIN == true ) || ( strpos( $_SERVER[ 'PHP_SELF' ], 'wp-admin' ) !== false ) );
	$bail_out = apply_filters( 'lp_admin_bail_out', $bail_out );
	if ( $bail_out ) return $pages;
	$excluded_ids = lp_get_excluded_ids();
	$length = count($pages);
	
	for ( $i=0; $i<$length; $i++ ) {
		$page = & $pages[$i];
		
		if ( lp_ancestor_excluded( $page, $excluded_ids, $pages ) ) {
			$excluded_ids[] = $page->ID;
		}
	}

	$delete_ids = array_unique( $excluded_ids );
	
	for ( $i=0; $i<$length; $i++ ) {
		$page = & $pages[$i];
		
		if ( in_array( $page->ID, $delete_ids ) ) {
			unset( $pages[$i] );
		}
	}

	if ( ! is_array( $pages ) ) $pages = (array) $pages;
	$pages = array_values( $pages );

	return $pages;
}

function lp_ancestor_excluded( $page, $excluded_ids, $pages ) {
	$parent = & lp_get_page( $page->post_parent, $pages );
	if ( ! $parent )
		return false;
	if ( in_array( $parent->ID, $excluded_ids ) )
		return (int) $parent->ID;
	if ( $parent->ID == 0 )
		return false;
	return lp_ancestor_excluded( $parent, $excluded_ids, $pages );
}

function lp_get_page( $page_id, $pages ) {
	$length = count($pages);
	for ( $i=0; $i<$length; $i++ ) {
		$page = & $pages[$i];
		if ( $page->ID == $page_id ) return $page;
	}
	return false;
}

function lp_this_page_included() {
	global $post_ID;
	if ( ! $post_ID ) return true;
	$excluded_ids = lp_get_excluded_ids();
	if ( empty($excluded_ids) ) return true;
	return ! in_array( $post_ID, $excluded_ids );
}

function lp_nearest_excluded_ancestor() {
	global $post_ID, $wpdb;
	if ( ! $post_ID ) return false;
	$excluded_ids = lp_get_excluded_ids();
	$sql = "SELECT ID, post_parent FROM $wpdb->posts WHERE post_type = 'page'";
	$pages = $wpdb->get_results( $sql );
	$parent = lp_get_page( $post_ID, $pages );
	return lp_ancestor_excluded( $parent, $excluded_ids, $pages );
}

function lp_get_excluded_ids() {
	$exclude_ids_str = get_option( LP_OPTION_NAME );
	if ( empty($exclude_ids_str) ) return array();
	return explode( LP_OPTION_SEP, $exclude_ids_str );
}

function lp_update_exclusions( $post_ID ) {
	$exclude_this_page = ! (bool) @ $_POST['lp_this_page_included'];
	$ctrl_present = (bool) @ $_POST['lp_ctrl_present'];
	if ( ! $ctrl_present )
		return;
	
	$excluded_ids = lp_get_excluded_ids();
	if ( $exclude_this_page ) {
		array_push( $excluded_ids, $post_ID );
		$excluded_ids = array_unique( $excluded_ids );
	}
	if ( ! $exclude_this_page ) {
		$index = array_search( $post_ID, $excluded_ids );
		if ( $index !== false ) unset( $excluded_ids[$index] );
	}
	$excluded_ids_str = implode( LP_OPTION_SEP, $excluded_ids );
	lp_set_option( LP_OPTION_NAME, $excluded_ids_str, __( "Comma separated list of post and page IDs to exclude when returning pages from the get_pages function.", "exclude-pages" ) );
}

function lp_set_option( $name, $value, $description ) {
	delete_option($name);
	add_option($name, $value, $description);
}

function lp_admin_sidebar_wp25() {
	$nearest_excluded_ancestor = lp_nearest_excluded_ancestor();
	echo '	<div id="excludepagediv" class="new-admin-wp25">';
	echo '		<div class="outer"><div class="inner">';
	echo '		<p><label for="lp_this_page_included" class="selectit">';
	echo '		<input ';
	echo '			type="checkbox" ';
	echo '			name="lp_this_page_included" ';
	echo '			id="lp_this_page_included" ';
	if ( lp_this_page_included() ) 
		echo 'checked="checked"';
	echo ' />';
	echo '			'.__( 'Include this page in lists of pages', LP_TD ).'</label>';
	echo '		<input type="hidden" name="lp_ctrl_present" value="1" /></p>';
	if ( $nearest_excluded_ancestor !== false ) {
		echo '<p class="ep_exclude_alert"><em>';
		printf( __( 'N.B. An ancestor of this page is excluded, so this page is too (<a href="%1$s" title="%2$s">edit ancestor</a>).', LP_TD), "post.php?action=edit&amp;post=$nearest_excluded_ancestor", __( 'edit the excluded ancestor', LP_TD ) );
		echo '</em></p>';
	}
	if ( lp_has_menu() ) {
		echo '<p id="ep_custom_menu_alert"><em>';
		if ( current_user_can( 'edit_theme_options' ) )
			printf( __( 'N.B. This page can still appear in explicitly created <a href="%1$s">menus</a> (<a id="ep_toggle_more" href="#ep_explain_more">explain more</a>)', LP_TD),
				"nav-menus.php" );
		else
			_e( 'N.B. This page can still appear in explicitly created menus (<a id="ep_toggle_more" href="#ep_explain_more">explain more</a>)', LP_TD);
		echo '</em></p>';
		echo '<div id="ep_explain_more"><p>';
		if ( current_user_can( 'edit_theme_options' ) )
			printf( __( 'WordPress provides a simple function for you to maintain your site <a href="%1$s">menus</a>. If you create a menu which includes this page, the checkbox above will not have any effect on the visibility of that menu item.', LP_TD),
				"nav-menus.php" );
		else
			_e( 'WordPress provides a simple function for you to maintain the site menus, which your site administrator is using. If a menu includes this page, the checkbox above will not have any effect on the visibility of that menu item.', LP_TD);
		echo '</p><p>';
		echo _e( 'If you think you no longer need the Exclude Pages plugin you should talk to your WordPress administrator about disabling it.', LP_TD );
		echo '</p></div>';
	}
	echo '		</div><!-- .inner --></div><!-- .outer -->';
	echo '	</div><!-- #excludepagediv -->';
}

function lp_has_menu() {
	if ( ! function_exists( 'wp_get_nav_menus' ) )
		return false;
	$menus = wp_get_nav_menus();
	foreach ( $menus as $menu_maybe ) {
		if ( $menu_items = wp_get_nav_menu_items($menu_maybe->term_id) )
			return true;
	}
}

function lp_hec_show_dbx( $to_show ) {
	array_push( $to_show, 'excludepagediv' );
	return $to_show;
}

/*function pause_exclude_pages() {
	remove_filter('get_pages','lp_exclude_pages');
}

function resume_exclude_pages() {
	add_filter('get_pages','lp_exclude_pages');
}*/

function lp_init() {
	add_filter('get_pages','lp_exclude_pages');
	$locale = get_locale();
	$folder = rtrim( basename( dirname( __FILE__ ) ), '/' );
	$mo_file = trailingslashit( WP_PLUGIN_DIR ) . "$folder/locale/" . LP_TD . "-$locale.mo";
	load_textdomain( LP_TD, $mo_file );
}

function lp_admin_init() {
	global $wp_version;
	add_meta_box('lp_admin_meta_box', __( 'Exclude Pages', LP_TD ), 'lp_admin_sidebar_wp25', 'page', 'side', 'low');

	add_action('save_post', 'lp_update_exclusions');
}

function lp_admin_css() {
	echo <<<END
<style type="text/css" media="screen">
	.ep_exclude_alert { font-size: 11px; }
	.new-admin-wp25 { font-size: 11px; background-color: #fff; }
	.new-admin-wp25 .inner {  padding: 8px 12px; background-color: #EAF3FA; border: 1px solid #EAF3FA; -moz-border-radius: 3px; -khtml-border-bottom-radius: 3px; -webkit-border-bottom-radius: 3px; border-bottom-radius: 3px; }
	#ep_admin_meta_box .inner {  padding: inherit; background-color: transparent; border: none; }
	#ep_admin_meta_box .inner label { background-color: none; }
	.new-admin-wp25 .exclude_alert { padding-top: 5px; }
	.new-admin-wp25 .exclude_alert em { font-style: normal; }
</style>
END;
}

function lp_admin_js() {
	echo <<<END
<script type="text/javascript">
//<![CDATA[
	jQuery( '#ep_explain_more' ).hide();
	jQuery( '#ep_toggle_more' ).click( function() {
		jQuery( '#ep_explain_more' ).toggle();
		return false;
	} );
//]]>
</script>
END;
}

add_action( 'init', 'lp_init' );
add_action( 'admin_init', 'lp_admin_init' );

?>
