<?php
/*
Template Name: ディスカバリーテンプレート
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
<article>
	<h1 class="h_style01"><?php the_title(); ?></h1>
	<?php if (get_field('banner_area')) : ?>
	<p class="banner_area">
		<?php
		$attachment_id = get_field('banner_area');
		$size = "large"; // (thumbnail, medium, large, full or custom size)
		$image = wp_get_attachment_image_src( $attachment_id, $size );
		$attachment = get_post( get_field('banner_area') );
		$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
		$image_title = $attachment->post_title;
		?>
		<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></p>
	<?php endif; ?>
	<?php if (get_field('catch_li01')) : ?>
	<div class="conts">
		<p class="catch_ttl"><img src="<?php echo get_template_directory_uri(); ?>/image/page/page_catch_ttl.png" alt=""></p>
		<div class="catch_list">
			<p class="img_right">
				<?php
				$attachment_id = get_field('catch_list_pic');
				$size = "medium"; // (thumbnail, medium, large, full or custom size)
				$image = wp_get_attachment_image_src( $attachment_id, $size );
				$attachment = get_post( get_field('catch_list_pic') );
				$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
				$image_title = $attachment->post_title;
				?>
				<img src="<?php echo $image[0]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></p>
			<ul>
				<li><?php echo get_field('catch_li01'); ?></li>
				<li><?php echo get_field('catch_li02'); ?></li>
				<li><?php echo get_field('catch_li03'); ?></li>
				<li><?php echo get_field('catch_li04'); ?></li>
				<li><?php echo get_field('catch_li05'); ?></li>
			</ul>
		</div>
	</div>
	<?php endif; ?>
	<?php if (get_field('catch_txt')) : ?>
	<div class="conts post">
		<?php echo apply_filters('the_content', get_post_meta($post->ID, 'catch_txt', true)); ?>
	</div>
	<?php endif; ?>
	<?php if (get_field('main_area_ttl01')) : ?>
	<h2 class="h_style02"><?php echo get_field('main_area_ttl01'); ?></h2>
	<div class="conts post">
		<?php echo apply_filters('the_content', get_post_meta($post->ID, 'main_area01', true)); ?>
	</div>
	<?php endif; ?>
	<?php if (get_field('main_area_ttl02')) : ?>
	<h2 class="h_style02"><?php echo get_field('main_area_ttl02'); ?></h2>
	<div class="conts post">
		<?php echo apply_filters('the_content', get_post_meta($post->ID, 'main_area02', true)); ?>
	</div>
	<?php endif; ?>
	<?php if (get_field('main_area_ttl03')) : ?>
	<h2 class="h_style02"><?php echo get_field('main_area_ttl03'); ?></h2>
	<div class="conts post">
		<?php echo apply_filters('the_content', get_post_meta($post->ID, 'main_area03', true)); ?>
	</div>
	<?php endif; ?>
</article>
<?php endwhile; // End the loop. Whew. ?>
<?php endif; ?>
<?php get_template_part('inc/voice'); ?>
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
