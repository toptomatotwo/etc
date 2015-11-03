<?php
/*
Template Name: Magazine 1
*/
?>
<?php get_header(); 
$m1_img_height = (tt_option('m1_img_height')); // image height
$m1_img_width = (tt_option('m1_img_width')); //image width 
$m1_content_length = (tt_option('m1_content_length')); // length of content in characters
$m1_totalposts = (tt_option('m1_totalposts')); // Total number of posts to display per page
$m1_contentheight = (tt_option('m1_contentheight')); // height of content box in pixels
$m1_heading_text = (tt_option('m1_heading_text')); // text in the title for the header above posts
$m1_header_text_include = (tt_option('m1_header_text_include')); // display header above posts (or not)
$m1_block_transparent = (tt_option('m1_block_transparent')); // make background color  of art-block transparent
$m1_block_padding_choose = tt_option('m1_block_padding_choose');
$m1_block_padding = tt_option('m1_block_padding_t').'px '.tt_option('m1_block_padding_r').'px '.tt_option('m1_block_padding_b').'px '.tt_option('m1_block_padding_l').'px '; // top/bottom padding for blockcontent-body
$m1_block_margin_choose = tt_option('m1_block_margin_choose');
$m1_block_margin = tt_option('m1_block_margin_t').'px '.tt_option('m1_block_margin_r').'px '.tt_option('m1_block_margin_b').'px '.tt_option('m1_block_margin_l').'px '; // top/bottom padding for blockcontent-body
$m1_style = tt_option('m1_style');
?>
<style type='text/css'>

.top-page	{padding:10px 0 0 10px;}
.top-page .art-block-body	{padding:4px;}
.top-title .art-blockheader	{margin-bottom:0;}
.mini-post	{float:left;overflow:hidden;width:50%;}
.mini-post .art-block a:link,.mini-post .art-block a:visited	{text-decoration:none;color:inherit;}
.mini-post .art-block img 	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
.mini-post .art-blockcontent-body p	{<?php if ($m1_block_padding_choose == 'Yes') { ?>padding:<?php echo $m1_block_padding ; ?>;<?php } ?>}
.mini-post .art-blockcontent-body {height: <?php echo $m1_contentheight.'px;' ; ?>px;}
<?php if ($m1_block_transparent == 'Yes') { ?>.art-content-layout .art-content .mini-post .art-block {background-color:transparent;}<?php } ?>

.mini-post .art-post img	{float:left;<?php if ($m1_block_margin_choose == 'Yes') { ?>margin:<?php echo $m1_block_margin ; ?>;<?php } ?>}
.mini-post .art-postcontent	 {height: <?php echo $m1_contentheight.'px;' ; ?>px;}
.mini-post .art-postcontent	p {<?php if ($m1_block_padding_choose == 'Yes') { ?>padding:<?php echo $m1_block_padding ; ?>;<?php } ?>}

</style>
<!--[if IE ]>
<style type="text/css">
.mini-post .art-blockheader, .wide-post .art-blockheader	{margin-bottom:10px;}
.mini-post	{width:49.9%;}
</style>
<![endif]--> 
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<!-- Check for a content slider function. if it's there, then include it. If not, do nothing -->
<?php if (file_exists(TEMPLATEPATH.'/includes/slider.php'))  include (TEMPLATEPATH."/includes/slider.php") ; ?>
<!-- end of content slider function -->
<?php if ($m1_header_text_include == 'Yes') { ?>
<div class="art-block">
    <div class="art-block-body">

<div class="top-title">
<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">
<?php echo $m1_heading_text ; ?>
</div>
</div>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php } ?>
		<?php
			$temp = $wp_query;
			$wp_query= null;
			$wp_query = new WP_Query();
			$wp_query->query('showposts='.$m1_totalposts.'&paged='.$paged);
			while ($wp_query->have_posts()) : $wp_query->the_post();
		?>
<div class="mini-post">
<?php if ($m1_style == 'Yes') { ?>
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

<?php if ($m1_style == 'Yes') { ?>
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

<?php if ( function_exists( 'get_the_image' ) ) { get_the_image(array( 'width' => $m1_img_width, 'height' => $m1_img_height)); } ?>

  
<?php the_content_limit($m1_content_length, ""); ?>
</div>
<?php if ($m1_style == 'Yes') { ?>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>

<?php } else { ?>

    <!-- /article-content -->
</div>
<div class="cleared"></div>

<?php } ?>
<?php if ($m1_style == 'Yes') { ?>

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
<?php endwhile; ?>
<div class="cleared"></div>
<?php
$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
?>
<?php if ($prev_link || $next_link): ?>
<div class="art-block">
    <div class="art-block-body">

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

<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>


		<div class="cleared"></div>
    </div>
</div>

<?php endif; ?>

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>