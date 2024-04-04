<?php 
/*
Template Name: お問い合わせページ用
*/
?>
<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php if(function_exists('bcn_display'))
{
	bcn_display();
}?>
</div>
<div id="form_contents">
<?php if (have_posts()) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<article>
<?php remove_filter('the_content', 'wpautop'); ?>
<h2 class="h_style01"><?php the_title(); ?></h2>
<?php the_content(); ?>
<p class="center"><a href="<?php echo home_url(); ?>">TOPページへ戻る</a></p>
</article>
<?php endwhile; // End the loop. Whew. ?>
<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>