<div class="c-product-post">
    <a href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
        <div class="c-product-post-thumbnail">
            <?php the_post_thumbnail( ); ?>
        </div>
        <?php endif; ?>

        <?php
			$terms = get_the_terms( get_the_ID(), 'product_category' );
			if ( $terms && ! is_wp_error( $terms ) ) :
		?>
        <div class="">
            <?php foreach ( $terms as $term ) : ?>
            <span class="c-product-post-term"><?php echo esc_html( $term->name ); ?></span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <h2 class="c-product-post-title">
            <span><?php the_title(); ?></span>
        </h2>
    </a>
</div>