<?php
/**
 * テンプレートタグ設定
 */

/**
 * ニュースアーカイブページのタイトルを生成して返す
 * @return string
 */
function news_archive_title() {
	// 年別
	if ( is_year() ) {
		return '『' . esc_html( get_query_var( 'year' ) . '年' ) . '』のニュース一覧';
	}

	// 月別
	if ( is_month() ) {
		return '『' . esc_html( get_query_var( 'year' ) . '年' . get_query_var( 'monthnum' ) . '月' ) . '』のニュース一覧';
	}

	// 日別
	if ( is_day() ) {
		return '『' . esc_html( get_query_var( 'year' ) . '年' . get_query_var( 'monthnum' ) . '月' . get_query_var( 'day' ) . '日' ) . '』のニュース一覧';
	}

	// その他（通常のニュース一覧）
	return 'ニュース一覧';
}