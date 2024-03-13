<?php

function addcss() // css tanımlama fonksiyonu
{
    wp_register_style('header', get_template_directory_uri() . '/assets/css/header.css', array(), 1, 'all');
    wp_enqueue_style('header');

    wp_register_style('footer', get_template_directory_uri() . '/assets/css/footer.css', array(), 1, 'all');
    wp_enqueue_style('footer');
}

add_action('wp_enqueue_scripts', 'addcss'); // addcss fonksiyonunu çağırma

add_theme_support('menus'); // menü desteğini etkinleştir