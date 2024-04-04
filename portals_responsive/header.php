<?php get_template_part('common-head'); ?>

<!--=======================header===========================-->
<header id="header">
	<!--h_bgは背景をmain_imgとは別で画面いっぱいに表示させたいときに使う-->
	<div class="h_bg">
		<div class="h_inner">
			<?php if(is_front_page()): ?>
				<h1 class="only_pc">六花式骨盤矯正で身体の歪みを調整し、辛い痛みを根本から改善へと導きます！</h1>
			<?php elseif(is_post_type_archive(array('contents','method'))): ?>
			<p>小倉駅前で肩こり・腰痛・むち打ち治療なら六花鍼灸整骨院･整体院</p>
			<?php elseif(get_field('h1')) : ?>
			<p><?php the_field('h1',$post->ID); ?></p>
			<?php else: ?>
			<p>小倉駅前で肩こり・腰痛・むち打ち治療なら六花鍼灸整骨院･整体院</p>
			<?php endif; ?>
		</div>
	</div>
	<div class="header_conts">
		<p class="h_logo"><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/all/h_logo_sp.png" alt="六花鍼灸整骨院.小倉駅前店"></a></p>
		<ul>
			<li><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/all/h_tel_btn.png" alt="電話予約"></a></li>
			<li><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/all/h_hpb_btn.png" alt="ホットペッパービューティー予約"></a></li>
			<li><a href="<?php echo home_url('/'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image/all/h_line_btn.png" alt="LINE予約"></li>
		</ul>
	</div>
	<nav>
		<ul class="gnav_sp only_sp" id="gnav_sp">
			<li><a href="#f_nav"><img src="<?php echo get_template_directory_uri(); ?>/image/all/nav_bt_menu.png" alt="メニュー"></a></li>
			<li><a href="#map"><img src="<?php echo get_template_directory_uri(); ?>/image/all/nav_bt_access.png" alt="アクセス"></a></li>
			<li><a href="tel:"><img src="<?php echo get_template_directory_uri(); ?>/image/all/nav_bt_tel.png" alt="電話予約："></a></li>
			<li><a href="<?php echo home_url('/'); ?>mail-form"><img src="<?php echo get_template_directory_uri(); ?>/image/all/nav_bt_net.png" alt="ネット予約"></a></li>
			<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/image/all/nav_bt_to_top.png" alt="TOPへ"></a></li>
		</ul>
		<ul class="gnav_pc only_pc" id="gnav_pc">
			<li><a href="<?php echo home_url(); ?>">HOME</a></li>
			<li><a href="<?php echo home_url(); ?>">アクセス</a></li>
			<li><a href="<?php echo home_url(); ?>">料金</a></li>
			<li><a href="<?php echo home_url(); ?>">初めての方へ</a></li>
			<li><a href="<?php echo home_url(); ?>">お客様の声</a></li>
			<li><a href="<?php echo home_url(); ?>">メニュー</a></li>
		</ul>
	</nav>
</header>
<?php if(is_front_page()): ?>
<!--=======================main_img===========================-->
<p class="main_img">
	<picture>
		<source media="(max-width: 781.9px)"
				srcset="<?php echo get_template_directory_uri(); ?>/image/top/main_img_sp.png">
		<source media="(min-width: 782px)"
				srcset="<?php echo get_template_directory_uri(); ?>/image/top/main_img_pc.png">
		<img src="<?php echo get_template_directory_uri(); ?>/image/top/main_img_pc.png"
			 alt="テキスト">
	</picture>
</p>
<?php elseif(is_singular('contents')||is_page()): ?>
<?php elseif(is_home()||is_single()): ?>
<!--=======================main_img===========================-->
<!--ブログのmain_imgを設置-->
<?php endif; ?>
<!--=======================contents===========================-->
<div id="contents">
	<!--=======================main===========================-->
	<div id="main">