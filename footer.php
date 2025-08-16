<div class="c-cta">
    <div class="c-cta-bg-text splide js-cta-slide">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <span class="c-cta-bg-text-item red">CONTACT US</span>
                </li>
                <li class="splide__slide">
                    <span class="c-cta-bg-text-item">CONTACT US</span>
                </li>
                <li class="splide__slide">
                    <span class="c-cta-bg-text-item">CONTACT US</span>
                </li>
                <li class="splide__slide">
                    <span class="c-cta-bg-text-item">CONTACT US</span>
                </li>
                <li class="splide__slide">
                    <span class="c-cta-bg-text-item">CONTACT US</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="l-container">
        <a href="<?php echo home_url(); ?>/contact/" class="c-cta-link">
            <span class="c-cta-link-inner">
                <span class="c-cta-link-text">CONTACT</span>
                <span class="c-cta-link-text02">お問い合わせ</span>
            </span>
        </a>
    </div>
</div>

<footer class="l-footer">
    <button class="l-footer-to-top js-footer-to-top">
        <span class="u-visually-hidden">ページのトップへ飛ぶ</span>
    </button>

    <div class="l-container-l">
        <div class="l-footer-inner">
            <div class="l-footer-info">
                <div class="l-footer-logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-white.png" width="247"
                            height="75" alt="株式会社森下" decoding="async" />
                    </a>
                </div>

                <p class="l-footer-address">〒123-4567 東京都春日区青葉町2-11-7</p>
                <p class="l-footer-tel">
                    <span class="l-footer-tel-label">Tel.</span>
                    <span class="l-footer-tel-number">03-1234-5678</span>
                </p>
            </div>

            <div class="l-footer-list-wrap">
                <ul class="l-footer-list01">
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>" class="l-footer-link">
                            <span>HOME</span>
                        </a>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/company/" class="l-footer-link">
                            <span>会社概要</span>
                        </a>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/message/" class="l-footer-link">
                            <span>代表挨拶</span>
                        </a>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/access/" class="l-footer-link">
                            <span>アクセス</span>
                        </a>
                    </li>
                </ul>

                <ul class="l-footer-list02">
                    <li class="l-footer-item">
                        <span class="l-footer-business-text">事業紹介</span>
                        <ul class="l-footer-submenu">
                            <?php
                            // business投稿を取得して表示
                            $business_posts = new WP_Query( array(
                                'post_type'      => 'business',
                                'post_status'    => 'publish',
                                'posts_per_page' => -1,
                            ) );

                            if ( $business_posts->have_posts() ) :
                                while ( $business_posts->have_posts() ) : $business_posts->the_post(); ?>
                            <li class="l-footer-submenu-item">
                                <a href="<?php the_permalink(); ?>" class="l-footer-submenu-link">
                                    <span><?php the_title(); ?></span>
                                </a>
                            </li>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </ul>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/product/" class="l-footer-link">
                            <span>製品紹介</span>
                        </a>
                    </li>
                </ul>

                <ul class="l-footer-list03">
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/news/" class="l-footer-link">
                            <span>お知らせ</span>
                        </a>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/privacy/" class="l-footer-link">
                            <span>プライバシーポリシー</span>
                        </a>
                    </li>
                    <li class="l-footer-item">
                        <a href="<?php echo home_url(); ?>/contact/" class="l-footer-link">
                            <span>お問い合わせ</span>
                        </a>
                    </li>
                </ul>
            </div>

            <small class="l-footer-copyright">&copy; <?php echo date('Y'); ?> © 2024 MORISITA inc.</small>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>