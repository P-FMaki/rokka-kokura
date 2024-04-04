<?php
//編集者がウィジェットに行かないためにとりあえず入れている
register_nav_menu('mainmenu', 'メインメニュー');

//サイドバー（上）
register_sidebar(array(
	'name' => 'サイドバー（上）',
	'before_widget' => '<div class="sideUpper %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));
//サイドバー（メニュー）
register_sidebar(array(
	'name' => 'サイドバー（メニュー）',
	'before_widget' => '<div class="sideNav %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));
//サイドバー（下）
register_sidebar(array(
	'name' => 'サイドバー（下）',
	'before_widget' => '<div class="sideLower %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));
//ブログ用サイドバー
register_sidebar(array(
	'name' => 'ブログ用サイドバー',
	'before_widget' => '<div class="sideNav %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));
//トップページ（上）
register_sidebar(array(
	'name' => 'トップページ（上）',
	'before_widget' => '<div class="topUpper %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));
//トップページ（下）
register_sidebar(array(
	'name' => 'トップページ（下）',
	'before_widget' => '<div class="topLower %2$s" id="%1$s">',
	'after_widget' => '</div>',
	'before_title' => '<p>',
	'after_title' => '</p>'
));


//ウィジェットのタイトルに！を入れると非表示にする
add_filter( 'widget_title', 'my_widget_title' );
function my_widget_title( $title ) {
	if( mb_strpos($title, '!') !== false){
		return '';
	} else {
		return $title;
	}
}

//編集者にメニュー・ウィジェットのメニューを表示
function add_theme_caps(){
	$role = get_role( 'editor' );
	$role->add_cap( 'edit_theme_options' );
}
add_action( 'admin_init', 'add_theme_caps' );
?>