<?php
//ショートコードをウィジェットで使う
add_filter('widget_text', 'do_shortcode' );

//homeurlショートコード
function shortcode_link() {
	ob_start();
	echo home_url();
	$td = ob_get_clean();
	return $td;
}
add_shortcode('home', 'shortcode_link');
/* 投稿内で [home] と記述する */

//templateurlショートコード
function shortcode_temp() {
	ob_start();
	echo get_template_directory_uri();
	$td = ob_get_clean();
	return $td;
}
add_shortcode('temp', 'shortcode_temp');
/* 投稿内で [temp] と記述する */

//telショートコード
function shortcode_tel() {
	ob_start();
	echo get_the_author_meta( 'phone', '2' );
	$td = ob_get_clean();
	return $td;
}
add_shortcode('tel', 'shortcode_tel');
/* 投稿内で [tel] と記述する */

//voice.phpを呼出ショートコード
function include_voicephp($atts) {
    ob_start();
    include(get_theme_root() . '/' . get_template() . '/inc/voice.php');
    return ob_get_clean();
}
add_shortcode('voice', 'include_voicephp');
/* 投稿内で [voice] と記述する */

//xxxx.phpテンプレート呼出ショートコード
function PHP_Include($params = array()) {

	extract(shortcode_atts(array(
		'file' => 'default'
	), $params));

	ob_start();
	include(get_theme_root() . '/' . get_template() . "/inc/$file.php");
	return ob_get_clean();
}
add_shortcode('phpinclude', 'PHP_Include');
/* 投稿内で [phpinclude file='xxxx'] と記述する */
?>