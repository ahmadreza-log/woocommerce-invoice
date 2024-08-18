<?php
/**
 * @var $option
 */

defined( 'ABSPATH' ) || exit;

$parameters = [
	'type'        => 'text',
	'name'        => esc_attr( $option[ 'id' ] ),
	'id'          => esc_attr( $option[ 'id' ] ),
	'value'       => $option[ 'default' ] ?? '',
	'placeholder' => $option[ 'placeholder' ] ?? '',
	'class'       => isset( $option[ 'class' ] ) ? implode( ' ', $option[ 'class' ] ) : '',
];

$parameters = implode( ' ', array_map(
	function ( $v, $k ) { return sprintf( "%s=\"%s\"", $k, $v ); },
	$parameters,
	array_keys( $parameters ),
) );

echo '<div class="upload-box">';

echo '<input ' . $parameters . '>';

echo '<button type="button" class="upload-button">' . ( isset( $option[ 'upload-button' ] ) ? esc_html( $option[ 'upload-button' ] ) : __( 'Upload', 'woocommerce-invoice' ) ) . '</button>';

echo '</div>';