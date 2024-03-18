<?php

wp_register_style('front-page', get_template_directory_uri() . '/assets/css/front-page.css', array(), 1, 'all');
wp_enqueue_style('front-page');

?>

<?php get_header(); ?>

<main>
    <section id="intro">
        <h1>Metis PC'ye Hoş Geldiniz</h1>
        <p>En güncel bilgisayar parçaları ve aksesuarları için doğru adrestesiniz.</p>
    </section>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <?php
            $i = 0;
            $slides = get_field('slider_1');
            if ($slides) {
                foreach ($slides as $slide) {
                    $image = $slide['image'];
                    $header = $slide['header'];
                    $description = $slide['description'];

                    $i++;
                    ?>
                    <div class="carousel-item <?php echo ($i == 1) ? 'active' : " "; ?>">
                        <div>
                        <?php echo wp_get_attachment_image($image, 'full', false, ['class' => 'd-block w-100']); ?>
                        </div>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>
                                <?php echo esc_html($header); ?>
                            </h5>
                            <p>
                                <?php echo esc_html($description); ?>
                            </p>
                        </div>
                    </div>

                    <?php
                }
            }
            ?>
        </div>
        <?php if ($slides != null) {
            ?>
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

            <?php
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>