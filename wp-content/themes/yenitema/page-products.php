<?php
/*
    Template Name: Products Page
*/

wp_register_style('products', get_template_directory_uri() . '/assets/css/products.css', array(), 1, 'all');
wp_enqueue_style('products');
?>

<?php get_header(); ?>

<!-- <div class="container my-5">

    <?php
    $i = 0;
    $general_products = get_field('general_products');

    if ($general_products != null) {

        echo '<div class="row">';

        foreach ($general_products as $product) {
            $image = $product['image'];
            $name = $product['name'];
            $description = $product['description'];

            $prices = $product['prices'];
            $oldPrice = $prices['old_price'];
            $newPrice = $prices['new_price'];

            $i++;
            ?>

            <div class="col-md-3 mb-4">
                <div class="card h-100" style="width: 18rem;">
                    <div>
                        <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'card-img-top']); ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $name ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $description ?>
                        </p>

                        <div class="product">
                            <a href="#" class="btn btn-primary">Satın Al</a>
                            <div class="prices">
                                <?php if ($oldPrice != null) { ?>
                                    <span class="old-price">
                                        <?php echo $oldPrice; ?> ₺
                                    </span>
                                    <span class="price">
                                        <?php echo $newPrice; ?> ₺
                                    </span>
                                <?php } else { ?>
                                    <span class="price">
                                        <?php echo $newPrice; ?> ₺
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($i % 4 == 0 && $i != count($general_products)) {
                echo '</div><div class="row">';
            } ?>

            <?php
        }
        echo '</div>';
    }
    ?>
</div> -->

<style>
    .card-img-top {
        height: 200px !important;
        object-fit: cover !important;
    }
</style>

<div class="container my-5">
    <?php
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 12
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        echo '<div class="row">';
        while ($loop->have_posts()):
            $loop->the_post();
            global $product;
            $oldPrice = get_field('old_price', $product->get_id());
            $newPrice = get_field('new_price', $product->get_id());
            // Diğer ACF alanlarınızı burada çağırabilirsiniz.
            ?>
            <div class="col-md-3 mb-4">
                <div class="card h-100" style="width: 18rem;">
                    <div>
                        <?php echo get_the_post_thumbnail($product->get_id(), 'full', ['class' => 'card-img-top']); ?>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo get_the_title(); ?>
                        </h5>
                        <p class="card-text">
                            <?php echo get_the_excerpt(); ?>
                        </p>
                        <div class="product">
                            <a href="<?php echo get_permalink(); ?>" class="btn btn-primary">Satın Al</a>
                            <div class="prices">
                                <?php if ($product->is_on_sale()) { ?>
                                    <span class="old-price">
                                        <?php echo wc_price($product->get_regular_price()); ?>
                                    </span>
                                    <span class="price">
                                        <?php echo wc_price($product->get_sale_price()); ?>
                                    </span>
                                <?php } else { ?>
                                    <span class="price">
                                        <?php echo wc_price($product->get_price()); ?>
                                    </span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if ($loop->current_post % 4 == 3) {
                echo '</div><div class="row">';
            } ?>
            <?php
        endwhile;
        echo '</div>';
    } else {
        echo __('No products found');
    }
    wp_reset_postdata();
    ?>

</div>

<?php get_footer(); ?>