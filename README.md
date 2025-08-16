# 株式会社森下の WordPress テーマ

Hello Mentor の教材です。

## 開発環境のセットアップ

### 必要な環境

-   Node.js
-   LocalWP

### インストール

1. テーマディレクトリに移動

```bash
cd wp-content/themes/morisita
```

2. 依存関係をインストール

```bash
npm install
```

### package.json の URL 変更

```bash
  "scripts": {
    "dev": "browser-sync start --proxy 'http://localhost:10013' --files '**/*.php' '**/*.css' '**/*.js' --no-notify --no-open"
  },
```

上記の http://localhost:10013 を環境に合わせて変更してください。

## 開発の開始

### ホットリロード

ファイルを編集すると自動でブラウザがリロードされます。

```bash
npm run dev
```

実行後、ターミナルに表示される URL（通常は `http://localhost:3000`）にアクセスしてください。

**注意**: 元の WordPress サイト（`http://localhost:10013`）ではなく、Browser Sync が提供する URL（`http://localhost:3000`）を使用してください。

### 監視対象ファイル

-   `**/*.php` - PHP ファイル
-   `**/*.css` - CSS ファイル
-   `**/*.js` - JavaScript ファイル

## Cursor 推奨拡張機能

開発効率を向上させるために、以下の拡張機能の使用を推奨します：

### SCSS 開発

-   **Live Sass Compiler**: SCSS ファイルのリアルタイムコンパイル

### コードフォーマット

-   **Format HTML in PHP**: PHP ファイル内の HTML と PHP コードの自動フォーマット
-   **Prettier**: SCSS、JavaScript、JSON 等のコードフォーマット

## ファイル構成

```
LIBERA-TEMPLATE/
├── .vscode/
├── assets/
│   ├── css/
│   ├── img/
│   ├── js/
│   └── scss/
├── includes/
├── template-parts/
├── .gitignore
├── *.php
├── package-lock.json
├── package.json
├── README.md
├── screenshot.png
└── style.css
```

### 重要な注意事項

-   **includes**: functions.php に書く内容をファイル別に分割して管理
-   **テーマファイル以外**: データベース、プラグイン設定等は WPvivid で共有するため、管理者に連絡すること

## 開発ワークフロー

1. `npm run dev` でホットリロードを開始
2. Cursor で Live Sass Compiler を有効化
3. ファイルを編集・保存
4. ブラウザが自動でリロード

## テーマファイル以外のデータ

下記に WPvivid で共有しているデータがあります。

https://drive.google.com/drive/folders/1g7_8POR_k05KpOLkvKDo86KO3EdS5PMd?usp=sharing

## 注意事項

-   `node_modules/` は Git にコミットしないでください
-   新しい依存関係を追加した場合は `package.json` をコミットしてください
-   他の開発者は `npm install` で依存関係を復元できます
