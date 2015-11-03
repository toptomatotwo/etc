<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style2.css" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie6.css" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.ie7.css" type="text/css" media="screen" /><![endif]-->
<?php if(WP_VERSION < 3.0): ?>
<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', THEME_NS), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', THEME_NS), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" />
<?php endif; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php
remove_action('wp_head', 'wp_generator');
wp_enqueue_script('jquery');
if ( is_singular() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/script.js"></script>
<?php do_action('tt_head_bottom'); ?>
</head>
<body <?php if(function_exists('body_class')) body_class(); ?>>
<?php do_action('tt_body_top'); ?>
<div id="art-main">
    <div class="cleared reset-box"></div>
    <div class="art-box art-sheet">
        <div class="art-box-body art-sheet-body">
            <div class="art-header">
                <?php if (function_exists('theme_get_option') && theme_get_option('header_mods_enable') == 1) { 
                        tt_header_before(); ?>
                        <div class="art-logo">
                        		<?php tt_header_inside(); ?>
                        		<div class="headerleft" <?php if(theme_get_option('header_blog_title') != 'Text') { echo 'id="imageheader"'; }  ?>>
                        			<?php $headline = theme_get_option('theme_'.(is_single()?'single':'posts').'_headline_tag'); ?>
                        			<<?php echo $headline; ?> class="art-logo-name"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></<?php echo $headline; ?>>
                        			<?php $slogan = theme_get_option('theme_'.(is_single()?'single':'posts').'_slogan_tag'); ?>
                        			<<?php echo $slogan; ?> class="art-logo-text"><?php bloginfo('description'); ?></<?php echo $slogan; ?>>
                        		</div>
                        		<div class="widget-area">
                        			<?php if ( !theme_dynamic_sidebar( 'header' ) ) : 
                        			$style = theme_get_option('theme_sidebars_style_header'); 
                        			endif; ?>
                        		</div>
                        </div>
                        	<?php tt_header_after(); } else { 
                        	tt_header_before(); ?>
                        <div class="art-logo">
                        <?php tt_header_inside(); ?>
                        		</div>
                        <?php tt_header_after(); } ?>
            </div>
            <div class="cleared reset-box"></div>
            <?php tt_nav_before(); ?>
            <div class="art-bar art-nav">
                <div class="art-nav-outer">
            	<?php 
            		tt_nav_inside_top();
            		echo theme_get_menu(array(
            				'source' => theme_get_option('theme_menu_source'),
            				'depth' => theme_get_option('theme_menu_depth'),
            				'menu' => 'primary-menu',
                                            'alt' => theme_get_meta_option($post->ID, 'theme_nav_menu_items'),
                                            'alt_menu' => theme_get_meta_option($post->ID, 'theme_nav_menu_choose'),
            				'class' => 'art-hmenu'	
            			)
            		);
            		tt_nav_inside_bottom();
            	?>
                </div>
            <?php
            tt_nav_mod_top();
            if (theme_get_option('enable_nav_mods') == 1) { 
               	$social_icons = stripslashes(theme_get_option('image_content'));
               	ob_start();
               	if (theme_get_option('nav_mod_type') == 'search') { get_search_form(); } else { echo '<div style="text-align:right;">' . $social_icons . '</div>';}
               	$nav_mods = ob_get_contents();
               	ob_end_clean();
            $items .= '<div class="sbox">' . $nav_mods . '</div>';
            echo $items;
            } 
            tt_nav_mod_bottom();?>
            </div>
            <?php tt_nav_after(); ?>
            <div class="cleared reset-box"></div>
<?php tt_sheet_inner_top(); ?>