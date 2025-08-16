<?php

/**
 * ニュースの年月日アーカイブ用リライトルール
 */
function enable_news_date_archive() {
	global $wp_rewrite;

	// ページネーション対応（年/月/日別）
	add_rewrite_rule(
		'news/([0-9]{4})/page/([0-9]+)/?$',
		'index.php?post_type=news&year=$matches[1]&paged=$matches[2]',
		'top'
	);
	add_rewrite_rule(
		'news/([0-9]{4})/([0-9]{1,2})/page/([0-9]+)/?$',
		'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]',
		'top'
	);
	add_rewrite_rule(
		'news/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/([0-9]+)/?$',
		'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]',
		'top'
	);

	add_rewrite_rule(
		'news/([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$',
		'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]&day=$matches[3]',
		'top'
	);
	add_rewrite_rule(
		'news/([0-9]{4})/([0-9]{1,2})/?$',
		'index.php?post_type=news&year=$matches[1]&monthnum=$matches[2]',
		'top'
	);
	add_rewrite_rule(
		'news/([0-9]{4})/?$',
		'index.php?post_type=news&year=$matches[1]',
		'top'
	);

	// アーカイブ基点のページネーション（保険）
	add_rewrite_rule(
		'news/page/([0-9]+)/?$',
		'index.php?post_type=news&paged=$matches[1]',
		'top'
	);
}
add_action( 'init', 'enable_news_date_archive' );

// パーマリンク更新時にリライトルールをリセット
function flush_news_rules() {
	enable_news_date_archive();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'flush_news_rules' );

/**
 * ニュース日付アーカイブページにnoindexを追加
 */
function add_noindex_to_news_date_archives() {
	if ( is_year() || is_month() || is_day() ) {
		if ( is_post_type_archive( 'news' ) || get_query_var( 'post_type' ) === 'news' ) {
			echo '<meta name="robots" content="noindex,follow">' . "\n";
		}
	}
}
add_action( 'wp_head', 'add_noindex_to_news_date_archives', 1 );