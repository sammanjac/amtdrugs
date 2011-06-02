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
define('DB_NAME', 'amtdrugs');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'public');

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
define('AUTH_KEY',         '%W[$/[7*psG;ynUIB,ZNiQW2:,R8+qfz9D(Hy^Zpt,PmWF3*~;Kak7f)>E 59z7t');
define('SECURE_AUTH_KEY',  '`F0[fT(N):eGWX-.`{*~p1Ym<R%VFTG~j]^/9Ia^z|q,P9qLO+B[y-Ya Zxs$NR{');
define('LOGGED_IN_KEY',    'eK-y[U2L$/3u(b_(fVZ9DQrTuX_*=f!U($b1L`ky>J}h*%;f<e)53r(G_Hf-v?^S');
define('NONCE_KEY',        '$0eVohs{~k&Jv~Se%brTwFft8ZvX@Jhi8IB2,%2X{TN2q-nQYEzrAVyqs{|)wUq%');
define('AUTH_SALT',        'LH~HLY(ukjTHEhn$bq*To7sM|.*oGo@G7u2yUhw`U.iN!n._h_&%|kDJ-0c.$wK4');
define('SECURE_AUTH_SALT', 'cnF8&R+}^k2(N4h]1~+^j&>abC0Ld+W)-i%9*S[YDdnP>U7)9s}2EwlW;S[h~/7J');
define('LOGGED_IN_SALT',   '5dYkuo?`9.SfqX?`i@/K*PsA28&[F:Ol}4>J:~<g=UG&3-( E{j_Z,o/IzNv?0]3');
define('NONCE_SALT',       's3kL)R1B9<=mRq=tjk7APX6SK=EuXfAEs9ug2>,[<@)]R!%C p!czLJEjT;3y>47');

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
