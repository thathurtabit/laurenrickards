<article <?php post_class(); ?>>

    <div class="row">

      <div class="col-md-4">

        <div class="entry-content">
          <?php the_content(); ?>
        </div>
        
      </div><!-- / col -->

      <div class="col-md-2">

        <?php
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) { ?>
        
          <?php the_post_thumbnail('single-page-img'); ?>
       
        <?php } 

        else {
          echo "No image yet :(";
        }
        ?>

      </div><!-- / col -->

    </div><!-- / row -->
    
  </article>

