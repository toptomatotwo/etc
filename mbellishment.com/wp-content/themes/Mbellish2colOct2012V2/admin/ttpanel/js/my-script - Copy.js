jQuery(document).ready(function() {

var uploadID = ''; /*setup the var in a global scope*/

jQuery('.upload-button').click(function() {
uploadID = jQuery(this).prev('input'); /*set the uploadID variable to the value of the input before the upload button*/
formfield = jQuery('.upload').attr('name');
tb_show('', 'media-upload.php?type=image&amp;amp;amp;amp;TB_iframe=true');
return false;
});

window.send_to_editor = function(html) {
imgurl = jQuery('img',html).attr('src');
uploadID.val(imgurl); /*assign the value of the image src to the input*/
tb_remove();
};
});


/*
jQuery(document).ready(function() {


jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#upload_image').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});

window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#upload_image').val(imgurl);
 tb_remove();
}

 
 jQuery('#upload_image_button' + formfield)).click(function() {
  formfield = jQuery('#upload_image').attr('name');
  tb_show('', 'media-upload.php?type=image&TB_iframe=true');
  return false;
 }); 
 
 window.send_to_editor = function(html) {
  imgurl = jQuery('img',html).attr('href');
  jQuery('#upload_image' + formfield).val(imgurl);
  tb_remove();
 } 
 */
});


