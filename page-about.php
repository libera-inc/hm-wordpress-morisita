<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>

<main class="">
    <div class="c-page-kv">
        <div class="c-page-kv-inner l-container">
            <p class="c-page-kv-title">ABOUT</p>
        </div>
    </div>

    <div class="l-container u-ptb">
        親譲りの無鉄砲で小供の時から損ばかりしている。小学校に居る時分学校の二階から飛び降りて一週間ほど腰を抜かした事がある。なぜそんな無闇をしたと聞く人があるかも知れぬ。別段深い理由でもない。新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。弱虫やーい。と囃したからである。小使に負ぶさって帰って来た時、おやじが大きな眼をして二階ぐらいから飛び降りて腰を抜かす奴があるかと云ったから、この次は抜かさずに飛んで見せますと答えた。（青空文庫より）
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>