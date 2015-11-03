<?php
// remove parent link from default theme horizontal menu function 
if (theme_get_option('theme_menu_disable_parent_hmenu')) {

add_action('wp_footer', 'disable_parent_menu_link_art');
  function disable_parent_menu_link_art () {

    $menus = wp_get_nav_menus();
    if (is_array($menus)) {
      wp_print_scripts('jquery'); ?>
      <script type="text/javascript"> <?php
        foreach ( $menus as $menu ) { ?>
          jQuery("ul.art-hmenu (li):has(ul)").hover(function () {
            jQuery(this).children("a").removeAttr('href');
			jQuery(this).children("a").removeAttr('title');
            jQuery(this).children("a").css('cursor', 'default');
            jQuery(this).children("a").click(function () {
              return false;
            });
          }); <?php
        } ?>
      </script> <?php
    }
  }
}
// remove parent link from default theme vertical menu function 
if (theme_get_option('theme_menu_disable_parent_vmenu')) {

add_action('wp_footer', 'disable_parent_menu_link_vmenu');
  function disable_parent_menu_link_vmenu () {

    $menus = wp_get_nav_menus();
    if (is_array($menus)) {
      wp_print_scripts('jquery'); ?>
      <script type="text/javascript"> <?php
        foreach ( $menus as $menu ) { ?>
          jQuery("ul.art-vmenu (li):has(ul)").hover(function () {
            jQuery(this).children("a").removeAttr('href');
			jQuery(this).children("a").removeAttr('title');
            jQuery(this).children("a").css('cursor', 'default');
            jQuery(this).children("a").click(function () {
              return false;
            });
          }); <?php
        } ?>
      </script> <?php
    }
  }
}
// remove parent menu link from any menu using wp_nav_menu   
if (theme_get_option('theme_menu_disable_parent_wp_nav')) { 
  add_action('wp_footer', 'disable_parent_menu_link');
  function disable_parent_menu_link () {
    $menus = wp_get_nav_menus();
    if (is_array($menus)) {
      wp_print_scripts('jquery'); ?>
      <script type="text/javascript"> <?php
        foreach ( $menus as $menu ) { ?>
          jQuery("ul (li.menu-item):has(ul.sub-menu)").hover(function () {
            jQuery(this).children("a").removeAttr('href');
            jQuery(this).children("a").css('cursor', 'default');
            jQuery(this).children("a").click(function () {
              return false;
            });
          }); <?php
        } ?>
      </script> <?php
    }
  }
} 
global $default_image;
$default_image = get_template_directory_uri().'/includes/default-image.gif';
$crop_location = 'tl';

// Get only the image url link
function tt_get_the_post_thumbnail_url( $post_id = NULL ) {
    global $id;
    $post_id = ( NULL === $post_id ) ? $id : $post_id;
    $src = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'full');
    $src = $src[0];
    return $src;
}

function art_post_tt($show){
	if ($show == "Yes") {
    the_post(); 
	echo get_template_part('content', 'page');
}
}

function show_slider($sl_show) {
	if ($sl_show == "Yes") {
		if (file_exists(get_template_directory().'/includes/slider.php'))  include (get_template_directory()."/includes/slider.php") ;
}
}

function tt_thumb ($gd_w, $gd_h) {
if ( function_exists( 'get_the_image' ) )
							global $blog_id,$post, $posts, $default_image, $img1, $img2, $crop_location;
							$get_the_image_as_array = get_the_image( array( 'size' => 'full', 'image_scan' => true, 'image_class' => 'alignleft cover', 'format' => 'array' ) ); 
							$img1 = $get_the_image_as_array[url];
							if ($img1 == '') {return;}
							$url = get_bloginfo('url');
							if (is_multisite() && $blog_id != 1 ) {
								$img1 = str_replace($url, '', $img1);
								$img1 = '/wp-content/blogs.dir/' . $blog_id . $img1;} else {$img1 = $img1;}
							echo '<a href="'.post_permalink().'">
							<img class="alignleft cover" src="'.get_bloginfo("template_url").'/timthumb.php?src='.$img1.'&a='.$crop_location.'&w='.$gd_w.'&h='.$gd_h.'&zc=1 />" alt="'.$get_the_image_as_array[alt].'"/>
							</a>';
}

function tt_get_content_all($args = '') {
	$args = wp_parse_args($args, 
		array(
			'feat_img' => '',
			'image_width' => '',
			'image_height' => '',
			'img_pos' => '',
			'img_shad' => '',
			'content_length' => ''
		)
	);
	extract($args);
		global $post, $img1;
		ob_start();
		if ($img_pos == 'After') {the_content_limit($content_length, "");}
		if ($feat_img != 'No' || $img1 != '' ) {
		if ($img_shad == 'Yes' ) {
		?>
		<div class="image-control" style="width:<?php echo $image_width; ?>px;">
		<?php tt_thumb($image_width,$image_height);	?>
		<img class="aligncenter shadow_img" style="margin-top:0px;height: 10px; width: <?php echo $image_width - 0; ?>px; opacity: 0.8;" src="<?php bloginfo('template_url');?>/includes/images/shadow_curl.png"></div>
		<?php } else {
		tt_thumb($image_width,$image_height);
		}
		}
		if ($img_pos == 'Before') {the_content_limit($content_length, "");}
		$content = ob_get_clean();
		return $content ;
	}
function tt_get_content($content_length,$image_width,$image_height) {
		global $post;
		ob_start();
		tt_thumb($image_width,$image_height);
		the_content_limit($content_length, "");
		$content = ob_get_clean();
		return $content ;
	}

function tt_get_content_sh($content_length,$image_width,$image_height,$img_pos,$img_shad) {
		global $post;
		ob_start();
		if ($img_pos == 'Yes') {the_content_limit($content_length, "");}
		if ($img_shad == 'Yes') {
		?><div class="image-control" style="width:<?php echo $image_width; ?>px;><?php
		tt_thumb($image_width,$image_height);
		?><img class="aligncenter shadow_img" style="height: 10px; width: <?php echo $image_width - 0; ?>px; opacity: 0.8;" src="<?php bloginfo('template_url');?>/includes/images/shadow_curl.png"></div><?php
		} else {
		tt_thumb($image_width,$image_height);
		}
		if ($img_pos != 'Yes') {the_content_limit($content_length, "");}
		$content = ob_get_clean();
		return $content ;
	}

function tt_get_post_content() {
    global $post, $art_config, $tt_caption, $tt_content, $m2_content_length, $m2_img_width, $m2_img_height, $m2_style;
	ob_start();

	tt_thumb($m2_img_width,$m2_img_height);
	the_content_limit($m2_content_length, ""); 
	$tt_content = ob_get_clean();
	ob_start();
	if ( $m2_style === 'Yes') {
	?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a>
	<?php } else { ?>
	<h2 class="art-postheader" >
		<a  href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>">
		<?php the_title(); ?>
		</a>
	</h2>
	<?php } ;
	$tt_caption = ob_get_clean();
}

function home_page_header() { 
ob_start();
?>
			 
<div id="home-top-bg">
	<div id="home-top">
		<div class="home-top-left">
			<?php if ( !theme_dynamic_sidebar( 'homeleft' ) ) : ?>
			
				<?php if( function_exists('wp_cycle') ) : ?>
					<?php wp_cycle(); ?>
				<?php endif; ?>
						
			<?php endif; ?>
		</div><!-- end .home-top-left -->
		
		<div class="home-top-right">
		
			<?php if ( !theme_dynamic_sidebar( 'homeright' ) ) : ?>
			<?php $style = theme_get_option('theme_sidebars_style_homeright'); ?>
			<div class="widget">
				<h4><?php _e("Home Top Right", 'THEME_NS'); ?></h4>
				<p><?php _e("This is a widgeted area which is called Home Right. To get started, log into your WordPress dashboard, and then go to the Appearance > Widgets screen. There you can drag a widget into the Home Top widget area on the right hand side.", 'THEME_NS'); ?></p>
			</div>			
			<?php endif; ?>
		</div>
	</div>
</div>
<?php 
$content = ob_get_clean();
		return $content ;
 }
 
 function home_page_header_wide() { 
ob_start();
?>
			 
<div id="home-top-bg">
	<div id="home-top">
			<?php if ( !theme_dynamic_sidebar( 'homeleft' ) ) : ?>
			
				<?php if( function_exists('wp_cycle') ) : ?>
					<?php wp_cycle(); ?>
				<?php endif; ?>
						
			<?php endif; ?>
	</div>
</div>
<?php 
$content = ob_get_clean();
		return $content ;
 }

?>