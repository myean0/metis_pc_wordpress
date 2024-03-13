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
</main>

<?php get_footer(); ?>