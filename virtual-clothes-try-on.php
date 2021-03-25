<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.live.dugudlabs.com/
 * @since             1.0.0
 * @package           Virtual_Clothes_Try_On
 *
 * @wordpress-plugin
 * Plugin Name:       DressFit - Virtual Clothes Try On
 * Plugin URI:        https://www.live.dugudlabs.com/dressfit
 * Description:       DressFit enables Virtual Try On Options for your products(Tshirts,Jeans,Shirts etc.), just in few clicks.
 * Version:           1.0.0
 * Author:            Dugudlabs Digital Services
 * Author URI:        https://www.live.dugudlabs.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       virtual-clothes-try-on
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'VIRTUAL_CLOTHES_TRY_ON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-virtual-clothes-try-on-activator.php
 */
function activate_virtual_clothes_try_on() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-clothes-try-on-activator.php';
	Virtual_Clothes_Try_On_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-virtual-clothes-try-on-deactivator.php
 */
function deactivate_virtual_clothes_try_on() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-virtual-clothes-try-on-deactivator.php';
	Virtual_Clothes_Try_On_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_virtual_clothes_try_on' );
register_deactivation_hook( __FILE__, 'deactivate_virtual_clothes_try_on' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-virtual-clothes-try-on.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_virtual_clothes_try_on() {

	$plugin = new Virtual_Clothes_Try_On();
	$plugin->run();

}
run_virtual_clothes_try_on();
