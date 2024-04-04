<?php
$args=array(
	'post_type' => 'news',
	'posts_per_page' => '3',
	'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'slug',
				'terms'    => esc_attr($post->post_name),
		),
	),
	'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1
);
$my_query = new WP_Query( $args );
?>
<?php if ( $my_query->have_posts() ) : ?>
<!--新着情報-->
<section class="news_sec">
	<h2 class="h_style02">新着情報</h2>
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
	<p class="news_more"><a href="<?php echo home_url("news"); ?>">もっと見る</a></p>
</section>
<?php endif; wp_reset_postdata();?>
