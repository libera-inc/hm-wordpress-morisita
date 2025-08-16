<?php
global $wp_query;
if ( $wp_query->max_num_pages > 1 ) :
?>
<div class="c-pagination">
    <?php
    the_posts_pagination(
        array(
            'mid_size'           => 1,
            'prev_text'          => '',
            'next_text'          => '',
            'screen_reader_text' => '…',
        )
    );
    ?>
</div>
<?php endif; ?>