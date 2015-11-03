<?php if (function_exists('vslider')) { ?>
	<div class="art-post">
        <div class="featuredtop">
 			<?php vSlider(); ?>
		</div>
	</div>
<?php } ?>
<?php if (function_exists (gallery_styles)) { ?>
	<div class="art-post">
        <div class="featuredtop">
 			<?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
		</div>
	</div>
<?php } ?> 
<?php if (function_exists (dynamic_content_gallery)) { ?>
	<div class="art-post">
        <div class="featuredtop">
 			<?php dynamic_content_gallery(); ?>
		</div>
	</div>
<?php } ?> 
<?php if (function_exists (install_cu3er)) { ?>
	<div class="art-post">
        <div class="featuredtop">
 			<?php install_cu3er(); ?>
		</div>
	</div>
<?php } ?> 