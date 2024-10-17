<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ecommerce' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'e)7U[V]s@Il(s>w$FX]O]py`}j2Opa-6x8a1w+z})#Pra+gvMjlw]CE`Q73TT4Y|' );
define( 'SECURE_AUTH_KEY',  'bw@5`.FxLm9~QY<x[N6oE(:}GL$8);StH2Sl-puJk`U]&sCVTl4c99Hf3H)eyZ](' );
define( 'LOGGED_IN_KEY',    ':]#ddueVD/Ymou@MothRU=+X_.]A%5;Tv8C(F<(qwNhD9RzX-A-4gmCn,-j:ct ?' );
define( 'NONCE_KEY',        '.Skp74J*nBa=w+lo()OpRD~@NUTAt*X@1z/!f`xYO~yp= GKL#xL`*7pkiYI*ax)' );
define( 'AUTH_SALT',        'f#`CREwgL {y|t$XX`}VIHXiof.l,hl_inK[5w%;uAs]k3W-3~%dx/)DVX-w-<q5' );
define( 'SECURE_AUTH_SALT', 'M9E!C?q),rPu<a4r1p/DOw_1N<@f2=n@_vzIPIpfBpp-5R`w0H[}_z/Rn-7G9)Up' );
define( 'LOGGED_IN_SALT',   '=S391(X,w=#m>1?TZE/ZUBAFtI#nj%]b1o{,hg.NRP2ny<P3ayLb<~?nPTLEuYor' );
define( 'NONCE_SALT',       'mg_20:_VBT:D>0qxRL+o1LG%J+.Oc!QUCC_G+Ym<3f#73z{y56h]RBO_Bv^s$^TM' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
