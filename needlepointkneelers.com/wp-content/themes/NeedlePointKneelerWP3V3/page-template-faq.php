<?php
/*
Template Name: Simple FAQ
*/
?>
<?php get_header(); 
$faq_title = get_post_meta($post->ID, 'faq_title', TRUE); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<style type='text/css'>div.page_template_faq h3{cursor:pointer;text-decoration:none;} </style>
<?php add_action('wp_footer', 'tt_theme_faq_footer'); ?> 
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
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

<?php if ($faq_title == 'Yes') { ?>
<h2 class="art-postheader">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</h2>
<?php } ?>
<div class="art-postcontent">
	<div  class="page_template_faq">
          <?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
	</div>


    <!-- /article-content -->
</div>
<div class="cleared"></div>


</div>

		<div class="cleared"></div>
    </div>
</div>

<?php endwhile; endif; ?>

</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>