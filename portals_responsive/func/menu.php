<?php
// メニューを非表示にする
function remove_menu() {
	// level10以下のユーザの場合
	if (!current_user_can('administrator')) {
		//remove_menu_page('edit.php?post_type=voice');
		//remove_menu_page('edit.php?post_type=contents');  // 追加ページ（古いdiscoveryはここをコメントアウトする）
		//remove_menu_page( 'edit.php?post_type=page' );    // 固定ページ（新しいdiscoveryはここをコメントアウトする）
		remove_submenu_page('themes.php', 'widgets.php'); // 外観 -> ウィジェット
		remove_submenu_page('themes.php', 'themes.php'); // 外観 -> テーマ
		remove_submenu_page('themes.php', 'customize.php?return='. urlencode($_SERVER["REQUEST_URI"])); // 外観->カスタマイズ
		//remove_menu_page( 'edit.php' );		//投稿メニューを非表示
		remove_menu_page( 'edit-comments.php' );          // コメント
		remove_menu_page( 'tools.php' );                  // ツール
	}
}
add_action('admin_menu', 'remove_menu');
function remove_bar_menus( $wp_admin_bar ) {
	$wp_admin_bar->remove_menu( 'themes' );       // サイト名 -> テーマ (公開側)
	$wp_admin_bar->remove_menu( 'customize' );    // サイト名 -> カスタマイズ (公開側)
	$wp_admin_bar->remove_menu( 'widgets' );    // サイト名 -> カスタマイズ (公開側)
	$wp_admin_bar->remove_menu( 'new-content' );  // 新規
	$wp_admin_bar->remove_menu( 'new-post' );     // 新規 -> 投稿
	$wp_admin_bar->remove_menu( 'new-media' );    // 新規 -> メディア
	$wp_admin_bar->remove_menu( 'new-link' );     // 新規 -> リンク
	$wp_admin_bar->remove_menu( 'new-page' );     // 新規 -> 固定ページ
}
add_action('admin_bar_menu', 'remove_bar_menus', 201);
//不要なウィジェットの非表示
function unregister_widgets()
{
	unregister_widget('WP_Widget_Pages');           //固定ページ
	//  unregister_widget('WP_Widget_Recent_Posts');    //最近の投稿
	unregister_widget('WP_Widget_Recent_Comments'); //最近のコメント
	unregister_widget('WP_Widget_RSS');             //RSS
	unregister_widget('WP_Widget_Tag_Cloud');       //タグクラウド
	//  unregister_widget('WP_Widget_Meta');            //メタ情報
	unregister_widget('WP_Widget_Calendar');        //カレンダー
	//  unregister_widget('WP_Widget_Categories');      //カテゴリー
	//  unregister_widget('WP_Widget_Search');          //検索
	//  unregister_widget('WP_Nav_Menu_Widget');        //カスタムメニュー
	//  unregister_widget('WP_Widget_Archives');        //アーカイブ
	//  unregister_widget('WP_Widget_Links');           //リンク
	//  unregister_widget('WP_Widget_Text');            //テキスト
	unregister_widget('Akismet_Widget');            //Akismetウィジェット
}
add_action( 'widgets_init', 'unregister_widgets' );
//入力画面のカテゴリとタグの設定を非表示に
if (!current_user_can('administrator')) {
	function remove_extra_meta_boxes() {
		remove_meta_box( 'pageparentdiv','page','side'); // 固定ページのページ属性
	}
	add_action( 'admin_menu' , 'remove_extra_meta_boxes' );
}
// 管理者以外にパスワードを変更させない
function update_password_fields( $show_password_fields ) {
	global $current_user;
	get_currentuserinfo();
	$level = absint($current_user->user_level);
	if (!current_user_can('administrator')){
	}else{
		return $show_password_fields;
	}
}
add_filter('show_password_fields','update_password_fields',1,1);

// 投稿画面のカスタマイズ
add_theme_support('post-thumbnails');
function remove_post_supports() {
	remove_post_type_support( 'post', 'excerpt' ); // 抜粋
	remove_post_type_support( 'post', 'trackbacks' ); // トラックバック
	remove_post_type_support( 'post', 'custom-fields' ); // カスタムフィールド
	remove_post_type_support( 'post', 'comments' ); // コメント
	remove_post_type_support( 'post', 'post-formats' ); // 投稿フォーマット
	unregister_taxonomy_for_object_type( 'post_tag', 'post' ); // タグ
}
add_action( 'init', 'remove_post_supports' );
?>