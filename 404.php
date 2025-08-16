<?php get_header(); ?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">404 Not Found</span>
            <h1 class="c-page-kv-title">お探しのページは見つかりませんでした</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb error">
        <p class="error-text">
            <span>申し訳ございません。</span>
            <span>お探しのページは削除されたか、URLが変更された可能性がございます。</span>
        </p>

        <div class="error-button">
            <a href="<?php echo home_url(); ?>" class="c-button">
                <span>TOP PAGE</span>
            </a>
        </div>
    </div>
</main>

<?php get_footer(); ?>