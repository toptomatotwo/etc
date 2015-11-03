<?php 
	define( 'HEADER_TEXTCOLOR', '' );
	define( 'HEADER_IMAGE', '%s/images/header.jpg' );

	$tt_header_width = tt_option('cust_header_width');
	$tt_header_height = tt_option('cust_header_height');	
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'tt_header_image_width', $tt_header_width ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'tt_header_image_height', $tt_header_height ) );
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );
	define( 'NO_HEADER_TEXT', true );
	add_custom_image_header( '', 'tt_admin_header_style' );

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
?>