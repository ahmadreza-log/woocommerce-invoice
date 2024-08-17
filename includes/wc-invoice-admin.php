<?php
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'WC_Invoice_Admin' ) ) {
	class WC_Invoice_Admin {
		public string $tab;
		public string $title;
		public string $section;

		protected static ?self $instance = null;

		public static function instance(): self {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			global $current_section;

			$this->tab     = 'invoice';
			$this->title   = __( 'Invoice', 'wc-invoice' );
			$this->section = ! is_null( $current_section ) ? $current_section : '';

			add_filter( 'woocommerce_settings_tabs_array', [ $this, 'tabs' ], 30 );
			add_action( "woocommerce_sections_{$this->tab}", [ $this, 'sections' ] );
			add_action( "woocommerce_settings_{$this->tab}", [ $this, 'output' ] );
			add_action( "woocommerce_settings_save_{$this->tab}", [ $this, 'save' ] );
		}

		public function tabs( $tabs ): array {
			$tabs[ $this->tab ] = $this->title;

			return $tabs;
		}

		public function sections(): void {
			$sections = [
				'' => __( 'Settings', 'wc-invoice' ),
			];

			$sections = apply_filters( "woocommerce_get_sections_{$this->tab}", $sections );

			if ( count( $sections ) > 1 ) {

				$output = '<ul class="subsubsub">';

				$keys = array_keys( $sections );

				foreach ( $sections as $id => $label ) {
					$url = 'admin.php';
					$url .= http_build_query( [
						'page'    => 'wc-settings',
						'tab'     => $this->tab,
						'section' => sanitize_title( $id ),
					] );

					$output .= '<li><a href="' . admin_url( $url ) . '" class="' . ( $this->section == $id ? 'current' : '' ) . '">' . $label . '</a> ' . ( end( $keys ) == $id ? '' : '|' ) . '</li>';
				}

				$output .= '</ul>';
				$output .= '<br class="clear" />';

				echo $output;

			}
		}

		public function options(): array {
			$settings = [];

			return apply_filters( "woocommerce_get_settings_{$this->tab}", $settings );
		}

		public function output() {
			$options = $this->options();

			WC_Admin_Settings::output_fields( $options );
		}

		public function save() {
			$options = $this->options();

			WC_Admin_Settings::save_fields( $options );

			if ( $this->section ) {
				do_action( 'woocommerce_update_options_' . $this->tab . '_' . $this->section );
			}
		}
	}
}