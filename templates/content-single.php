<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <header>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header>

    <div class="row">

      <div class="col-md-6 single-post-text">

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        

      </div><!-- / col -->

      <div class="col-md-6">

        <?php
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) { ?>

        <a href="<?php the_post_thumbnail_url('full'); ?>" target="_blank" title="See full image.">
          <?php the_post_thumbnail('single-page-img'); ?>
        </a>
       
        <?php } 

        else {
          echo "No image yet :(";
        }
        ?>

      </div><!-- / col -->

    </div><!-- / row -->

    
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
