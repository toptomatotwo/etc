<?php 

if(!function_exists('get_the_image')) {
include(TEMPLATEPATH."/includes/get-the-image.php");}

if(!function_exists('get_post_templates')) {
	include(TEMPLATEPATH."/includes/post_templates.php");}

if ((tt_option('header_mods_enable')) == 'Yes') {
function make_header_widget() {	
	if (function_exists('register_sidebars')) {
		register_sidebars(1, array(
			'name' => 'Header Right',
			'description' => 'This is the right side of the header. Use the template options under "Header" to define it\'s size & position.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'before_title' => '<h4>',
			'after_title' => '</h4>',
			'after_widget' => '</div>'
		));
	}	
}
}

function add_tabber_script() { ?>
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/tabview/assets/skins/sam/tabview.css" />
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/yahoo-dom-event/yahoo-dom-event.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/element/element-min.js"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.8.1/build/tabview/tabview-min.js"></script>
<style type='text/css'>
	.option-title	{
	background:url('<?php bloginfo('template_url'); ?>/includes/palette-icon-48.png') no-repeat scroll top left transparent;
	padding:0 0 10px 55px;
	margin-top:20px;
	}
</style>
<?php }

add_action( 'admin_head', 'add_tabber_script' );

// add post_thumbnail support
if ( function_exists('add_theme_support') )
  add_theme_support('post-thumbnails');
  
  // Turn a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}
if(!function_exists('the_content_limit')) {
// The content limit. Usage: the_content_limit(80, "")
function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
    $content = get_the_content($more_link_text, $stripteaser, $more_file);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    $content = strip_tags($content);

   if (strlen($_GET['p']) > 0) {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>".__("Read More", 'kubrick')." &rarr;</a>";
      echo "</p>";
   }
   else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
        $content = substr($content, 0, $espacio);
        $content = $content;
        echo "<p>";
        echo $content;
        echo "...";
        echo "&nbsp;<a href='";
        the_permalink();
        echo "'>".$more_link_text."</a>";
        echo "</p>";
   }
   else {
      echo "<p>";
      echo $content;
      echo "&nbsp;<a href='";
      the_permalink();
      echo "'>".__("Read More", 'kubrick')." &rarr;</a>";
      echo "</p>";
   }
}
}
// allow shortcode in sidebar
add_filter('widget_text', 'do_shortcode');

// call a widget with a shortcode
// usage [widget class="Your_Custom_Widget"] see http://codex.wordpress.org/Template_Tags/the_widget
// [widget class=WP_Widget_Archives dropdown=1 count=1] display archives as a drop down list with post count
function widget($atts) {
    global $wp_widget_factory;
    extract(shortcode_atts(array(
        'class' => FALSE
    ), $atts));
	
    ob_start();    
    $class = wp_specialchars($class);
    
    if (!is_a($wp_widget_factory->widgets[$class], 'WP_Widget')):
        $wp_class = 'WP_Widget_'.ucwords(strtolower($class));
        if (!is_a($wp_widget_factory->widgets[$wp_class], 'WP_Widget')):
            return '<p>'.sprintf(__("%s: Widget class not found. Make sure this widget exists and the class name is correct"),'<strong>'.$class.'</strong>').'</p>';
        else:
            $class = $wp_class;
        endif;
    endif;

  $instance = array(); // other attributes
  foreach($atts as $att=>$val):
   if ($att!="class") $instance[wp_specialchars($att)]=wp_specialchars($val);
  endforeach;

  $id = $class;
  $classname = $wp_widget_factory->widgets[$class]->widget_options['classname'];
  if(!$classname) $classname = $id;

  if(isset($instance['widget_id'])) $id= $instance['widget_id'];	

    the_widget($class, $instance, array(
		'widget_id'=>'arbitrary-instance-'.$id,
			'before_widget' => '<div class="art-block">
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
',
			'before_title' => '<div class="art-blockheader">
    <div class="l"></div>
    <div class="r"></div>
     <div class="t">',
			'after_title' => '</div>
</div>
<div class="art-blockcontent">
    <div class="art-blockcontent-body">
<!-- block-content -->
',
			'after_widget' => '
<!-- /block-content -->

		<div class="cleared"></div>
    </div>
</div>

		<div class="cleared"></div>
    </div>
</div>
'
    ));
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
    
}
add_shortcode('widget','widget'); 


  
?>