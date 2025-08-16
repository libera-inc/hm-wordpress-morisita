<?php

// テーマサポート関連設定
require_once get_template_directory() . '/includes/theme-support.php';

// セキュリティ対策
require_once get_template_directory() . '/includes/security.php';

// エディタ関連設定
require_once get_template_directory() . '/includes/editor.php';

// テンプレートタグ
require_once get_template_directory() . '/includes/template-tags.php';

// アクセスページリダイレクト
require_once get_template_directory() . '/includes/redirect-access.php';

// コンテンツフィルタリング
require_once get_template_directory() . '/includes/content-filter.php';

// ニュース日付アーカイブ機能
require_once get_template_directory() . '/includes/news-rewrite.php';

// SEO関連設定
require_once get_template_directory() . '/includes/seo.php';