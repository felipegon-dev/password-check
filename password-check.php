<?php
/**
 * The plugin bootstrap file
 *
 * @link              http://www.amsterdapp.nl
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       Password Check
 * Description:       Avoid login without a secure password
 * Version:           1.0.0
 * Author:            Felipe Gonzalez Lopez
 * Author URI:        http://www.amsterdapp.nl
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       password-check
 */

use PasswordCheck\App\Application\Init\Password_Check_Activator;
use PasswordCheck\App\Application\Init\Password_Check_Deactivator;
use PasswordCheck\App\Application\Init\Password_Check;

// Enable WP_DEBUG mode
define( 'WP_DEBUG', true );
// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );
// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', true );
// @ini_set( 'display_errors', 0 );
// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );



// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PASSWORD_CHECK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-name-activator.php
 */
function activate_password_check() {
	require_once plugin_dir_path( __FILE__ ) . 'app/application/init/class-password-check-activator.php';
	Password_Check_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_password_check() {
	require_once plugin_dir_path( __FILE__ ) . 'app/application/init/class-password-check-deactivator.php';
	Password_Check_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_password_check' );
register_deactivation_hook( __FILE__, 'deactivate_password_check' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'app/application/init/class-password-check.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_password_check() {

	$plugin = new Password_Check();
	$plugin->run();

}
run_password_check();
