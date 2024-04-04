<?php
//コンタクトフォーム７の管理画面の非表示
	function remove_admin_menus() {
	// level10以下のユーザの場合
	if (!current_user_can('level_10')) {
	// 「Contact Form 7」を使用している場合
	remove_menu_page('wpcf7');
	}
	}
	add_action('admin_menu', 'remove_admin_menus');
?>