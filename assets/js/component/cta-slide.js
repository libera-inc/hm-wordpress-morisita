/**
 * CTAセクションの背景テキスト自動スライド機能
 *
 * このコンポーネントは、CTAセクションの「CONTACT US」背景テキストを
 * Splideライブラリを使用してエンドレスに自動スライドさせる機能を提供します。
 *
 * 機能:
 * - SplideライブラリのautoScrollエクステンションを使用
 * - エンドレスループ再生
 * - レスポンシブ対応（PC/スマートフォン）
 * - スムーズな自動スライド
 * - 矢印・ページネーション非表示
 *
 * 動作原理:
 * - 複数の同じテキストスライドを作成
 * - autoScrollエクステンションで自動スクロール
 * - type: "loop" でエンドレスループを実現
 */

/**
 * CTA背景テキストスライドの初期化
 * @returns {void} 戻り値なし
 */
export const initializeCtaSlide = () => {
    // スライド対象の要素を取得
    const slideElement = document.querySelector(".js-cta-slide");

    // 要素が存在しない場合は処理を終了
    if (!slideElement) {
        return;
    }

    // Splideライブラリが読み込まれているかチェック
    if (typeof window.Splide === "undefined") {
        return;
    }

    // Splideの初期化
    const splide = new window.Splide(slideElement, {
        type: "loop", // ループ再生
        autoWidth: true, // スライドの幅を自動調整（文字の幅に合わせる）
        perMove: 1, // スライド移動数
        gap: "40px", // スライド間の間隔を追加
        arrows: false, // 矢印非表示
        pagination: false, // ページネーション非表示
        drag: false, // ドラッグ無効
        keyboard: false, // キーボード操作無効
        autoScroll: {
            speed: 1, // スクロール速度（ゆっくり）
            pauseOnHover: false, // ホバーで止めない
            pauseOnFocus: false, // フォーカスで止めない
        },
        breakpoints: {
            899: {
                autoScroll: {
                    speed: 0.8, // スマートフォンでは少し遅く
                },
            },
        },
    });

    // autoScrollエクステンションをマウント
    if (window.splide && window.splide.Extensions) {
        splide.mount(window.splide.Extensions);
    } else {
        splide.mount(); // 通常のマウントを実行
    }
};
