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
define( 'DB_NAME', 'wordpress_database' );

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
define( 'AUTH_KEY',         'm(cY]1m4n^a~UzA@]ezEx=%gR$8kL@mu48O?Why+URv*]%LJGL5{+Hp:g}k<In?N' );
define( 'SECURE_AUTH_KEY',  '[Z^]MXfWv`4i_MLY<!FObv;+.y4AqeW+j>#i,$mj*R4<di.4Dk4z7`_uI$BELJ4$' );
define( 'LOGGED_IN_KEY',    'I~I[u$)av lhD,)NM%[u/Y+%XYnGlNacOW#<=m,G_4PP6:E84c.<)1mb%CBU[H<;' );
define( 'NONCE_KEY',        'ZPnZ67dEakzvFUL_ f4Eldl7P[%Y#o*D%d5}pY&!WzeR:~yU:`w2RqB+m~^+.2ta' );
define( 'AUTH_SALT',        '{fB35ME0:3A$`[T)>F#CNtiG.`CHN=Sn@j^JMJIe1E`jA<I>kHY@b5%)7/|}!CyP' );
define( 'SECURE_AUTH_SALT', 'q0AZ!Go4O1[kcC-j^BG-FHtjl`?a:_n.y-+qxEN5FT(,bV2O4/K/%Lz^&#u*dtp+' );
define( 'LOGGED_IN_SALT',   '}^Wg(/AVI/c|A+j~xBXLvMEc^Up#vdk$!8+QL&.}t;PC[9Yz:FU%C/}/h6fQ9*uK' );
define( 'NONCE_SALT',       'BU2dHVyCvKhz>JF<6UE,sQp!2]wBsyOuVl~S9E`gFF6!;SNK@iW[iOjJ.5lP[78E' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_test';

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
