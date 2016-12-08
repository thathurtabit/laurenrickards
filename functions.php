<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
 

$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);



// Make sure Custom Post Types turn up in Archives
// https://css-tricks.com/snippets/wordpress/make-archives-php-include-custom-post-types/#comment-315155
function custom_post_archive($query) {
if(!is_admin()) {
if (!is_post_type_archive() && $query->is_archive())
  $query->set( 'post_type', array('artblog', 'nav_menu_item', 'post') );
    remove_action( 'pre_get_posts', 'custom_post_archive' );
    }
}
add_action('pre_get_posts', 'custom_post_archive');


// Multiple Featured Images
// https://wordpress.org/plugins/multiple-featured-images/faq/

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
    $args_1 = array(
        'id' => 'featured-image-2',
        'desc' => 'Your description here.',
        'label_name' => 'Featured Image 2',
        'label_set' => 'Set featured image 2',
        'label_remove' => 'Remove featured image 2',
        'label_use' => 'Set featured image 2',
        'post_type' => array( 'post' ),
    );

    $args_2 = array(
        'id' => 'featured-image-3',
        'desc' => 'Your description here.',
        'label_name' => 'Featured Image 3',
        'label_set' => 'Set featured image 3',
        'label_remove' => 'Remove featured image 3',
        'label_use' => 'Set featured image 3',
        'post_type' => array( 'post' ),
    );

    $featured_images[] = $args_1;
    $featured_images[] = $args_2;

    return $featured_images;
});