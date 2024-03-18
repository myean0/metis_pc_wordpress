<?php
/*
    Template Name: Products Page
*/

wp_register_style('products', get_template_directory_uri() . '/assets/css/products.css', array(), 1, 'all');
wp_enqueue_style('products');
?>

<?php get_header(); ?>

<div class="container my-5">

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
</div>

<style>
    .card-img-top {
        height: 200px !important;
        object-fit: cover !important;
    }
</style>

<?php get_footer(); ?>