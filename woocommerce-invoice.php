<?php
/**
 * Woocommerce Invoice
 *
 * @package           WoocommerceInvoice
 * @author            Ahmadreza Ebrahimi
 * @copyright         2024 Ahmadreza Ebrahimi
 * @license           GPL-3.0-or-later
 * @wordpress-plugin
 * Plugin Name:       Woocommerce Invoice
 * Plugin URI:        https://wordpress.org/plugin/woocommerce-invoice
 * Description:       Create purchase invoices for customers who have purchased from you.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.4
 * Author:            Ahmadreza Ebrahimi
 * Author URI:        https://github.com/ahmadreza-log/
 * Text Domain:       wc-invoice
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Requires Plugins:  woocommerce
 */

// Close file if read directly.
defined( 'ABSPATH' ) || exit;

define( 'WC_INVOICE_PLUGIN_FILE', __FILE__ );
define( 'WC_INVOICE_PLUGIN_DIR', plugin_dir_path( WC_INVOICE_PLUGIN_FILE ) );
define( 'WC_INVOICE_PLUGIN_URL', plugin_dir_url( WC_INVOICE_PLUGIN_FILE ) );
define( 'WC_INVOICE_PLUGIN_VER', '1.0.0' );


// Load plugin textdomain for translate.
load_plugin_textdomain( 'wc-invoice', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

if ( ! class_exists( 'WC_Invoice' ) ) {
	final class WC_Invoice {
		protected static ?self $instance = null;

		public static function instance(): self {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			$this->includes();

			WC_Invoice_Admin::instance();
		}

		public function includes() {
			require_once WC_INVOICE_PLUGIN_DIR . 'includes/wc-invoice-admin.php';
		}
	}
}

if ( ! function_exists( 'wc_invoice' ) ) {
	function wc_invoice(): WC_Invoice {
		return WC_Invoice::instance();
	}
}

wc_invoice();