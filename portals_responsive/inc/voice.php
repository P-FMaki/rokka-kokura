<?php
//ページのスラッグを取得（患者様の声を各ページに表示させる為）
global $wp_query;
$post_obj = $wp_query->get_queried_object();
$slug = $post_obj->post_name;  //投稿や固定ページのスラッグ
//ターム情報の取得
$terms = get_terms('voice_tax', array('slug' => $slug));
if (!empty($terms) && !is_wp_error($terms)) {
	$term = $terms[0];
	$term_description = $term->description;
};
?>
<!--======voice:start======-->
<?php
$args = array(
	'post_type' => 'voice',
	'posts_per_page' => '5',
	'tax_query' => array(
		array(
			'taxonomy' => 'voice_tax',
			'field'    => 'slug',
			'terms'    => $slug,
		),
	),
);
$my_query = new WP_Query($args);
?>
<?php if ($my_query->have_posts()) : ?>
	<!--患者様の声-->
	<section class="voice">
		<?php if (!empty($term_description)) : ?>
			<h2 class="h_style02"><?php echo $term_description ?></h2>
		<?php else : ?>
			<h2 class="h_style02">お喜びの声</h2>
			<div class="voice_conts">
			<img src="<?php echo get_template_directory_uri(); ?>/image/voice/vice_title.png">
			<?php endif; ?>
			<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
				<div class="block_voice">
					<p class="block_voice_ttl"><?php the_field('voice_ttl'); ?></p>
					<div class="block_voice_container">
						<?php if (get_field('voice_img01') || get_field('voice_img02')) : ?>
							<div class="block_voice_container_pic">
								<figure>
									<?php if (get_field('voice_img01')) : ?>
										<?php
										$attachment_id = get_field('voice_img01');
										$size = "medium"; // (thumbnail, medium, large, full or custom size)
										$image = wp_get_attachment_image_src($attachment_id, $size);
										$attachment = get_post(get_field('voice_img01'));
										$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
										$image_title = $attachment->post_title;
										?>
										<a href="<?php echo wp_get_attachment_url(get_field('voice_img01')); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
									<?php endif; ?>
									<?php if (get_field('voice_img02')) : ?>
										<?php
										$attachment_id = get_field('voice_img02');
										$size = "medium"; // (thumbnail, medium, large, full or custom size)
										$image = wp_get_attachment_image_src($attachment_id, $size);
										$attachment = get_post(get_field('voice_img02'));
										$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
										$image_title = $attachment->post_title;
										?>
										<a href="<?php echo wp_get_attachment_url(get_field('voice_img02')); ?>" rel="lightbox"><img src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" alt="<?php echo $alt; ?>" title="<?php echo $image_title; ?>"></a>
									<?php endif; ?>
								</figure>
							</div>
						<?php endif; ?>
						<div class="block_voice_container_txt">
							<p>
								<?php the_field('voice_txt'); ?>
							</p>
							<p class="menseki">※免責事項：お客様個人の感想であり、効果効能を保証するものではありません。</p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
	</section>
<?php endif;
wp_reset_postdata(); ?>
<div class="voice_conts">
<div class="voice_morebtn"><a href="<?php echo get_template_directory_uri(); ?>">お喜びの声をもっと見る</a></div>
</div>
<!--======voice:end======-->