<?php
//Gutenberg_FrontCSSの読み込み
function add_blockstyle() {
	wp_enqueue_style( 'blockstyle', get_template_directory_uri() . '/Blocks/css/common.css', array(), '2021' );
}
add_action( 'wp_enqueue_scripts', 'add_blockstyle' );

//Gutenberg_EditorCSSの読み込み
function add_editorstyle() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/Blocks/css/common.css', array(), '2021' );
}
add_action( 'enqueue_block_editor_assets', 'add_editorstyle' );

//ACF Pro カスタムブロック追加
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
	if( function_exists('acf_register_block_type') ) {
		// お客様の声
		acf_register_block_type(array(
			'name'              => 'block-voice',
			'title'             => __('お客様の声ブロック'),
			'description'       => __('お客様の声を入れられるブロックです。一覧ページではなくスポットで「1件だけここに入れたい」という時にご利用ください。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'format-status',
			'keywords'          => array( '声', 'voice' , 'portals' , 'ポータルズ'),
			'mode'              => 'auto',
			'enqueue_assets'     => 'portals_block_css',
		));
		// キャッチリスト
		acf_register_block_type(array(
			'name'              => 'block-catchlist',
			'title'             => __('キャッチリスト'),
			'description'       => __('左側にチェックマークが入っているリストのブロックです。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'editor-ul',
			'keywords'          => array( 'リスト', 'キャッチ' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'     => 'portals_block_css',
		));
		// イラスト付きキャッチリスト
		acf_register_block_type(array(
			'name'              => 'block-catchlistimage',
			'title'             => __('イラスト付きキャッチリスト'),
			'description'       => __('左側にチェックマーク・右側にイラストが入っているリストのブロックです。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'editor-ul',
			'keywords'          => array( 'リスト', 'キャッチ' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'     => 'portals_block_css',
		));
		// よくある質問
		acf_register_block_type(array(
			'name'              => 'block-faq',
			'title'             => __('よくある質問'),
			'description'       => __('よくある質問のブロックです。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'saved',
			'keywords'          => array( 'よくある質問', 'faq' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'     => 'portals_block_css',

		));
		// 〇つのポイント
		acf_register_block_type(array(
			'name'              => 'block-point',
			'title'             => __('〇つのポイント'),
			'description'       => __('〇つのポイントのブロックです。無限に増やすことができますが、3つ〜最大でも9つくらいまでが見やすいと思います。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'editor-ol',
			'keywords'          => array( 'ポイント', 'point' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
		// 料金表2列
		acf_register_block_type(array(
			'name'              => 'block-price-row2',
			'title'             => __('料金表(2列)'),
			'description'       => __('自費施術や1回いくらというような料金の記載をするための料金表のブロックです'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'money-alt',
			'keywords'          => array( '料金', '料金表' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',

		));
		// 料金表3列
		acf_register_block_type(array(
			'name'              => 'block-price-row3',
			'title'             => __('料金表(3列)'),
			'description'       => __('1回目と2回目の料金が異なる場合に使いやすい料金表のブロックです'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'money-alt',
			'keywords'          => array( '料金', '料金表' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',

		));
		// 料金表4列
		acf_register_block_type(array(
			'name'              => 'block-price-row4',
			'title'             => __('料金表(4列)'),
			'description'       => __('1割・2割・3割のような保険を利用した場合の料金が見やすく表示できる料金表のブロックです'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'money-alt',
			'keywords'          => array( '料金', '料金表' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
		// 受付時間
		acf_register_block_type(array(
			'name'              => 'block-uketsuke',
			'title'             => __('受付時間表'),
			'description'       => __('受付時間表を表示したい時のブロックです'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'clock',
			'keywords'          => array( '受付', '時間' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
		// フロー
		acf_register_block_type(array(
			'name'              => 'block-flow',
			'title'             => __('フロー'),
			'description'       => __('フローのブロックです。無限に増やすことができますが、3つ?最大でも9つくらいまでが見やすいと思います。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'editor-ol',
			'keywords'          => array( '施術の流れ', 'flow' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
		// クーポン
		acf_register_block_type(array(
			'name'              => 'block-coupon',
			'title'             => __('クーポン'),
			'description'       => __('クーポンを入れられるブロックです。各ページや料金ページ等に入れて使用できます。直接予約アクションに繋がります。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'tag',
			'keywords'          => array( 'クーポン', 'メニュー' , 'coupon' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
		// フロー3
		acf_register_block_type(array(
			'name'              => 'flow_pc3_block',
			'title'             => __('フロー3列'),
			'description'       => __('フローのブロックです。無限に増やすことができますが、3つ?最大でも9つくらいまでが見やすいと思います。'),
			'render_template'   => 'Blocks/output.php',
			'category'          => 'portals',
			'icon'              => 'editor-ol',
			'keywords'          => array( '施術の流れ', 'flow' , 'portals' , 'ポータルズ' ),
			'mode'              => 'auto',
			'enqueue_assets'    => 'portals_block_css',
		));
	}
}
function portals_block_css( $block ){
	wp_enqueue_style( 'portals_block_css', get_template_directory_uri() . '/Blocks/css/style.css');
}
add_action( 'wp_enqueue_scripts', 'portals_block_css' );
//ブロックパターンの設定
get_template_part('Blocks/pattern');

//ブロック設定サイドバーの設定
add_theme_support( 'custom-spacing' );
add_theme_support( 'custom-line-height' );
add_theme_support( 'align-wide' );
?>