<?php // If it's a Blog post, display it differently
		  if ('artblog' == get_post_type($wp_query->post->ID)) { ?>

		  <article <?php post_class('artblog-post'); ?>>
			<a href="<?php the_permalink(); ?>">
			  	
			  	<div class="post-thumb-content">
			  		<i class="fa fa-bookmark post-icon"></i>

				  <header>
				    <h2 class="entry-title"><?php the_title(); ?></h2>
				  </header>

			  
				  <p><?php
			      	// GET THE CONTENT
					$content = get_the_content();
					echo wp_trim_words( $content , '15' ); ?></p>

				  <p class="btn-more">More</p>
				</div>

			  </a>
		</article>

	<?php // else if it's a standard gallery post 
	 } else { ?>


		<article <?php post_class('gallery-post'); ?>>
		<a href="<?php the_permalink(); ?>">
		  <header>
		    <h2 class="entry-title"><?php the_title(); ?></h2>
		  </header>

		  <?php
			// check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) { ?>

			<i class="fa fa-image post-icon"></i>

				<?php
				
				the_post_thumbnail('thumbnail');

			} else { ?>
				<div class="face no-thumbnail">
			        <div class="eye-l"></div>
			        <div class="eye-r"></div>
			        <div class="mouth"></div>
			    </div>
			<?php } ?>

			</a>
		</article>

	<?php } // end conditional content ?>