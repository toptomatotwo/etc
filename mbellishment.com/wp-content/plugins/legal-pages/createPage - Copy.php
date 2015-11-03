<?php 
global $wpdb;
require_once( 'legalPages.php' );
$lpObj = new legalPages();
$lpObj->lp_enqueue_editor();
$baseurl = $_SERVER["PHP_SELF"];
$lptype = isset($_REQUEST['lp-type'])?$_REQUEST['lp-type']:'';
$terms = file_get_contents(dirname(__FILE__) . '/Terms.txt');
$privacy = file_get_contents(dirname(__FILE__) . '/privacy.txt');
$earnings = file_get_contents(dirname(__FILE__) . '/earnings.txt');
$disclaimer = file_get_contents(dirname(__FILE__) . '/disclaimer.txt');
?>
<script type="text/javascript">
jQuery(document).ready(function(){
	<?php 
	if(isset($_REQUEST['lp-type']))
	$result = $wpdb->get_results("select * from $lpObj->tablename where contentfor like '%".$_REQUEST['lp-type']."%'");
	else
	$result = $wpdb->get_results("select * from $lpObj->tablename");
	foreach($result as $res){
		?>
	jQuery('#legalpages<?php echo $res->id;?>').click(function(){
		jQuery('#content').val('<?php echo addslashes(stripslashes(stripslashes(nl2br($res->content))));?>');
		jQuery("#content_ifr").contents().find("body").html('<?php echo addslashes(stripslashes(stripslashes(nl2br($res->content))));?>');
		jQuery('#lp-title').val('<?php echo $res->title;?>');		
	});
	<?php }?>	
});
</script>
<div style="width:1000px;float:left;">
	<h1>WP Legal Pages</h1>
	<p>WP Legal Pages Plugin is an easiest way of creating Legal Pages for your Website.</p><br/>
</div>

	<div style="clear:both;"></div>

<div class="wrap">
<?php
if(!empty($_POST) && $_POST['lp-submit']=='Publish') :
$title = $_POST['lp-title'];
$content = $_POST['lp-content'];
$post_args = array(
					'post_title' => apply_filters( 'the_title', $title ),
					'post_content' => $content,
					'post_type' => 'page',
					'post_status' => 'publish',
					'post_author' => 1
				);
$pid = wp_insert_post( $post_args );
$url = get_permalink($pid);
 ?>
	<div id="message" class="updated">
    	<p>Page Successfully Created. You can view your page as a normal Page in Pages Menu. </p>
        <p><a href="<?php echo get_admin_url(); ?>/post.php?post=<?php echo $pid;?>&action=edit">Edit</a> | <a href="<?php echo $url; ?>">View</a></p>
    </div>
<?php
	  endif;
	 
	  $general = get_option('wpgattack_general');
	  $checked = 'checked="checked"'; $selected = 'selected="selected"';
?>
<style type="text/css">
.clear{
	clear:both;
}
#lp_generalid{
padding:5px 20px 20px 20px;
width:800px;
float:left;
}
#lp_generalid_right{
	float:left;
	width:280px;
	margin-left:20px;
	margin-top:20px;
	border-radius:5px;
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	padding-bottom:10px;
}

#lp_generalid p{
font-size:16px;
}
#lp_generalid input[type=text]{
	width:800px;
	height:30px; 
	color:#666; 
	font-size:20px; 
	padding:3px 4px;
}
#lp_generalid input[type=submit]{
	width:100px;
	height:30px; 
	color:#000;
	cursor:pointer; 
	font-size:20px; 
	padding:3px 4px;
}
#lp_generalid_right li{
	list-style:square;
	line-height:20px;
	list-style-position:inside;
	padding-left:10px;
}
#lp_generalid_right li span{
	font-size:16px;
	cursor:pointer;
}	
#lp_generalid p a{
text-decoration:none;
}
#content p{
	width:800px;
}

</style>

<div class="postbox ">


	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> Create Page:</h3>
    <div id="lp_generalid">
    <form>
    
     <p>
       <label>Type of Site: </label> <select name="lp-type" onchange="window.location='<?php echo $_SERVER['PHP_SELF'];?>?page=<?php echo $_REQUEST['page'];?>&lp-type='+this.value">
        <option value="">All</option>
            <option value="1" <?php if($lptype==1) echo $selected;?>>Business Website</option>
            <option value="2" <?php if($lptype==2) echo $selected;?>>Business Website With Products</option>
            <option value="3" <?php if($lptype==3) echo $selected;?>>Business Website With Products & Affiliate Program</option>
            <option value="4" <?php if($lptype==4) echo $selected;?>>Affiliate/Review Site</option>
            <option value="5" <?php if($lptype==5) echo $selected;?>>Niche Sites</option>
            <option value="6" <?php if($lptype==6) echo $selected;?>>Medical Niche Site</option>
            <option value="7" <?php if($lptype==7) echo $selected;?>>Amazon Site</option>
            <option value="8" <?php if($lptype==8) echo $selected;?>>Adsense Site</option>
            <option value="9" <?php if($lptype==9) echo $selected;?>>Ecommerce Site</option>
        </select></p>
    </form>
    <p>&nbsp;&nbsp;</p>
        <form name="terms" method="post" enctype="multipart/form-data">
       
        	<p><input type="text" name="lp-title" id="lp-title" value="Terms of Use" /></p>
            <p>
            <div id="poststuff">
                <div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" >
                	<?php the_editor(stripslashes(html_entity_decode($terms))); ?>
                </div>
                    <script type="text/javascript">
                    
                    function sp_content_save(){
                        var obj = document.getElementById('lp-content');
                        var content = document.getElementById('content');
                        tinyMCE.triggerSave(0,1);
                        obj.value = content.value;
                    }
                        
                    </script>
                    <textarea id="lp-content" name="lp-content" value="5" style="display:none" rows="10"></textarea>
            </div></p>
            <p>
            <input type="submit" onclick="sp_content_save();" name="lp-submit" value="Publish" />
            </p>
        
        </form>
    </div>
    <div id="lp_generalid_right" class="postbox ">
    	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> Choose Template </h3><br/>
        <ul>
        <?php foreach($result as $ras){
			?>
            <li><span id="legalpages<?php echo $ras->id;?>"><?php echo $ras->title;?> &raquo;</span></li>
            <?php }?>
            
        </ul>
    </div>
    <div class="clear"></div>
</div>