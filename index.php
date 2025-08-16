<?php
/*
ニュース一覧
*/
?>

<?php get_header(); ?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">NEWS</span>
            <?php if ( is_post_type_archive('news') && !is_tax() && !is_year() && !is_month() && !is_day() ) : ?>
            <h1 class="c-page-kv-title">ニュース</h1>
            <?php else : ?>
            <p class="c-page-kv-title">ニュース</p>
            <?php endif; ?>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container-l u-ptb news-archive">
        <?php get_template_part( 'template-parts/component/news-side' ); ?>

        <div class="news-archive-contents">
            <?php if ( have_posts() ) : ?>

            <?php if ( $archive_title = news_archive_title() ) : ?>
            <?php if ( is_year() || is_month() || is_day() || is_paged() ) : ?>
            <h1 class="u-visually-hidden"><?php echo esc_html( $archive_title ); ?></h1>
            <?php endif; ?>
            <?php endif; ?>

            <div class="news-archive-list">
                <?php
					while ( have_posts() ) :
						the_post();
					?>
                <?php get_template_part( 'template-parts/component/news-post' ); ?>
                <?php endwhile; ?>
            </div>

            <?php get_template_part( 'template-parts/component/pagination' ); ?>

            <?php else : ?>
            <p>記事がありません。</p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>