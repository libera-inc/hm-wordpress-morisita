<?php get_header(); ?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">PRODUCT</span>
            <h1 class="c-page-kv-title">製品紹介</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container-l u-ptb">
        <?php if ( have_posts() ) : ?>

        <div class="product-archive-posts">
            <?php
                while ( have_posts() ) :
                    the_post();
            ?>
            <?php get_template_part( 'template-parts/component/product-post' ); ?>
            <?php endwhile; ?>
        </div>

        <?php get_template_part( 'template-parts/component/pagination' ); ?>

        <?php else : ?>

        <p>記事がありません。</p>

        <?php endif; ?>
    </div>
</main>


<?php get_footer(); ?>