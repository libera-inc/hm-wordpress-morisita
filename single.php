<?php
/*
ニュース記事
*/
?>

<?php get_header(); ?>

<?php
while ( have_posts() ) :
    the_post();
    ?>
<main class="">
    <div class="c-page-kv-single">
        <div class="l-container-l">
            <div class="c-page-kv-single-inner">
                <div class="">
                    <div class="c-page-kv-single-title-head">
                        <div class="c-page-kv-single-title-type">
                            <span class="c-page-kv-single-en">NEWS</span>
                            <span class="c-page-kv-single-ja">お知らせ</span>
                        </div>
                        <time datetime="<?php the_time( 'Y-m-d' ); ?>"
                            class="c-page-kv-single-date"><?php the_time( get_option( 'date_format' ) ); ?></time>
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

    <div class="l-container u-ptb news-single">
        <div class="news-single-contents">
            <?php the_content(); ?>
        </div>

        <?php
        // 前の記事と次の記事のナビゲーション
        $prev_post = get_previous_post();
        $next_post = get_next_post();

        if ( $prev_post || $next_post ) :
        ?>
        <div class="news-single-navigation">
            <?php if ( $prev_post ) : ?>
            <a href="<?php echo get_permalink( $prev_post->ID ); ?>"
                class="c-button news-single-navigation-link --prev">PREV</a>
            <?php endif; ?>

            <?php if ( $next_post ) : ?>
            <a href="<?php echo get_permalink( $next_post->ID ); ?>"
                class="c-button news-single-navigation-link --next">NEXT</a>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</main>
<?php endwhile; ?>

<?php get_footer(); ?>