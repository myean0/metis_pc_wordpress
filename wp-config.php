<?php
/**
 * WordPress için başlangıç ayar dosyası.
 *
 * Bu dosya kurulum sırasında wp-config.php dosyasının oluşturulabilmesi için
 * kullanılır. İsterseniz bu dosyayı kopyalayıp, ismini "wp-config.php" olarak değiştirip,
 * değerleri girerek de kullanabilirsiniz.
 *
 * Bu dosya şu ayarları içerir:
 * 
 * * Veritabanı ayarları
 * * Gizli anahtarlar
 * * Veritabanı tablo ön eki
 * * ABSPATH
 * 
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Veritabanı ayarları - Bu bilgileri servis sağlayıcınızdan alabilirsiniz ** //
/** WordPress için kullanılacak veritabanının adı */
define( 'DB_NAME', 'metispcDb' );

/** Veritabanı kullanıcısı */
define( 'DB_USER', 'root' );

/** Veritabanı parolası */
define( 'DB_PASSWORD', '' );

/** Veritabanı sunucusu */
define( 'DB_HOST', 'localhost' );

/** Yaratılacak tablolar için veritabanı karakter seti. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Veritabanı karşılaştırma tipi. Herhangi bir şüpheniz varsa bu değeri değiştirmeyin. */
define( 'DB_COLLATE', '' );

/**#@+
 * Eşsiz doğrulama anahtarları ve tuzlar.
 *
 * Her anahtar farklı bir karakter kümesi olmalı!
 * {@link http://api.wordpress.org/secret-key/1.1/salt WordPress.org secret-key service} servisini kullanarak yaratabilirsiniz.
 * 
 * Çerezleri geçersiz kılmak için istediğiniz zaman bu değerleri değiştirebilirsiniz.
 * Bu tüm kullanıcıların tekrar giriş yapmasını gerektirecektir.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'o+-8_Sre&f$Y]s>dq?z`6W=ds?G].!IP4-FeB{[FJoeJ8If7>EWk6sc)`$`1ZPo*' );
define( 'SECURE_AUTH_KEY',  'K;*8 J3aQJdL aU5$FGR@P3bP5;N+c:t?:NnB94Q9C]|}t44Z%`H^/d,m,WO9G7g' );
define( 'LOGGED_IN_KEY',    'hyz_0IO*9SooK:x]$}5 *u#7rf^#T$n:dBMCVAB?s!a6{-`#+T)#ryi.#e*44Q6g' );
define( 'NONCE_KEY',        'auax9B^T)7io5Ib]LrY{-XK-kT]nM/kyX@y(RJk69Q(!_Q+k0Xv-}S{N3yYJA~Ot' );
define( 'AUTH_SALT',        '&}KU&k*& E_t0{A>mONZjrUgQT?z< qm-K5S9XkaW5Iv;SoSq{p&4NxY2OBb6C>-' );
define( 'SECURE_AUTH_SALT', 'TSFay~F0TvP1&_cOV(d>C!-,aFAvbCKr7:Qb[cDR~>,+},A]6/zfP AKjH292H%J' );
define( 'LOGGED_IN_SALT',   '3h)j8n}]AhpU&WwJ[xE.L8vEV(S!Scq7B@ b$ Uf*<vt(cXq-,U7`1@JM<VQa:D#' );
define( 'NONCE_SALT',       '6}.X|4f6J-.b/{.:Aj~z?=Y!vYD9S:-RTn9Yz|Pz6l4,(+UmL.kmTr=447%PgfK=' );

/**#@-*/

/**
 * WordPress veritabanı tablo ön eki.
 *
 * Tüm kurulumlara ayrı bir önek vererek bir veritabanına birden fazla kurulum yapabilirsiniz.
 * Sadece rakamlar, harfler ve alt çizgi lütfen.
 */
$table_prefix = 'wp_';

/**
 * Geliştiriciler için: WordPress hata ayıklama modu.
 *
 * Bu değeri true olarak ayarlayıp geliştirme sırasında hataların ekrana
 * basılmasını sağlayabilirsiniz. Tema ve eklenti geliştiricilerinin geliştirme
 * aşamasında WP_DEBUG kullanmalarını önemle tavsiye ederiz.
 * 
 * Hata ayıklama için kullanabilecek diğer sabitler ile ilgili daha fazla bilgiyi
 * belgelerden edinebilirsiniz.
 * 
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Her türlü özel değeri bu satı ile "Hepsi bu kadar" yazan satır arasına ekleyebilirsiniz. */



/* Hepsi bu kadar. Mutlu bloglamalar! */

/** WordPress dizini için mutlak yol. */
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

/** WordPress değişkenlerini ve yollarını kurar. */
require_once ABSPATH . 'wp-settings.php';