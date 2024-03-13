<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!-- Burada stil dosyanızın yolu olacak -->
    <title><?php bloginfo('name'); ?></title>
    </head>
    <?php wp_head() ?>

<body>
    <header>
        <nav id="main-nav">
            <ul>
                <li><a href="index.html">Ana Sayfa</a></li>
                <li><a href="urunler.html">Ürünler</a></li>
                <li><a href="hakkimizda.html">Hakkımızda</a></li>
                <li><a href="iletisim.html">İletişim</a></li>
            </ul>
        </nav>
    </header>