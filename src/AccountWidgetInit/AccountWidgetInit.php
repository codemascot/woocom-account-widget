<?php # -*- coding: utf-8 -*-

namespace TheDramatist\WooComAW\AccountWidgetInit;

/**
 * Class AccountWidgetInit
 *
 * @author  Khan M Rashedun-Naby <naby88@gmail.com>
 * @package woocom-account-widget
 * @license https://www.gnu.org/licenses/gpl.txt GPL
 */
class AccountWidgetInit {

	/**
	 * This method is responsible for initializing the widget.
	 */
	public function init() {
		add_action( 'widgets_init', [ $this, 'register_widget' ] );
	}

	/**
	 * Registering the widget.
	 */
	public function register_widget() {
		return register_widget( '\TheDramatist\WooComAW\AccountWidgetCore\AccountWidgetCore' );
	}

}