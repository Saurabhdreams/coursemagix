<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_gszh9' );

/** Database username */
define( 'DB_USER', 'wp_vjywm' );

/** Database password */
define( 'DB_PASSWORD', 'f5T5?4mj4!lYGsP3' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '5D3T40A981yda6Ktz0!#2lt_7+i&9*P_g%TuI%2yH8wHV3ZdZ[-p8AZ&[21O[6K0');
define('SECURE_AUTH_KEY', '31&Wp67;5#dm*KAH&DBnIKx6+jiD#G2%V77gvl_!66P9M7[7%Xv|6q-9(F0Q13@y');
define('LOGGED_IN_KEY', 'ik#V)C5RpoH*q65kWkt|h1Lr;(__b7+_u9_4psk0P0_:]7/r+P+ZMhYeUz)c6y8x');
define('NONCE_KEY', '2NuekrBc&)&g~Jj55qS)6vW]JF2ou~*y%U1gW!64)5[S3*q|vL+K-VH5vK9454]i');
define('AUTH_SALT', '_6@xg~WN|]C(3c]w[99toP!j2rIuG6;%73fP|%5!%1]z7;1(Tb606_Dk@:x4pG2Z');
define('SECURE_AUTH_SALT', '|VKXs66qz&7ML68viYn-;6]tGi4*ktY#&n7/8E75sv0fr/9S3eR1R+/RZ1M&9+l&');
define('LOGGED_IN_SALT', '95AE#;t4rIHV732m#/5wiWy219S6N9&9Xc/0~k&4kCTIW79XB%Dpp2M12r:3Wvy-');
define('NONCE_SALT', '71DZZ901Mo_58bdd0Ej;U6:ecE0Zq:6u:K#H!%15mKx0[C3889_n]wSETEGs352s');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'VWZlOhTLf_';


/* Add any custom values between this line and the "stop editing" line. */

define('WP_ALLOW_MULTISITE', true);
/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
