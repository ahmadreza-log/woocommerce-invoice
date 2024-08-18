<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Invoice_Enqueue' ) ) {
	class WC_Invoice_Enqueue {
		public static function admin() {
			wp_enqueue_style( 'wc-invoice-style', WC_INVOICE_PLUGIN_URL . 'assets/css/admin-style.css', [], WC_INVOICE_PLUGIN_VER );

			wp_enqueue_script( 'wc-invoice-script', WC_INVOICE_PLUGIN_URL . 'assets/js/admin-script.js', [ 'jquery' ], WC_INVOICE_PLUGIN_VER, true );
		}

		public static function frontend() { }
	}
}