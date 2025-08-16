/**
 * ヘッダー サブメニュー 開閉制御
 * - クリックで開閉
 * - GSAPで高さ/フェードをアニメーション
 */
export const initializeHeaderSubmenu = () => {
    const buttonWraps = Array.from(document.querySelectorAll(".l-header-menu-button-wrap"));
    if (!buttonWraps.length) return;

    buttonWraps.forEach((wrap) => {
        const button = wrap.querySelector(".js-header-menu-button");
        const submenu = wrap.querySelector(".js-header-submenu");
        if (!button || !submenu) return;

        // 初期状態を閉じる（SPは後で即時オープンに上書き）
        gsap.set(submenu, { display: "none", autoAlpha: 0 });

        let isOpen = false;
        let isAnimating = false;

        // SP（<1080px）の場合は初期状態で開いておく
        if (window.innerWidth < 1080) {
            gsap.set(submenu, { display: "block", height: "auto", autoAlpha: 1 });
            isOpen = true;
        }

        const openSubmenu = () => {
            if (isAnimating || isOpen) return;
            isAnimating = true;
            // 表示してフェードイン
            gsap.set(submenu, { display: "block" });
            gsap.fromTo(
                submenu,
                { autoAlpha: 0 },
                {
                    autoAlpha: 1,
                    duration: 0.2,
                    ease: "power2.out",
                    onComplete: () => {
                        isOpen = true;
                        isAnimating = false;
                    },
                },
            );
        };

        const closeSubmenu = () => {
            if (isAnimating || !isOpen) return;
            isAnimating = true;
            // フェードアウト
            gsap.to(submenu, {
                autoAlpha: 0,
                duration: 0.2,
                ease: "power2.inOut",
                onComplete: () => {
                    gsap.set(submenu, { display: "none" });
                    isOpen = false;
                    isAnimating = false;
                },
            });
        };

        const toggleSubmenu = (event) => {
            // サブメニュー内クリックは無視（リンク遷移を許可）
            if (event.target.closest(".js-header-submenu")) return;
            // SP(<1080px)では常時開いたままにするためトグル無効
            if (window.innerWidth < 1080) return;
            // トグル用ボタンのクリックのみ遷移防止
            event.preventDefault();
            if (isOpen) {
                closeSubmenu();
            } else {
                openSubmenu();
            }
        };

        button.addEventListener("click", toggleSubmenu);

        // サブメニュー内リンクはバブリングを停止して親ボタンのpreventDefaultを回避
        const submenuLinks = submenu.querySelectorAll("a");
        submenuLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.stopPropagation();
            });
        });

        // サブメニュー外クリックで閉じる
        document.addEventListener("click", (event) => {
            if (!isOpen) return;
            // SP(<1080px)では外側クリックでも閉じない
            if (window.innerWidth < 1080) return;
            // wrap（ボタン+サブメニュー）外なら閉じる
            if (!wrap.contains(event.target)) {
                closeSubmenu();
            }
        });

        // Escapeキーでサブメニューを閉じる
        document.addEventListener("keydown", (event) => {
            if (!isOpen) return;
            // SP(<1080px)ではESCでも閉じない
            if (window.innerWidth < 1080) return;
            if (event.key === "Escape" || event.key === "Esc") {
                closeSubmenu();
            }
        });

        // 画面リサイズ時：PCでは閉じる、SPでは開く
        window.addEventListener("resize", () => {
            if (window.innerWidth >= 1080) {
                gsap.killTweensOf(submenu);
                gsap.set(submenu, { display: "none", autoAlpha: 0 });
                isOpen = false;
                isAnimating = false;
            } else {
                gsap.killTweensOf(submenu);
                gsap.set(submenu, { display: "block", autoAlpha: 1 });
                isOpen = true;
                isAnimating = false;
            }
        });
    });
};
