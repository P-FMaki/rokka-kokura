<?php
//ビジュアルエディタの「見出し１」等を削除する
function custom_editor_settings( $initArray ){
	$initArray['block_formats'] = "段落=p; 大見出し=h3; 見出し1=h4; 見出し2=h5; 見出し3=h6;";
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//エディターのキャッシュクリア
function extend_tiny_mce_before_init( $mce_init ) {
	$mce_init['cache_suffix'] = 'v='.time();
	return $mce_init;
}
add_filter( 'tiny_mce_before_init', 'extend_tiny_mce_before_init' );

//ビジュアルエディタのbボタンとiボタンをbタグとiタグに置き換える
function modify_formats($settings){
	$formats = array(
		'bold' => array('inline' => 'b'),
		'italic' => array('inline' => 'i')
	);
	$settings['formats'] = json_encode( $formats );
	return $settings;
}
add_filter('tiny_mce_before_init', 'modify_formats');

//テキストエディタから、strongとemボタンを除く
function default_quicktags($qtInit) {
	//$qtInit['buttons'] = 'link,em,strong,block,del,ins,img,ul,li,ol,code,more,spell,close,fullscreen';//こっちがデフォルト
	$qtInit['buttons'] = 'link,block,del,ins,img,ul,li,ol,code,more,spell,close,fullscreen';
	return $qtInit;
}
add_filter('quicktags_settings', 'default_quicktags', 10, 1);

//テキストエディタにBとIボタンを追加
function appthemes_add_quicktags() {
	if (wp_script_is('quicktags')){
?>
<script type="text/javascript">
	QTags.addButton( 'eg_bold', 'B', '<b>', '</b>', 'B', 'ボールド', 1 );
	QTags.addButton( 'eg_i', 'I', '<i>', '</i>', 'B', 'イタリック', 2 );
</script>
<?php
	}
}
add_action( 'admin_print_footer_scripts', 'appthemes_add_quicktags' );

// カスタムの投稿ページの編集画面
function clear_meta_box_order(){
	delete_user_meta( wp_get_current_user()->ID, 'meta-box-order_contents' );
}
add_action( 'admin_init', 'clear_meta_box_order' );

function portals_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'portals_theme_support' );


?>