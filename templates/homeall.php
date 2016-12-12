<div class="posts-wrapper row">
<?php 

	// Get current page and append to custom query parameters array
	// http://callmenick.com/post/custom-wordpress-loop-with-pagination

	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

?>

<?php
	// https://www.binarymoon.co.uk/2010/03/5-wordpress-queryposts-tips/
	$query = array(
		'paged' => $paged,
		'posts_per_page' => 30,
		'post_type' => array('post', 'artblog')
	);

	$temp = $wp_query;
	$wp_query= null;

	// My Query
	$wp_query = new WP_Query($query);


	// While loop
	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

		<?php  include( TEMPLATEPATH . '/templates/content.php' ); ?>
		

	<?php endwhile; ?>

</div>


<?php the_posts_navigation(); ?>


	<?php else: ?>
	  <article>
	    <h1>Sorry...</h1>
	    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	  </article>
	<?php endif; ?>

	
