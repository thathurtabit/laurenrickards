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
