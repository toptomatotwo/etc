<?php get_header(); ?>
<div class="art-content-layout">
    <div class="art-content-layout-row">
<?php include (TEMPLATEPATH . '/sidebar1.php'); ?><div class="art-layout-cell art-content">

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
     <div class="t"><?php _e('Links:', 'kubrick'); ?></div>
</div>

<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->

<ul>
<?php get_links_list(); ?>
</ul>

<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>


		<div class="cleared"></div>
    </div>
</div>


</div>

    </div>
</div>
<div class="cleared"></div>

<?php get_footer(); ?>