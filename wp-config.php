<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'extermi3_wor2');

/** MySQL database username */
define('DB_USER', 'extermi3_wor2');

/** MySQL database password */
define('DB_PASSWORD', '83y6iSN4');

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
define('AUTH_KEY',         'DnEf(iABd#E(}_e];5)U:,}cA;WnANeeAowk,$lTrms3Q0|| 6:Ae#`l}%Z47K!+');
define('SECURE_AUTH_KEY',  '_n0LB+mg[tP/+0;YrL-E-Wp|+%Q-PlW$84GUKF~z4+%++v7|7ISRB_u3@wY8{7,Y');
define('LOGGED_IN_KEY',    'lhfC`%;u*B7wauQ*E)(nZ N&PPIU4_|kc,WW@MMcDrUB+/6eE@CGk .ta$+Z4ivI');
define('NONCE_KEY',        ')o7LC*YV-Wa>9>$_DepKL<&5Uqa)+$JJ<)&v;R>e1+dsl2FKBax5<#|`zU9hU/6H');
define('AUTH_SALT',        '[s+K2XGl<2%|7@nY)6%<`R.0#vV.diE+g$h=E#N3%0|+2$$Mv/[p`:0:K+]BPgmZ');
define('SECURE_AUTH_SALT', 'vB(*;)^<PvL&nrON?{}H~]Ai@m-*=.;w(<p/&Tv-DZ`x)pdaOD!E}7h)-xbJ%=jE');
define('LOGGED_IN_SALT',   ' V$Oz*5I~*4u5P7vkmcf`A<I09_~wWa|b4x{czE(,3$(eEOQ{^W9C%90kC9<-yAb');
define('NONCE_SALT',       'ZcZKE~@|+C-z|%-},ll1I1-]4rLr [lDdzBwb499+g32Ig.TpaFU]Iom+6^/M1ZI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'use_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
