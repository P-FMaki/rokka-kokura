<h2 class="h_style02">関連記事</h2>
<?php
global $post;
$terms = get_the_terms($post->ID, 'category');
foreach($terms as $term)
	$args = array(
	'numberposts' => 4,
	'post_type' => 'post', //カスタム投稿タイプ名
	'taxonomy' => 'category', //タクソノミー名
	'term' => $term->slug, //ターム名
	'post__not_in' => array($post->ID) //表示中の記事を除外
);
?>

		<?php $myPosts = get_posts($args); if($myPosts) : ?>
			<ul class="blog_list">
		<?php foreach($myPosts as $post) : setup_postdata($post); ?>
		<li>
<article class="post_box">
			<?php if(has_post_thumbnail()){ //アイキャッチ画像があったら
	$image_id = get_post_thumbnail_id(); //アイキャッチ画像IDを取得
	$image = wp_get_attachment_image_src( $image_id , "large" ); //↑の画像IDの情報を取得
	$image_src = $image[0]; //↑の戻り値の1番目（URL）をsrcに入れる
}else{ //アイキャッチ画像がなかったら
	//自分で用意したNo Image画像をsrcに入れる
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
						$cat = get_the_category(); // 表示中の記事のカテゴリ（配列）
						$cat_id = $cat[0]->term_id; // 最初のカテゴリのID
						echo get_category_parents( $cat_id, true, "" ); // 祖先カテゴリを出力
						?>
					</p>
				</div>
		</article>
</li>
		<?php endforeach; ?>
		</ul>
		<?php else : ?>
		<p class="conts">関連記事はまだありません。</p>
		<?php endif; wp_reset_postdata(); ?>
