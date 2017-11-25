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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress_codeline_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'b?-=imKYEE.![QX1+?}vW-_luUg0j4MR[L.hxDAkWtFkvXQzBPPm,2X.6F7&?1eJ');
define('SECURE_AUTH_KEY',  'yW)u(=xr7k2dje>!$l1>:Zjo2ue@R%y8}N]8 qo0!:y[}K2hQdrFp?}uo,wK2qcx');
define('LOGGED_IN_KEY',    'G26sA/6D:yz3bMSe)hWDP||]Ie)$`iN*O.T~z!T>6|,>wtB!;WUM;8UzO+ho<~S<');
define('NONCE_KEY',        'hxTs2/9H`q3a@AvHzR%#@zs+$jr:HM>j&e}<$5d;4R&EHGdXQl.fX! s#]B8aD?a');
define('AUTH_SALT',        'lZH=W!w.w>w#xT)A=L)5zpG/jn6CMQSk5UbnG[2Jh5^][G|G-tmW .1dzbsepA4S');
define('SECURE_AUTH_SALT', 'GLHS9ZV@=mjX%UI+n7El6`-14x,1N0<gqQhYxhV|k9@og^}X4^;7z*z&:r75`:22');
define('LOGGED_IN_SALT',   '5dSz%%5:g{Ql`4@UA)W/QaD+faELvK?HE g;)#>8B<V}74%HHu*^=h)V>()oo$iP');
define('NONCE_SALT',       'BExv{AG+)W|Acz#s)>+~3q?@r~u9`EPN#=S=<?^N1RaOS^^CgM@r2%H{FmzcN~v8');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
