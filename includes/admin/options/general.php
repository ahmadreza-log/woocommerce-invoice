<?php
defined( 'ABSPATH' ) || exit;

return [
	[
		'id'          => 'store-name',
		'title'       => __( 'Store Name', 'woocommerce-invoice' ),
		'type'        => 'text',
		'desc'        => __( 'Your store name to display on the invoice.', 'woocommerce-invoice' ),
		'placeholder' => __( 'Store Name', 'woocommerce-invoice' ),
		'default'     => get_bloginfo( 'name' ),
	],
	[
		'id'    => 'store-logo',
		'title' => __( 'Store Logo', 'woocommerce-invoice' ),
		'type'  => 'upload',
		'desc'  => __( 'Choosing the store logo to include in the invoice.', 'woocommerce-invoice' ),
	],
	[
		'id'    => 'about-store',
		'title' => __( 'About Store', 'woocommerce-invoice' ),
		'type'  => 'textarea',
		'desc'  => __( 'You can write a few lines about the store, you can also enter the phone number or address of the store.', 'woocommerce-invoice' ),
	],
];