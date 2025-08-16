/**
 * 商品スライダーの初期化と制御
 */
export function initializeProductSlider() {
    // ページに商品スライダーが存在するかチェック
    const productSliders = document.querySelectorAll(".js-product-slider");

    if (productSliders.length === 0) {
        return;
    }

    productSliders.forEach((slider, index) => {
        const splide = new Splide(slider, {
            type: "loop",
            fixedWidth: 404,
            perMove: 1,
            gap: "32px",
            pagination: false,
            arrows: true,
            autoplay: false,
            breakpoints: {
                768: {
                    fixedWidth: 300,
                    gap: "24px",
                },
            },
        });

        splide.mount();
    });
}
