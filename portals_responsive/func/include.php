<?php
//jsとCSSの読み込み
function add_files() {
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '2020' );
	wp_enqueue_style( 'icomoon', get_template_directory_uri() . '/image/ico/style.css', array(), '2020' );
	wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/lightbox/css/lightbox.css', array(), '2020' );
	wp_enqueue_script('lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.js',array('jquery'), false, true);
	wp_enqueue_script('portal_s', get_template_directory_uri() . '/js/portal_s.js',array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'add_files' );

//サイトタイトル読み込み
add_theme_support( 'title-tag' );
function wp_document_title_separator( $separator ) {
	$separator = '|';
	return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );
?>