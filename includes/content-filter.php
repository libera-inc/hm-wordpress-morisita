<?php
/**
 * コンテンツフィルター設定
 */

/**
 * Google Map iframe用のフィルタ関数
 */
function allow_google_map_iframe( $content ) {
	// Google Map iframe用の許可タグと属性を定義
	$allowed_tags = wp_kses_allowed_html( 'post' );
	
	// iframeタグとGoogle Maps用の属性を追加
	$allowed_tags['iframe'] = array(
		'src'             => true,
		'width'           => true,
		'height'          => true,
		'frameborder'     => true,
		'style'           => true,
		'allowfullscreen' => true,
		'loading'         => true,
		'referrerpolicy'  => true,
		'title'           => true,
		'class'           => true,
		'id'              => true,
	);
	
	return wp_kses( $content, $allowed_tags );
}