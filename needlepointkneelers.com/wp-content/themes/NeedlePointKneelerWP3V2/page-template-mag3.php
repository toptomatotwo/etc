<?php
/*
Template Name: Magazine 3
*/
?>
<?php get_header(); 
$featured_top_left = tt_option('featured_top_left');
$featured_top_num = tt_option('featured_top_num');
$featured_top_chars = tt_option('featured_top_chars');
$featured_top_thumb_width = tt_option('featured_top_thumb_width');
$featured_top_thumb_height = tt_option('featured_top_thumb_height');
$featured_top_right = tt_option('featured_top_right');
$featured_bottom = tt_option('featured_bottom');
$featured_bottom_num = tt_option('featured_bottom_num');
$featured_bottom_chars = tt_option('featured_bottom_chars');
$featured_bottom_thumb_width = tt_option('featured_bottom_thumb_width');
$featured_bottom_thumb_height = tt_option('featured_bottom_thumb_height');
$m3_block_transparent = tt_option('m3_block_transparent');
?>
<style type='text/css'>
#homepagetop p{font-size:12px;margin:0;padding:0 0 0 10px;}
#homepageleft{float:left;width:50%;margin:0;padding:0;}
#homepageright{float:right;width:50%;margin:0;padding:0;}
.art-blockcontent-body .post-image-m3 hr{clear:both;border-color:#1px dotted;border-style:none none dotted;border-width:medium medium 1px;margin:0 0 10px;padding:0 0 10px;}
.art-blockcontent-body .post-image-m3 img{margin:0 10px 0 0;}
.art-blockcontent .post-right{float:left;position:relative;}
.block-bottom .art-blockheader .t{font-size:14px;}
#homepageright .art-block,#homepageleft .art-block,#homepagebottom .art-block{margin-bottom:0;}
#homepageright .art-block a:link,#homepageright .art-block a:visited,#homepageleft .art-block a:link,#homepageleft .art-block a:visited,#homepagebottom .art-block a:link,#homepagebottom .art-block a:visited{text-decoration:none;color:inherit;}
.more-like{padding:0 5px 10px 10px;}
.block-bottom{margin-bottom:10px;}
#homepagebottom p,#homepageleft p,#homepageright p{font-size:12px;margin:0;padding:0;}
<?php if ($m3_block_transparent == 'Yes') { ?>#homepageright .art-block, #homepageleft .art-block, #homepagebottom .art-block	{background-color:transparent;}<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">
#homepageright, #homepageleft	{width:49.9%;}
</style>
<![endif]--> 
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<div class="art-postcontent">
    <!-- article-content -->

<!-- Check for a content slider function. if it's there, then include it. If not, do nothing -->
<?php if (file_exists(TEMPLATEPATH.'/includes/slider.php'))  include (TEMPLATEPATH."/includes/slider.php") ; ?>
<!-- end of content slider function -->
<div id="homepageleft">
<div class="art-block">
    <div class="art-block-tl"></div>
    <div class="art-block-tr"></div>
    <div class="art-block-bl"></div>
    <div class="art-block-br"></div>
    <div class="art-block-tc"></div>
    <div class="art-block-bc"></div>
    <div class="art-block-cl"></div>
    <div class="art-block-cr"></div>
    <div class="art-block-cc"></div>
    <div class="art-block-body">

<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
	 <?php echo cat_id_to_name($featured_top_left); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m3">
				<?php $recent = new WP_Query("cat=".$featured_top_left."&showposts=".$featured_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wl = $featured_top_thumb_width;
			$hl = $featured_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wl, 'height' => $hl, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured_top_left); ?>
				<strong><a href="<?php echo get_category_link($featured_top_left); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>

		<div class="cleared"></div>
    </div>
</div>

</div> <!-- /hpleft -->
<div id="homepageright">
<div class="art-block">
    <div class="art-block-tl"></div>
    <div class="art-block-tr"></div>
    <div class="art-block-bl"></div>
    <div class="art-block-br"></div>
    <div class="art-block-tc"></div>
    <div class="art-block-bc"></div>
    <div class="art-block-cl"></div>
    <div class="art-block-cr"></div>
    <div class="art-block-cc"></div>
    <div class="art-block-body">

<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
	<?php echo cat_id_to_name($featured_top_right); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m3">
			<?php $recent = new WP_Query("cat=".$featured_top_right."&showposts=".$featured_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wr = $featured_top_thumb_width;
			$hr = $featured_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wr, 'height' => $hr, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured_top_right); ?>
				<strong><a href="<?php echo get_category_link($featured_top_right); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>

		<div class="cleared"></div>
    </div>
</div>

		</div><!-- /hpright -->
	 <div class="cleared"></div>		
<div id="homepagebottom">
<div class="art-block">
    <div class="art-block-tl"></div>
    <div class="art-block-tr"></div>
    <div class="art-block-bl"></div>
    <div class="art-block-br"></div>
    <div class="art-block-tc"></div>
    <div class="art-block-bc"></div>
    <div class="art-block-cl"></div>
    <div class="art-block-cr"></div>
    <div class="art-block-cc"></div>
    <div class="art-block-body">

<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
	 <?php echo cat_id_to_name($featured_bottom); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

		<?php $recent = new WP_Query("cat=".$featured_bottom."&showposts=".$featured_bottom_num); while($recent->have_posts()) : $recent->the_post();?>
		<div class="post-image-m3">				
			<?php 
			$wb = $featured_bottom_thumb_height;
			$hb = $featured_bottom_thumb_height;
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wb, 'height' => $hb, 'image_class' => 'alignleft')); }
?>
  <strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured_bottom_chars, ""); ?>
					
				<hr/>
		</div>	
				<?php endwhile; ?>
					<div class="cleared"></div>	
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured_bottom); ?>
				<strong><a href="<?php echo get_category_link($featured_bottom); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>	

		<div class="cleared"></div>
    </div>
</div>

</div><!-- /hpbottom -->				

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>