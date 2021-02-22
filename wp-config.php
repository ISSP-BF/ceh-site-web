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
$production = false;

if($production):
define( 'DB_NAME', 'cehuemsadminceh' );

/** MySQL database username */
define( 'DB_USER', 'cehuemsadminceh' );

/** MySQL database password */
define( 'DB_PASSWORD', 'CehUemoa2021' );

/** MySQL hostname */
define( 'DB_HOST', 'cehuemsadminceh.mysql.db' );
else :
define( 'DB_NAME', 'cehuemsadminceh' );

/** MySQL database username */
define( 'DB_USER', 'cehuemsadminceh' );

/** MySQL database password */
define( 'DB_PASSWORD', 'CehUemoa2021' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );
endif;


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

define('AUTH_KEY',         'Ko-Zr1T#7vTJqF?6gIuM.2/ 6?Jq9oaM!ZvU7@xVbC:@n+GN+m#x|R$-].plndtB');
define('SECURE_AUTH_KEY',  'K@&hlX|}j+FT3rNk~$HnJ?BBOxa+x=cmMxVF<&FQLN9-M/|Jw?`p>jMgx0]ncFV/');
define('LOGGED_IN_KEY',    '#,q+8_$N#rjd]|u8:6hdhsL8=#p{1m$K.D]qq}J#U)WRQ_jZ- |+=TpwW^0/7||e');
define('NONCE_KEY',        '/6K}U@y.S%&p^tX{Elpf5^~>|%DJ8:1@+,0WWIi%LYXp+5 +Lc$z`p6W!W-z&G6J');
define('AUTH_SALT',        'gY[[F+jDE&XpNhG{sTIF+m. Lc+7=.V5F8Ge.~t[=<x<iM:}A{PI_6u/|(R219OJ');
define('SECURE_AUTH_SALT', '%11.I[Zv2Oz Cs&mTHCZSNOg$TEd|;Z|nb>-[4Rb#Jm:,d</0enBu7MxxE.1e2Qj');
define('LOGGED_IN_SALT',   'no[IPldE|-CId@%}&+Tdgf{q>]x9?++.pCBC% Hf.Aq2uD.pfkQ+xEc.L59nZ!s#');
define('NONCE_SALT',       '9z?Qz5YXw+;,A-D!.;+J-.e5FwV77O^,Quye_ KdX)F);.(_2,m*k-~>!W[h`S#{');

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
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
