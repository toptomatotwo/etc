<?php
/*
Template Name: Blog Page
*/
?>
<?php get_header(); 
$blog_cat_enable = (tt_option('blog_cat_enable'));
$blog_cat = (tt_option('blog_cat'));
?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

<?php
if ($blog_cat_enable == 'Yes') {
	$featured_cat = $blog_cat; 
	}
	else {
	$featured_cat = ''; }
$content_output = tt_option('blog_content');
$number_posts = tt_option('blog_number_posts');
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('cat='.$featured_cat.'&showposts='.$number_posts.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>

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

<h2 class="art-postheader">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</h2>
<?php ob_start(); ?>
<?php $icons = array(); ?>
<?php if (!is_page()): ?><?php ob_start(); ?><?php if ((tt_option('post_header_icon_enable')) == 'Yes') { ?><img class="art-metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postdateicon.png" width="17" height="18" alt="" /> <?php } ?>
<?php the_time(__('F jS, Y', 'kubrick')) ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page()): ?><?php ob_start(); ?><?php if ((tt_option('post_header_icon_enable')) == 'Yes') { ?><img class="art-metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postauthoricon.png" width="14" height="14" alt="" /> <?php } ?>
<?php _e('Author', 'kubrick'); ?>: <?php the_author_posts_link() ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (current_user_can('edit_post', $post->ID)): ?><?php ob_start(); ?>
<?php edit_post_link(__('Edit', 'kubrick'), ''); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
<div class="art-postheadericons art-metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="art-postmetadataheader">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>
<div class="art-postcontent">
    <!-- article-content -->


<?php if ($content_output == 'content') {the_content(); } else { the_excerpt(); } ?>


    <!-- /article-content -->
</div>
<div class="cleared"></div>

<?php ob_start(); ?>
<?php $icons = array(); ?>
<?php if (!is_page()): ?><?php ob_start(); ?><?php if ((tt_option('post_footer_icon_enable')) == 'Yes') { ?><img class="art-metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postcategoryicon.png" width="18" height="18" alt="" /><?php } ?>
<?php printf(__('Posted in %s', 'kubrick'), get_the_category_list(', ')); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && get_the_tags()): ?><?php ob_start(); ?><?php if ((tt_option('post_footer_icon_enable')) == 'Yes') { ?><img class="art-metadata-icon" src="<?php bloginfo('template_url'); ?>/images/posttagicon.png" width="18" height="18" alt="" /><?php } ?>
<?php the_tags(__('Tags:', 'kubrick') . ' ', ', ', ' '); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (!is_page() && !is_single()): ?><?php ob_start(); ?><?php if ((tt_option('post_footer_icon_enable')) == 'Yes') { ?><img class="art-metadata-icon" src="<?php bloginfo('template_url'); ?>/images/postcommentsicon.png" width="18" height="18" alt="" /><?php } ?>
<?php comments_popup_link(__('No Comments &#187;', 'kubrick'), __('1 Comment &#187;', 'kubrick'), __('% Comments &#187;', 'kubrick'), '', __('Comments Closed', 'kubrick') ); ?>
<?php $icons[] = ob_get_clean(); ?><?php endif; ?><?php if (0 != count($icons)): ?>
<div class="art-postfootericons art-metadata-icons">
<?php echo implode(' | ', $icons); ?>

</div>
<?php endif; ?>
<?php $metadataContent = ob_get_clean(); ?>
<?php if (trim($metadataContent) != ''): ?>
<div class="art-postmetadatafooter">
<?php echo $metadataContent; ?>

</div>
<?php endif; ?>

</div>

		<div class="cleared"></div>
    </div>
</div>

<?php endwhile; ?>

<?php
$prev_link = get_previous_posts_link(__('Newer Entries &raquo;', 'kubrick'));
$next_link = get_next_posts_link(__('&laquo; Older Entries', 'kubrick'));
?>
<?php if ($prev_link || $next_link): ?>
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

<div class="art-postcontent">
    <!-- article-content -->

<div class="navigation">
	<div class="alignleft"><?php echo $next_link; ?></div>
	<div class="alignright"><?php echo $prev_link; ?></div>
</div>

    <!-- /article-content -->
</div>
<div class="cleared"></div>


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