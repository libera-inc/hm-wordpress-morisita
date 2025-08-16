/**
 * トップKVの背景スライダー（フェード）を初期化
 * 既存の `.top-kv-bg > ul` 構造をJSでSplide構造に変換してからマウントします。
 */
export function initializeTopKvSlider() {
    const kvBg = document.querySelector(".js-top-kv-bg");
    if (!kvBg) return;

    const mount = () => {
        const SplideCtor = window.Splide;
        if (!SplideCtor) return;
        // Splide初期化（フェードでふわっと切り替え）
        const options = {
            type: "fade",
            rewind: true,
            speed: 1000,
            autoplay: true,
            interval: 5000,
            pauseOnHover: false,
            pauseOnFocus: false,
            arrows: false,
            pagination: false,
            drag: false,
        };

        const splide = new SplideCtor(kvBg, options);

        // ===== プログレス UI（既存要素がある場合のみ制御） =====
        const kv = kvBg.closest(".js-top-kv") || kvBg.closest(".top-kv") || document.body;
        const progressEl = kv.querySelector(".js-top-kv-progress");
        const indexEl = progressEl ? progressEl.querySelector(".js-top-kv-progress-index") : null;

        if (progressEl && indexEl) {
            const formatIndex = (i) => String(i + 1).padStart(2, "0");
            // 1周 = 表示時間（interval）。切替アニメ（speed）は含めない
            const totalMs = options.interval;
            let rafId = 0;

            const startProgress = () => {
                const start = performance.now();
                cancelAnimationFrame(rafId);
                const tick = (now) => {
                    const t = Math.min(1, (now - start) / totalMs);
                    const deg = `${t * 360}deg`;
                    progressEl.style.setProperty("--deg", deg);
                    if (t < 1) rafId = requestAnimationFrame(tick);
                };
                rafId = requestAnimationFrame(tick);
            };

            const applyUi = (activeIndex) => {
                indexEl.textContent = formatIndex(activeIndex);
                progressEl.style.setProperty("--deg", "0deg");
                startProgress();
            };

            // 初期・切替時のハンドラ
            splide.on("mounted", () => applyUi(splide.index));
            // 新しいスライドへの遷移完了後に進捗を開始
            splide.on("moved", (newIndex) => applyUi(newIndex));
        }

        splide.mount();
    };

    // headで type="module" かつ vendor読み込み済みのため、即時マウントで十分
    mount();
}
