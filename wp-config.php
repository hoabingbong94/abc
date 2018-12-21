<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/ippglobal/domains/ippglobal.vn/public_html/wp-content/plugins/wp-super-cache/' );
define('DB_NAME', 'ippglobal_1');

/** MySQL database username */
define('DB_USER', 'ippglobal_1');

/** MySQL database password */
define('DB_PASSWORD', 'ipp123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'n^0=3P-UpRI&<MO)Fwwvl#rQo~t>L2o :Lfl~o~ccp56]8S-A*OZnO{)O+!8-B(T');
define('SECURE_AUTH_KEY',  '-]O=?X6%C{{jr+KY12+*jRO_?Hfl0h+QX1wtND 7Ui;*8sR_ywjo^HR`U|.48-K0');
define('LOGGED_IN_KEY',    'fdaogn_{E3w(tq^7fJfiy|I)>dnPo9E=@$bG+Dqrj%89P^-B}|:Rv?!EC:+*|Hu7');
define('NONCE_KEY',        'qyhT+v,F(!+^b$*D2pzmR$?yJgxfF#+J8m+|91wKU)X)dsDpK1AJ<n&%t)Ckb!X^');
define('AUTH_SALT',        'y[{>JPa|0P*+XKH---E3-)cLFP8As$tA_l:+9Y*?a/ID<40*e0-+=U!E>P%A$gg%');
define('SECURE_AUTH_SALT', ']K-,ezGh=yJEKh,)84B:v90wHtOXN!~#GT^f<W@-:eBU-5tRZ_[TW>$Cg69?i $8');
define('LOGGED_IN_SALT',   '8ym-1^WNfwz~4Dbxi<-0EXXl~AOy&Q!]:U&4!w _bXTjk72%-__&kuB}DW{I[:,r');
define('NONCE_SALT',       'jlxo]-fV/d2H+VDHuof2r6#pfIT;`^Rq%id?iHurulzfTa,6!8CZk]XV+(*i|C0G');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
