<?php get_header(); ?>
<?php global $sb_primary,$sb_secondary ;$sb_primary = 'default';$sb_secondary = 'secondary'; ?>
   	<?php ob_start(); ?>
   	<?php
if(get_query_var('author_name')) :
$curauth = get_userdatabylogin(get_query_var('author_name'));
else :
$curauth = get_userdata(get_query_var('author'));
endif;
?>
<h2 class="page-title author"><?php printf( __( 'Author Archives: %s', 'twentyeleven' ), '<span class="vcard">' . $curauth->display_name . '</span>' ); ?></h2>

		<?php

		if ( $curauth->description ) : ?>
		<div id="author-info">
			<div id="author-avatar">
				<?php echo theme_get_avatar(array('id' => $curauth->user_email, 'size' => 80)).$curauth->description; ?>
			</div>
		</div>
<h3><?php  echo __('Posts by ').$curauth->display_name ; ?></h3>
	<?php 
	$query = new WP_Query( array(
									'author' => $curauth->ID,
									'posts_per_page' => -1

									) ); ?>
    <ul>  
    
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>  
    <li>  
    	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a>   
    </li>  
    <?php endwhile; ?>  
 
    </ul>  
	<?php endif; ?>
	<?php $author_content = ob_get_clean(); ?>
<?php if (theme_get_option('top_sidebar_author') && theme_get_option('top_sidebar_wide_author')) {get_sidebar('top');} ?>
<?php tt_get_header_layout(); ?>
<?php if (theme_get_option('top_sidebar_author') && !theme_get_option('top_sidebar_wide_author')) {get_sidebar('top');} ?>
			<?php if (theme_get_option('tt_author_page') == 1 ) {
	theme_post_wrapper(
		array(
				'id' => theme_get_post_id(), 
				'class' => theme_get_post_class(),
				'content' => $author_content 
		)
	); 
	} else { ?>
			<?php 
				if (have_posts()){
				
					global $posts;
					$post = $posts[0];
					
					ob_start();
			
					if (is_category()) {
					
						echo '<h4>'. single_cat_title( '', false ) . '</h4>';
						echo category_description();
						
					} elseif( is_tag() ) {
					
						echo '<h4>'. single_tag_title('', false) . '</h4>';
						
					} elseif( is_day() ) {
					
						echo '<h4>'. sprintf(__('Daily Archives: <span>%s</span>', THEME_NS), get_the_date()) . '</h4>';
						
					} elseif( is_month() ) {
					
						echo '<h4>'. sprintf(__('Monthly Archives: <span>%s</span>', THEME_NS), get_the_date('F Y')) . '</h4>';
						
					} elseif( is_year() ) {
					
						echo '<h4>'. sprintf(__('Yearly Archives: <span>%s</span>', THEME_NS), get_the_date('Y')) . '</h4>';
						
					} elseif( is_author() ) {
					
						the_post();
						echo theme_get_avatar(array('id' => get_the_author_meta('user_email')));
						echo '<h4>'. get_the_author() . '</h4>';
						$desc = get_the_author_meta('description');
						if ($desc) echo '<div class="author-description">' . $desc . '</div>';
						rewind_posts();
						
					} elseif( isset($_GET['paged']) && !empty($_GET['paged']) ) {
					
						 echo '<h4>'. __('Blog Archives', THEME_NS) . '</h4>';
						 
					}
					theme_post_wrapper(array('content' => ob_get_clean(), 'class' => 'breadcrumbs'));
					
					/* Display navigation to next/previous pages when applicable */
					if (theme_get_option('theme_top_posts_navigation')) {
						theme_page_navigation();
					}
					
					/* Start the Loop */ 
					while (have_posts()) {
						the_post();
						get_template_part('content', 'single');
					}
						
					/* Display navigation to next/previous pages when applicable */
					if (theme_get_option('theme_bottom_posts_navigation')) {
						theme_page_navigation();
					}
						
				} else {  
					  
					theme_404_content();
					
				} 
			?>


<?php	}	    ?>
<?php if (theme_get_option('bot_sidebar_author') && !theme_get_option('bot_sidebar_wide_author')) {get_sidebar('bottom');} ?>
<?php tt_get_footer_layout(); ?>
<?php if (theme_get_option('bot_sidebar_author') && theme_get_option('bot_sidebar_wide_author')) {get_sidebar('bottom');} ?>
<?php get_footer(); ?>





