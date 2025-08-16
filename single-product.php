<?php get_header(); ?>

<main class="">
    <div class="c-page-kv-single">
        <div class="l-container-l">
            <div class="c-page-kv-single-inner">
                <div class="">
                    <div class="c-page-kv-single-title-type">
                        <span class="c-page-kv-single-en">PRODUCT</span>
                        <span class="c-page-kv-single-ja">製品案内</span>
                    </div>

                    <h1 class="c-page-kv-single-title"><?php the_title(); ?></h1>
                </div>
                <div class="c-page-kv-single-img">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-thumbnail.png"
                        alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part( 'template-parts/component/breadcrumb' ); ?>

    <div class="l-container u-ptb">

        <?php
		while ( have_posts() ) :
			the_post();
			?>

        <?php
			/**
			 * カスタムフィールドの画像を取得
			 * img01, img02, img03のフィールドから画像を取得
			 */
			$images = array(
				'img01' => get_field('img01'),
				'img02' => get_field('img02'),
				'img03' => get_field('img03')
			);
			
			// 空の画像を除外し、最初の画像を取得
			$filtered_images = array_filter($images);
			$first_image = !empty($filtered_images) ? reset($filtered_images) : '';
			?>

        <?php if( !empty($filtered_images) ): ?>
        <div class="product-single-img-big js-product-main-image">
            <img src="<?php echo esc_url($first_image); ?>" alt="" class="js-main-image">
        </div>
        <?php endif; ?>

        <div class="">

            <?php if( !empty($filtered_images) ): ?>
            <div class="product-single-imgs js-product-thumbnails">
                <?php $index = 0; ?>
                <?php foreach( $images as $field_name => $image ): ?>
                <?php if( $image ): ?>
                <button class="product-single-img js-thumbnail" data-image-url="<?php echo esc_url($image); ?>"
                    data-index="<?php echo $index; ?>">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($field_name); ?>">
                </button>
                <?php $index++; ?>
                <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div class="product-single-table">
                <?php the_content(); ?>
            </div>

            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>