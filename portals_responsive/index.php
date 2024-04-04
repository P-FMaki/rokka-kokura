<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php if(function_exists('bcn_display'))
{
	bcn_display();
}?>
</div>
<h1 class="h_style01">記事一覧</h1>
<?php if (have_posts()) : ?>
<ul class="blog_list">
	<?php while (have_posts()) : the_post(); ?>
	<li>
		<article class="post_box">
			<?php if(has_post_thumbnail()){
	$image_id = get_post_thumbnail_id();
	$image = wp_get_attachment_image_src( $image_id , "large" );
	$image_src = $image[0];
}else{
	$image_src = get_template_directory_uri() . "/image/all/noimage.png";
}
			?>
			<div class="post_box_thumb">
				<a href="<?php echo get_permalink(); ?>"><div class="post_box_thumb_img" style="background-image:url(<?php echo $image_src; ?>);"></div></a>
			</div>
			<div class="post_box_post">
				<time><?php the_time("Y年m月j日") ?></time>
				<h2 class="post_box_post_ttl"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="post_box_info">
				<p class="post_box_info_cat">
					<?php
					$cat = get_the_category(); 
					$cat_id = $cat[0]->term_id;
					echo get_category_parents( $cat_id, true, "" );
					?>
				</p>
			</div>
		</article>
	</li>
	<?php endwhile; ?>
</ul>
<?php else : ?>
<article class="box">
	<h3 class="h_style03">記事が見つかりません</h3>
	<p>記事が存在しません</p>
</article>
<?php endif; ?>

<!-- post navigation -->
<?php get_template_part('inc/pager'); ?>
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
