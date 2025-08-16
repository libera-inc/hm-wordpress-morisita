<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="">
    <div class="c-page-kv">
        <div class="l-container-l">
            <span class="c-page-kv-en">PRIVACY POLICY</span>
            <h1 class="c-page-kv-title"><?php the_title(); ?></h1>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb privacy-contents">
        <?php the_content(); ?>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>