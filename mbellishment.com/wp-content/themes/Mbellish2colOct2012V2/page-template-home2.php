<?php
/*
Template Name: Home Page #2
*/
?>
<?php get_header(); 
include get_template_directory()."/includes/tt_meta.php";
global $custom_metabox_homepage2;
$meta_test1 = $custom_metabox_homepage2->the_meta();
$hp_widgetized_show = $meta_test1['hp_widgetized_show'];
$hp_widgetized_position = $meta_test1['hp_widgetized_position'];
$home_page_top = $meta_test1['home_page_top'];
$home_page_widget_style = $meta_test1['home_page_widget_style'];
$home_page_mid_style = $meta_test1['home_page_mid_style'];
$home_page_1 = $meta_test1['home_page_1'];
$hp_top_margin_choose = $meta_test1['hp_top_margin_choose'];
$hp_top_margin_t = $meta_test1['hp_top_margin_t']; if ($hp_top_margin_t == '') $hp_top_margin_t = 0; $hp_top_margin_r = $meta_test1['hp_top_margin_r']; if ($hp_top_margin_r == '') $hp_top_margin_r = 0; $hp_top_margin_b = $meta_test1['hp_top_margin_b']; if ($hp_top_margin_b == '') $hp_top_margin_b = 0; $hp_top_margin_l = $meta_test1['hp_top_margin_l']; if ($hp_top_margin_l == '') $hp_top_margin_l = 0;
$hp_top_margin = $hp_top_margin_t.'px '.$hp_top_margin_r.'px '.$hp_top_margin_b.'px '.$hp_top_margin_l.'px' ;
$hp_mid_content_length = $meta_test1['hp_mid_content_length'];
$hp_top_show = $meta_test1['hp_top_show'];
$hp_gal_bg_color = $meta_test1['hp_gal_bg_color'];
$hp_gal_totalposts = $meta_test1['hp_gal_totalposts'];
$home_page_widget_size = $meta_test1['home_page_widget_size'];
?>
<script type="text/javascript">
 jQuery(document).ready(function(){	
	jQuery('.boxgrid.slidedown').hover(function(){
		jQuery(".cover", this).stop().animate({top:'-108px'},{queue:false,duration:300});
		}, function() {
			jQuery(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
		});
	}); 
</script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/includes/css/home2-style.css" type="text/css" media="screen" />
<style type='text/css'>
.read-more-image {display:none;}
.boxgrid {background-color:#<?php echo $hp_gal_bg_color ; ?>; }
div.art-block img { margin: 0; }
<?php if ($hp_top_margin_choose == 'Yes') { ?>#home-top-bg {margin: <?php echo $hp_top_margin ; ?>;}<?php } ?>
</style>
<?php tt_get_simple_header_layout(); ?>
<div class="cleared"></div>
<?php  
if ($hp_widgetized_position == 'Above' && $hp_widgetized_show == 'Yes') { 
	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<?php ob_start();?>
<?php
if ($hp_widgetized_position == 'Below' && $hp_widgetized_show == 'Yes') { 

	$home_page_widget_style( array(
								'content' => $home_page_widget_size()
								)) ;
} ?>
<div class="cleared"></div>
<?php if ($hp_top_show == 'Yes') { 
					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
						get_template_part('content', 'minimum');
					}
					}
  ?>
<?php ob_start(); ?>
<div class="homepage-gallery">
		
		<?php $custom_query = new WP_Query(array ('cat' => $home_page_1,'showposts' => $hp_gal_totalposts));
			query_posts($custom_query);
				while($custom_query->have_posts()) : $custom_query->the_post();?>
						
	<div class="polaroid-bg">
		<div class="boxgrid slidedown">
			<?php tt_thumb(225,225); ?>
			<h4><?php the_title(); ?>	</h4>
			<?php the_content_limit($hp_mid_content_length,''); ?>
		</div>
	</div>

<?php endwhile;  wp_reset_query(); ?>
</div>
<?php  
$home_page_mid_style(
			  			array(

								'content' => ob_get_clean())
			  		);		?>	
<?php
	theme_simple_wrapper(
		array(

				'content' => ob_get_clean()
		))		
			 ?>		
<?php tt_get_simple_footer_layout(); ?>
<?php get_footer(); ?>