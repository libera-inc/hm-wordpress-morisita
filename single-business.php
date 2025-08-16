<?php get_header(); ?>


<main class="">
    <div class="c-page-kv-single">
        <div class="l-container-l">
            <div class="c-page-kv-single-inner">
                <div class="">
                    <div class="c-page-kv-single-title-type">
                        <span class="c-page-kv-single-en">BUSINESS</span>
                        <span class="c-page-kv-single-ja">事業紹介</span>
                    </div>

                    <h1 class="c-page-kv-single-title"><?php the_title(); ?></h1>
                </div>
                <div class="c-page-kv-single-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-thumbnail.png"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container-l u-ptb business-single">
        <aside class="business-single-side">
            <span class="c-side-menu-title-en">MENU</span>
            <h2 class="c-side-menu-title-ja">メニュー</h2>

            <ul class="c-side-menu-list js-business-nav">
                <li>
                    <a href="#problem" class="js-nav-link" data-target="problem">
                        <span>お客様の課題</span>
                    </a>
                </li>

                <li>
                    <a href="#feature" class="js-nav-link" data-target="feature">
                        <span>特徴</span>
                    </a>
                </li>

                <li>
                    <a href="#flow" class="js-nav-link" data-target="flow">
                        <span>納品までの流れ</span>
                    </a>
                </li>
            </ul>
        </aside>


        <div class="business-single-section-wrap">
            <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <?php if( get_field('problem') ): ?>
            <section class="business-single-problem" id="problem">
                <span class="business-single-title-en">PROBLEM</span>
                <h2 class="business-single-title">お客様の課題</h2>
                <p class="business-single-problem-text">以下のような課題を私達は解決いたします。</p>
                <?php $problem = get_field('problem'); ?>
                <?php if( $problem['list'] ): ?>
                <div class="business-single-list">
                    <?php echo $problem['list']; ?>
                </div>
                <?php endif; ?>
            </section>
            <?php endif; ?>

            <?php if( get_field('feature') ): ?>
            <section class="business-single-feature" id="feature">
                <span class="business-single-title-en">FEATURE</span>
                <h2 class="business-single-title">特徴</h2>
                <?php $feature = get_field('feature'); ?>

                <div class="business-single-feature-items">
                    <?php if( $feature && isset($feature['item01']) ): ?>
                    <section class="business-single-feature-item">
                        <?php $item01 = $feature['item01']; ?>
                        <?php if( $item01 && isset($item01['img']) && $item01['img'] ): ?>
                        <div class="business-single-feature-img">
                            <img src="<?php echo esc_url($item01['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item01 && isset($item01['title']) && $item01['title'] ): ?>
                            <h3 class="business-single-feature-title"><?php echo esc_html($item01['title']); ?>
                            </h3>
                            <?php endif; ?>

                            <?php if( $item01 && isset($item01['text']) && $item01['text'] ): ?>
                            <div class="business-single-feature-text"><?php echo esc_html($item01['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if( $feature && isset($feature['item02']) ): ?>
                    <section class="business-single-feature-item">
                        <?php $item02 = $feature['item02']; ?>
                        <?php if( $item02 && isset($item02['img']) && $item02['img'] ): ?>
                        <div class="business-single-feature-img">
                            <img src="<?php echo esc_url($item02['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item02 && isset($item02['title']) && $item02['title'] ): ?>
                            <h3 class="business-single-feature-title"><?php echo esc_html($item02['title']); ?></h3>
                            <?php endif; ?>

                            <?php if( $item02 && isset($item02['text']) && $item02['text'] ): ?>
                            <div class="business-single-feature-text"><?php echo esc_html($item02['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if( $feature && isset($feature['item03']) ): ?>
                    <section class="business-single-feature-item">
                        <?php $item03 = $feature['item03']; ?>
                        <?php if( $item03 && isset($item03['img']) && $item03['img'] ): ?>
                        <div class="business-single-feature-img">
                            <img src="<?php echo esc_url($item03['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item03 && isset($item03['title']) && $item03['title'] ): ?>
                            <h3 class="business-single-feature-title"><?php echo esc_html($item03['title']); ?></h3>
                            <?php endif; ?>

                            <?php if( $item03 && isset($item03['text']) && $item03['text'] ): ?>
                            <div class="business-single-feature-text"><?php echo esc_html($item03['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>
                </div>
            </section>
            <?php endif; ?>

            <?php if( get_field('flow') ): ?>
            <section class="business-single-flow" id="flow">
                <span class="business-single-title-en">FLOW</span>
                <h2 class="business-single-title">納品までの流れ</h2>
                <?php $flow = get_field('flow'); ?>

                <div class="business-single-flow-items">
                    <?php if( $flow && isset($flow['item01']) ): ?>
                    <section class="business-single-flow-item">
                        <?php $item01 = $flow['item01']; ?>
                        <?php if( $item01 && isset($item01['img']) && $item01['img'] ): ?>
                        <div class="business-single-flow-img">
                            <img src="<?php echo esc_url($item01['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item01 && isset($item01['title']) && $item01['title'] ): ?>
                            <h3 class="business-single-flow-title"><?php echo esc_html($item01['title']); ?></h3>
                            <?php endif; ?>

                            <?php if( $item01 && isset($item01['text']) && $item01['text'] ): ?>
                            <div class="business-single-flow-text"><?php echo esc_html($item01['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if( $flow && isset($flow['item02']) ): ?>
                    <section class="business-single-flow-item">
                        <?php $item02 = $flow['item02']; ?>
                        <?php if( $item02 && isset($item02['img']) && $item02['img'] ): ?>
                        <div class="business-single-flow-img">
                            <img src="<?php echo esc_url($item02['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item02 && isset($item02['title']) && $item02['title'] ): ?>
                            <h3 class="business-single-flow-title"><?php echo esc_html($item02['title']); ?></h3>
                            <?php endif; ?>

                            <?php if( $item02 && isset($item02['text']) && $item02['text'] ): ?>
                            <div class="business-single-flow-text"><?php echo esc_html($item02['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>

                    <?php if( $flow && isset($flow['item03']) ): ?>
                    <section class="business-single-flow-item">
                        <?php $item03 = $flow['item03']; ?>
                        <?php if( $item03 && isset($item03['img']) && $item03['img'] ): ?>
                        <div class="business-single-flow-img">
                            <img src="<?php echo esc_url($item03['img']); ?>" alt="">
                        </div>
                        <?php endif; ?>

                        <div class="">
                            <?php if( $item03 && isset($item03['title']) && $item03['title'] ): ?>
                            <h3 class="business-single-flow-title"><?php echo esc_html($item03['title']); ?></h3>
                            <?php endif; ?>

                            <?php if( $item03 && isset($item03['text']) && $item03['text'] ): ?>
                            <div class="business-single-flow-text"><?php echo esc_html($item03['text']); ?></div>
                            <?php endif; ?>
                        </div>
                    </section>
                    <?php endif; ?>
                </div>
            </section>
            <?php endif; ?>

            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>