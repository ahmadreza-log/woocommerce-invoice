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
	[
		'id'    => 'store-signature',
		'title' => __( 'Store Signature', 'woocommerce-invoice' ),
		'type'  => 'upload',
		'desc'  => __( 'Upload your store\'s signature, this signature will be shown in random position on all invoices.', 'woocommerce-invoice' ),
	],
	[
		'id'    => 'invoice-prefix',
		'title' => __( 'Invoice Prefix', 'woocommerce-invoice' ),
		'type'  => 'text',
		'desc'  => __( 'You can consider a prefix for each invoice number.', 'woocommerce-invoice' ),
	],
	[
		'id'    => 'invoice-suffix',
		'title' => __( 'Invoice Suffix', 'woocommerce-invoice' ),
		'type'  => 'text',
		'desc'  => __( 'You can consider a suffix for each invoice number.', 'woocommerce-invoice' ),
	],
];