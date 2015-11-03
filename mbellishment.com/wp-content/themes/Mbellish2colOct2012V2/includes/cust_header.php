<?php 
	define( 'HEADER_TEXTCOLOR', 'fff' );
	define( 'HEADER_IMAGE', '%s/images/header.jpg' );
	$cust_header = theme_get_option('cust_header_width');
	$tt_header_width = $cust_header['width'];
	$tt_header_height = $cust_header['height'];
	
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'tt_header_image_width', $tt_header_width ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'tt_header_image_height', $tt_header_height ) );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	define( 'NO_HEADER_TEXT', true );
	add_custom_image_header( '', 'tt_admin_header_style' );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	add_image_size( 'large-feature', HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true ); // Used for large feature (header) images

	
if ( ! function_exists( 'tt_admin_header_style' ) ) :
	function tt_admin_header_style() {
?>
<style type="text/css">
/* Shows the same border as on front end */
#headimg {

}
/* If NO_HEADER_TEXT is false, you would style the text with these selectors:
	#headimg #name { 
	
	}
	#headimg #desc { 
	
	}
*/
</style>
<?php
}
endif;


