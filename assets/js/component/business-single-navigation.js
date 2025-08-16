/**
 * ビジネス単体ページのサイドナビゲーション切り替え機能
 *
 * このコンポーネントは、ビジネス単体ページのサイドナビゲーションで
 * GSAPのScrollTriggerを使用してスクロール位置に応じたアクティブ状態の切り替えを行います。
 *
 * 機能:
 * - 各セクション（problem, feature, flow）とナビゲーションの連動
 * - スクロール位置に応じた is-current クラスの自動切り替え
 * - スムーズなクラス切り替えアニメーション
 * - レスポンシブ対応
 *
 * 動作原理:
 * - ScrollTriggerで各セクションとの交差を監視
 * - セクションが画面中央付近に入った時点でナビゲーションを更新
 * - 現在のアクティブなナビゲーション項目に is-current クラスを付与
 */

/**
 * ビジネス単体ページナビゲーションの初期化
 * @returns {void} 戻り値なし
 */
export const initializeBusinessSingleNavigation = () => {
    const setup = () => {
        // ビジネス単体ページのナビゲーションが存在するかチェック
        const navContainer = document.querySelector(".js-business-nav");
        if (!navContainer) {
            return;
        }

        // GSAPとScrollTriggerが読み込まれているかチェック
        if (!window.gsap || !window.ScrollTrigger) {
            console.warn("GSAP or ScrollTrigger is not loaded");
            return;
        }

        // ナビゲーション項目とセクションの対応関係を定義
        const sections = [
            {
                id: "problem",
                navSelector: '.js-nav-link[data-target="problem"]',
                sectionSelector: "#problem",
            },
            {
                id: "feature",
                navSelector: '.js-nav-link[data-target="feature"]',
                sectionSelector: "#feature",
            },
            {
                id: "flow",
                navSelector: '.js-nav-link[data-target="flow"]',
                sectionSelector: "#flow",
            },
        ];

        // 各セクションの存在確認
        const validSections = sections.filter((section) => {
            const sectionElement = document.querySelector(section.sectionSelector);
            const navElement = document.querySelector(section.navSelector);
            return sectionElement && navElement;
        });

        // 有効なセクションが存在しない場合は処理を終了
        if (validSections.length === 0) {
            console.warn("No valid sections found for business navigation");
            return;
        }

        /**
         * ナビゲーションのアクティブ状態を更新
         * @param {string} activeId - アクティブにするセクションのID
         */
        const updateActiveNavigation = (activeId) => {
            // 全てのナビゲーション項目から is-current クラスを削除
            const allNavLinks = document.querySelectorAll(".js-nav-link");
            allNavLinks.forEach((link) => {
                link.classList.remove("is-current");
            });

            // 指定されたセクションのナビゲーション項目に is-current クラスを追加
            const activeNavElement = document.querySelector(`.js-nav-link[data-target="${activeId}"]`);
            if (activeNavElement) {
                activeNavElement.classList.add("is-current");
            }
        };

        // 各セクションにScrollTriggerを設定（ビューポート上端とセクション上端が交差した瞬間に切替）
        validSections.forEach((section) => {
            const sectionElement = document.querySelector(section.sectionSelector);

            if (sectionElement) {
                window.ScrollTrigger.create({
                    trigger: sectionElement,
                    start: "top-=120 top",
                    end: "bottom-=120 top",
                    onEnter: () => {
                        updateActiveNavigation(section.id);
                    },
                    onEnterBack: () => {
                        updateActiveNavigation(section.id);
                    },
                    // markers: true,
                });
            }
        });

        const initializeNavigation = () => {
            // 最初のセクションをデフォルトでアクティブに設定
            if (validSections.length > 0) {
                updateActiveNavigation(validSections[0].id);
            }
        };

        initializeNavigation();
    };

    setup();
};
