<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://motivast.com
 * @since             1.0.0
 * @package           Acf_Helper
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Helper
 * Plugin URI:        acf-helper
 * Description:       ACF Helper plugin provide helper functions to add acf fields programmatically.
 * Version:           1.0.0
 * Author:            Motivast
 * Author URI:        http://motivast.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-helper
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'inc/class-acf-helper-container.php';
require plugin_dir_path( __FILE__ ) . 'inc/class-acf-helper.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function acf_helper() {

	static $plugin;

	if ( isset( $plugin ) && $plugin instanceof Acf_Helper ) {
		return $plugin;
	}

	$plugin = new Acf_Helper();

}

acf_helper();
