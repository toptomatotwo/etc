<?php
/*
Template Name: Magazine 5
*/
?>
<?php get_header(); 
$featured5_top_left = tt_option('featured5_top_left');
$featured5_top_num = tt_option('featured5_top_num');
$featured5_top_chars = tt_option('featured5_top_chars');
$featured5_top_thumb_width = tt_option('featured5_top_thumb_width');
$featured5_top_thumb_height = tt_option('featured5_top_thumb_height');
$featured5_top_right = tt_option('featured5_top_right');
$featured5_bottom_left = tt_option('featured5_bottom_left');
$featured5_bottom_right = tt_option('featured5_bottom_right');
$m5_block_transparent = tt_option('m5_block_transparent');
?>
<style type='text/css'>
#homepagetop p{font-size:12px;margin:0;padding:0 0 0 10px;}
#homepageleft, #homepageleft-lower{float:left;width:50%;margin:0;padding:0;}
#homepageright, #homepageright-lower{float:right;width:50%;margin:0;padding:0;}
.art-blockcontent-body .post-image-m5 hr{clear:both;border-color:#1px dotted;border-style:none none dotted;border-width:medium medium 1px;margin:0 0 10px;padding:0 0 10px;}
.art-blockcontent-body .post-image-m5 img{margin:0 10px 0 0;}
.art-blockcontent .post-right{float:left;position:relative;}
.block-bottom .art-blockheader .t{font-size:14px;}
#homepageright .art-block,#homepageleft .art-block,#homepageright-lower .art-block, #homepageright-lower .art-block{margin-bottom:0;}
#homepageright .art-block a:link,#homepageright .art-block a:visited,#homepageleft .art-block a:link,#homepageleft .art-block a:visited,#homepageright-lower .art-block a:link,#homepageright-lower .art-block a:visited, #homepageleft-lower .art-block a:link,#homepageleft-lower .art-block a:visited{text-decoration:none;color:inherit;}
.more-like{padding:0 5px 10px 10px;}
.block-bottom{margin-bottom:10px;}
#homepageleft-lower p,#homepageright-lower p,#homepageleft p,#homepageright p{font-size:12px;margin:0;padding:0;}
<?php if ($m5_block_transparent == 'Yes') { ?>#homepageright .art-block, #homepageleft .art-block, #homepageright-lower .art-block, #homepageleft-lower .art-block	{background-color:transparent;}<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">
#homepageright, #homepageleft, #homepageleft-lower,#homepageright-lower	{width:49.9%;}
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
	 <?php echo cat_id_to_name($featured5_top_left); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m5">
				<?php $recent = new WP_Query("cat=".$featured5_top_left."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wl = $featured5_top_thumb_width;
			$hl = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wl, 'height' => $hl, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_top_left); ?>
				<strong><a href="<?php echo get_category_link($featured5_top_left); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
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
	<?php echo cat_id_to_name($featured5_top_right); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m5">
			<?php $recent = new WP_Query("cat=".$featured5_top_right."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wr = $featured5_top_thumb_width;
			$hr = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wr, 'height' => $hr, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_top_right); ?>
				<strong><a href="<?php echo get_category_link($featured5_top_right); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>

		<div class="cleared"></div>
    </div>
</div>

		</div><!-- /hpright -->
	 <div class="cleared"></div>		
<div id="homepageleft-lower">
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
	 <?php echo cat_id_to_name($featured5_bottom_left); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m5">
				<?php $recent = new WP_Query("cat=".$featured5_bottom_left."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wl = $featured5_top_thumb_width;
			$hl = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wl, 'height' => $hl, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_bottom_left); ?>
				<strong><a href="<?php echo get_category_link($featured5_bottom_left); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>

		<div class="cleared"></div>
    </div>
</div>

</div> <!-- /hpleft -->
<div id="homepageright-lower">
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
	<?php echo cat_id_to_name($featured5_bottom_right); ?>
</div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<div class="post-image-m5">
			<?php $recent = new WP_Query("cat=".$featured5_bottom_right."&showposts=".$featured5_top_num); while($recent->have_posts()) : $recent->the_post();?>
			<?php 
			$wr = $featured5_top_thumb_width;
			$hr = $featured5_top_thumb_height;
			
			if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $wr, 'height' => $hr, 'image_class' => 'alignleft')); }
?>
				<strong><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></strong>
				<?php the_content_limit($featured5_top_chars, ""); ?>
				<hr/>
				<?php endwhile; ?>
<div class="cleared"></div>
</div>
		<div class="cleared"></div>
    </div>
<div class="block-bottom">
<div class="more-like">
	 <?php $cat = get_category($featured5_bottom_right); ?>
				<strong><a href="<?php echo get_category_link($featured5_bottom_right); ?>" rel="bookmark"><?php echo __("More From ", 'kubrick')." ".$cat->name; ?></a></strong>
</div>
</div>		
</div>

		<div class="cleared"></div>
    </div>
</div>

		</div><!-- /hpright -->
	 <div class="cleared"></div>				

		    <!-- /article-content -->
		</div>
		<div class="cleared"></div>
		

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>