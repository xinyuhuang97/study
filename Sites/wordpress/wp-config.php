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
define( 'DB_NAME', 'wp' );

/** MySQL database username */
define( 'DB_USER', 'wp' );

/** MySQL database password */
define( 'DB_PASSWORD', '13002044333' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
#define( 'AUTH_KEY',         'put your unique phrase here' );
#define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
#define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
#define( 'NONCE_KEY',        'put your unique phrase here' );
#define( 'AUTH_SALT',        'put your unique phrase here' );
#define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
#define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
#define( 'NONCE_SALT',       'put your unique phrase here' );
define('AUTH_KEY',         'U0aOfo|SpdXHwVt=]9/J3V(Y+W1^W_8!2=U.4m!&$f}&=3K#H10N H{BQr#)F)%$');
define('SECURE_AUTH_KEY',  ',s5R=R,{SbG#H[z{c:;I]l72y~z%rH Lx!1)vybJ6>*m=*r=u??V}_CJ-*f[iqT-');
define('LOGGED_IN_KEY',    'aE|HPDQjN^Om.&|:6nMXif 0~JQ0q>LRc0.~}Ra-nkVZZ)2]|3brd?F~` cv/]#Q');
define('NONCE_KEY',        'V;=;/_Y2pyI?p|)1*cR+G0p=Y?`%1IiDL/rT|+EoFt]Z7qAdGt|$J18YVIx,K!Nx');
define('AUTH_SALT',        '3Gi*,IL5,9NYrJ*}E)tDn%|KX2V7{/tE6u)<Pqmj1KvzkcLj&-WtKoJL}:.58Eci');
define('SECURE_AUTH_SALT', '`tre, rrS6QzqqXt+FP~l-!t}<-.L]{#:_ue`zbNtH+x%,v9|cxJj7h^lPxC_.`P');
define('LOGGED_IN_SALT',   'YKKR1%wvHO2lBo/q,?@KF)ZMd4Bx[bS.jz2|xs<i5MtfyKR}ZC|Y`WDlm,iI4Ltl');
define('NONCE_SALT',       ']%^]lh.l*cqVvW^h@giKBxa0pI333@ |M_D~KDD5/0@0E-,)9SyrlZi4p<:9H|07');
/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define( 'UPLOADS', 'wp-content/uploads' );
require_once(ABSPATH . 'wp-settings.php');
@ini_set('upload_max_size' , '256M' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
define('WP_ALLOW_REPAIR',  true);
?>
