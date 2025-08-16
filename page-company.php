<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">COMPANY</span>
            <h1 class="c-page-kv-title">会社概要</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb company-contents">
        <?php if( get_field('sp-img') || get_field('pc-img') ): ?>
        <div class="company-contents-img">
            <picture>
                <?php if( get_field('sp-img') ): ?>
                <source media="(max-width: 767px)" srcset="<?php the_field('sp-img'); ?>">
                <?php endif; ?>
                <?php if( get_field('pc-img') ): ?>
                <img src="<?php the_field('pc-img'); ?>">
                <?php endif; ?>
            </picture>
        </div>
        <?php endif; ?>

        <div class="company-contents-table">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>