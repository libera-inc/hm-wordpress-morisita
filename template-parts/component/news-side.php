<?php
/**
 * ニュース年別アーカイブ（サイドリスト）
 */
?>
<aside class="news-side">
    <span class="c-side-menu-title-en">ARCHIVES</span>
    <h2 class="c-side-menu-title-ja">アーカイブ</h2>
    <?php
	global $wpdb;

	$years = $wpdb->get_results( "
		SELECT YEAR(post_date) as year, COUNT(*) as count 
		FROM $wpdb->posts 
		WHERE post_type = 'news' 
		AND post_status = 'publish' 
		GROUP BY YEAR(post_date) 
		ORDER BY year DESC
	" );

	// 現在地判定（ALL or 特定年）
	$active_year = null;
	$is_all_active = false;
	if ( function_exists( 'is_post_type_archive' ) && is_post_type_archive( 'news' ) && ! is_year() && ! is_month() && ! is_day() ) {
		$is_all_active = true;
	} elseif ( is_year() || is_month() || is_day() ) {
		$queried_year = (int) get_query_var( 'year' );
		if ( $queried_year ) {
			$active_year = $queried_year;
		}
	} elseif ( is_singular( 'news' ) ) {
		global $post;
		if ( $post ) {
			$active_year = (int) get_the_date( 'Y', $post );
		}
	}

	echo '<ul class="c-side-menu-list --news">';
	// 先頭に ALL へのリンクを表示
	$all_class_attr = $is_all_active ? ' class="is-current"' : '';
	echo '<li><a' . $all_class_attr . ' href="' . esc_url( home_url( '/news/' ) ) . '">ALL</a></li>';
	if ( $years ) {
		foreach ( $years as $year ) {
			$link = home_url( "/news/{$year->year}/" );
			$year_class_attr = ( $active_year === (int) $year->year ) ? ' class="is-current"' : '';
			echo '<li><a' . $year_class_attr . ' href="' . esc_url( $link ) . '">' . esc_html( $year->year ) . '<span>年</span></a></li>';
		}
	}
	echo '</ul>';
	?>
</aside>