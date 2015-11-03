<?php if ((theme_get_option('cust_header') == 1) && (theme_get_option('cust_header_post') == 1)) {
	// Check if this is a post or page, if it has a thumbnail, and if it's a big one
	if ( is_singular() &&
		has_post_thumbnail( $post->ID ) &&
			( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
			$image[1] >= HEADER_IMAGE_WIDTH ) : { ?>
			<style type='text/css'>
			.art-header:after, .art-header:before{ background-image: url('<?php echo tt_get_the_post_thumbnail_url($post->ID, 'large'); ?>');
			width:<?php echo HEADER_IMAGE_WIDTH; ?>px; height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;}
			</style>
			<?php }
			//echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
			else : ?>
			<style type='text/css'>
			.art-header:after,.art-header:before{ background-image: url('<?php header_image(); ?>');width:<?php echo HEADER_IMAGE_WIDTH; ?>px; height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;}
			</style>
								
<?php endif; } ?>
<?php if ((theme_get_option('cust_header') == 1) && (!theme_get_option('cust_header_post'))) { ?>
<style type='text/css'>
div.art-header,.art-header:after, .art-header:before{ background-image: url('<?php header_image(); ?>');}
</style>
<?php } ?>