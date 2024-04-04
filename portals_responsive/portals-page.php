<?php
/*
Template Name: portals用
Template Post Type: contents, method, page
*/
?>
<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
  <?php if(function_exists('bcn_display'))
  {
   bcn_display();
  }?>
</div>
<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<?php the_content(); ?>
<?php endwhile; // End the loop. Whew. ?>
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
