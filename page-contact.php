<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">CONTACT</span>
            <h1 class="c-page-kv-title">お問い合わせ</h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb">
        <p class="contact-form-text">ご質問やご相談があれば、以下フォームよりお問い合わせください。</p>
        <?php the_content(); ?>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>