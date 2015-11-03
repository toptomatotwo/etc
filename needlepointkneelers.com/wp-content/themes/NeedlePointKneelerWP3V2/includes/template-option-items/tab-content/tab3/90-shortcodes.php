	<div id="tab9a" >
	<?php // first column ?>
	
 	<div class="metabox-holder" style="width:710px;">
				<div class="postbox">
		<h3>Shortcodes Help</h3>
			<div class="inside">
				<p>There are a number of new shortcodes available to be used on posts, pages or even in text widgets.</p>
				<h4>What is a shortcode?</h4>
				<p>A shortcode is a WordPress-specific code that lets you do nifty things with very little effort. Shortcodes can embed files or create 
				objects that would normally require lots of complicated, ugly code in just one line. Shortcode = shortcut.</p>
				<h4>What shortcodes are included?</h4>
								
				<h5>Template Tag Shortcodes</h5>
				<p>There are over 40 WordPress <a href="http://codex.wordpress.org/Template_Tags" target="_blank" title="WordPress template tags">template tags</a> that are available to us as shortcodes. These are somewhat 
				avanced shortcodes because they may require some other parameters. So you will need to read the Wordpress documentation and experiment a little.</p>
				<p>Check out this <a href="<?php bloginfo('template_url'); ?>/includes/template-tags.html" target="_blank" title="WordPress template tags">readme file</a> for more information (opens in new window) </p>
				<h5>Arbitrary Widget In Post or Page</h5>
				<p>This shortcode allows you to place a widget of your choice into a post or page.  </p>
				<p> You can add any widget  inside a post, page or any other area that allows you to insert shortcodes, with<br />
					[widget class=WidgetClass]
					<br /><br />
				Example 1: Output the Wordpress Archive Widget as a dropdown with post count:<br /><pre><code>[widget class=WP_Widget_Archives dropdown=1  count=1]</pre></code></p>
				<p>Example 2: Output the Wordpress Text Widget:<br /><pre><code>[widget class=WP_Widget_Text title='Title Goes Here' text='Put some text here']</pre></code> </p>
				<p>Below are a couple of examples of using various widget shortcodes in a page... </p>
				<p><img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/widget.jpg" />
					<img style="margin:0 0 0 25px;" src="<?php bloginfo('template_url'); ?>/includes/template-option-items/widget2.jpg" /></p>
				<p>
				If you want to make text flow around a widget then you need to wrap the shortcode in a DIV and give it a little style. In the picture above on the right you see that the text is wrapping around
				 the widget. Here's how I accomplished that...
				 <pre><code>&lt;div style="width: 200px; float: left;">[widget class=WP_Widget_Archives]&lt;/div></code></pre>
				 
				</p>
				<p>Here are the available Wordpress widgets. the class parameter is required and it needs to have the widget's PHP class name as value. Default Wordpress widget classes are:
				</p>
				<p>
				<ol>
					<li>WP_Widget_Archives (Archives)</li>
					<li>WP_Widget_Calendar (Calendar)</li>
					<li>WP_Widget_Categories (Categories)</li>
					<li>WP_Widget_Links (Links)</li>
					<li>WP_Widget_Meta (Meta)</li>
					<li>WP_Widget_Pages (Pages)</li>
					<li>WP_Widget_Recent_Comments (Recent Comments)</li>
					<li>WP_Widget_Recent_Posts (Recent Posts)</li>
					<li>WP_Widget_RSS (RSS)</li>
					<li>WP_Widget_Search (Search from)</li>
					<li>WP_Widget_Tag_Cloud (Tag Cloud)</li>
					<li>WP_Widget_Text (Text)</li>
				</ol>
				</p><p></p>

            </div>
		</div>
			                 
	</div>
    
	<?php // end first column ?>
    

	
	</div>