<style type='text/css'> .art-content-layout .sb-special{width:<?php echo $special_width; ?>px;}</style>
<!--[if IE ]><style type="text/css">.sb-special	{float:left; }</style><![endif]--> 

	<div class="art-layout-cell sb-special">
          <?php global $sb_primary,$sb_secondary ; theme_dynamic_sidebar('special'); ?>
          <div class="cleared"></div>
        <div class="art-layout-cell art-sidebar1">
          <?php theme_dynamic_sidebar($sb_primary); ?>
          <div class="cleared"></div>
        </div>
		<div class="art-layout-cell art-sidebar2">
          <?php theme_dynamic_sidebar($sb_secondary); ?>
          <div class="cleared"></div>
        </div>
	</div>