<?php get_header(); ?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">ACCESS</span>
            <h1 class="c-page-kv-title">アクセス</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>


    <div class="l-container u-ptb">
        <?php if ( have_posts() ) : ?>

        <div class="access-posts">
            <?php
                while ( have_posts() ) :
                    the_post();
            ?>

            <?php
                // ACFカスタムフィールドからデータを取得
                $address           = get_field( 'address' );
                $google_map_url    = get_field( 'google_map_url' );
                $google_map_iframe = get_field( 'google_map_iframe' );
            ?>
            <article class="access-post">
                <h2 class="access-post-title"><?php the_title(); ?></h2>

                <?php if ( $address ) : ?>
                <div class="access-post-address">
                    <p><?php echo esc_html( $address ); ?></p>
                </div>
                <?php endif; ?>

                <?php if ( $google_map_url ) : ?>
                <div class="access-post-map-link">
                    <a href="<?php echo esc_url( $google_map_url ); ?>" target="_blank" rel="noopener noreferrer"
                        class="c-button">
                        GOOGLE MAP
                    </a>
                </div>
                <?php endif; ?>

                <?php if ( $google_map_iframe ) : ?>
                <div class="access-post-map">
                    <?php echo allow_google_map_iframe( $google_map_iframe ); ?>
                </div>
                <?php endif; ?>
            </article>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</main>


<?php get_footer(); ?>