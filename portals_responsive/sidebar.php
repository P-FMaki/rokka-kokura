</div>
<!--/#main-->
<!--=======================sidebar===========================-->
<aside id="sidebar">
	<?php
    $url = $_SERVER['REQUEST_URI'];
  if(strstr($url,'blog')==true):
?>
    <?php dynamic_sidebar( 'ブログ用サイドバー' ); ?>
	<?php endif; ?>
	<?php if (is_mobile()) : ?>
	<?php dynamic_sidebar( 'サイドバー（上）' ); ?>
    <?php get_template_part('inc/related'); ?>
	<?php get_template_part('inc/sidemenu'); ?>
	<?php dynamic_sidebar( 'サイドバー（下）' ); ?>

	<?php else: ?>

	<?php dynamic_sidebar( 'サイドバー（上）' ); ?>
    <?php get_template_part('inc/related'); ?>
	<?php get_template_part('inc/sidemenu'); ?>
	<?php dynamic_sidebar( 'サイドバー（下）' ); ?>
	<?php endif; ?>
</aside>
<!--/#sidebar-->
