<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.live.dugudlabs.com/
 * @since      1.0.0
 *
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Virtual_Clothes_Try_On
 * @subpackage Virtual_Clothes_Try_On/includes
 * @author     Dugudlabs Digital Services <support@dugudlabs.com>
 */
class Virtual_Clothes_Try_On_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'virtual-clothes-try-on',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
