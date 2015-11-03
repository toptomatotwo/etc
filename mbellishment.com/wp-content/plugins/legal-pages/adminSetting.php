<?php 
require_once( 'legalPages.php' );

$lpObj = new legalPages();
//$lpObj->lp_enqueue_editor();
$baseurl = $_SERVER["PHP_SELF"];
if($_POST['lp_submit']=='Accept'){
	update_option('lp_accept_terms',$_POST['lp_accept_terms']);
}
?>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#ffbox').click(function() {
 jQuery('#fancyboxOptions').fadeToggle('slow', function() {
    // Animation complete.
  });
});
jQuery('#gsbox').click(function() {
 jQuery('#wpgattack_generalid').fadeToggle('slow', function() {
    // Animation complete.
  });
});
});
</script>

<div style="width:1000px;float:left;">
	<h1>WP Legal Pages</h1>
	<p>Wp Legal Pages is a simple 1 click legal page management plugin. You can quickly add in legal pages to your wordpress sites, manage templates, edit templates, create disclosure snippets, create pages all driven off custom short codes. Furthermore the business information you fill in the general settings will be automatically filled into the appropriate places within the pages due to our custom integration system we have. The icing on the cake is the hosting of unlimited popups that force the visitor to agree to your terms before the page unlocks.</p>
    <p> This plugin is truly unique and according to our buyers 'Truly Awesome'!</p>
    <p><a href="http://wplegalpages.com">Plugin Site</a> | * <a href="http://123productsupport.com">Support</a></p>
</div>

	<div style="clear:both;"></div>
<?php 
wp_enqueue_script('jquery');
$lpterms = get_option('lp_accept_terms');
if($lpterms==1){?>
<div class="wrap">
<?php
if(!empty($_POST) && $_POST['lp-greset']=='Reset') : 
$lp_general = array(
				'domain' => '',
				'business' => '',
				'phone' => '',
				'street' => '',
				'cityState' => '',
				'country' => '',
				'email' => '',
				'address' => '',
				'niche' => '',
				'pagefooter' => '',
				);
update_option('lp_general',$lp_general);
?>
	<div id="message" class="updated">
    	<p>Settings Reset.</p>
    </div>
<?php
	  endif;
	  if(!empty($_POST) && $_POST['lp-gsubmit']=='Save') : 
	  
$lp_general = array(
				'domain' => $_POST['lp-domain-name'],
				'business' => $_POST['lp-business-name'],
				'phone' => $_POST['lp-phone'],
				'street' => $_POST['lp-street'],
				'cityState' => $_POST['lp-city-state'],
				'country' => $_POST['lp-country'],
				'email' => $_POST['lp-email'],
				'address' => $_POST['lp-address'],
				'niche' => $_POST['lp-niche'],
				'pagefooter' => $_POST['lp-pagefooter']
				);
update_option('lp_general',$lp_general);
?>
	<div id="message" class="updated">
    	<p>Settings saved.</p>
    </div>
<?php
	  endif;
	  
	  $checked = 'checked="checked"'; $selected = 'selected="selected"';
	  $lp_general = get_option('lp_general');
?>
<style type="text/css">
#lp_generalid{
padding:5px 20px 20px 20px;
}
#lp_generalid td{
padding:5px;
height:20px;
font-size: 14px;
}
#lp_generalid input[type=text]{
	width:300px;
	height:30px;
	font-size:14px;
	color:#666;
}
#lp_generalid p{
font-size:16px;
}
#lp_generalid p a{
text-decoration:none;
}
</style>

<div class="postbox ">
<div id="gsbox" class="handlediv" title="Click to toggle" style="float: right;width: 27px;height: 30px;cursor: pointer;background:transparent url(<?php echo $wpgattack->plugin_image_url;?>arrows.png) no-repeat 6px 7px;"><br></div>
	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> General Settings </h3>
    <div id="lp_generalid">
    <form name="glegal" method="post" action="" enctype="">
    	<table cellpadding="0" cellspacing="0" border="0">
        	<tr>
            	<td></td><td></td><td><b>Shortcodes</b></td>
            </tr>
        	<tr>
            	<td><b>Domain Name:</b></td><td><input type="text" name="lp-domain-name" value="<?php echo !empty($lp_general['domain'])?$lp_general['domain']:get_bloginfo('url');?>" /></td><td>[Domain]</td>
            </tr>
            <tr>
            	<td><b>Business Name:</b></td><td><input type="text" name="lp-business-name" value="<?php echo $lp_general['business'];?>" /></td><td>[Business Name]</td>
            </tr>
            <tr>
            	<td><b>Phone:</b></td><td><input type="text" name="lp-phone" value="<?php echo $lp_general['phone'];?>" /></td><td>[Phone]</td>
            </tr>
            <tr>
            	<td><b>Street:</b></td><td><input type="text" name="lp-street" value="<?php echo $lp_general['street'];?>" /></td><td>[Street]</td>
            </tr>
            <tr>
            	<td><b>City, State, Zip code:</b></td><td><input type="text" name="lp-city-state" value="<?php echo $lp_general['cityState'];?>" /></td><td>[City, State, Zip code]</td>
            </tr>
            <tr>
            	<td><b>Country:</b></td><td><input type="text" name="lp-country" value="<?php echo $lp_general['country'];?>" /></td><td>[Country]</td>
            </tr>
            <tr>
            	<td><b>Email:</b></td><td><input type="text" name="lp-email" value="<?php echo !empty($lp_general['email'])?$lp_general['email']:get_option('admin_email');?>" /></td><td>[Email]</td>
            </tr>
            <tr>
            	<td><b>Address:</b></td><td><input type="text" name="lp-address" value="<?php echo $lp_general['address'];?>" /></td><td>[Address]</td>
            </tr>
            <tr>
            	<td><b>Niche:</b></td><td><input type="text" name="lp-niche" value="<?php echo $lp_general['niche'];?>" /></td><td>[Niche]</td>
            </tr>
             <tr>
            	<td colspan="3"><br/><br/>
               <strong> Note: </strong>Use Exclude option in Page Edit option to exclude pages from navigations. To Display excluded pages anywhere, place id separated by comma below and place this code 
                </td>
            </tr>
            <tr>
            	<td>
               
                <b>Add Page id(separated by comma):</b></td><td><input type="text" name="lp-pagefooter" value="<?php echo $lp_general['pagefooter'];?>" /></td><td>Use this function to display these pages.&nbsp;&nbsp;<textarea cols="33" rows="1">&lt;?php legalPages::footerPages();?&gt;</textarea> </td>
            </tr>
        </table>
      
        
        <p> <input type="submit" name="lp-gsubmit" value="Save" /><input type="submit" name="lp-greset" value="Reset" /></p>
        </form>
    </div>
</div>


	<a href="<?php echo $baseurl;?>?page=lp-create"><h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;">Click Here to Create Legal Pages &raquo;</h3></a>
<?php }else{
	?>
    <h2>DISCLAIMER</h2>
   <form action="" method="post">
   <textarea rows="20" cols="130">WPLegalPages.com ("Site") and the documents or pages that it may provide, are provided on the condition that you accept these terms, and any other terms or disclaimers that we may provide.  You may not use or post any of the templates or legal documents until and unless you agreed.  We are not licensed attorneys and do not purport to be. 

WPLegalPages.com is not a law firm, is not comprised of a law firm, and its employees are not lawyers.  We do not review your site and we will not review your site. We do not purport to act as your attorney and do not make any claims that would constitute legal advice. We do not practice law in any state, nor are any of the documents provided via our Site intended to be in lieu of receiving legal advice.  The information we may provide is general in nature, and may be different in your jurisdiction.  In other words, do not take these documents to be "bulletproof" or to give you protection from lawsuits.  They are not a substitute for legal advice and you should have an attorney review them.  

Accordingly, we disclaim any and all liability and make no warranties, including disclaimer of warranty for implied purpose, merchantability, or fitness for a particular purpose.  We provide these documents on an as is basis, and offer no express or implied warranties.  The use of our plugin and its related documents is not intended to create any representation or approval of the legality of your site and you may not represent it as such.  We will have no responsibility or liability for any claim of loss, injury, or damages related to your use or reliance on these documents, or any third parties use or reliance on these documents.  They are to be used at your own risk.  Your only remedy for any loss or dissatisfaction with WPLegalPages is to discontinue your use of the service and remove any documents you may have downloaded.  

To the degree that we have had a licensed attorney review these documents it is for our own internal purposes and you may not rely on this as legal advice.  Since the law is different in every state, you should have these documents reviewed by an attorney in your jurisdiction.  As stated below, we disclaim any and all liability and warranties, including damages or loss that may result from your use or misuse of the documents.  Unless prohibited or limited by law, our damages in any matter are limited to the amount you paid for the WPLegalPages plugin.  Any disputes must be brought in the State of Florida and subject to a one-year statute of limitations from when the cause of action occurred.  The prevailing party in any action or dispute is entitled to attorneys' fees and costs.</textarea><br/><br/>
    Please Tick this checkbox to accept our Terms and Policy <input type="checkbox" name="lp_accept_terms" value="1" <?php if($lpterms==1)echo "checked";?>  onclick="jQuery('#lp_submit').toggle();"/>
    <br/><br/><input type="submit" name="lp_submit" id="lp_submit" style="display:none;" value="Accept" />
    </form>
<?php 
}/*<div class="postbox ">
<div id="gsbox" class="handlediv" title="Click to toggle" style="float: right;width: 27px;height: 30px;cursor: pointer;background:transparent url(<?php echo $wpgattack->plugin_image_url;?>arrows.png) no-repeat 6px 7px;"><br></div>
	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> Available Templates</h3>
    <div id="lp_generalid">
        <p> <a href="<?php echo $baseurl;?>?page=lp-terms">Terms &raquo;</a></p>
        <p> <a href="<?php echo $baseurl;?>?page=lp-disclaimer">Disclaimer &raquo;</a></p>
        <p> <a href="<?php echo $baseurl;?>?page=lp-privacy-policy">Privacy Policy &raquo;</a></p>
        <p> <a href="<?php echo $baseurl;?>?page=lp-earnings-disclaimer">Earnings-Disclaimer &raquo;</a></p>
    </div>
</div> */?>


