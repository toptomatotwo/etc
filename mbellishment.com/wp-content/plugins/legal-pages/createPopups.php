<?php 
require_once( 'legalPages.php' );
global $wpdb;
$lpObj = new legalPages();
$lpObj->lp_enqueue_editor();
$mode = isset($_REQUEST['mode'])?$_REQUEST['mode']:'';
$page = isset($_REQUEST['page'])?$_REQUEST['page']:'';
$baseurl = $_SERVER["PHP_SELF"];

?>

<div style="width:1000px;float:left;">
	<h1>WP Legal Pages</h1>
	
</div>

	<div style="clear:both;"></div>

<div class="wrap">
<?php
if(isset($_REQUEST['mode']) && $_REQUEST['mode']=='delete')
{
	$wpdb->query("delete from $lpObj->popuptable where id=$_REQUEST[lpid]");
}
if(!empty($_POST) && isset($_POST['lp-submit'])) :
$title = $_POST['lp-title'];
$content = $_POST['lp-content'];
if($mode=='edit'){
	$update=$wpdb->update($lpObj->popuptable,array('popupName'=>$_POST['lp-name'],'content'=>$_POST['lp-content']),array('id'=>$_REQUEST['lpid']),array('%s','%s'));
	
	if($update){
 ?>
	<div id="message" class="updated">
    	<p>Popup Successfully Updated.</p>
    </div>
<?php
}else{
	echo "Error Updating Template";
}
}else{
$wpdb->insert($lpObj->popuptable,array('popupName'=>$_POST['lp-name'],'content'=>$_POST['lp-content']),array('%s','%s'));
if($wpdb->insert_id){
 ?>
	<div id="message" class="updated">
    	<p>Popup Successfully Created.</p>
    </div>
<?php
}else{
	echo "Error Saving Popup";
}
}
	  endif;
	 
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
<h2> Available Popups </h2>
<table class="widefat fixed comments">
    <thead>
    	<tr>
    		<th width="5%">S.No.</th>
            <th width="30%">Template Title</th>
    		<th width="20%">Shortcode</th>
    		
            <th width="15%">Action</th>
    	</tr>
    </thead>
    
    <tbody>
    
    <?php 
	$result = $wpdb->get_results("select * from $lpObj->popuptable");
	if( $result ) { ?>
 
            <?php
            $count = 1;
            $class = '';
            foreach( $result as $res ) {
               ?>
 
            <tr<?php echo $class; ?>>
                <td><?php echo $count; ?></td>
                <td><?php echo $res -> popupName; ?></td>
                <td><?php echo "[wp-legalpopup pid=$res->id]"; ?></td>
                
                <td><a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php echo $page;?>&lpid=<?php echo $res->id;?>&mode=edit">Edit</a> | <a href="<?php echo $_SERVER["PHP_SELF"]?>?page=<?php echo $page;?>&lpid=<?php echo $res->id;?>&mode=delete" onclick="return confirm('Popup will be permanently deleted. Are you sure you want to delete?')">Delete</a></td>
            </tr>
 
            <?php
                $count++;
            }
            ?>
 
        <?php } else { ?>
        <tr>
            <td colspan="3">No popups yet</td>
        </tr>
    <?php } ?>
    </tbody>
    
    <tfoot>
        <tr>
    		<th width="5%">S.No.</th>
            <th width="30%">Popup Name</th>
    		<th width="20%">Shortcode</th>
    		
            <th width="15%">Action</th>
    	</tr>
    </tfoot>
    
 </table>
 <br/><br/>
<div class="postbox" style="width:850px;">
<?php if($_REQUEST['mode']=='edit' && isset($_REQUEST['lpid']))
	$row = $wpdb->get_row("select * from $lpObj->popuptable where id=$_REQUEST[lpid]");
	?>

	<h3 class="hndle"  style="cursor:pointer; padding:7px 10px; font-size:20px;"> Create Popups:</h3>
    
   
    <p style="padding:0 10px;">You can use Available Template shortcodes inside the popup to display Legal Pages on Popup. Checkbox to agree for the legal pages is added at the end of every popup forcing the user to agree the legal contents to view the page.</p>
    
    
    
    
    <div id="lp_generalid">
        <form name="popup" method="post" enctype="multipart/form-data">
        	<p><input type="text" name="lp-name" id="lp-name" value="<?php echo $row->popupName;?>" /></p>
            <p>
            <div id="poststuff">
                <div id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>" >
                	<?php the_editor($row->content); ?>
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
            <input type="submit" onclick="sp_content_save();" name="lp-submit" value="<?php if($mode=='edit')echo 'Edit';else echo 'Save';?>" />
            </p>
        
        </form>
    </div>
    
    <div class="clear"></div>
</div>