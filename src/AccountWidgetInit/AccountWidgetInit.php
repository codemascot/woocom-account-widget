<?php

namespace TheDramatist\WooComAW\AccountWidgetInit;

class AccountWidgetInit {

	public function init() {
		add_action( 'widgets_init', [ $this, 'register_widget' ] );
	}

	public function register_widget() {
		return register_widget( '\TheDramatist\WooComAW\AccountWidgetCore\AccountWidgetCore' );
	}
}