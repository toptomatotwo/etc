<?php 

function tt_get_simple_header_layout() { ?>
<div class="art-layout-wrapper">
    <div class="art-content-layout">
        <div class="art-content-layout-row">
            <div class="art-layout-cell art-content">
<?php }

function tt_get_simple_footer_layout() { ?>
              <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
<div class="cleared"></div>
<?php }

function tt_get_header_layout() { ?>
<div class="art-layout-wrapper">
    <div class="art-content-layout">
        <div class="art-content-layout-row">
            <div class="art-layout-cell art-content">
<?php }

function tt_get_footer_layout() { ?>
              <div class="cleared"></div>
            </div>
            <div class="art-layout-cell art-sidebar1">
              <?php get_sidebar('default'); ?>
              <div class="cleared"></div>
            </div>
        </div>
    </div>
</div>
<div class="cleared"></div>
<?php }
 
function tt_postheader(){ ?>
<h2 class="art-postheader" >
<a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</h2>
<?php }

function tt_blockheader(){ ?>
<div class="art-bar art-blockheader">
<<?php echo theme_get_option('theme_posts_widget_title_tag'); ?> class="t">
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
<?php the_title(); ?>
</a>
</<?php echo theme_get_option('theme_posts_widget_title_tag'); ?>>
</div>
<?php }

function tt_post_head(){
global $post_class, $post_id;
$post_class = function_exists('get_post_class') ? implode(' ', get_post_class()) : '';
$post_id = 'id="post-' . get_the_ID() . '"';
 ?>
<div class="art-box  art-post">
    <div class="art-box-body  art-post-body">
            <div class="art-post-inner art-article">
            <?php


 }

function tt_post_heads(){ ?>
    <div class="art-post-body">
			<div class="art-post-inner art-article">
<?php }

function tt_post_content_head(){ 
                echo $thumbnail;
                if (!theme_is_empty_html($title)){
                    echo '<h2 class="art-postheader">'.$title.'</h2>';
                }
                 echo $before;?>
                <div class="art-postcontent">
                    <!-- article-content -->
<?php }

function tt_post_content_tail(){ ?>
                    <!-- /article-content -->
                </div>
                <div class="cleared"></div>
                <?php  echo $after; ?>

<?php }

function tt_post_tail(){ ?>
<?php // placeholder 

            ?>
            </div>
		<div class="cleared"></div>
    </div>
</div>



<?php }

function tt_block_head(){ ?>
<div class="art-box art-block">
    <div class="art-box-body art-block-body">
<?php }

function tt_block_title_head(){ ?>
<div class="art-bar art-blockheader">
<<?php echo theme_get_option('theme_posts_widget_title_tag'); ?> class="t">
<?php }

function tt_block_title_tail(){ ?>
</<?php echo theme_get_option('theme_posts_widget_title_tag'); ?>>
</div>
<?php }

function tt_block_content_head(){ ?>
<div class="art-box art-blockcontent">
    <div class="art-box-body art-blockcontent-body">
<?php }

function tt_block_content_tail(){ ?>
		<div class="cleared"></div>
    </div>
</div>
<?php }

function tt_block_tail(){ ?>
		<div class="cleared"></div>
    </div>
</div>
<?php }

?>