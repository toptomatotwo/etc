<?php
if ( !class_exists('legalPages') ) :
	class legalPages
	{		
		var $plugin_url;
		var $plugin_image_url;
		var $tablename;
		var $popuptable;
			
		function legalPages()
		{	global $table_prefix;
		
			$this->plugin_url = trailingslashit( WP_PLUGIN_URL.'/'.dirname( plugin_basename(__FILE__) ));
			$this->plugin_image_url = trailingslashit( WP_PLUGIN_URL.'/'.dirname( plugin_basename(__FILE__) )).'images/';
			$this->tablename = $table_prefix . "legal_pages";
			$this->popuptable = $table_prefix . "lp_popups";
			//add_action('wp_print_scripts', array($this,'scripts_action'));
			add_action('admin_menu', array($this, 'admin_menu'));
			//add_action('admin_head', array($this, 'wpgattack_enqueue_editor'));		
			add_shortcode('wp-legalpage', array($this, 'shortCode'));
			add_shortcode('wp-legalpopup', array($this, 'popupshortCode'));
			add_filter('the_content', array($this,'lpShortcode'));
			add_filter('the_excerpt', array($this,'lpShortcode'));
			add_action('wp_head', array($this,'lp_css'));

			
			//add_action('add_meta_boxes', array($this, 'lp_add_custom_box'));
			//add_action('save_post', array($this, 'lp_save_postdata'));
			
			add_action('wp_dashboard_setup', array($this, 'lp_dashboard_setup'));
		}
		
		function lp_dashboard() 
		{
			echo '<span style="line-height:18px;">WP Legal Pages plugin is the easiest method to create legal pages for your website.</span>';
		}
		
		function lp_dashboard_setup() 
		{
			wp_add_dashboard_widget( 'lp_dashboard_widget','Legal Pages', array($this, 'lp_dashboard'));
		}
		
		function install()
		{
			global $wpdb;
			
			$terms_forced = file_get_contents(dirname(__FILE__) . '/Terms-latest.txt');
			$terms = file_get_contents(dirname(__FILE__) . '/Terms.txt');
			$privacy = file_get_contents(dirname(__FILE__) . '/privacy.txt');
			$earnings = '<div style="text-align: center; font-weight: bold;">Earnings Disclaimer<br></div><br><br>EVERY EFFORT HAS BEEN MADE TO ACCURATELY REPRESENT THIS PRODUCT AND IT\'S POTENTIAL. EVEN THOUGH THIS INDUSTRY IS ONE OF THE FEW WHERE ONE CAN WRITE THEIR OWN CHECK IN TERMS OF EARNINGS, THERE IS NO GUARANTEE THAT YOU WILL EARN ANY MONEY USING THE TECHNIQUES AND IDEAS IN THESE MATERIALS. EXAMPLES IN THESE MATERIALS ARE NOT TO BE INTERPRETED AS A PROMISE OR GUARANTEE OF EARNINGS. EARNING POTENTIAL IS ENTIRELY DEPENDENT ON THE PERSON USING OUR PRODUCT, IDEAS AND TECHNIQUES. WE DO NOT PURPORT THIS AS A "GET RICH SCHEME."<br> <br> ANY CLAIMS MADE OF ACTUAL EARNINGS OR EXAMPLES OF ACTUAL RESULTS CAN BE VERIFIED UPON REQUEST. YOUR LEVEL OF SUCCESS IN ATTAINING THE RESULTS CLAIMED IN OUR MATERIALS DEPENDS ON THE TIME YOU DEVOTE TO THE PROGRAM, IDEAS AND TECHNIQUES MENTIONED, YOUR FINANCES, KNOWLEDGE AND VARIOUS SKILLS. SINCE THESE FACTORS DIFFER ACCORDING TO INDIVIDUALS, WE CANNOT GUARANTEE YOUR SUCCESS OR INCOME LEVEL. NOR ARE WE RESPONSIBLE FOR ANY OF YOUR ACTIONS.<br> <br> MATERIALS IN OUR PRODUCT AND OUR WEBSITE MAY CONTAIN INFORMATION THAT INCLUDES OR IS BASED UPON FORWARD-LOOKING STATEMENTS WITHIN THE MEANING OF THE SECURITIES LITIGATION REFORM ACT OF 1995. FORWARD-LOOKING STATEMENTS GIVE OUR EXPECTATIONS OR FORECASTS OF FUTURE EVENTS. YOU CAN IDENTIFY THESE STATEMENTS BY THE FACT THAT THEY DO NOT RELATE STRICTLY TO HISTORICAL OR CURRENT FACTS. THEY USE WORDS SUCH AS "ANTICIPATE," "ESTIMATE," "EXPECT," "PROJECT," "INTEND," "PLAN," "BELIEVE," AND OTHER WORDS AND TERMS OF SIMILAR MEANING IN CONNECTION WITH A DESCRIPTION OF POTENTIAL EARNINGS OR FINANCIAL PERFORMANCE.<br> <br> ANY AND ALL FORWARD LOOKING STATEMENTS HERE OR ON ANY OF OUR SALES MATERIAL ARE INTENDED TO EXPRESS OUR OPINION OF EARNINGS POTENTIAL. MANY FACTORS WILL BE IMPORTANT IN DETERMINING YOUR ACTUAL RESULTS AND NO GUARANTEES ARE MADE THAT YOU WILL ACHIEVE RESULTS SIMILAR TO OURS OR ANYBODY ELSES, IN FACT NO GUARANTEES ARE MADE THAT YOU WILL ACHIEVE ANY RESULTS FROM OUR IDEAS AND TECHNIQUES IN OUR MATERIAL.<br>  <br> The author and publisher disclaim any warranties (express or implied), merchantability, or fitness for any particular purpose. The author and publisher shall in no event be held liable to any party for any direct, indirect, punitive, special, incidental or other consequential damages arising directly or indirectly from any use of this material, which is provided "as is", and without warranties.<br> <br> As always, the advice of a competent legal, tax, accounting or other  professional should be sought.<br> <br> [Domain] does not warrant the performance, effectiveness or applicability of any sites listed or linked to on [Domain]<br> <br> All links are for information purposes only and are not warranted for content, accuracy or any other implied or explicit purpose.<br> <br>';
		
			$disclaimer = file_get_contents(dirname(__FILE__) . '/disclaimer.txt');
			$testimonials = file_get_contents(dirname(__FILE__) . '/testimonial-disclosure.txt');
			$linking = file_get_contents(dirname(__FILE__) . '/linking-policy.txt');
			$refund = file_get_contents(dirname(__FILE__) . '/refund-policy.txt');
			$affiliate = file_get_contents(dirname(__FILE__) . '/affiliate-agreement.txt');
			$disclosure = file_get_contents(dirname(__FILE__) . '/affiliate-disclosure.txt');
			$antispam = file_get_contents(dirname(__FILE__) . '/antispam.txt');
			$ftc = file_get_contents(dirname(__FILE__) . '/ftcstatement.txt');
			$medical = file_get_contents(dirname(__FILE__) . '/medical-disclaimer.txt');
			$amazon = file_get_contents(dirname(__FILE__) . '/amazon-affiliate.txt');
			$dart = file_get_contents(dirname(__FILE__) . '/double-dart-cookie.txt');
			$external = file_get_contents(dirname(__FILE__) . '/external-links.txt');
			
			

			add_option('lp_excludePage','true','','yes');
			add_option('lp_general', '','','yes');
			add_option('lp_accept_terms','0','','yes');
			$sql = "CREATE TABLE IF NOT EXISTS `$this->tablename` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `title` text NOT NULL,
					  `content` longtext NOT NULL,
					  `contentfor` varchar(200) NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM;";
			$sqlpopup = "CREATE TABLE IF NOT EXISTS `$this->popuptable` (
					  `id` int(11) NOT NULL AUTO_INCREMENT,
					  `popupName` text NOT NULL,
					  `content` longtext NOT NULL,
					  PRIMARY KEY (`id`)
					) ENGINE=MyISAM;";
			$wpdb->query($sql);
			$wpdb->query($sqlpopup);
			$wpdb->insert($this->tablename,array('title'=>'Terms(forced agreement)','content'=>$terms,'contentfor'=>'1a2b3c4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Terms of Use','content'=>$terms_forced,'contentfor'=>'1a2b3c4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Privacy Policy','content'=>$privacy,'contentfor'=>'1a2b3c4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Earnings Disclaimer','content'=>$earnings,'contentfor'=>'4d5e6f7g8h'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Disclaimer','content'=>$disclaimer,'contentfor'=>'1a2b3c4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Testimonials Disclosure','content'=>$testimonials,'contentfor'=>'1a2b3c4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Linking Policy','content'=>$linking,'contentfor'=>'1a2b3c9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Refund-Policy','content'=>$refund,'contentfor'=>'2b3c9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Affiliate Agreement','content'=>$affiliate,'contentfor'=>'3c'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Antispam','content'=>$antispam,'contentfor'=>'3c'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'FTC Statement','content'=>$ftc,'contentfor'=>'4d5e7g'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Medical Disclaimer','content'=>$medical,'contentfor'=>'6f'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Amazon Affiliate','content'=>$amazon,'contentfor'=>'7g'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Double Dart Cookie','content'=>$dart,'contentfor'=>'8h'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'External Links Policy','content'=>$external,'contentfor'=>'4d5e6f7g8h9i'),array('%s','%s','%s'));
			$wpdb->insert($this->tablename,array('title'=>'Affiliate Disclosure','content'=>$disclosure,'contentfor'=>'4d'),array('%s','%s','%s'));
			
		}
		
		function admin_menu()
		{
			add_menu_page('Legal Pages', 'Legal Pages', 'manage_options', 'legal-pages', array($this, 'adminSetting'));
			$terms = get_option('lp_accept_terms');
			if($terms == 1){
			add_submenu_page('legal-pages', 'Create Page', 'Create Page', 'manage_options', 'lp-create', array($this, 'createPage'));
			//add_submenu_page('legal-pages', 'Create Page1', 'Create Page1', 'manage_options', 'lp-create1', array($this, 'createPage1'));
			add_submenu_page('legal-pages', 'Create/Edit Templates', 'Create/Edit Templates', 'manage_options', 'lp-templates', array($this, 'createTemplates'));
			add_submenu_page('legal-pages', 'Create Popups', 'Create Popups', 'manage_options', 'lp-popups', array($this, 'createPopups'));
			}
			/*add_submenu_page( 'legal-pages', 'Privacy Policy', 'Privacy Policy', 'manage_options', 'lp-privacy-policy', array($this, 'adminPrivacy'));			
			add_submenu_page('legal-pages', 'Earnings Disclaimer', 'Earnings Disclaimer', 'manage_options', 'lp-earnings-disclaimer', array($this, 'adminEarnings'));
			add_submenu_page( 'legal-pages', 'Disclaimer', 'Disclaimer', 'manage_options', 'lp-disclaimer', array($this, 'adminDisclaimer'));*/
		}
		
		function createPage()
		{
			include_once('createPage.php');
		}
		function createPage1()
		{
			include_once('createPage1.php');
		}
		function createTemplates()
		{
			include_once('createTemplates.php');
		}
		function createPopups()
		{
			include_once('createPopups.php');
		}
		function adminSetting()
		{
			include_once("adminSetting.php");
		}
		
		function adminTerms()
		{
			include_once("adminTerms.php");
		}
		
		function adminPrivacy()
		{
			include_once("adminPrivacy.php");
		}
		
		function adminDisclaimer()
		{
			include_once("adminDisclaimer.php");
		}
				
		function deactivate()
		{
			global $wpdb;
			
			delete_option('lp_excludePage');
			delete_option('lp_accept_terms');
			
			remove_meta_box( 'lp_dashboard_widget', 'dashboard', 'side' );
			remove_meta_box( 'lp_dashboard_widget', 'dashboard', 'normal' );
			$wpdb->query("Drop table $this->tablename");
			$wpdb->query("Drop table $this->popuptable");
		}
		
		function lpShortcode($content)
		{
			$lp_find = array("[Domain]","[Business Name]","[Phone]","[Street]","[City, State, Zip code]","[Country]","[Email]","[Address]","[Niche]");
			$lp_general = get_option('lp_general');
			$cont = str_replace($lp_find,$lp_general,stripslashes($content));
			return $cont;
		}
		
		function lp_enqueue_editor() 
		{
			wp_enqueue_script('common');
			wp_enqueue_script('jquery-affect');
			wp_admin_css('thickbox');
			wp_print_scripts('post');
			wp_print_scripts('media-upload');
			wp_print_scripts('jquery');
			wp_print_scripts('jquery-ui-core');
			wp_print_scripts('jquery-ui-tabs');
			wp_print_scripts('tiny_mce');
			wp_print_scripts('editor');
			wp_print_scripts('editor-functions');
		
			/* Include the link dialog functions */
			//include ABSPATH . 'wp-admin/includes/internal-linking.php';
			wp_print_scripts('wplink');
			wp_print_styles('wplink');
			add_action('tiny_mce_preload_dialogs', 'wp_link_dialog');
		
			add_thickbox();
			wp_tiny_mce();
			wp_admin_css();
			wp_enqueue_script('utils');
			do_action("admin_print_styles-post-php");
			do_action('admin_print_styles');
			//remove_all_filters('mce_external_plugins');
		}
		
		function shortCode($atts)
		{global $wpdb;
			global $post;
			global $wp_query;			
			
			extract( shortcode_atts( array(
					'tid' => 1
					), $atts ) );		
			
				$res = $wpdb->get_row("select * from $this->tablename where id='$tid'");
				$content = $this->lpShortcode($res->content);
				//$content = "select * from $this->tablename where id='$tid'";
			
			
			if(is_single() || is_page())
			{
				return $content;
			}
		}
		
		function popupshortCode($atts)
		{
			global $wpdb;
			global $post;
			global $wp_query;			
			
			extract( shortcode_atts( array(
					'pid' => 1
					), $atts ) );		
			
				$res = $wpdb->get_row("select * from $this->popuptable where id='$pid'");
			
			//if($wpgattack_addscript == 'true')
			//{
				echo "<script type='text/javascript' src='".$this->plugin_url."fancybox/jquery.fancybox-1.3.1.pack.js?ver=1.3.1'></script>";
				echo '<link rel="stylesheet" href="'.$this->plugin_url.'fancybox/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />';
				?>
                
                <script type="text/javascript">
				jQuery(document).ready(function(){
								
				 jQuery('a#wpepoll_link').fancybox(
				{
					'padding' : 0,
					'margin'  : 0,
					'hideOnOverlayClick': false,
					'showCloseButton' : false,
					'enableEscapeButton' : false
					
				});
				jQuery('a#wpepoll_link').trigger('click');
			});
			jQuery('a#wpepoll_link').trigger('click');
			</script>
		<?php 
		$terms = apply_filters('the_content',$res->content);
		$terms = $this->lpShortcode($terms);
		
		$content = '<a id="wpepoll_link" href="#wpepollid" style="display: none;position:relative;">WP EPoll</a>			
				<div style="display: none;">
					<div id="wpepollid" style="padding:20px 60px;width:1000px; overflow-x:hidden;">
						'.$terms.'
						<p>&nbsp;</p>
						<p><input type="checkbox" name="lp_accept" id="lp_accept" value="1" onclick="jQuery(\'.accept\').toggle();" /> I agree to the terms and conditions.
						<input type="submit" name="lp_submit" id="lp_submit" value="Accept" onclick="jQuery.fancybox.close();" class="accept"/></p>
						<br/>
						<br/>
					</div>
                </div>';
			 //}
			if(is_single() || is_page())
			{
				return $content;
			}
		}
		
		function footerPages(){
			$general = get_option('lp_general');
					
			remove_filter('get_pages','lp_exclude_pages');
			echo "<ul class='legalfooter'>";
			wp_list_pages("title_li=&include=$general[pagefooter]");
			echo "</ul>";
			add_filter('get_pages','lp_exclude_pages');
		}
		
		function lp_css(){
			?>
            <style type="text/css">
				ul.legalfooter li{
					list-style:none;
					float:left;
					padding-right:20px;
				}
				.accept{
					display:none;
					border: 1px solid #000;
					background:#000;
					color:#fff;
					border-radius:3px;
					-moz-border-radius:3px;
					-webkit-border-radius:3px;
					padding:5px;
				} 
			</style>
            <?php 
		}
		
		
	}
else :
	exit ("Class legalPages already declared!");
endif;
?>