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

define( 'DB_NAME', "SY_Logistics_Agent" );


/** MySQL database username */

define( 'DB_USER', "root" );


/** MySQL database password */

define( 'DB_PASSWORD', "" );


/** MySQL hostname */

define( 'DB_HOST', "localhost" );


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

define('AUTH_KEY',         'fdlWEsGRFkqaGQvjSieIQybINVCyjFjiiTgAAGSm3xirq5iIGP7WQfMTEb0VY44Y');

define('SECURE_AUTH_KEY',  'Uq63nRtZmRQriSoX4cZo25rQkeKBiToIDeGnaEqByNXwELH2YUBuLnKe2VwchvYc');

define('LOGGED_IN_KEY',    'l0JXuHfJg4I4RhWiCDbmPrF95N6G4EAeWwzddLxaWe5wn4kn6YUgDAQlwWQDOiu6');

define('NONCE_KEY',        'A3qapOmJ8jbi0Bi08bggb3fXaA7WE3lrI4qYtdjC8bIJCF6a0zbD7MfBdRx600QR');

define('AUTH_SALT',        'vPczJRcq5e3iMtdI1X8YsA0G3Ht4IkxTcsOVITXhg18UHlRVfq2Gaf5p0fCVraLa');

define('SECURE_AUTH_SALT', 'Oj1va7PBNqysmXpz8zGkZHaCzAvwWK5vfZFAcKMFRQdM2O2neyCqC1GwHvYFeUJZ');

define('LOGGED_IN_SALT',   'QsDxjvWQXUIBKWYkucawLNnzCG9V72birvCKgQgLMD7znFGYukuG3gfCVoyjWSZU');

define('NONCE_SALT',       '1G2VOQAdMrdhpmaE1O7Ms9sHFeg1eVAs3tlvV6KOfxwwfcQ1IIhUOiJt0gnmhcgP');


/**

 * Other customizations.

 */

define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**

 * Turn off automatic updates since these are managed externally by Installatron.

 * If you remove this define() to re-enable WordPress's automatic background updating

 * then it's advised to disable auto-updating in Installatron.

 */

define('AUTOMATIC_UPDATER_DISABLED', true);



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


/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once( ABSPATH . 'wp-settings.php' );

