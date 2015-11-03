<?php if ( $m2_style == 'Yes') { ; ?>
<?php // block_head start ?>
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
<?php // block_head end ?>
<div class="art-bar art-blockheader">
    <$heading class="t"><?php echo $tt_caption; ?>
</$heading>
</div>
<div class="art-box art-blockcontent">
    <div class="art-box-body art-blockcontent-body">
<?php echo $tt_content; ?>
		<div class="cleared"></div>
    </div>
</div>
		<div class="cleared"></div>
    </div>
</div>
<?php } else { ?>
<div class="art-box art-post">
    <div class="art-box-body art-post-body">
            <div class="art-post-inner art-article">
            <?php
			tt_main_before();


tt_postheader(); 
                echo $thumbnail;
                if (!theme_is_empty_html($title)){
                    echo '<h2 class="art-postheader">'.$title.'</h2>';
                }
                 echo $before;?>
                <div class="art-postcontent">
                    <!-- article-content -->
<?php echo $tt_content; ?>
                    <!-- /article-content -->
                </div>
                <div class="cleared"></div>
                <?php  echo $after; ?>

 <?php  


			tt_main_after();
            ?>
            </div>
		<div class="cleared"></div>
    </div>
</div>


<?php } ?>

