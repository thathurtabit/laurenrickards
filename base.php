<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php if(!is_tag()) { body_class('container-fluid'); } else { ?>class="container-fluid"<?php } ?>>
    <div class="row full-height">
      <!--[if IE]>
        <div class="alert alert-warning">
          <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
        </div>
      <![endif]-->
      
      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>
      <div class="wrap no-side-padding no-side-margin container-fluid" role="document">
        <div class="content">
          <div id="spinner-wrapper">
            <div class="spinners">
              <div class="spinner1"></div>
              <div class="spinner2"></div>
              <div class="spinner3"></div>
            </div>
          </div>
          <main class="main">
            <?php if ((!is_front_page()) && ( function_exists('yoast_breadcrumb'))) {
            yoast_breadcrumb('<div id="breadcrumbs">','</div>');
            } ?>
            
            <?php include Wrapper\template_path(); ?>
          </main><!-- /.main -->
        </div><!-- /.content -->
      </div><!-- /.wrap -->
      <?php
        do_action('get_footer');
        get_template_part('templates/footer');
        wp_footer();
      ?>
    </div><!-- /row -->
  </body>
</html>
