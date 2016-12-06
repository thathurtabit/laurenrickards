<div class="posts-wrapper">
<?php 

	// Get current page and append to custom query parameters array
	// http://callmenick.com/post/custom-wordpress-loop-with-pagination

	$paged = ( get_query_var('page') ) ? get_query_var('page') : 1;

?>

<?php
	// https://www.binarymoon.co.uk/2010/03/5-wordpress-queryposts-tips/
	$query = array(
		'paged' => $paged,
		'posts_per_page' => 4,
		'post_type' => array('post', 'blog')
	);

	$temp = $wp_query;
	$wp_query= null;

	// My Query
	$wp_query = new WP_Query($query);


	// While loop
	if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

		<article <?php post_class('col-md-2'); ?>>
		<a href="<?php the_permalink(); ?>">
		  <header>
		    <h2 class="entry-title"><?php the_title(); ?></h2>
		  </header>

			<?php
			// check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('thumbnail');
			} 

			else {
				echo "No image yet :(";
			}
			?>
		</a>
	</article>


	<?php endwhile; ?>

	

	<?php if ($wp_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
	  <nav class="prev-next-wrap row">
	    <div class="next-posts-link">
	      <?php next_posts_link('Next'); ?>
	    </div>
	    <div class="prev-posts-link">
	      <?php previous_posts_link('Prev'); ?>
	    </div>
	  </nav>
	<?php } ?>

<?php
$wp_query = null;
$wp_query = $temp;
wp_reset_query(); ?>


	<?php else: ?>
	  <article>
	    <h1>Sorry...</h1>
	    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	  </article>
	<?php endif; ?>

	
