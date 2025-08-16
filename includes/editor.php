<?php
/**
 * エディタ関連設定
 */
function my_editor_suport() {
	add_theme_support( 'editor-styles' );
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'my_editor_suport' );