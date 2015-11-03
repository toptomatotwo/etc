<?php

add_action( 'widgets_init', 'example_load_widgets' );

function example_load_widgets() {
	register_widget( 'TT_Featured_Post' );
}
class TT_Featured_Post extends WP_Widget {

	/**
	 * Holds widget settings defaults, populated in constructor.
	 *
	 * @var array
	 */
	protected $defaults;

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function __construct() {

		$this->defaults = array(
			'title'                   => '',
			'posts_cat'               => '',
			'posts_num'               => 1,
			'posts_offset'            => 0,
			'orderby'                 => '',
			'order'                   => '',
			'show_title'              => 0,
			'post_header_info'        => 0,
            'post_footer_info'        => 0,
			'show_content'            => 0,

		);

		$widget_ops = array(
			'classname'   => 'featuredpost',
			'description' => __( 'Displays featured posts. Uses the themes default style for thumbnails and excerpt length which are defined in the Theme Options tab.', THEME_NS ),
		);

		$control_ops = array(
			'id_base' => 'featured-post',
			'width'   => 200,
			'height'  => 250,
		);

		$this->WP_Widget( 'featured-post', __( 'Featured Posts', THEME_NS ), $widget_ops, $control_ops );

	}

	/**
	 * Echo the widget content.
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		/** Set up the author bio */
		if ( ! empty( $instance['title'] ) )
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

		$query_args = array(
			'post_type' => 'post',
			'cat'       => $instance['posts_cat'],
			'showposts' => $instance['posts_num'],
			'offset'    => $instance['posts_offset'],
			'orderby'   => $instance['orderby'],
			'order'     => $instance['order'],
		);

		$featured_posts = new WP_Query( $query_args );
                $post_style = 'theme_post_wrapper';
                global $custom_sidebar_style; if (!$custom_sidebar_style){$custom_sidebar_style = 'theme_post_wrapper';}
		if ( $featured_posts->have_posts() ) : while ( $featured_posts->have_posts() ) : $featured_posts->the_post();
                        
            $custom_sidebar_style(
		array(
			'id' => theme_get_post_id(), 
			'class' => theme_get_post_class(),
			'thumbnail' => $instance['show_image'] ? theme_get_post_thumbnail() : '',
			'title' => $instance['show_title'] ? '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . strip_tags(get_the_title()) . '">' . get_the_title() . '</a>' : '', 
        	'heading' => theme_get_option('theme_'.(is_single()?'single':'posts').'_article_title_tag'),
			'before' => $instance['post_header_info'] ? theme_get_metadata_icons( 'date,author,edit', 'header' ) : '',
			'content' => $instance['show_content'] ? theme_get_content() : theme_get_excerpt(), 
			'after' => $instance['post_footer_info'] ? theme_get_metadata_icons( 'category,tag,comments', 'footer' ) : ''
		)
	);


		endwhile; endif;

		echo $after_widget;
		wp_reset_query();

	}

	/**
	 * Update a particular instance.
	 */
	function update( $new_instance, $old_instance ) {

		$new_instance['title']     = strip_tags( $new_instance['title'] );
		$new_instance['more_text'] = strip_tags( $new_instance['more_text'] );
		$new_instance['post_info'] = wp_kses_post( $new_instance['post_info'] );
		return $new_instance;

	}

	/**
	 * Echo the settings update form.
	 */
	function form( $instance ) {

		/** Merge with defaults */
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', THEME_NS ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>


				<p>
					<label for="<?php echo $this->get_field_id( 'posts_cat' ); ?>"><?php _e( 'Category', THEME_NS ); ?>:</label>
					<?php
					$categories_args = array(
						'name'            => $this->get_field_name( 'posts_cat' ),
						'selected'        => $instance['posts_cat'],
						'orderby'         => 'Name',
						'hierarchical'    => 1,
						'show_option_all' => __( 'All Categories', THEME_NS ),
						'hide_empty'      => '0',
					);
					wp_dropdown_categories( $categories_args ); ?>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'posts_num' ); ?>"><?php _e( 'Number of Posts to Show', THEME_NS ); ?>:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'posts_num' ); ?>" name="<?php echo $this->get_field_name( 'posts_num' ); ?>" value="<?php echo esc_attr( $instance['posts_num'] ); ?>" size="2" />
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'posts_offset' ); ?>"><?php _e( 'Number of Posts to Offset', THEME_NS ); ?>:</label>
					<input type="text" id="<?php echo $this->get_field_id( 'posts_offset' ); ?>" name="<?php echo $this->get_field_name( 'posts_offset' ); ?>" value="<?php echo esc_attr( $instance['posts_offset'] ); ?>" size="2" />
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'orderby' ); ?>"><?php _e( 'Order By', THEME_NS ); ?>:</label>
					<select id="<?php echo $this->get_field_id( 'orderby' ); ?>" name="<?php echo $this->get_field_name( 'orderby' ); ?>">
						<option value="date" <?php selected( 'date', $instance['orderby'] ); ?>><?php _e( 'Date', THEME_NS ); ?></option>
						<option value="title" <?php selected( 'title', $instance['orderby'] ); ?>><?php _e( 'Title', THEME_NS ); ?></option>
						<option value="parent" <?php selected( 'parent', $instance['orderby'] ); ?>><?php _e( 'Parent', THEME_NS ); ?></option>
						<option value="ID" <?php selected( 'ID', $instance['orderby'] ); ?>><?php _e( 'ID', THEME_NS ); ?></option>
						<option value="comment_count" <?php selected( 'comment_count', $instance['orderby'] ); ?>><?php _e( 'Comment Count', THEME_NS ); ?></option>
						<option value="rand" <?php selected( 'rand', $instance['orderby'] ); ?>><?php _e( 'Random', THEME_NS ); ?></option>
					</select>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'order' ); ?>"><?php _e( 'Sort Order', THEME_NS ); ?>:</label>
					<select id="<?php echo $this->get_field_id( 'order' ); ?>" name="<?php echo $this->get_field_name( 'order' ); ?>">
						<option value="DESC" <?php selected( 'DESC', $instance['order'] ); ?>><?php _e( 'Descending (3, 2, 1)', THEME_NS ); ?></option>
						<option value="ASC" <?php selected( 'ASC', $instance['order'] ); ?>><?php _e( 'Ascending (1, 2, 3)', THEME_NS ); ?></option>
					</select>
				</p>


				<p>
					<input id="<?php echo $this->get_field_id( 'show_title' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_title' ); ?>" value="1" <?php checked( $instance['show_title'] ); ?>/>
					<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show Post Title', THEME_NS ); ?></label>
				</p>

				<p>
					<input id="<?php echo $this->get_field_id( 'post_header_info' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'post_header_info' ); ?>" value="1" <?php checked( $instance['post_header_info'] ); ?>/>
                                        <label for="<?php echo $this->get_field_id( 'post_header_info' ); ?>"><?php _e( ' Show Post Header Info (text/icons)', THEME_NS ); ?></label>
				</p>

				<p>
					<input id="<?php echo $this->get_field_id( 'post_footer_info' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'post_footer_info' ); ?>" value="1" <?php checked( $instance['post_footer_info'] ); ?>/>
                                <label for="<?php echo $this->get_field_id( 'post_footer_info' ); ?>"><?php _e( ' Show Post Footer Info (text/icons)', THEME_NS ); ?></label>
				</p>

				<p>
					<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Content Type', THEME_NS ); ?>:</label>
					<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>">
						<option value="1" <?php selected( '1' , $instance['show_content'] ); ?>><?php _e( 'Show Content', THEME_NS ); ?></option>
						<option value="0" <?php selected( '0' , $instance['show_content'] ); ?>><?php _e( 'Show Excerpt', THEME_NS ); ?></option>
						
					</select>
					<br />
					
				</p>


		<?php

	}

}
