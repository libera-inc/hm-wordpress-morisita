/**
 * ハンバーガーメニュー開閉制御機能
 *
 * 機能概要：
 * - ハンバーガーメニューの開閉動作を制御
 * - GSAPを使用したフェードイン/アウトアニメーション
 * - 複数の操作でメニューを閉じることが可能（クローズボタン、メニューリンク、Escapeキー、リサイズ）
 *
 * 開閉条件：
 * - 開く：ハンバーガーメニューボタンクリック
 * - 閉じる：クローズボタンクリック、メニューリンククリック、Escapeキー、画面リサイズ（900px以上）
 */
export const initializeHamburgerMenu = () => {
    // 必要な要素を取得
    const menu = document.querySelector(".js-header-menu");
    const openButton = document.querySelector(".js-header-menu-open-button");
    const closeButton = document.querySelector(".js-header-menu-close-button");
    const menuItems = menu.querySelectorAll(".js-header-menu-item-link");

    // 必要な要素が存在しない場合は処理を中断
    if (!menu || !openButton || !closeButton) return;

    // メニュー表示時のアニメーション関数
    const openMenu = () => {
        // ページスクロールを無効化（メニュー表示中は背景固定）
        document.body.style.overflow = "hidden";

        // ダイアログ要素として表示
        menu.showModal();

        // フェードインアニメーション
        gsap.to(menu, {
            opacity: 1, // 完全に表示
            duration: 0.3, // 0.3秒でアニメーション
            ease: "power2.out", // イージング（滑らかな動き）
        });
    };

    // メニュー非表示時のアニメーション関数
    const closeMenu = () => {
        // フェードアウトアニメーション
        gsap.to(menu, {
            opacity: 0, // 透明にする
            duration: 0.3, // 0.3秒でアニメーション
            ease: "power2.out", // イージング（滑らかな動き）
            onComplete: () => {
                // アニメーション完了後の処理
                menu.close(); // ダイアログを閉じる
                // ページスクロールを再有効化
                document.body.style.overflow = "";
            },
        });
    };

    // ハンバーガーメニューボタンクリック時：メニューを開く
    openButton.addEventListener("click", () => {
        openMenu();
    });

    // メニューを閉じる要素のクリックイベントをまとめて処理
    // 対象：クローズボタン + 全てのメニューリンク
    [closeButton, ...menuItems].forEach((element) => {
        element.addEventListener("click", () => {
            closeMenu();
        });
    });

    // キーボード操作：Escapeキーでメニューを閉じる
    document.addEventListener("keydown", (event) => {
        if (event.key === "Escape") {
            event.preventDefault(); // デフォルト動作を無効化
            closeMenu();
        }
    });

    // ウィンドウリサイズ時の処理：PC表示時（900px以上）は自動でメニューを閉じる
    window.addEventListener("resize", () => {
        if (window.innerWidth >= 900) {
            closeMenu();
        }
    });
};
