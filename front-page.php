<?php get_header(); ?>

<main class="">
    <div class="top-kv js-top-kv">
        <div class="top-kv-bg-filter">
            <picture>
                <source media="(max-width: 767px)"
                    srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-filter-sp.png" />
                <img width="1920" height="1080"
                    src="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-filter.png" alt="" />
            </picture>
        </div>

        <div class="top-kv-bg js-top-kv-bg splide">
            <div class="splide__track js-top-kv-track">
                <ul class="splide__list js-top-kv-list">
                    <li class="splide__slide js-top-kv-slide">
                        <picture>
                            <source media="(max-width: 767px)"
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide-sp.jpg" />
                            <img width="1920" height="1080"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide.jpg"
                                alt="" />
                        </picture>
                    </li>
                    <li class="splide__slide js-top-kv-slide">
                        <picture>
                            <source media="(max-width: 767px)"
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide02-sp.jpg" />
                            <img width="1920" height="1080"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide02.jpg"
                                alt="" />
                        </picture>
                    </li>
                    <li class="splide__slide js-top-kv-slide">
                        <picture>
                            <source media="(max-width: 767px)"
                                srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide03-sp.jpg" />
                            <img width="1920" height="1080"
                                src="<?php echo get_template_directory_uri(); ?>/assets/img/top-kv-bg-slide03.jpg"
                                alt="" />
                        </picture>
                    </li>
                </ul>
            </div>
        </div>

        <div class="top-kv-text-wrap">
            <div class="l-container-l">
                <div class="top-kv-text-inner">
                    <div class="top-kv-progress js-top-kv-progress">
                        <span class="js-top-kv-progress-index">01</span>
                    </div>

                    <p class="top-kv-text">
                        <span>特殊ボルトナット制作の</span>
                        <span>プロフェッショナル</span>
                    </p>

                    <p class="top-kv-text02">
                        <span>Special bolt and nut production</span><span>professionals</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="top-news">
        <div class="l-container-l">
            <div class="top-news-inner">
                <div class="top-news-title">
                    <span class="top-title-en">NEWS</span>
                    <h2 class="top-title-ja">お知らせ</h2>
                </div>

                <a href="<?php echo home_url(); ?>/news/" class="c-button top-news-button">
                    VIEW MORE
                </a>

                <div class="top-news-list">
                    <?php
					$news_posts = new WP_Query([
						'post_type' => 'news',
						'posts_per_page' => 3,
						'post_status' => 'publish'
					]);
					
					if ($news_posts->have_posts()) : ?>
                    <div class="">
                        <?php while ($news_posts->have_posts()) : $news_posts->the_post(); ?>
                        <?php get_template_part('template-parts/component/news-post'); ?>
                        <?php endwhile; ?>
                    </div>
                    <?php
					wp_reset_postdata();
					else : ?>
                    <p>ニュース記事がありません。</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section class="top-business">
        <div class="l-container-l">
            <div class="top-business-inner">
                <div class="top-business-img">
                    <source media="(max-width: 767px)"
                        srcset="<?php echo get_template_directory_uri(); ?>/assets/img/top-business-sp.jpg" />
                    <img width="1160" height="1200"
                        src="<?php echo get_template_directory_uri(); ?>/assets/img/top-business.jpg" alt="" />
                    </picture>
                </div>

                <div class="top-business-main">
                    <div class="top-business-title">
                        <span class="top-small-title-en">BUSINESS</span>
                        <h2 class="top-small-title-ja">事業紹介</h2>
                    </div>

                    <p class="top-business-text">
                        <span>高品質な</span><span>ボルトナットで、</span><span>世界を支える。</span>
                    </p>

                    <p class="top-business-text02">
                        <span>どんな環境にも、最適なソリューション。</span>
                        <span>豊富な経験と技術力で、お客様のニーズに答える製品づくりをしています。</span>
                    </p>

                    <ul class="top-business-list">
                        <?php
							// business投稿を取得して表示
							$business_posts = new WP_Query( array(
								'post_type'      => 'business',
								'post_status'    => 'publish',
								'posts_per_page' => -1,
							) );

							if ( $business_posts->have_posts() ) :
								while ( $business_posts->have_posts() ) : $business_posts->the_post(); ?>
                        <li class="top-business-item">
                            <a href="<?php the_permalink(); ?>">
                                <span><?php the_title(); ?></span>
                                <span class="top-business-item-arrow"></span>
                            </a>
                        </li>
                        <?php endwhile;
								wp_reset_postdata();
							endif;
							?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="top-product">
        <div class="l-container-l">
            <div class="top-product-title">
                <span class="top-small-title-en top-small-title-en--white">PRODUCT</span>
                <h2 class="top-small-title-ja top-small-title-ja--white">製品紹介</h2>
            </div>

            <p class="top-product-text">確かな品質と技術力</p>

            <p class="top-product-text02">
                <span>高品質・高精度のボルトナットを豊富に取り揃え。</span>
                <span>産業の要として、お客様のニーズに応える製品をお届けします。</span>
            </p>
        </div>

        <div class="top-product-list">
            <?php
				$product_posts = new WP_Query([
					'post_type' => 'product',
					'posts_per_page' => -1, // 全ての商品を表示
					'post_status' => 'publish'
				]);

				if ($product_posts->have_posts()) : ?>
            <div class="splide product-slider js-product-slider">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php while ($product_posts->have_posts()) : $product_posts->the_post(); ?>
                        <li class="splide__slide">
                            <?php get_template_part('template-parts/component/product-post'); ?>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev" aria-label="前へ"></button>
                    <button class="splide__arrow splide__arrow--next" aria-label="次へ"></button>
                </div>
            </div>
            <?php endif;
				wp_reset_postdata();
			?>
        </div>

        <div class="top-product-button l-container-l">
            <a href="<?php echo home_url(); ?>/product/" class="c-button c-button--skeleton">
                VIEW MORE
            </a>
        </div>
    </section>

    <div class="l-container-l">
        <div class="top-page-links">
            <section class="top-page-link">
                <a href="<?php echo home_url(); ?>/company/">
                    <div class="top-page-link-title">
                        <span class="top-title-en">COMAPANY</span>
                        <h2 class="top-title-ja">会社概要</h2>
                    </div>
                    <p class="top-page-link-text">事業内容、経営方針など、 当社を深く知っていただくための情報をご紹介します。</p>
                    <div class="top-page-link-arrow-wrap">
                        <span class="top-page-link-arrow"></span>
                    </div>
                </a>
            </section>

            <section class="top-page-link">
                <a href="<?php echo home_url(); ?>/message/">
                    <div class="top-page-link-title">
                        <span class="top-title-en">MESSAGE</span>
                        <h2 class="top-title-ja">代表挨拶</h2>
                    </div>
                    <p class="top-page-link-text">私たちの理念と未来への展望をお伝えします。 社長からのメッセージをご覧ください。</p>
                    <div class="top-page-link-arrow-wrap">
                        <span class="top-page-link-arrow"></span>
                    </div>
                </a>
            </section>

            <section class="top-page-link">
                <a href="<?php echo home_url(); ?>/access/">
                    <div class="top-page-link-title">
                        <span class="top-title-en">ACCESS</span>
                        <h2 class="top-title-ja">アクセス</h2>
                    </div>
                    <p class="top-page-link-text">本社工場や営業所の所在地、 詳細な地図と交通手段をご確認いただけます。</p>
                    <div class="top-page-link-arrow-wrap">
                        <span class="top-page-link-arrow"></span>
                    </div>
                </a>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>