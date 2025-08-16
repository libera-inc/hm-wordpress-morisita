<?php

/**
 * SEO関連設定
 */

/**
 * カスタム投稿タイプのアーカイブページのメタディスクリプション設定
 */
function custom_ssp_description($ssp_description) {
	// カスタム投稿タイプのアーカイブページの場合
	if (is_post_type_archive()) {
		$post_type = get_query_var('post_type');
		$post_type_obj = get_post_type_object($post_type);
		
		// 投稿タイプの説明文が存在する場合はそれを使用
		if ($post_type_obj && !empty($post_type_obj->description)) {
			return $post_type_obj->description;
		}
	}
	
	return $ssp_description;
}
add_filter('ssp_output_description', 'custom_ssp_description');
