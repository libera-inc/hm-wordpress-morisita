<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="format-detection" content="telephone=no, email=no" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Play:wght@400;700&family=Zen+Kaku+Gothic+New:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri(); ?>/assets/css/vendor/splide-core.min.css?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/css/vendor/splide-core.min.css')); ?>">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/css/style.css')); ?>">

    <!-- JS Vendor -->
    <script
        src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/gsap.min.js?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/js/vendor/gsap.min.js')); ?>">
    </script>
    <script
        src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/ScrollTrigger.min.js?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/js/vendor/ScrollTrigger.min.js')); ?>">
    </script>
    <script
        src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/splide.min.js?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/js/vendor/splide.min.js')); ?>">
    </script>
    <script
        src="<?php echo get_template_directory_uri(); ?>/assets/js/vendor/splide-extension-auto-scroll.min.js?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/js/vendor/splide-extension-auto-scroll.min.js')); ?>">
    </script>

    <!-- JS Main (Module) -->
    <script type="module"
        src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js?ver=<?php echo date_i18n('YmdHis', filemtime(get_template_directory() . '/assets/js/main.js')); ?>">
    </script>

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <header class="l-header">
        <?php if (is_front_page()) : ?>
        <h1 class="l-header-logo">
            <a href="/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" width="160" height="48"
                    alt="株式会社森下" />
            </a>
        </h1>
        <?php else : ?>
        <p class="l-header-logo">
            <a href="/">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" width="160" height="48"
                    alt="株式会社森下" />
            </a>
        </p>
        <?php endif; ?>

        <dialog class="l-header-menu js-header-menu" aria-label="メニュー">
            <div class="l-header-menu-head">
                <div class="l-header-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" width="160"
                        height="48" alt="株式会社森下" />
                </div>

                <button class="l-header-menu-close-button js-header-menu-close-button">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-close.svg" width="1"
                        height="1" alt="メニューを閉じる" decoding="async" />
                </button>
            </div>

            <nav class="l-header-menu-nav">
                <ul class="l-header-menu-list">
                    <li class="l-header-menu-item">
                        <a href="<?php echo home_url(); ?>"
                            class="l-header-menu-link l-header-menu-link--home<?php if ( is_front_page() ) echo ' l-header-menu-link--top'; ?>">
                            <span>HOME</span>
                            <span>ホーム</span>
                        </a>
                    </li>
                    <li class="l-header-menu-item">
                        <a href="<?php echo home_url(); ?>/company/"
                            class="l-header-menu-link<?php if ( is_front_page() ) echo ' l-header-menu-link--top'; ?>">
                            <span>COMPANY</span>
                            <span>会社概要</span>
                        </a>
                    </li>
                    <li class="l-header-menu-button-wrap">
                        <button
                            class="l-header-menu-button js-header-menu-button<?php if ( is_front_page() ) echo ' l-header-menu-button--top'; ?>"
                            role="button" tabindex="0">
                            <span class="l-header-menu-button-inner">
                                <span>BUSINESS</span>
                                <span>事業紹介</span>
                            </span>
                        </button>

                        <ul class="l-header-submenu js-header-submenu">
                            <?php
                            // business投稿を取得して表示
                            $business_posts = new WP_Query( array(
                                'post_type'      => 'business',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                            ) );

                            if ( $business_posts->have_posts() ) :
                                while ( $business_posts->have_posts() ) : $business_posts->the_post(); ?>
                            <li class="l-header-submenu-item">
                                <a href="<?php the_permalink(); ?>" class="l-header-submenu-link">
                                    <span><?php the_title(); ?></span>
                                </a>
                            </li>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </li>
                    <li class="l-header-menu-item">
                        <a href="<?php echo home_url(); ?>/product/"
                            class="l-header-menu-link<?php if ( is_front_page() ) echo ' l-header-menu-link--top'; ?>">
                            <span>PRODUCT</span>
                            <span>製品紹介</span>
                        </a>
                    </li>
                    <li class="l-header-menu-item">
                        <a href="<?php echo home_url(); ?>/access/"
                            class="l-header-menu-link<?php if ( is_front_page() ) echo ' l-header-menu-link--top'; ?>">
                            <span>ACCESS</span>
                            <span>アクセス</span>
                        </a>
                    </li>
                    <li class="l-header-menu-item l-header-menu-item--contact">
                        <a href="<?php echo home_url(); ?>/contact/"
                            class="l-header-menu-link l-header-menu-link--contact<?php if ( is_front_page() ) echo ' l-header-menu-link--top'; ?>">
                            <span>CONTACT</span>
                            <span>お問い合わせ</span></a>
                    </li>
                </ul>
            </nav>
        </dialog>

        <button class="l-header-menu-open-button js-header-menu-open-button">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon-menu.svg" width="1" height="1"
                alt="メニューを開く" decoding="async" />
        </button>
    </header>