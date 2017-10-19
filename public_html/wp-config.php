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
define('DB_NAME', 'fantasy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'vodoley14');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=)1N*y_CtOIT!XHPLuW`ba#0S(@ik1wWvDg#EobV6{Ye?$;6$uK>edJaM9Int%+-');
define('SECURE_AUTH_KEY',  'gAedi*[`TU:>?jW-SHio6%jz2v5%!UFG!9uB!+;<`yF0I-)}}U~<|.lo)f*d)}fk');
define('LOGGED_IN_KEY',    '41/N6_(.UU;wIOGM(B~{x1P+bPSa#Uh(BY6>BCZ$Z^!y6vfaKiu6;J2]b`)N2|oK');
define('NONCE_KEY',        ';6zwr@HCdLI$GgyX=VpYyhjHw0g;!t&!Wi)#@ut/9o2%HR[c,pqiOzp?I!s(Eh`w');
define('AUTH_SALT',        'e%b4VzjrkRq6IWt5YG5:?i>.M*ENQC&MiEgCip+bp_yk&iqZ6 aZ6AV/N/#0~(T+');
define('SECURE_AUTH_SALT', 'b}*p4ZR8dDK>S =?q9%/EHR1Yz>IBk%UVr!6:`Z2*T#=^diXPmS`Ud:ZNd^cJb)1');
define('LOGGED_IN_SALT',   'gf ZU:|HY0eL|x#h]<tmRE4tHG}&-x>id$4i}?JVUD8CdON~]ayD7K5l~9^FxHS.');
define('NONCE_SALT',       '@n+$rwMk2{~NxW`IG]FWNJ]OywoCE] ^{Lm-1Nu5J$rzaU#x_a+OmtX7V%pNS4|V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'sym_';

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
