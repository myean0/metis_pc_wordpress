<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Burada stil dosyanızın yolu olacak -->
    <title>
        <?php bloginfo('name'); ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); ?>
    </title>
</head>
<?php wp_head() ?>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <span class="navbar-brand">Metis PC</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'main-menu',
                            'container' => 'ul',
                            'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
                        )
                    );
                    ?>

                    <a class="btn btn-outline-success" href="<?php echo wc_get_cart_url(); ?>"
                        title="<?php _e('View your shopping cart', 'your-theme-domain'); ?>">
                        <?php echo sprintf(_n('%d Öğe', '%d Öğe', WC()->cart->get_cart_contents_count(), 'your-theme-domain'), WC()->cart->get_cart_contents_count()); ?>
                        -
                        <?php echo WC()->cart->get_cart_total(); ?>
                    </a>

                    <!-- <ul class=" navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Ana Sayfa</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        </ul> -->

                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->

                </div>
            </div>
        </nav>

    </header>