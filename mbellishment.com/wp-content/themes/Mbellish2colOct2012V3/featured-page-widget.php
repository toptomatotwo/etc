<?php

add_action( 'widgets_init', 'example_load_widgets2' );


function example_load_widgets2() {
	register_widget( 'TT_Featured_Page' );
}

class TT_Featured_Page extends WP_Widget {


	function TT_Featured_Page() {
            

		$this->defaults = array(
			'title'           => '',
			'page_id'         => '',
			'show_title'      => 0,
			'show_byline'     => 0,
			'show_content'    => 0,

		);

		$widget_ops = array(
			'classname'   => 'featuredpage',
			'description' => __( 'Displays a featured page. Uses the themes default style for thumbnails and excerpt length which are defined in the Theme Options tab.', 'THEME_NS' ),
		);

		$control_ops = array(
			'id_base' => 'featured-page',
			'width'   => 200,
			'height'  => 250,
		);

		$this->WP_Widget( 'featured-page', __( 'Featured Page', 'THEME_NS' ), $widget_ops, $control_ops );

	}

	/**
	 * Echo the widget content.
	 *
	 * @since 0.1.8
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget( $args, $instance ) {

		extract( $args );

		/** Merge with defaults */
                
		$instance = wp_parse_args( (array) $instance, $this->defaults );

		echo $before_widget;

		/** Set up the author bio */
		if ( ! empty( $instance['title'] ) )
			echo $before_title . apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base ) . $after_title;

		$featured_page = new WP_Query( array( 'page_id' => $instance['page_id'] ) );
                global $custom_sidebar_style; if (!$custom_sidebar_style){$custom_sidebar_style = 'theme_post_wrapper';}
                
		if ( $featured_page->have_posts() ) : while ( $featured_page->have_posts() ) : $featured_page->the_post();

            $custom_sidebar_style(
		array(
			'id' => theme_get_post_id(), 
			'class' => theme_get_post_class(),
			'thumbnail' => $instance['show_image'] ? theme_get_post_thumbnail() : '',
			'title' => $instance['show_title'] ? '<a href="' . get_permalink( $post->ID ) . '" rel="bookmark" title="' . strip_tags(get_the_title()) . '">' . get_the_title() . '</a>' : '', 
        		'heading' => theme_get_option('theme_'.(is_single()?'single':'posts').'_article_title_tag'),
			'before' => $instance['post_header_info'] ? theme_get_metadata_icons( 'date,author,edit', 'header' ) : '',
			'content' => $instance['show_content'] ? theme_get_content() : theme_get_excerpt(), 
			'after' => ''
		)
	);

			endwhile;
		endif;

		echo $after_widget;
		wp_reset_query();

	}

	/**
	 * Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @since 0.1.8
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update( $new_instance, $old_instance ) {

		$new_instance['title']     = strip_tags( $new_instance['title'] );
		$new_instance['more_text'] = strip_tags( $new_instance['more_text'] );
		return $new_instance;

	}

	/**
	 * Echo the settings update form.
	 *
	 * @since 0.1.8
	 *
	 * @param array $instance Current settings
	 */
	function form( $instance ) {

		/** Merge with defaults */
            $defaults = $this->defaults;
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', 'THEME_NS' ); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e( 'Page', 'THEME_NS' ); ?>:</label>
			<?php wp_dropdown_pages( array( 'name' => $this->get_field_name( 'page_id' ), 'selected' => $instance['page_id'] ) ); ?>
		</p>

		<hr class="div" />



		<p>
			<input id="<?php echo $this->get_field_id( 'show_title' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_title' ); ?>" value="1"<?php checked( $instance['show_title'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_title' ); ?>"><?php _e( 'Show Page Title', 'THEME_NS' ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_byline' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_byline' ); ?>" value="1"<?php checked( $instance['show_byline'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_byline' ); ?>"><?php _e( 'Show Page Author', 'THEME_NS' ); ?></label>
		</p>

		<p>
			<input id="<?php echo $this->get_field_id( 'show_content' ); ?>" type="checkbox" name="<?php echo $this->get_field_name( 'show_content' ); ?>" value="1"<?php checked( $instance['show_content'] ); ?> />
			<label for="<?php echo $this->get_field_id( 'show_content' ); ?>"><?php _e( 'Show Page Content', 'THEME_NS' ); ?></label>
           		<select id="<?php echo $this->get_field_id( 'show_content' ); ?>" name="<?php echo $this->get_field_name( 'show_content' ); ?>">
			<option value="1" <?php selected( '1' , $instance['show_content'] ); ?>><?php _e( 'Show Content', THEME_NS ); ?></option>
			<option value="0" <?php selected( '0' , $instance['show_content'] ); ?>><?php _e( 'Show Excerpt', THEME_NS ); ?></option>
						
			</select>
		</p>


		<?php

	}

}