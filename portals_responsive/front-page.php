<?php get_header(); ?>
<?php //dynamic_sidebar( 'トップページ（上）' ); ?>
<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php remove_filter('the_content', 'wpautop'); ?>
<div class="block_wrapper">
	<?php the_content(); ?>
</div>
<?php endwhile; // End the loop. Whew. ?>
<?php endif; ?>
<?php //get_template_part('inc/news'); ?>
<?php //get_template_part('inc/voice'); ?>
<?php //dynamic_sidebar( 'トップページ（下）' ); ?>
<?php get_template_part('inc/contact'); ?>
<?php get_template_part('inc/footer_bnr'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>