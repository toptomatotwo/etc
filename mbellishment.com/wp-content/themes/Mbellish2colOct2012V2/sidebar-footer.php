<?php if ( !theme_dynamic_sidebar( 'footer' ) ) : ?>
<?php $style = theme_get_option('theme_sidebars_style_footer'); ?>
<?php $heading = theme_get_option('theme_'.(is_single()?'single':'posts').'_widget_title_tag'); tt_sidebar_footer_before(); ?>



<?php endif; tt_sidebar_footer_after(); ?>