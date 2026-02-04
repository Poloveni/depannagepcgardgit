<?php
// Begin AIOWPSEC Firewall
if (file_exists('/home/phjvbzh/www/aios-bootstrap.php')) {
	include_once('/home/phjvbzh/www/aios-bootstrap.php');
}
// End AIOWPSEC Firewall
//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 'ccJvO3G1ObZx7wZxtKhA4u4b7NTvPAaDWMGeVDDAn7DabD0BNXswtYg1wj9WrtJZ');
//END Really Simple Security key
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('WP_CACHE', true);
define( 'WPCACHEHOME', '/home/phjvbzh/www/wp-content/plugins/wp-super-cache/' );
define( 'DB_NAME', 'phjvbzh795' );

/** Database username */
define( 'DB_USER', 'phjvbzh795' );

/** Database password */
define( 'DB_PASSWORD', '4SNkNY5a4xyn' );

/** Database hostname */
define( 'DB_HOST', 'phjvbzh795.mysql.db:3306' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'vCsAhzhmxKY3B2e4EdIGyZJ26bUK/XxC5vaUlmtELuAX4tmnmoAcSToPMANw' );
define( 'SECURE_AUTH_KEY',  'iBTL3flvIcuhOU3p9OOhwkOVgCSep7hLED8lQI2nJe1YUNDdL9/irxwZz5vH' );
define( 'LOGGED_IN_KEY',    'xJJcOiIwUrty92emNlTTmZsawipzOKXAFsq1qMaR3HKu+PNfU9UVfsD6+C6K' );
define( 'NONCE_KEY',        '0ufNMl40vgH9hkN3UlB6nRAT5eOVGOAU2EaXGKPriFmsPbG9d/YCkKya+W7n' );
define( 'AUTH_SALT',        'rZpbQEGmn8YtZ1VPpy2HgmbQwkcGBcXDvtzogykDs1LwaeDjc7duwM1oKpKg' );
define( 'SECURE_AUTH_SALT', '5vEciH2bUfvLc7UsBKa7Oy7IlYxQbJqg7AuAwjuqMjUiPcPmxHQkh146aAqj' );
define( 'LOGGED_IN_SALT',   'IU8mXbaDnWySo8WzkUM7ajCT/J8TldYbJTyLgNmLm02BX72cVegIW/p7/4cP' );
define( 'NONCE_SALT',       'v4Hemtk5SrX22hqAlijdxgiEXNHPjPWFQk5o5h4x9WyZNmI9+dPj7D7dvgHl' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'mod321_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
//Disable File Edits
if (!defined('DISALLOW_FILE_EDIT')) { define('DISALLOW_FILE_EDIT', true); }