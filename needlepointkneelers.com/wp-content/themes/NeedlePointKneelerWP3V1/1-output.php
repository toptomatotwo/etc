<!-- pagehead below ----------------------------------->
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<!-- pagehead above ----------------------------------->



<!-- post below ----------------------------------->
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
<?php ob_start(); ?>
<?php $page_title = get_post_meta($post->ID, 'page_title', TRUE); ?>
<?php if (!$page_title == 'No') { ?>
<h2 class="art-postheader">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</h2>
 <?php } ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="art-postmetadataheader">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>
<div class="art-postcontent">
    <!-- article-content -->

          <?php if (is_search()) the_excerpt(); else the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
          <?php if (is_page() or is_single()) wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        
    <!-- /article-content -->
</div>
<div class="cleared"></div>

</div>

		<div class="cleared"></div>
    </div>
</div>

<!-- post above ----------------------------------->



<!-- pagetail below ----------------------------------->

</div>

    </div>
</div>
<div class="cleared"></div>

<!-- pagetail above ----------------------------------->



<!-- post_head below ----------------------------------->
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

<!-- post_head above ----------------------------------->



<!-- post_content_head below ----------------------------------->
<div class="art-postcontent">
    <!-- article-content -->

<!-- post_content_head above ----------------------------------->




<!-- post_content_tail below ----------------------------------->

    <!-- /article-content -->
</div>
<div class="cleared"></div>

<!-- post_content_tail above ----------------------------------->




<!-- post_tail below ----------------------------------->

</div>

		<div class="cleared"></div>
    </div>
</div>

<!-- post_tail above ----------------------------------->