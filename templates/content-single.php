<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

        <header class="page-header">
          <h1 class="entry-title"><?php the_title(); ?>
            <!-- If this item is for sale, then show the button -->
            <?php if( get_field('buy_url') ): ?>  
              <a href="<?php the_field('buy_url'); ?>" class="btn-buy" target="_blank" title="Buy this item.">Buy</a>            
            <?php endif; ?>
            <!-- / End sale button -->
          </h1>        

          <?php if('artblog' == get_post_type($wp_query->post->ID)) { ?>
            <div class="post-meta">
              <time class="post-meta-child"><i class="fa fa-calendar"></i> <?php the_date(); ?></time>
              <?php if(has_category()) { ?>
                <div class="post-cat post-meta-child">
                  <?php if(has_category()) { ?>
                    <i class="fa fa-folder-open-o"></i> <?php the_category(', '); ?>
                  <?php } ?>
                </div>
              <?php } ?>
            </div>
          <?php } else { ?>

          <?php if(has_category()) { ?>
            <div class="post-meta">
              <div class="post-cat">                
                  <i class="fa fa-folder-open-o"></i> <?php the_category(', '); ?>                
              </div>
            </div>
            <?php } ?>

          <?php } ?>
        </header>

    <div class="row">

      <div class="<?php if('artblog' == get_post_type($wp_query->post->ID)) { ?>col-md-12 col-lg-7 col-xl-7 col-xxl-5<?php } else { ?>col-lg-6 col-xl-6 col-xxl-5<?php } ?> single-post-text">

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

        <!-- If this item is for sale, then show the button -->
            <?php if( get_field('buy_url') ): ?>  
              <a href="<?php the_field('buy_url'); ?>" class="btn-buy" target="_blank" title="Buy this item.">Buy</a>            
            <?php endif; ?>
            <!-- / End sale button -->



      <footer>
        <?php 
        // IF THE POST HAS TAGS
        $post_tags = wp_get_post_tags($post->ID);
        if(!empty($post_tags)) { ?>
          <div class="post-tags">
              <?php the_tags( '<i class="fa fa-tags"></i><ul><li>', '</li><li>', '</li></ul>' ); ?>
          </div>
          
        <?php } ?>

        <div class="nav-links">
          <div class="nav-previous">
            <?php previous_post_link('%link'); ?>
          </div>
          <div class="nav-next">
            <?php next_post_link('%link'); ?>
          </div>
        </div> <!-- end navigation -->

      </footer>
        

      </div><!-- / col -->


      <?php
        // check if the post has a Post Thumbnail assigned to it.
        if ( has_post_thumbnail() ) { ?>

        <div class="<?php if('artblog' == get_post_type($wp_query->post->ID)) { ?>col-md-8 col-lg-5 artblog-thumb-col<?php } else { ?>col-lg-6 col-xl-6 col-xxl-5 gallery-col<?php } ?>">

          
         
          <?php if (kdmfi_has_featured_image( 'featured-image-2') || kdmfi_has_featured_image( 'featured-image-3')) { ?>

              <div class="image-slider">
                <!-- SLIDE 1 -->
                <div class="image-slide">
                  <a href="<?php the_post_thumbnail_url('full'); ?>" target="_blank" title="See full image.">
                    <?php the_post_thumbnail('single-page-img'); ?>
                  </a>
                </div>

                <!-- SLIDE 2 -->
                <div class="image-slide">
                  <a href="<?php echo kdmfi_get_featured_image_src( 'featured-image-2'); ?>" target="_blank" title="See full image.">
                    <?php kdmfi_the_featured_image( 'featured-image-2', 'single-page-img' );  ?>
                  </a>
                </div>

                <!-- SLIDE 3 -->
                 <div class="image-slide">
                  <a href="<?php echo kdmfi_get_featured_image_src( 'featured-image-3'); ?>" target="_blank" title="See full image.">
                    <?php kdmfi_the_featured_image( 'featured-image-3', 'single-page-img' );  ?>
                  </a>
                </div>

              </div>

          <?php } else { ?>

            <!-- JUST A SINGLE IMG -->
            <a href="<?php the_post_thumbnail_url('full'); ?>" target="_blank" title="See full image.">
              <?php the_post_thumbnail('single-page-img'); ?>
            </a>

          <?php } ?>

        
             
        </div><!-- / col -->

      <?php } ?>

    </div><!-- / row -->

    
    
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
