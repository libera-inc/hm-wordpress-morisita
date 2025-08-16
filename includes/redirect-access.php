<?php
/**
 * リダイレクト設定
 */

add_action( 'template_redirect', 'redirect_member_subpages_to_member' );
function redirect_member_subpages_to_member() {
	if ( ! is_admin() ) {
		$request_uri = $_SERVER['REQUEST_URI'];
		// /access/ で始まり、その後に何かしらスラッグが続く場合
		if ( preg_match( '#^/access/([^/]+)(/)?$#', $request_uri, $matches ) ) {
			// ただし /access/ 自体は除外
			if ( strtolower( $matches[1] ) !== '' ) {
				wp_redirect( home_url( '/access/' ), 301 );
				exit;
			}
		}
	}
} 