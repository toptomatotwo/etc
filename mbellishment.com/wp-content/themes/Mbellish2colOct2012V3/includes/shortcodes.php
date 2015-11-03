<?php
// single-post
//...............................................
function shortcode_single_post( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'id' => '',
                'style' => 'post',
                'display' => 'excerpt',
		'title' => ''
    ), $atts));
      $display = 'theme_get_'.$display; 
      $style = 'theme_'.$style.'_wrapper';
ob_start();      
      $custom_query = new WP_Query(array ('p' => $id));
	query_posts($custom_query);
       
	while($custom_query->have_posts()) : $custom_query->the_post();
              if ($title == 'yes') { $post_title = '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . strip_tags(get_the_title()) . '">' . get_the_title() . '</a>'; }
	
              $style(
		array(
			'title' => $post_title,
			'content' => $display()
));	 

    endwhile; 
    wp_reset_query();
    
    $content = ob_get_clean();

return $content;

}
add_shortcode('single-post', 'shortcode_single_post');

// ************************ Website Snapshot ****************************
function tt_snap($atts, $content = null) {
        extract(shortcode_atts(array(
			"snap" => 'http://s.wordpress.com/mshots/v1/',
			"url" => get_template_directory(),
			"alt" => 'Image text',
			"w" => '400', // width
			"h" => '300', // height
                        "align" => 'left'
        ), $atts));

		$img = '<img class="align'.$align. '" src="' . $snap . '' . urlencode($url) . '?w=' . $w . '&h=' . $h . '" alt="' . $alt . '"/>';
        return $img;
}
add_shortcode("sitesnap", "tt_snap");


?>