<?php
define( 'WP_CACHE', true );

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

* @link https://wordpress.org/documentation/article/editing-wp-config-php/

*

* @package WordPress

*/



// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define('DB_NAME', 'halanfeed_havi');



/** Database username */

define('DB_USER', 'halanfeed_havi');



/** Database password */

define('DB_PASSWORD', 'A7VdyGmkgx');



/** Database hostname */

define('DB_HOST', '127.0.0.1:3306');



/** Database charset to use in creating database tables. */

define('DB_CHARSET', 'utf8mb4');



/** The database collate type. Don't change this if in doubt. */

define('DB_COLLATE', '');



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

define('AUTH_KEY', 'MnccXNnBE/Kx6znmeuIX9nLmfa794VpY8kzLbvsm5BBmbP+JmVYBRiOkzC+Quaow');

define('SECURE_AUTH_KEY', '/vuhnLkrR8iXBs4ZvawXVPu9fcktFn671SB/oYP98/gz/PpX0jTK5QjeNHSyOyZW');

define('LOGGED_IN_KEY', 'GEwE++wKGsRuh8x6hOB7/dvTcyc8qvwfP0wNAMD9yKX/yv3VRgrEqDbMJCjTD2tp');

define('NONCE_KEY', 'O66gAJp4k7I1VAWyMJ8D7gonNYFc/NAQ3/7B1TBCEggtDFNaypQpmwhvmWqgkD1I');

define('AUTH_SALT', 'j6h3yEK6ZFZ0MmMkrumZoVnxwRcxm+cT9nL9qif4NzE5m0aDnBJfYs+DI01IeVCc');

define('SECURE_AUTH_SALT', '2Ka1G/uHL50s4HkkvMY+52V+W8NN6olx+6oEr60+QKq7dkLpTWK7AVm3DgWH8Wb2');

define('LOGGED_IN_SALT', 'Z6EofgqMeT4/LzJh5SzcMO8fMvs71iW/CP74O2zc2m9gGjMEnQI1HmzYbjRZHKY2');

define('NONCE_SALT', 'vYuCgTfsoMIHPPy+gOVVUrekE4smXrqQWV8o6OT0mvSnz2YLGzViII0/o97m3E6t');



/**#@-*/



/**

* WordPress database table prefix.

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

* visit the documentation.

*

* @link https://wordpress.org/documentation/article/debugging-in-wordpress/

*/

define( 'WP_DEBUG', false );



/* Add any custom values between this line and the "stop editing" line. */







/* That's all, stop editing! Happy publishing. */



/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

define( 'ABSPATH', __DIR__ . '/' );

}

define( 'ALLOW_UNFILTERED_UPLOADS', true );

/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';
