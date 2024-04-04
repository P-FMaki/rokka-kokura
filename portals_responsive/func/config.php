<?php
// ユーザー情報追加
function my_user_meta($profile) {
	$profile['phone']    = '電話番号';
	$profile['zip']      = '郵便番号';
	$profile['address']  = '住所';
	return $profile;
}
add_filter('user_contactmethods', 'my_user_meta', 10, 1);

//編集者に他のユーザの記事の編集・削除を禁止
function wpcodex_set_capabilities() {
	// Get the role object.
	$editor = get_role( 'editor' );
	// A list of capabilities to remove from editors.
	$caps = array(
		'edit_others_pages',
		'delete_others_pages',
	);
	foreach ( $caps as $cap ) {
		// Remove the capability.
		$editor->remove_cap( $cap );
	}
}
add_action( 'init', 'wpcodex_set_capabilities' );

//画像パス置き換え
function replaceImagePath($arg) {
	$content = str_replace('"image/', '"' . get_template_directory_uri() . '/image/', $arg);
	return $content;
}
add_action('the_content', 'replaceImagePath');
add_action('widget_text', 'replaceImagePath');

// attachmentページでステータス404を返す
add_action( 'template_redirect', 'status404' );
function status404() {
	if ( is_attachment() || is_tax()) {
		global $wp_query;
		$wp_query->set_404();
		status_header(404);
	}
}

//症状アーカイブの全件表示
add_action( 'pre_get_posts', 'my_custom_query_vars' );
function my_custom_query_vars( $query ) {
	/* @var $query WP_Query */
	if ( !is_admin() && $query->is_main_query()) {
		if ( is_post_type_archive(array( 'contents', 'method' )) ) {
			$query->set( 'posts_per_page' , 999 );//表示したい数
		}
	}
	return $query;
}

//youtubeレスポンシブ
function iframe_in_div($the_content) {
	if ( is_singular() ) {
		$the_content = preg_replace('/<iframe/i', '<div class="youtube"><iframe', $the_content);
		$the_content = preg_replace('/<\/iframe>/i', '</iframe></div>', $the_content);
	}
	return $the_content;
}
add_filter('the_content','iframe_in_div');

//投稿者にiframeの挿入を許可
function my_wp_kses_allowed_html( $allowedposttags, $context ){
	$allowedposttags['iframe'] = array(
		'width' => true,
		'height' => true,
		'src' => true,
		'frameborder' => true,
		'allow' => true,
		'allowfullscreen' => true

	);
	return $allowedposttags;
}
add_action( 'wp_kses_allowed_html', 'my_wp_kses_allowed_html',10 ,2 );

//reCAPTCHAの表示コントロール
add_action( 'wp_enqueue_scripts', function() {
	if(is_page('mail-form')) return;
	wp_dequeue_style( 'contact-form-7' );
	wp_deregister_script( 'contact-form-7' );
	wp_deregister_script( 'google-recaptcha' );
});
?>