<?php
// widgetized footer thanks to Adeptris at http://www.digitalraindrops.net/index.php/dynamic-footer-revisited/
// Start Footer Functions 
if ((tt_option('footer_widget_enable')) == 'Yes') { 
Function cms_make_footers() {
	if (function_exists('register_sidebars')) {
		register_sidebars(4, array(
			'name' => 'Footer %d',
			'description' => 'This is one of four dynamic footer widget areas. They will dynamically size their width based on the number of active areas.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">'.'<!--- BEGIN Widget --->',
			'before_title' => '<!--- BEGIN WidgetTitle --->',
			'after_title' => '<!--- END WidgetTitle --->',
			'after_widget' => '<!--- END Widget --->'.'</div>'
		));
	}
}
} else {

}
//Get the Footer Wigets Widths here
function get_footer_width() {
	if (is_footer_active('Footer 4')) {
		return '25%';
		}
	elseif (is_footer_active('Footer 3')) {
		return '33%';		
		}
	elseif (is_footer_active('Footer 2')) {
		return '50%';		
		}
	elseif (is_footer_active('Footer 1')) {
		return '100%';		
		}
	return '';
}

/* Start code to load custom stylesheet */
function cms_stylesheet() { ?>
<style type='text/css'>
.cms-footer{background-color: transparent;	position: relative;	padding: 0;	float: left;overflow: hidden;margin-top:7px;width: 100%;}
.cms-footer .footer-widget{position: relative;margin: 0;	padding: 0;border: 0;float: left;overflow: hidden;}
</style>
<?php }
add_action('wp_print_styles', 'cms_stylesheet');
/* End code to load custom stylesheet */



// passes in the Footer name to see if it is active 
function is_footer_active( $index = 1 ) {
	global $wp_registered_sidebars;

	if ( is_int( $index ) ) :
		$index = "Footer $index";
	else :
		$index = sanitize_title( $index );
		foreach ( (array) $wp_registered_sidebars as $key => $value ) :
			if ( sanitize_title( $value['name'] ) == $index ) :
				$index = $key;
				break;
			endif;
		endforeach;
	endif;

	$sidebars_widgets = wp_get_sidebars_widgets();

	if ( empty( $wp_registered_sidebars[$index] ) || !array_key_exists( $index, $sidebars_widgets ) || !is_array( $sidebars_widgets[$index] ) || empty( $sidebars_widgets[$index] ) )
		return false;
	else
		return true;
}

function include_cms_footer() {
	if ((tt_option('footer_widget_enable')) == 'Yes') { ?>
<?php 
	$width = get_footer_width();
	$footer_widget_color = (tt_option('footer_widget_color'));
	$footer_widget_margin = (tt_option('footer_widget_margin'));
if ($width): ?>
<?php if ((tt_option('footer_widget_colorize')) == 'Yes') { ?>
<div class="cms-footer" style="margin-top:<?php echo $footer_widget_margin; ?>px;background-color:#<?php echo $footer_widget_color; ?>;">
<?php } else {?>
<div class="cms-footer">
<?php } ?>
    <?php if (is_footer_active('Footer 1')): ?>
	<div class="footer-widget" style="width: <?php echo $width ?>">
		<?php art_sidebar('Footer 1') ?>
	</div>
	<?php endif; ?>
	<?php if (is_footer_active('Footer 2')): ?>
	<div class="footer-widget" style="width: <?php echo $width ?>">
		<?php art_sidebar('Footer 2') ?>
	</div>
	<?php endif; ?>
	<?php if (is_footer_active('Footer 3')): ?>
	<div class="footer-widget" style="width: <?php echo $width ?>">
		<?php art_sidebar('Footer 3') ?>
	</div>
	<?php endif; ?>
	<?php if (is_footer_active('Footer 4')): ?>
	<div class="footer-widget" style="width: <?php echo $width ?>">
		<?php art_sidebar('Footer 4') ?>
	</div>
	<?php endif; ?>
</div>
<div class="cleared"></div>
<?php endif; ?>
	
<?php }
}

?>