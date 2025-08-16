<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">MESSAGE</span>
            <h1 class="c-page-kv-title">代表挨拶</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb message-contents">
        <?php if( get_field('message') || get_field('name') || get_field('sp-img') || get_field('pc-img') ): ?>
        <?php if( get_field('sp-img') || get_field('pc-img') ): ?>
        <div class="message-contents-img">
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

        <div class="">
            <p class="message-contents-text">
                <?php the_field('message'); ?>
            </p>

            <div class="message-contents-text02">
                <?php the_content(); ?>
            </div>

            <div class="message-contents-name">
                <p class="message-contents-name-text">代表取締役社長</p>
                <p class="message-contents-name-text02">
                    <?php the_field('name'); ?>
                </p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>