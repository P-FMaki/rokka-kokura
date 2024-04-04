<?php get_header(); ?>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
  <?php if(function_exists('bcn_display'))
  {
   bcn_display();
  }?>
</div>
<h2 class="h_style01">
<?php if(get_query_var("post_type") == 'contents' ): ?>
お悩み別メニュー
<?php elseif( get_query_var("post_type")  == 'method' ): ?>
施術法メニュー
<?php else: ?>
スタッフブログ
<?php endif; ?>
</h2>
<?php if (is_post_type_archive()): ?>
<div class="conts">
<?php
/**
* スラッグの取得と条件分岐
*/
// スラッグを取得
$post_type = get_query_var("post_type");
$custom_post_slug = esc_html( get_post_type_object( $post_type )->name );

// スラッグによってタクソノミー名の変数を変更する
if ($custom_post_slug == 'contents'){
$taxonomy = 'shoujou_tax';//タクソノミー名
}elseif ($custom_post_slug == 'method'){
$taxonomy = 'sejutsu_tax';//タクソノミー名
}

$num = - 1;//表示する投稿の数 -1で全部
$terms = get_terms( $taxonomy );
foreach ( $terms as $term ):

/**
* query の指定
*/

$args = array(
'posts_per_page' => $num,
'post_type' => $custom_post_slug,
'tax_query' => array(
array(
'taxonomy' => $taxonomy,
'field' => 'slug',
'terms' => $term->slug,
)
)
);
$my_query = get_posts( $args ); ?>

<h3 class="h_style02" id="<?php echo esc_html($term->slug); ?>"><?php echo $term->name; ?></h3>
<div class="catch_list">
<ul>
<?php
foreach ( $my_query as $post ) :
setup_postdata( $post );
?>
<li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
<?php endforeach; ?>
</ul>
</div>

<?php
endforeach;
wp_reset_postdata();

?>
</div>
<?php else : ?>
<?php if (have_posts()) : ?>
  <ul class="blog_list">
<?php while (have_posts()) : the_post(); ?>
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
<?php endwhile; ?>
</ul>
<?php else : ?>
<article class="box">
  <h3 class="h_style03">記事が見つかりません</h3>
  <p>記事が存在しません</p>
</article>
<?php endif; ?>

<?php endif; ?>
<!-- post navigation -->
<?php get_template_part('inc/pager'); ?>
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
