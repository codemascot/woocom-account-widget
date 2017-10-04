<?php # -*- coding: utf-8 -*-

/**
 * Plugin Name: WooCom Account Widget
 * Description: TODO: Describe what this package is all about
 * Plugin URI:  TODO
 * Author:      Khan M Rashedun-Naby
 * Author URI:  http://rnaby.github.io
 * Version:     1.0.0
 * License:     GPL
 * Text Domain: woocom-aw //woocom-account-widget
 */

namespace TheDramatist\WooComAW;

/**
 * Initialize all the plugin things.
 *
 * @throws \Throwable
 */
function initialize() {

	try {
		/**
		 * Check if WooCommerce is active
		 **/
		require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if ( ! is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
			deactivate_plugins( plugin_basename( __FILE__ ) );
			add_action(
				'admin_notices', function () {

					$class   = 'notice notice-error is-dismissible';
					$message = __(
						'You don\'t have <b>WooCommerce</b> activated. Please Activate <b>WooCommerce</b> and then try to activate again <b>WooCom Account Widget</b>.',
						'woocom-account-widget'
					);

					printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
				}
			);

			return;
		}

		/**
		 * Checking if vendor/autoload.php exists or not.
		 */
		if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
			/** @noinspection PhpIncludeInspection */
			require_once __DIR__ . '/vendor/autoload.php';
		}

		/**
		 * Calling modules.
		 */
		( new AccountWidgetInit\AccountWidgetInit() )->init();

	} catch ( \Throwable $throwable ) {
		if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
			throw $throwable;
		}
		do_action( 'woocom_aw_error', $throwable );
	}
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\initialize' );