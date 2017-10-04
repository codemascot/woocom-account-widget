<?php # -*- coding: utf-8 -*-

namespace TheDramatist\WooComAW\AccountWidgetInit;

/**
 * Class AccountWidgetInit
 *
 * @package TheDramatist\WooComAW\AccountWidgetInit
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