<?php get_header(); ?>

<div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
  <?php if(function_exists('bcn_display'))
  {
   bcn_display();
  }?>
</div>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<?php // いずれかのpost typeで判別
if( is_singular( array( 'contents', 'method' ) ) ) :
  /* 投稿タイプが
   * いずれかに一致するシングルページ
   */
 ?>
<article>
  <h1 class="h_style01"><?php the_title(); ?></h1>
  <div class="block_wrapper">
		<?php the_content(); ?>
	</div>
</article>

<?php else: ?>
<article>
<h1 class="h_style01"><?php the_title(); ?></h1>
<div class="conts block_wrapper">
<p class="date">
      <?php the_time("Y年m月j日") ?>
</p>
    <?php if(has_post_thumbnail()) { the_post_thumbnail(); } ?>
    <?php the_content('続きを読む'); ?>
</div>

</article>

<!-- post navigation -->
<div class="navigation">
  <?php if( get_previous_post() ): ?>
<div class="alignleft">
    <?php previous_post_link('%link', '≪ 前の記事へ' ,false); ?>
</div>
  <?php endif;
if( get_next_post() ): ?>
<div class="alignright">
    <?php next_post_link('%link', '次の記事へ ≫',false); ?>
</div>
  <?php endif; ?>
</div>
<?php get_template_part('inc/blogrelation'); ?>
<!-- /post navigation -->
<?php endif; ?>
<?php endwhile; ?>
<?php else: ?>
<article>
<h3 class="h_style03">記事が見つかりません</h3>
<p>記事が存在しません</p>
</article>
<?php endif; ?>
<?php get_template_part('inc/voice'); ?>
<?php get_template_part('inc/pager'); ?>
<?php get_template_part('inc/contact'); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
