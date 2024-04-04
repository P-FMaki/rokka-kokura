<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php if(function_exists('bcn_display'))
{
	bcn_display();
}?>
</div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<article>
  <h1 class="h_style01"><?php the_title(); ?></h1>
  <div class="block_wrapper">
		<?php the_content('続きを読む'); ?>
	</div>
</article>
	<?php endwhile; // End the loop. Whew. ?>
	<?php endif; ?>

<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
