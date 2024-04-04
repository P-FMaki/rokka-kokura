<?php if (is_single()): ?>
<?php // 現在表示されている投稿と同じタームに分類された投稿を取得
// スラッグを取得
$custom_post_slug = esc_html( get_post_type_object( get_post_type() )->name );

// スラッグによってタクソノミー名の変数を変更する
if ($custom_post_slug == 'contents'){
	$taxonomy_slug = 'shoujou_tax';//タクソノミー名
}elseif ($custom_post_slug == 'method'){
	$taxonomy_slug = 'sejutsu_tax';//タクソノミー名
}
// タクソノミーのスラッグを指定
$post_terms = wp_get_object_terms($post->ID, $taxonomy_slug); // タクソノミーの指定
if( $post_terms && !is_wp_error($post_terms)) { // 値があるときに作動
	$terms_slug = array(); // 配列のセット
	foreach( $post_terms as $value ){ // 配列の作成
		$terms_slug[] = $value->slug; // タームのスラッグを配列に追加
	}
}
$args = array(
	'posts_per_page' => 5, // 表示件数を指定
	'post__not_in' => array($post->ID), // 現在の投稿を除外
	'tax_query' => array( // タクソノミーパラメーターを使用
		array(
			'taxonomy' => $taxonomy_slug, // タームを取得タクソノミーを指定
			'field' => 'slug', // スラッグに一致するタームを返す
			'terms' => $terms_slug // タームの配列を指定
		)
	)
);
$the_query = new WP_Query($args); ?>
<?php if($the_query->have_posts()): ?>
<div class="widget_nav_menu">	
	<p>関連メニュー</p>
	<ul>
		<?php while ($the_query->have_posts()): $the_query->the_post(); ?>
		<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
	</ul>
</div>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php endif; ?>

