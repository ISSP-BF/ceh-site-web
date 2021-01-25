<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define( 'DB_NAME', 'ceh' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '=2?4! }b/y,y=}oVLI0_/WCUVxZwh?foYc7>/Oy}2c2LS5Ecz<t2z|]:@}gi]fP@' );
define( 'SECURE_AUTH_KEY',  'Wi?>E/1=8eL(%Zn52B?r~OT>+BZ8iMth-T;Gw-S(5rwN5<ORi2j{A$LD+_F3ButI' );
define( 'LOGGED_IN_KEY',    'xb.Yn(DoK?jH:&>O1PS|Sm%-NnZSzgkrP.nf*?haH#PL.UJGsk5M[?~Rpp9vAq=5' );
define( 'NONCE_KEY',        '@Brv%?{1tScbrx#I`i 7SgcM+h`9c+4xw0i8#nOZhsFU_N.VG|1p;ufGW)f#);J)' );
define( 'AUTH_SALT',        'H9OXI#xR:;+!P|38C&I9#|hMu$paJ]!:8A~r&|RafL/uH(dqtoA.j6|xCXd6/la{' );
define( 'SECURE_AUTH_SALT', 'ai$Kgncs~z>NI8?-+)li`sV=4)3j{ZEV~WNResq]C>ItseTjF|b9cM629GE|lu^X' );
define( 'LOGGED_IN_SALT',   ' D4 !{G!DS/E*<o9NL64}uGbb5aAmTH:iOPIB:2=]YFpXVU/5r|wele)q61b%78d' );
define( 'NONCE_SALT',       'R9P?9uq0$1GL(d8_%M<-d<:8:.Tolx!01`kU-zjR{1:V0$A})O<$qW4N78t*sRc|' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ceh_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
