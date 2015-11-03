<?php
/*
Template Name: Magazine 4
*/
?>
<?php get_header(); 
$m4_img_height = (tt_option('m4_img_height'));
$m4_img_width = (tt_option('m4_img_width'));  
$m4_content_length = (tt_option('m4_content_length'));
$m4_totalposts = (tt_option('m4_totalposts')); 
$m4_contentheight = (tt_option('m4_contentheight'));
$m4_heading_text = (tt_option('m4_heading_text')); 
$m4_header_text_include = (tt_option('m4_header_text_include'));
$m4_block_transparent = (tt_option('m4_block_transparent'));
$m4_block_padding = (tt_option('m4_block_padding'));
$m4w_content_length = tt_option('m4w_content_length') ;
$m4w_img_height = tt_option('m4w_img_height');
$m4w_img_width = tt_option('m4w_img_width');
$m4_cat = tt_option('m4_cat');
$m4w_featured_qty = tt_option('m4w_featured_qty');
$m4_block_padding = tt_option('m4_block_padding').'px '.tt_option('m4_block_padding_r').'px '.tt_option('m4_block_padding_b').'px '.tt_option('m4_block_padding_l').'px '; // top/bottom padding for blockcontent-body
$m4w_block_padding_choose = tt_option('m4_block_padding_choose');
$m4w_block_margin_choose = tt_option('m4_block_margin_choose');
$m4w_block_margin = tt_option('m4w_block_margin_t').'px '.tt_option('m4w_block_margin_r').'px '.tt_option('m4w_block_margin_b').'px '.tt_option('m4w_block_margin_l').'px '; // top/bottom padding for blockcontent-body
$m4w_block_padding = tt_option('m4w_block_padding_t').'px '.tt_option('m4w_block_padding_r').'px '.tt_option('m4w_block_padding_b').'px '.tt_option('m4w_block_padding_l').'px '; // top/bottom padding for blockcontent-body
$m4_block_padding_choose = tt_option('m4_block_padding_choose');
$m4_block_margin_choose = tt_option('m4_block_margin_choose');
$m4_block_margin = tt_option('m4_block_margin_t').'px '.tt_option('m4_block_margin_r').'px '.tt_option('m4_block_margin_b').'px '.tt_option('m4_block_margin_l').'px '; // top/bottom padding for blockcontent-body
$m4_style = tt_option('m4_style');
if (is_paged()) $is_paged = true; ?>
<style type='text/css'>
.top-page	{padding:10px 0 0 10px;}
.top-page .art-block-body	{padding:4px;}
.top-title .art-blockheader	{margin-bottom:0;}
.mini-post	{float:left;overflow:hidden;width:50%;}
.mini-post .art-block img	{float:left;<?php if ($m4_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4_block_margin; ?>;<?php } ?>}
.mini-post .art-article img	{float:left;<?php if ($m4_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4_block_margin; ?>;<?php } ?>}
.mini-post .art-block a:link,.mini-post .art-block a:visited	{text-decoration:none;color:inherit;}
.mini-post .art-blockcontent {height: <?php echo $m4_contentheight.'px;' ; ?>px;}
.mini-post .art-post-body{height: <?php echo $m4_contentheight.'px;' ; ?>px;}
<?php if ($m4_block_padding_choose == 'Yes') { ?>.mini-post .art-blockcontent-body p	{padding:<?php echo $m4_block_padding; ?>;}<?php } ?>
.wide-post .art-block a:link,.wide-post .art-block a:visited	{color:inherit;	text-decoration:none;}
<?php if ($m4w_block_padding_choose == 'Yes') { ?>.wide-post .art-postcontent p{padding:<?php echo $m4w_block_padding; ?>}<?php } ?>
.wide-post .art-article img	{float:left;<?php if ($m4w_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4w_block_margin; ?>;<?php } ?>}
.wide-post .art-block img	{float:left;<?php if ($m4w_block_margin_choose == 'Yes') { ?>margin:<?php echo $m4w_block_margin; ?>;<?php } ?>}
<?php if ($m4_block_transparent == 'Yes') { ?>
.art-content-layout .art-content .mini-post .art-block {background-color:transparent;}
.art-content-layout .art-content .wide-post .art-block	{background-color:transparent;}
<?php } ?>
</style>
<!--[if IE ]>
<style type="text/css">
.mini-post .art-blockheader, .wide-post .art-blockheader	{margin-bottom:10px;}
.mini-post	{float:left;overflow:hidden;width:49.9%;}
</style>
<![endif]--> 
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<?php if ($m4_header_text_include == 'Yes') { ?>
<div class="art-block">
    <div class="art-block-body">

<div class="top-title">
<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
<?php echo $m4_heading_text ; ?>
</div>
</div>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php } ?>
		<?php
			$postnum = 0;
			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query('cat='.$m4_cat.'&showposts='.$m4_totalposts.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post();$postnum++;
		
		if ( $postnum <= $m4w_featured_qty && !$is_paged ) { ?>
		
<div class="wide-post">
<?php if ($m4_style == 'Yes') { ?>
<div class="art-block">
    <div class="art-block-body">

<?php } else { ?>
<div class="art-post">
    <div class="art-post-tl"></div>
    <div class="art-post-tr"></div>
    <div class="art-post-bl"></div>
    <div class="art-post-br"></div>
    <div class="art-post-tc"></div>
    <div class="art-post-bc"></div>
    <div class="art-post-cl"></div>
    <div class="art-post-cr"></div>
    <div class="art-post-cc"></div>
    <div class="art-post-body">
<div class="art-post-inner art-article">

<?php } ?>
<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a></span>
</div>
</div>

<?php if ($m4_style == 'Yes') { ?>
<div class="art-blockcontent">
    <div class="art-blockcontent-tl"></div>
    <div class="art-blockcontent-tr"></div>
    <div class="art-blockcontent-bl"></div>
    <div class="art-blockcontent-br"></div>
    <div class="art-blockcontent-tc"></div>
    <div class="art-blockcontent-bc"></div>
    <div class="art-blockcontent-cl"></div>
    <div class="art-blockcontent-cr"></div>
    <div class="art-blockcontent-cc"></div>
    <div class="art-blockcontent-body">
<!-- block-content -->

<?php } else { ?>
<div class="art-postcontent">
    <!-- article-content -->

<?php } ?>
<div class="post-image">
<?php if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $m4w_img_width, 'height' => $m4w_img_height)); } ?>
  
<?php the_content_limit($m4w_content_length, ""); ?>
</div>
<?php if ($m4_style == 'Yes') { ?>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

<?php } ?>
<?php if ($m4_style == 'Yes') { ?>

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php } ?>
</div>		
	<?php } else { ?>		
<div class="mini-post">
<?php if ($m4_style == 'Yes') { ?>
<div class="art-block">
    <div class="art-block-body">

<?php } else { ?>
<div class="art-post">
    <div class="art-post-tl"></div>
    <div class="art-post-tr"></div>
    <div class="art-post-bl"></div>
    <div class="art-post-br"></div>
    <div class="art-post-tc"></div>
    <div class="art-post-bc"></div>
    <div class="art-post-cl"></div>
    <div class="art-post-cr"></div>
    <div class="art-post-cc"></div>
    <div class="art-post-body">
<div class="art-post-inner art-article">

<?php } ?>
<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a></span>
</div>
</div>

<?php if ($m4_style == 'Yes') { ?>
<div class="art-blockcontent">
    <div class="art-blockcontent-tl"></div>
    <div class="art-blockcontent-tr"></div>
    <div class="art-blockcontent-bl"></div>
    <div class="art-blockcontent-br"></div>
    <div class="art-blockcontent-tc"></div>
    <div class="art-blockcontent-bc"></div>
    <div class="art-blockcontent-cl"></div>
    <div class="art-blockcontent-cr"></div>
    <div class="art-blockcontent-cc"></div>
    <div class="art-blockcontent-body">
<!-- block-content -->

<?php } else { ?>
<div class="art-postcontent">
    <!-- article-content -->

<?php } ?>
<div class="post-image">
<?php if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $m4_img_width, 'height' => $m4_img_height)); } ?>
  
<?php the_content_limit($m4_content_length, ""); ?>
</div>
<?php if ($m4_style == 'Yes') { ?>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

<?php } ?>
<?php if ($m4_style == 'Yes') { ?>

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php } ?>
</div>
<?php } endwhile; ?>
<div class="cleared"></div>
<?php
$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
?>
<?php if ($prev_link || $next_link): ?>
<?php if ($m4_style == 'Yes') { ?>
<div class="art-block">
    <div class="art-block-body">

<?php } else { ?>
<div class="art-post">
    <div class="art-post-tl"></div>
    <div class="art-post-tr"></div>
    <div class="art-post-bl"></div>
    <div class="art-post-br"></div>
    <div class="art-post-tc"></div>
    <div class="art-post-bc"></div>
    <div class="art-post-cl"></div>
    <div class="art-post-cr"></div>
    <div class="art-post-cc"></div>
    <div class="art-post-body">
<div class="art-post-inner art-article">

<?php } ?>
<?php if ($m4_style == 'Yes') { ?>
<div class="art-blockcontent">
    <div class="art-blockcontent-tl"></div>
    <div class="art-blockcontent-tr"></div>
    <div class="art-blockcontent-bl"></div>
    <div class="art-blockcontent-br"></div>
    <div class="art-blockcontent-tc"></div>
    <div class="art-blockcontent-bc"></div>
    <div class="art-blockcontent-cl"></div>
    <div class="art-blockcontent-cr"></div>
    <div class="art-blockcontent-cc"></div>
    <div class="art-blockcontent-body">
<!-- block-content -->

<?php } else { ?>
<div class="art-postcontent">
    <!-- article-content -->

<?php } ?>
<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>
<?php if ($m4_style == 'Yes') { ?>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

<?php } ?>
<?php if ($m4_style == 'Yes') { ?>

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php } ?>
<?php endif; ?>

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>