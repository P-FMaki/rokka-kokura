<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
	<?php if(function_exists('bcn_display'))
{
	bcn_display();
}?>
</div>
<?php
$args=array(
	'post_type' => 'voice',
	'posts_per_page' => '5',
	'taxonomy' => 'voice_tax',
	'term' => 'pagevoice',
	'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
);
$my_query = new WP_Query( $args );
?>
<section class="voice">
	<h2 class="h_style01">お客様の声</h2>
	<?php if ( $my_query->have_posts() ) : ?>
	<?php while ( $my_query->have_posts() ) : $my_query->the_post(); ?>
	<div class="block_voice">
		<p class="block_voice_ttl"><?php the_field('voice_ttl',$post->ID); ?></p>
		<div class="block_voice_container">
			<?php if(get_field('voice_img01')||get_field('voice_img02')): ?>
			<div class="block_voice_container_pic">
				<figure>
					<?php if(get_field('voice_img01')): ?>
					<?php
					$attachment_id = get_field('voice_img01');
					$size = "medium"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					$attachment = get_post( get_field('voice_img01') );
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					$image_title = $attachment->post_title;
					?>
					<a href="<?php echo wp_get_attachment_url( get_field( 'voice_img01',$post->ID) ); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
					<?php endif; ?>
					<?php if(get_field('voice_img02')): ?>
					<?php
					$attachment_id = get_field('voice_img02');
					$size = "medium"; // (thumbnail, medium, large, full or custom size)
					$image = wp_get_attachment_image_src( $attachment_id, $size );
					$attachment = get_post( get_field('voice_img02') );
					$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
					$image_title = $attachment->post_title;
					?>
					<a href="<?php echo wp_get_attachment_url( get_field( 'voice_img02',$post->ID) ); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
					<?php endif; ?>
				</figure>
			</div>
			<?php endif; ?>
			<div class="block_voice_container_txt">
				<p>
					<?php the_field('voice_txt',$post->ID); ?>
				</p>
				<p class="menseki">※お客様個人の感想であり、効果には個人差があります。</p>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
	<?php endif; wp_reset_postdata();?>
</section>
<?php
$GLOBALS['wp_query']->max_num_pages = $my_query->max_num_pages;
?>

<?php get_template_part('inc/pager'); ?>
<!-- post navigation -->
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
