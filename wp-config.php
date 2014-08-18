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

if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );

	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );

    // ** MySQL settings - You can get this info from your web host ** //
    /** The name of the database for WordPress */
    define('DB_NAME', 'ideum_blog');

    /** MySQL database username */
    define('DB_USER', 'root');

    /** MySQL database password */
    define('DB_PASSWORD', '');

    /** MySQL hostname */
    define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**
 * Custom Content Directory
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_CONTENT_URL', '/wp-content' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '4#l:HdA}h[l1oHl6U>g*od*R,R04Y#F#h#AghcUKF$?4Ak^r1Q[Uo0-W~Xl6)F1o');
define('SECURE_AUTH_KEY',  '!z?+s$2PVkGRq<K:*a*Rk(2MuMyZ96-#Bp5c M91KzOQsxoRL+=p]3&G]dQEk+l#');
define('LOGGED_IN_KEY',    'K<);> x1kZ?crkU8AQ:3pk@NGh=-*ci D?edE%d,tZ7~*TP|(mTHLU4DJ5,caga-');
define('NONCE_KEY',        '-t[r MHs%Z&Rqr<+PwLO9:/%0ZI4|{j&EaUza5;$|)bzp9$y)R|Z+LDUny%7d c@');
define('AUTH_SALT',        ',kL>,D`&pvZmZfl!M4#,cq2}O!rzq(>4,#-MO`4q9YMDwmQgx0 -hVJ.h&tHj_l?');
define('SECURE_AUTH_SALT', '.YQ(EU5;wq<]jLc88GOKRO*!G_2bcT@=v!NO=3CHW25S8dCX-bM%qDS$,b|`QGQz');
define('LOGGED_IN_SALT',   'lv8$9+|,XjK]fyt(`)y*LIBgd8$pIX3[9c*97B;< n}*X;u-GBDT$4<2@~U}>A?o');
define('NONCE_SALT',       '-GV:wf-< Pv/2yz|$jyqLIZ}4=tb-Fx$Z9UVehA%embRwopNg8@!u^z+g3Y-& EI');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if ( WP_LOCAL_DEV ) {
    error_reporting( E_ALL );
    ini_set( 'display_errors', 1 );
    define( 'WP_DEBUG_DISPLAY', true );
} else {
    ini_set( 'display_errors', 0 );
    define( 'WP_DEBUG_DISPLAY', false );
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
