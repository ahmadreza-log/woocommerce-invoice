<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Invoice_Admin' ) ) {
	class WC_Invoice_Admin {

		protected static ?self $instance = null;

		public static function instance(): self {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			add_action( 'admin_menu', [ $this, 'admin_menu' ] );
			add_action( 'admin_enqueue_scripts', [ WC_Invoice_Enqueue::class, 'admin' ] );
		}

		public function admin_menu() {
			add_menu_page(
				__( 'Invoices', 'woocommerce-invoice' ),
				__( 'Invoices', 'woocommerce-invoice' ),
				'manage_options',
				'woocommerce-invoice',
				function () {
					require_once WC_INVOICE_PLUGIN_DIR . 'includes/admin/views/index.php';
				},
				'dashicons-woocommerce-invoice',
				58,
			);

			add_submenu_page(
				'woocommerce-invoice',
				__( 'Settings', 'woocommerce-invoice' ),
				__( 'Settings', 'woocommerce-invoice' ),
				'manage_options',
				'woocommerce-invoice-settings',
				function () {
					require_once WC_INVOICE_PLUGIN_DIR . 'includes/admin/views/index.php';
				},
				10,
			);
		}
	}
}