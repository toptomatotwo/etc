<style type='text/css'> .art-content-layout .sb-special{width:<?php echo $special_width; ?>px;}</style>
<!--[if IE ]><style type="text/css">.art-sidebar1	{float:right; }</style><![endif]--> 
	<div class="art-layout-cell sb-special" style ="width:<?php echo $special_width; ?>px;">
          <?php global $sb_primary,$sb_secondary ; theme_dynamic_sidebar('special'); ?>
          <div class="cleared"></div>
        <div class="art-layout-cell art-sidebar1">
          <?php theme_dynamic_sidebar('default'); ?>
          <div class="cleared"></div>
        </div>
	<div class="art-layout-cell art-sidebar2">
          <?php theme_dynamic_sidebar('secondary'); ?>
          <div class="cleared"></div>
        </div>
	</div>