<article class="c-news-post">
    <a href="<?php the_permalink(); ?>">
        <time class="c-news-post-date" datetime="<?php echo esc_attr( get_the_time( 'Y-m-d' ) ); ?>">
            <?php echo esc_html( get_the_time( get_option( 'date_format' ) ) ); ?>
        </time>

        <?php if ( is_front_page() ) : ?>
        <h3 class="c-news-post-title">
            <?php the_title(); ?>
        </h3>
        <?php else : ?>
        <h2 class="c-news-post-title">
            <?php the_title(); ?>
        </h2>
        <?php endif; ?>
    </a>
</article>