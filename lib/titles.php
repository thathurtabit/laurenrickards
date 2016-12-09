<?php

namespace Roots\Sage\Titles;


// REMOVE LABEL FROM ARCHIVE: https://developer.wordpress.org/reference/functions/get_the_archive_title/#comment-1807
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );


/**
 * Page titles
 */
function title() {
  if (is_front_page()) {

    $post_id = 57; //home page ?>

    <span class="first-line"><?php if( get_field('first-line', $post_id)): the_field('first-line', $post_id); endif; ?></span>
      <span class="second-line"><?php if( get_field('second-line', $post_id)): the_field('second-line', $post_id);  endif; ?></span>
      
    <?php 

  } elseif (is_home()) {
    return __('Artwork', 'sage');
  } elseif (is_archive()) {
    return my_theme_archive_title($title);
  } elseif (is_search()) {
    return sprintf(__('Search Results for %s', 'sage'), get_search_query());
  } elseif (is_404()) {
    return __('Not Found', 'sage');
  } else {
    return get_the_title();
  }
}
