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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'structure' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '9xmw!D+e#<1MoZl;3@3flK3QTRu!~s{5#:mx}0R3;m5Qn0qA?!Bty;2nUfYsz?W{' );
define( 'SECURE_AUTH_KEY',  'j;U+9Qx.#4@+Ij@bWeKTN#WWQop{!h}K$A]TEa$C1GBr.z^S[ XE8698Zo?,na$B' );
define( 'LOGGED_IN_KEY',    'F?([P|UR-RqA]Q+he <T:}F)Dp<*%{<W}8.:{(Z:q}Zya?dv[0dhPME@GYT|pm9;' );
define( 'NONCE_KEY',        'b6,_5ca@:n,Vt)@_@^{HK }hSxBIzUmdP0T}t4j3ZgFQ0{z+M;ucJ/q2G)L0>#F=' );
define( 'AUTH_SALT',        'pUA/t[LI+$_UJNF067ypyoTev/etSSm<3;z,^1YN9i|2v!FMuJ].M|-o&u8r,c: ' );
define( 'SECURE_AUTH_SALT', 'I2KLy=n02+BDNYr3_(x=b0P-^VGrq&gDD<8FA7E#_z*C]e^1<#}KOay=XQhSR-:c' );
define( 'LOGGED_IN_SALT',   'o2uI%9oFizi5?X^nD}DmH&}2 lF~I4khMasCXQt#m(d2kq=R>j(j%yQ+<nJOe.C4' );
define( 'NONCE_SALT',       '4i]{G2~/`dO&jAqFIuu~2EAAI!<>0MuufI*7@jt_goTwhtwDZ}o,fy8<`>wl0BuF' );

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
