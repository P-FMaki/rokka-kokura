<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php if(function_exists('bcn_display'))
{
	bcn_display();
}?>
</div>
<?php
$args=array(
	'post_type' => 'news',
	'posts_per_page' => '5',
	'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1
);
$my_query = new WP_Query( $args );
?>
<!--新着情報-->
<section class="news_sec">
	<h2 class="h_style01">新着情報</h2>
	<?php if ( $my_query->have_posts() ) : ?>
	<div class="conts">
		<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
		<article class="news_post">

			<div class="news_box">
				<h2 class="news_ttl">
					<span class="<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->slug; } ?> news_cat">	
						<?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
					<span><?php the_title(); ?></span>
					<span class="news_date"><?php the_time("Y年m月j日") ?></span>
				</h2>
				<?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
				<?php the_content('続きを読む'); ?>
			</div>
		</article>
		<?php endwhile; ?>
	</div>
</section>
<?php endif; wp_reset_postdata();?>

<?php
$GLOBALS['wp_query']->max_num_pages = $my_query->max_num_pages;
?>
<?php get_template_part('inc/pager'); ?>
<!-- post navigation -->
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
