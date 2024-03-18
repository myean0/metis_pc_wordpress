<?php

function addcss() // css tanımlama fonksiyonu
{
    wp_register_style('header', get_template_directory_uri() . '/assets/css/header.css', array(), 1, 'all');
    wp_enqueue_style('header');

    wp_register_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array(), 1, 'all');
    wp_enqueue_style('footer');

    wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), 1, 'all');
    wp_enqueue_style('bootstrap');
}

add_action('wp_enqueue_scripts', 'addcss'); // addcss fonksiyonunu çağırma

function addjs() // js tanımlama fonksiyonu
{
    wp_register_script('bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.js', array(), 1, 1);
    wp_enqueue_script('bootstrapjs');

    wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.js', array(), 1, 1);
    wp_enqueue_script('bootstrap');
}

add_action('wp_enqueue_scripts', 'addjs'); // addjs fonksiyonunu çağırma
add_theme_support('menus'); // menü desteğini etkinleştir


register_nav_menus(
    array(
        'main-menu' => __('Header Menu', 'theme'),
    )
);