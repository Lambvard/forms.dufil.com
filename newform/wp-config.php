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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'formsfront' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Lambvard01###' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );



/* I placed this to redirect the localhost */

//define('WP_HOME','http://paperless.dufil.com');
//define('WP_SITEURL','http://paperless.dufil.com');

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
define( 'AUTH_KEY',         'u#J=@)7n>zL6MW`w%rp>[>wSP^WSEb+q<#c>y<P_Clh:?2?E5kSg|IDys!j^+>G8' );
define( 'SECURE_AUTH_KEY',  '|dWoKVS Hw+u70-SgvFqOtPG&$sx1VzIB}$X}h^8xr}%p xaXJy*(qCOxw=kG)gg' );
define( 'LOGGED_IN_KEY',    'JXK=@FRt3f|R6=nFjuXN%APFhK2SBm-3hwJ]Q}OiUUg)REha<!5}rgXu05+<P5R.' );
define( 'NONCE_KEY',        '7qo6LF~8K1[*tzO6fq~4J&E`s|e1,$,FB1~=<4?{-,YgO#:.}BS(L`xcA@N)y)kj' );
define( 'AUTH_SALT',        'e_(h`Eq^#3[^2&y^.H*bMI.nI.S(wwK|MF_PFTx2?,8[gXf3KS,TjJj%Vox-x2Yq' );
define( 'SECURE_AUTH_SALT', '@Z9pl$13r^S.T)= EDgA<*o;p 5#JkJHcR:G=.nQS`d,ZW$!o;m!AbTco:-+w:<w' );
define( 'LOGGED_IN_SALT',   'Ksz9xl|xu|{v-wDmM1B9dwr=I._yeEkg5^FLPq}J v0:iEi39J3uhyY6PCn4;Em3' );
define( 'NONCE_SALT',       '@|!+dA{m.Ig)F5S !dAJ.#<wtUo@zG.eU&%R2fSLK5Zd!.%e~a c<]Ol8F_#nkBv' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
