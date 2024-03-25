<?php
/*
    Template Name: Products Page
*/

wp_register_style('product-detail', get_template_directory_uri() . '/assets/css/product-detail.css', array(), 1, 'all');
wp_enqueue_style('product-detail');

wp_register_style('products', get_template_directory_uri() . '/assets/css/products.css', array(), 1, 'all');
wp_enqueue_style('products');
?>

<?php get_header(); ?>

<?php

$product_id = get_the_ID();
$product = wc_get_product($product_id);

$custom_field_value = get_field('alan_adi', $product_id);

$product_name = $product->get_name();
$product_description = $product->get_description();
$product_price = $product->get_price_html();
$product_image_id = $product->get_image_id();
$product_image_url = wp_get_attachment_url($product_image_id);
$product_gallery_ids = $product->get_gallery_image_ids();

$productDescription = get_field('product_description');

function add_to_card()
{
    global $product;
    do_action('woocommerce_' . $product->get_type() . '_add_to_cart');
}
?>
<div class="container" style="max-width: 80%;">

    <div class="row" style="align-items: center; padding: 150px 0 150px 0;">

        <div class="col-md-3">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item" style="background-color: #ccc;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Accordion Item #1
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                            collapse plugin adds the appropriate classes that we use to.
                        </div>
                    </div>
                </div>
                <div class="accordion-item" style="background-color: #ccc;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Accordion Item #2
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the second item's accordion body.</strong> It is hidden.
                        </div>
                    </div>
                </div>
                <div class="accordion-item" style="background-color: #ccc;">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Accordion Item #3
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                            collapse plugin adds the appropriate classes that we use to style each element. These
                            classes control the overall appearance, as well as the showing and hiding.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

                <!-- Carousel indicators dinamik olarak oluşturuluyor -->
                <div class="carousel-indicators">
                    <?php foreach ($product_gallery_ids as $index => $attachment_id): ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions"
                            data-bs-slide-to="<?php echo esc_attr($index); ?>"
                            class="<?php echo $index == 0 ? 'active' : ''; ?>"
                            aria-label="Slide <?php echo esc_attr($index + 1); ?>"></button>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel içeriği -->
                <div class="carousel-inner">
                    <?php foreach ($product_gallery_ids as $index => $attachment_id): ?>
                        <div class="carousel-item <?php echo $index == 0 ? 'active' : ''; ?>">
                            <?php
                            // Görsel URL'sini al
                            $image_url = wp_get_attachment_image_url($attachment_id, 'full');
                            ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="img-fluid"
                                alt="<?php echo esc_attr($product->get_name()); ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Carousel kontrolleri -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="col-md-4">

            <div class="card mb-3 w-100 bg-dark" style="max-width: 540px; height: 185px;" data-bs-theme="dark">
                <div class="row g-0">
                    <div class="col">
                        <div class="card-body" style="position: relative;">
                            <h5 class="card-title">
                                <?php echo $product_name ?> Satın Al
                            </h5>
                            <p class="card-text">
                                <?php echo $product_description ?>
                            </p>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="prices p-0" style="right: 15px !important">
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
                                <div class="col-md-8">
                                    <form class="cart" method="post" enctype='multipart/form-data'>
                                        <input type="hidden" name="add-to-cart"
                                            value="<?php echo esc_attr($product->get_id()); ?>" />
                                        <button type="submit" class="buy" style="position: absolute; left: 15px;">
                                            Sepete Ekle
                                            <div class="star-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="star-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="star-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="star-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="star-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="star-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve"
                                                    version="1.1"
                                                    style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                                                    viewBox="0 0 784.11 815.53"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <defs></defs>
                                                    <g id="Layer_x0020_1">
                                                        <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                                                        <path class="fil0"
                                                            d="M392.05 0c-20.9,210.08 -184.06,378.41 -392.05,407.78 207.96,29.37 371.12,197.68 392.05,407.74 20.93,-210.06 184.09,-378.37 392.05,-407.74 -207.98,-29.38 -371.16,-197.69 -392.06,-407.78z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </button>
                                    </form>

                                    <style>
                                        .buy {
                                            position: relative;
                                            padding: 12px 35px;
                                            background: #3dcc72;
                                            font-size: 17px;
                                            font-weight: 500;
                                            color: #181818;
                                            border: 3px solid #fff;
                                            border-radius: 8px;
                                            box-shadow: 0 0 0 #fec1958c;
                                            transition: all 0.3s ease-in-out;
                                            cursor: pointer;
                                        }

                                        .star-1 {
                                            position: absolute;
                                            top: 20%;
                                            left: 20%;
                                            width: 25px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 1s cubic-bezier(0.05, 0.83, 0.43, 0.96);
                                        }

                                        .star-2 {
                                            position: absolute;
                                            top: 45%;
                                            left: 45%;
                                            width: 15px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
                                        }

                                        .star-3 {
                                            position: absolute;
                                            top: 40%;
                                            left: 40%;
                                            width: 5px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 1s cubic-bezier(0, 0.4, 0, 1.01);
                                        }

                                        .star-4 {
                                            position: absolute;
                                            top: 20%;
                                            left: 40%;
                                            width: 8px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 0.8s cubic-bezier(0, 0.4, 0, 1.01);
                                        }

                                        .star-5 {
                                            position: absolute;
                                            top: 25%;
                                            left: 45%;
                                            width: 15px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 0.6s cubic-bezier(0, 0.4, 0, 1.01);
                                        }

                                        .star-6 {
                                            position: absolute;
                                            top: 5%;
                                            left: 50%;
                                            width: 5px;
                                            height: auto;
                                            filter: drop-shadow(0 0 0 #fffdef);
                                            z-index: -5;
                                            transition: all 0.8s ease;
                                        }

                                        .buy:hover {
                                            background: transparent;
                                            color: #fec195;
                                            box-shadow: 0 0 25px #fec1958c;
                                        }

                                        .buy:hover .star-1 {
                                            position: absolute;
                                            top: -80%;
                                            left: -30%;
                                            width: 25px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .buy:hover .star-2 {
                                            position: absolute;
                                            top: -25%;
                                            left: 10%;
                                            width: 15px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .buy:hover .star-3 {
                                            position: absolute;
                                            top: 55%;
                                            left: 25%;
                                            width: 5px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .buy:hover .star-4 {
                                            position: absolute;
                                            top: 30%;
                                            left: 80%;
                                            width: 8px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .buy:hover .star-5 {
                                            position: absolute;
                                            top: 25%;
                                            left: 115%;
                                            width: 15px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .buy:hover .star-6 {
                                            position: absolute;
                                            top: 5%;
                                            left: 60%;
                                            width: 5px;
                                            height: auto;
                                            filter: drop-shadow(0 0 10px #fffdef);
                                            z-index: 2;
                                        }

                                        .fil0 {
                                            fill: #fffdef;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>