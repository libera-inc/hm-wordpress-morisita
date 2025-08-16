/**
 * Product Image Switch
 *
 * 商品ページの画像切り替え機能を実装
 * サムネイル画像をクリックすると、メイン画像が切り替わる
 *
 * 使用方法:
 * - .js-product-main-image: メイン画像のコンテナ
 * - .js-main-image: メイン画像のimg要素
 * - .js-product-thumbnails: サムネイル画像のコンテナ
 * - .js-thumbnail: 各サムネイル画像のボタン要素
 *
 * データ属性:
 * - data-image-url: 切り替え先の画像URL
 * - data-index: 画像のインデックス番号
 */

/**
 * 商品画像切り替え機能の初期化
 * main.jsから呼び出される
 */
export function initializeProductImageSwitch() {
    // 必要な要素を取得
    const mainImageContainer = document.querySelector(".js-product-main-image");
    const mainImage = document.querySelector(".js-main-image");
    const thumbnailsContainer = document.querySelector(".js-product-thumbnails");
    const thumbnails = document.querySelectorAll(".js-thumbnail");

    // 必要な要素が存在しない場合は処理を終了
    if (!mainImageContainer || !mainImage || !thumbnailsContainer || thumbnails.length === 0) {
        return;
    }

    /**
     * サムネイル画像をクリックした時の処理
     * @param {Event} event - クリックイベント
     */
    function handleThumbnailClick(event) {
        event.preventDefault();

        const clickedThumbnail = event.currentTarget;
        const newImageUrl = clickedThumbnail.getAttribute("data-image-url");
        const imageIndex = clickedThumbnail.getAttribute("data-index");

        // 画像URLが存在する場合のみ処理を実行
        if (newImageUrl) {
            // メイン画像のsrcを更新
            mainImage.src = newImageUrl;
            mainImage.alt = `商品画像 ${parseInt(imageIndex) + 1}`;

            // アクティブ状態のクラスを更新
            updateActiveState(clickedThumbnail);
        }
    }

    /**
     * アクティブ状態のクラスを更新
     * @param {Element} activeElement - アクティブにする要素
     */
    function updateActiveState(activeElement) {
        // 全てのサムネイルからアクティブクラスを削除
        thumbnails.forEach((thumbnail) => {
            thumbnail.classList.remove("is-active");
        });

        // クリックされたサムネイルにアクティブクラスを追加
        activeElement.classList.add("is-active");
    }

    /**
     * 初期状態を設定
     * 最初のサムネイルをアクティブ状態にする
     */
    function setInitialState() {
        if (thumbnails.length > 0) {
            thumbnails[0].classList.add("is-active");
        }
    }

    // イベントリスナーを設定
    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("click", handleThumbnailClick);
    });

    // 初期状態を設定
    setInitialState();
}
