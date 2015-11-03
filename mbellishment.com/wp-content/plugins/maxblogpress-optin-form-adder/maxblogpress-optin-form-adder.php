<?php
/* 
 * Plugin Name:   MaxBlogPress Optin Form Adder
 * Version:       1.1.1
 * Plugin URI:    http://www.maxblogpress.com/plugins/ofa/
 * Description:   Want to add optin subscription forms to your blog but don't know how? With MaxBlogPress Optin Form Adder, you can easily put optin forms on your blog as a widget or within posts. Customize them to match your blog's style, without knowing a single code! Adjust your settings <a href="edit.php?page=maxblogpress-optin-form-adder/maxblogpress-optin-form-adder.php">here</a>.
 * Author:        MaxBlogPress
 * Author URI:    http://www.maxblogpress.com
 *
 * License: Copyright (c) 2008 Pawan Agrawal. All rights reserved.
 * 
 * This plugin uses a commercial script library.
 * 
 * Please refer to "license.txt" file located at "optin-form-adder-lib/"
 * for copyright notice and end user license agreement.
 * 
 */
 
$ofa_path     = preg_replace('/^.*wp-content[\\\\\/]plugins[\\\\\/]/', '', __FILE__);
$ofa_path     = str_replace('\\','/',$ofa_path);
$ofa_dir      = substr($ofa_path,0,strrpos($ofa_path,'/'));
$ofa_siteurl  = get_bloginfo('wpurl');
$ofa_siteurl  = (strpos($ofa_siteurl,'http://') === false) ? get_bloginfo('siteurl') : $ofa_siteurl;
$ofa_fullpath = $ofa_siteurl.'/wp-content/plugins/'.$ofa_dir.'/';
$ofa_relpath  = str_replace('\\','/',dirname(__FILE__));
$ofa_libpath  = $ofa_fullpath.'optin-form-adder-lib/';
$ofa_abspath  = str_replace("\\","/",ABSPATH); 
define('OFA_ABSPATH', $ofa_abspath);
define('OFA_PATH', $ofa_path);
define('OFA_FULLPATH', $ofa_fullpath);
define('OFA_LIBPATH', $ofa_libpath);
define('OFA_SITEURL', $ofa_siteurl);
define('OFA_NAME', 'MaxBlogPress Optin Form Adder');
define('OFA_VERSION', '1.1.1');
require_once($ofa_relpath.'/optin-form-adder-lib/include/optin-form-adder.cls.php');

/**
 * OptinFormAdderPlugin - Optin Form Adder
 * Holds all the necessary functions and variables
 */
class OptinFormAdderPlugin extends OptinFormAdder
{
	/**
	 * Constructor. Adds the plugins plugin actions/filters and gets the user defined options.
	 */
	function OptinFormAdderPlugin() {
		global $table_prefix, $wp_version;
		$this->ofa_options_table = $table_prefix.$this->ofa_options_table;
		$this->wp_version  = $wp_version;
		$this->plugin_pg   = ($wp_version >= 2.7) ? 'tools.php' : 'edit.php';
		$this->img_how     = '<img src="'.OFA_LIBPATH.'images/how.gif" border="0" align="absmiddle">';
		$this->img_comment = '<img src="'.OFA_LIBPATH.'images/comment.gif" border="0" align="absmiddle">';
		$this->img_remove  = '<img src="'.OFA_LIBPATH.'images/remove.gif" border="0" align="absmiddle">';
		$this->img_help    = '<img src="'.OFA_LIBPATH.'images/help.gif" border="0" align="absmiddle">';
		$this->img_wand    = '<img src="'.OFA_LIBPATH.'images/wand.gif" border="0" align="absmiddle">';
		$this->ofap1       = base64_decode("PC90ZD48L3RyPjx0cj48dGQgY29sc3Bhbj0iMiIgYWxpZ249ImNlbnRlciI+PGEgaHJlZj0iaHR0cDovL3d3dy5tYXhibG9ncHJlc3MuY29tL2dvLnBocD9vZmZlcj0=");
		$this->ofap2       = base64_decode("UG93ZXJlZCBieSBPcHRpbiBGb3JtIEFkZGVyPC9hPjwvdGQ+PC90cj48L3RhYmxlPg==");

		add_action('activate_'.OFA_PATH, array(&$this, 'ofaActivate'));
		add_action('admin_menu', array(&$this, 'ofaAddMenu'));
		add_action('admin_head', array(&$this, 'ofaAdminHead'));
		add_action('after_plugin_row', array(&$this, 'ofaCheckPluginVersion'));

		$this->ofa_activate = get_option('ofa_activate');
		if ( $this->ofa_activate == 2 ) {
			add_filter('the_content', array(&$this, 'ofaWithinPost'));
		}
	}
	
	/**
	 * Called when plugin is activated. Adds the plugins options to the options table.
	 */
	function ofaActivate() {
		$ret1 = $this->__ofaCreateOptionsTable();
		if ( $ret1 == true ) $this->__ofaAddDefaultData();
		update_option('ofa_version', OFA_VERSION);
		return true;
	}
	
	/**
	 * Adds the plugins link in admin's Manage menu
	 */
	function ofaAddMenu() {
		add_management_page(OFA_NAME, 'Optin Form Adder', 9, OFA_PATH, array(&$this, 'ofaOptionsPg'));
	}
	
	/**
	 * Text Editor javascript for widget
	 */
	function ofaAdminHead() {
		if ( strpos($_SERVER['HTTP_REFERER'], '/widgets.php') !== false && strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'msie') !== false || ( $this->wp_version >= 2.5 && $this->wp_version < 2.6 ) ) { // ... || Fix for WP 2.5.x
			$this->not_ie = 0;
			echo '<script language="javascript" type="text/javascript" src="'.OFA_FULLPATH.'editor/tiny_mce.js"></script>';
		} else {
			$this->not_ie = 1;
		}
	}
	
	/**
	 * Gets recheck data fro displaying auto upgrade information
	 */
	function ofaRecheckData($data='') {
		if ( $data != '' ) {
			update_option('ofa_version_check',$data);
		} else {
			$version_chk = get_option('ofa_version_check');
			return $version_chk;
		}
	}
	
	/**
	 * Extracts plugin update data
	 */
	function ofaExtractUpdateData() {
		$arr = array();
		$version_chk_file = "http://www.maxblogpress.com/plugin-updates/mbp-optin-form-adder.php?v=".OFA_VERSION;
		$content = wp_remote_fopen($version_chk_file);
		if ( $content ) {
			$content          = nl2br($content);
			$content_arr      = explode('<br />', $content);
			$latest_version   = trim(trim(strstr($content_arr[0],'~'),'~'));
			$recheck_interval = trim(trim(strstr($content_arr[1],'~'),'~'));
			$download_url     = trim(trim(strstr($content_arr[2],'~'),'~'));
			$msg_plugin_mgmt  = trim(trim(strstr($content_arr[3],'~'),'~'));
			$msg_in_plugin    = trim(trim(strstr($content_arr[4],'~'),'~'));
			$upgrade_url      = OFA_SITEURL.'/wp-admin/edit.php?page='.OFA_PATH.'&action=upgrade&dnl='.$download_url;
			$arr = array($latest_version, $recheck_interval, $download_url, $msg_plugin_mgmt, $msg_in_plugin, $upgrade_url);
		}
		return $arr;
	}
		
	/**
	 * Checks the plugin version and displays the message if new version is available
	 */
	function ofaCheckPluginVersion($plugin) {
		$update_arr = array();
		if ( strpos(OFA_PATH,$plugin) !== false ) {	
			// Check for last checked date and access version info data only if recheck interval has reached
			$ofa_version_chk = $this->ofaRecheckData();
			if ( ($ofa_version_chk == '') || strtotime(date('Y-m-d H:i:s')) > (strtotime($ofa_version_chk['last_checked_on']) + $ofa_version_chk['recheck_interval']*60*60) ) {
				$update_arr = $this->ofaExtractUpdateData();
				if ( count($update_arr) > 0 ) {
					$latest_version   = $update_arr[0];
					$recheck_interval = $update_arr[1];
					$download_url     = $update_arr[2];
					$msg_plugin_mgmt  = $update_arr[3];
					$msg_in_plugin    = $update_arr[4];
					$upgrade_url      = $update_arr[5];
					if( OFA_VERSION < $latest_version ) {
						$ofa_version_check = array('recheck_interval' => $recheck_interval, 'last_checked_on' => date('Y-m-d H:i:s'));
						$this->ofaRecheckData($ofa_version_check);
						$msg_plugin_mgmt = str_replace("%latest-version%", $latest_version, $msg_plugin_mgmt);
						$msg_plugin_mgmt = str_replace("%plugin-name%", OFA_NAME, $msg_plugin_mgmt);
						$msg_plugin_mgmt = str_replace("%upgrade-url%", $upgrade_url, $msg_plugin_mgmt);
						echo '<td colspan="5" class="plugin-update" style="line-height:2.5em;">'.$msg_plugin_mgmt.'</td>';
					} else {
						$msg_plugin_mgmt = '';
					}
				}
			}
		}
	}
	
	/**
	 * Displays the plugins options
	 */
	function ofaOptionsPg() {
		$reg_msg = '';
		$ofa_msg = '';
		
		$form_1 = 'ofa_reg_form_1';
		$form_2 = 'ofa_reg_form_2';
		// Activate the plugin if email already on list
		if ( trim($_GET['mbp_onlist']) == 1 ) {
			$this->ofa_activate = 2;
			update_option('ofa_activate', $this->ofa_activate);
			$reg_msg = 'Thank you for registering the plugin. It has been activated'; 
		} 
		// If registration form is successfully submitted
		if ( ((trim($_GET['submit']) != '' && trim($_GET['from']) != '') || trim($_GET['submit_again']) != '') && $this->ofa_activate != 2 ) { 
			update_option('ofa_name', $_GET['name']);
			update_option('ofa_email', $_GET['from']);
			$this->ofa_activate = 1;
			update_option('ofa_activate', $this->ofa_activate);
		}
		if ( intval($this->ofa_activate) == 0 ) { // First step of plugin registration
			global $userdata;
			$this->__ofaRegisterStep1($form_1,$userdata);
		} else if ( intval($this->ofa_activate) == 1 ) { // Second step of plugin registration
			$name  = get_option('ofa_name');
			$email = get_option('ofa_email');
			$this->__ofaRegisterStep2($form_2,$name,$email);
		} else if ( intval($this->ofa_activate) == 2 ) { // Options page
			$ofa_msg = $this->__ofaOptionsPg();
			if ( trim($ofa_msg) != '' || trim($reg_msg) != '' ) {
				if ( trim($reg_msg) != '' ) $ofa_msg = $reg_msg;
				echo '<div id="message" class="updated fade"><p><strong>'.$ofa_msg.'</strong></p></div>';
			}
			echo '<div class="wrap">';
			$this->__ofaShowOptionsPg();
			echo '</div>';
		}
	}
	
	/**
	 * Displays optin form within the post
	 */
	function ofaWithinPost($post_content) {
		global $post, $paged, $posts_per_page;
		$is_single_post = is_single();
		$this->__ofaGetOptions(); 
		if ( $this->form_placement['within_post'] == 1 || $this->form_placement['within_single_post'] == 1 ) {	
			$this->post_number++;
			$post_content_orig = $post_content;
			$curr_pg = intval($paged) > 0 ? ($paged-1) : 0;
			$page_start_no = $curr_pg * $posts_per_page + 1;
			$post_number = $page_start_no + ($this->post_number - 1);
			if ( 
			($this->form_placement['within_single_post'] == 1 && $post_number == 1) || 
			(!$is_single_post && (strpos($this->form_placement['wp_show_in'],','.$post_number.',') !== false || strpos($this->form_placement['wp_show_in'],'all') !== false) )  
			) {
				$post_content = $this->__ofaInsertForm($post_content,$is_single_post);
			}
		}
		return $post_content;
	}
	
	/**
	 * Interface for upgrading plugin
	 */
	function ofaUpgradePlugin() {
		global $wp_version;
		$plugin = OFA_PATH;
		echo '<div class="wrap">';
		$this->__ofaHeader();
		echo '<h3>Upgrade Plugin &raquo;</h3>';
		if ( $wp_version >= 2.5 ) {
			$res = $this->ofaDoPluginUpgrade($plugin);
		} else {
			echo '&raquo; Wordpress 2.5 or higher required for automatic upgrade.<br><br>';
		}
		if ( $res == false ) echo '&raquo; Plugin couldn\'t be upgraded.<br><br>';
		echo '<br><strong><a href="'.OFA_SITEURL.'/wp-admin/plugins.php">Go back to plugins page</a> | <a href="'.OFA_SITEURL.'/wp-admin/edit.php?page='.OFA_PATH.'">'.OFA_NAME.' home page</a></strong>';
		$this->__ofaFooter();
		echo '</div>';
		include('admin-footer.php');
	}
	
	/**
	 * Carries out plugin upgrade
	 */
	function ofaDoPluginUpgrade($plugin) {
		set_time_limit(300);
		global $wp_filesystem;
		$debug = 0;
		$was_activated = is_plugin_active($plugin); // Check current status of the plugin to retain the same after the upgrade

		// Is a filesystem accessor setup?
		if ( ! $wp_filesystem || !is_object($wp_filesystem) ) {
			WP_Filesystem();
		}
		if ( ! is_object($wp_filesystem) ) {
			echo '&raquo; Could not access filesystem.<br /><br />';
			return false;
		}
		if ( $wp_filesystem->errors->get_error_code() ) {
			echo '&raquo; Filesystem error '.$wp_filesystem->errors.'<br /><br />';
			return false;
		}
		
		if ( $debug ) echo '> File System Okay.<br /><br />';
		
		// Get the URL to the zip file
		$package = $_GET['dnl'];
		if ( empty($package) ) {
			echo '&raquo; Upgrade package not available.<br /><br />';
			return false;
		}
		// Download the package
		$file = download_url($package);
		if ( is_wp_error($file) || $file == '' ) {
			echo '&raquo; Download failed. '.$file->get_error_message().'<br /><br />';
			return false;
		}
		$working_dir = OFA_ABSPATH . 'wp-content/upgrade/' . basename($plugin, '.php');
		
		if ( $debug ) echo '> Working Directory = '.$working_dir.'<br /><br />';
		
		// Unzip package to working directory
		$result = $this->ofaUnzipFile($file, $working_dir);
		if ( is_wp_error($result) ) {
			unlink($file);
			$wp_filesystem->delete($working_dir, true);
			echo '&raquo; Couldn\'t unzip package to working directory. Make sure that "/wp-content/upgrade/" folder has write permission (CHMOD 755).<br /><br />';
			return $result;
		}
		
		if ( $debug ) echo '> Unzip package to working directory successful<br /><br />';
		
		// Once extracted, delete the package
		unlink($file);
		if ( is_plugin_active($plugin) ) {
			deactivate_plugins($plugin, true); //Deactivate the plugin silently, Prevent deactivation hooks from running.
		}
		
		// Remove the old version of the plugin
		$plugin_dir = dirname(OFA_ABSPATH . PLUGINDIR . "/$plugin");
		$plugin_dir = trailingslashit($plugin_dir);
		// If plugin is in its own directory, recursively delete the directory.
		if ( strpos($plugin, '/') && $plugin_dir != $base . PLUGINDIR . '/' ) {
			$deleted = $wp_filesystem->delete($plugin_dir, true);
		} else {

			$deleted = $wp_filesystem->delete($base . PLUGINDIR . "/$plugin");
		}
		if ( !$deleted ) {
			$wp_filesystem->delete($working_dir, true);
			echo '&raquo; Could not remove the old plugin. Make sure that "/wp-content/plugins/" folder has write permission (CHMOD 755).<br /><br />';
			return false;
		}
		
		if ( $debug ) echo '> Old version of the plugin removed successfully.<br /><br />';

		// Copy new version of plugin into place
		if ( !$this->ofaCopyDir($working_dir, OFA_ABSPATH . PLUGINDIR) ) {
			echo '&raquo; Installation failed. Make sure that "/wp-content/plugins/" folder has write permission (CHMOD 755)<br /><br />';
			return false;
		}
		//Get a list of the directories in the working directory before we delete it, we need to know the new folder for the plugin
		$filelist = array_keys( $wp_filesystem->dirlist($working_dir) );
		// Remove working directory
		$wp_filesystem->delete($working_dir, true);
		// if there is no files in the working dir
		if( empty($filelist) ) {
			echo '&raquo; Installation failed.<br /><br />';
			return false; 
		}
		$folder = $filelist[0];
		$plugin = get_plugins('/' . $folder);      // Pass it with a leading slash, search out the plugins in the folder, 
		$pluginfiles = array_keys($plugin);        // Assume the requested plugin is the first in the list
		$result = $folder . '/' . $pluginfiles[0]; // without a leading slash as WP requires
		
		if ( $debug ) echo '> Copy new version of plugin into place successfully.<br /><br />';
		
		if ( is_wp_error($result) ) {
			echo '&raquo; '.$result.'<br><br>';
			return false;
		} else {
			//Result is the new plugin file relative to PLUGINDIR
			echo '&raquo; Plugin upgraded successfully<br><br>';	
			if( $result && $was_activated ){
				echo '&raquo; Attempting reactivation of the plugin...<br><br>';	
				echo '<iframe style="display:none" src="' . wp_nonce_url('update.php?action=activate-plugin&plugin=' . $result, 'activate-plugin_' . $result) .'"></iframe>';
				sleep(15);
				echo '&raquo; Plugin reactivated successfully.<br><br>';	
			}
			return true;
		}
	}
	
	/**
	 * Copies directory from given source to destinaktion
	 */
	function ofaCopyDir($from, $to) {
		global $wp_filesystem;
		$dirlist = $wp_filesystem->dirlist($from);
		$from = trailingslashit($from);
		$to = trailingslashit($to);
		foreach ( (array) $dirlist as $filename => $fileinfo ) {
			if ( 'f' == $fileinfo['type'] ) {
				if ( ! $wp_filesystem->copy($from . $filename, $to . $filename, true) ) return false;
				$wp_filesystem->chmod($to . $filename, 0644);
			} elseif ( 'd' == $fileinfo['type'] ) {
				if ( !$wp_filesystem->mkdir($to . $filename, 0755) ) return false;
				if ( !$this->ofaCopyDir($from . $filename, $to . $filename) ) return false;
			}
		}
		return true;
	}
	
	/**
	 * Unzips the file to given directory
	 */
	function ofaUnzipFile($file, $to) {
		global $wp_filesystem;
		if ( ! $wp_filesystem || !is_object($wp_filesystem) )
			return new WP_Error('fs_unavailable', 'Could not access filesystem.');
		$fs =& $wp_filesystem;
		require_once(ABSPATH . 'wp-admin/includes/class-pclzip.php');
		$archive = new PclZip($file);
		// Is the archive valid?
		if ( false == ($archive_files = $archive->extract(PCLZIP_OPT_EXTRACT_AS_STRING)) )
			return new WP_Error('incompatible_archive', 'Incompatible archive', $archive->errorInfo(true));
		if ( 0 == count($archive_files) )
			return new WP_Error('empty_archive', 'Empty archive');
		$to = trailingslashit($to);
		$path = explode('/', $to);
		$tmppath = '';
		for ( $j = 0; $j < count($path) - 1; $j++ ) {
			$tmppath .= $path[$j] . '/';
			if ( ! $fs->is_dir($tmppath) )
				$fs->mkdir($tmppath, 0755);
		}
		foreach ($archive_files as $file) {
			$path = explode('/', $file['filename']);
			$tmppath = '';
			// Loop through each of the items and check that the folder exists.
			for ( $j = 0; $j < count($path) - 1; $j++ ) {
				$tmppath .= $path[$j] . '/';
				if ( ! $fs->is_dir($to . $tmppath) )
					if ( !$fs->mkdir($to . $tmppath, 0755) )
						return new WP_Error('mkdir_failed', 'Could not create directory');
			}
			// We've made sure the folders are there, so let's extract the file now:
			if ( ! $file['folder'] )
				if ( !$fs->put_contents( $to . $file['filename'], $file['content']) )
					return new WP_Error('copy_failed', 'Could not copy file');
				$fs->chmod($to . $file['filename'], 0755);
		}
		return true;
	}

} // Eof Class

$OptinFormAdderPlugin = new OptinFormAdderPlugin();
add_action('plugins_loaded', 'ofaWidgetInit');

/**
 * Template Tag. Displays optin form
 */
function ofa_insert_optin_form($before_widget='', $after_widget='', $before_title='', $after_title='') {
	global $OptinFormAdderPlugin;
	$OptinFormAdderPlugin->__ofaGetOptions('widget');
	$ofa_widget_title = $OptinFormAdderPlugin->form_options_widget['title'];
	echo $before_widget;
	echo $before_title.$ofa_widget_title.$after_title;
	if ( !is_admin() && $OptinFormAdderPlugin->ofa_activate == 2  ) {
		$style_float = '';
		$style_align = 'align="'.$OptinFormAdderPlugin->form_options_widget['alignment'].'"';
		$js_validate_fn = 'ofaValidateFormW';
		$optin_form = $OptinFormAdderPlugin->__ofaTheOptinForm($OptinFormAdderPlugin->form_headline_widget, $OptinFormAdderPlugin->form_body_txt_widget, $OptinFormAdderPlugin->form_footer_txt_widget, $OptinFormAdderPlugin->form_options_widget, $style_float, $style_align, $js_validate_fn);
		echo $optin_form;
	}
	echo $after_widget;
}

/**
 * Optin Form Adder Widget
 */
function ofaWidgetInit() {
	global $OptinFormAdderPlugin;
	// Check if required Widget API functions are defined
	if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') || $OptinFormAdderPlugin->ofa_activate != 2 ) {
		return; 
	}

	function ofaWidgetSidebar($args) {
		global $OptinFormAdderPlugin;
		extract($args);
		ofa_insert_optin_form($before_widget, $after_widget, $before_title, $after_title);
	}
	
	function ofaWidgetController() {
		global $OptinFormAdderPlugin, $wp_version;
		if ( $_POST['ofa_widget'] ) {
			foreach ( (array) $_POST['ofa'] as $key => $val ) {
				if ( $key == 'headline' )        $ofa_headline = $val;
				else if ( $key == 'body_txt' )   $ofa_body_txt = $val;
				else if ( $key == 'footer_txt' ) $ofa_footer_txt = $val;
				else $ofa_options[$key] = $val;
			}
			$ofa_options = serialize($ofa_options);
			$sql_chk = "SELECT option_value FROM $OptinFormAdderPlugin->ofa_options_table WHERE option_name='headline_widget'";
			$rs_chk = mysql_query($sql_chk);
			if ( mysql_num_rows($rs_chk) > 0 ) {
				$sql_1 = "UPDATE $OptinFormAdderPlugin->ofa_options_table SET option_value='$ofa_headline' WHERE option_name='headline_widget'";
				$sql_2 = "UPDATE $OptinFormAdderPlugin->ofa_options_table SET option_value='$ofa_body_txt' WHERE option_name='body_txt_widget'";
				$sql_3 = "UPDATE $OptinFormAdderPlugin->ofa_options_table SET option_value='$ofa_footer_txt' WHERE option_name='footer_txt_widget'";
				$sql_4 = "UPDATE $OptinFormAdderPlugin->ofa_options_table SET option_value='$ofa_options' WHERE option_name='form_options_widget'";
				mysql_query($sql_1); mysql_query($sql_2); mysql_query($sql_3); mysql_query($sql_4);
			} else {
				$sql_1 = "INSERT INTO $OptinFormAdderPlugin->ofa_options_table (option_name, option_value) VALUES ('headline_widget', '$ofa_headline')";
				$sql_2 = "INSERT INTO $OptinFormAdderPlugin->ofa_options_table (option_name, option_value) VALUES ('body_txt_widget', '$ofa_body_txt')";
				$sql_3 = "INSERT INTO $OptinFormAdderPlugin->ofa_options_table (option_name, option_value) VALUES ('footer_txt_widget', '$ofa_footer_txt')";
				$sql_4 = "INSERT INTO $OptinFormAdderPlugin->ofa_options_table (option_name, option_value) VALUES ('form_options_widget', '$ofa_options')";
				mysql_query($sql_1); mysql_query($sql_2); mysql_query($sql_3); mysql_query($sql_4);
			}
		}
		$not_added_yet = is_active_widget('ofaWidgetSidebar','mbp-optin-form-adder');
		// Form Formatting
		$OptinFormAdderPlugin->__ofaGetOptions('widget');
		if ( count($OptinFormAdderPlugin->form_options_widget) <= 0 ) {
			$OptinFormAdderPlugin->__ofaGetOptions();
			$ofa_headline   = $OptinFormAdderPlugin->form_headline;
			$ofa_body_txt   = $OptinFormAdderPlugin->form_body_txt;
			$ofa_footer_txt = $OptinFormAdderPlugin->form_footer_txt;
			$ofa_options    = $OptinFormAdderPlugin->form_options;
			$ofa_width      = 235;
			$ofa_options['alignment'] = 'center';
		} else {
			$ofa_headline   = $OptinFormAdderPlugin->form_headline_widget;
			$ofa_body_txt   = $OptinFormAdderPlugin->form_body_txt_widget;
			$ofa_footer_txt = $OptinFormAdderPlugin->form_footer_txt_widget;
			$ofa_options    = $OptinFormAdderPlugin->form_options_widget;
			$ofa_width      = $ofa_options['width'];
		}
		$ofa_field_bold_chk          = ''; 
		$ofa_field_italic_chk        = ''; 
		$ofa_field_underline_chk     = ''; 
		$ofa_submit_button_txt       = $ofa_options['submit_button_txt'];
		$ofa_submit_btn_bg_color     = $ofa_options['submit_btn_bg_color'];
		$ofa_submit_btn_border_color = $ofa_options['submit_btn_border_color'];
		$ofa_submit_btn_txt_color    = $ofa_options['submit_btn_txt_color'];
		$ofa_bg_color                = $ofa_options['bg_color'];
		$ofa_border_color            = $ofa_options['border_color'];
		$ofa_border_thickness        = $ofa_options['border_thickness'];
		$ofa_name_field_txt          = $ofa_options['name_field_txt'];
		$ofa_email_field_txt         = $ofa_options['email_field_txt'];
		$ofa_field_font_family       = $ofa_options['field_font_family'];
		$ofa_field_font_size         = $ofa_options['field_font_size'];
		$ofa_field_txt_color         = $ofa_options['field_txt_color'];
		$ofa_txt_box_width           = $ofa_options['txt_box_width'];
		$ofa_txt_box_bg_color        = $ofa_options['txt_box_bg_color'];
		$ofa_txt_box_border_color    = $ofa_options['txt_box_border_color'];
		$ofa_title                   = $ofa_options['title']; 
		$ofa_alignment               = $ofa_options['alignment'];
		$ofa_field_txt_style         = 'style=color:'.$ofa_field_txt_color.';font-family:'.$ofa_field_font_family;
		if ( intval($ofa_field_font_size) > 0 ) $ofa_field_txt_style .= ';font-size:'.$ofa_field_font_size.'px';
		if ( $ofa_options['field_bold'] == 1 ) {
			$ofa_field_bold_chk = 'checked'; 
			$ofa_field_txt_style .= ';font-weight:bold';
		}
		if ( $ofa_options['field_italic'] == 1 ) {
		   $ofa_field_italic_chk = 'checked'; 
		   $ofa_field_txt_style .= ';font-style:italic';
		}
		if ( $ofa_options['field_underline'] == 1 ) {
			$ofa_field_underline_chk = 'checked'; 
			$ofa_field_txt_style .= ';text-decoration:underline';
		}
		if ( $ofa_alignment == 'left' ) $ofa_alignment_left = 'selected';
		else if ( $ofa_alignment == 'right' ) $ofa_alignment_right  = 'selected';
		else $ofa_alignment_center = 'selected';
		$ofa_pre_headline = $ofa_headline;
		$ofa_pre_body_txt = $ofa_body_txt;
		$ofa_pre_footer_txt = $ofa_footer_txt;
		if ( substr(trim($ofa_headline),0,3) == '<p>' ) $ofa_pre_headline = substr($ofa_headline,3);
		if ( substr(trim($ofa_body_txt),0,3) == '<p>' ) $ofa_pre_body_txt = substr($ofa_body_txt,3);
		if ( substr(trim($ofa_footer_txt),0,3) == '<p>' ) $ofa_pre_footer_txt = substr($ofa_footer_txt,3);
		?>
		<div><?php require('optin-form-adder-lib/include/form-format-widget.php');?></div>
	<?php
	}
	if ( function_exists('wp_register_sidebar_widget') ) { // fix for wordpress 2.2
		wp_register_sidebar_widget(sanitize_title('MBP Optin Form Adder'), 'MBP Optin Form Adder', 'ofaWidgetSidebar');
	} else {
		register_sidebar_widget('MBP Optin Form Adder', 'ofaWidgetSidebar');
	}
	register_widget_control('MBP Optin Form Adder', 'ofaWidgetController', '', '500px');
}
?>