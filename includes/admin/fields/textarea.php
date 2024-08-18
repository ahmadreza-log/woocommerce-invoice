<?php
/**
 * @var $option
 */

defined( 'ABSPATH' ) || exit;

$parameters = [
	'type'        => 'text',
	'name'        => esc_attr( $option[ 'id' ] ),
	'id'          => esc_attr( $option[ 'id' ] ),
	'placeholder' => $option[ 'placeholder' ] ?? '',
	'class'       => isset( $option[ 'class' ] ) ? implode( ' ', $option[ 'class' ] ) : '',
	'rows'         => $option[ 'row' ] ?? 8,
	'cols'         => $option[ 'col' ] ?? 30,
];

$parameters = implode( ' ', array_map(
	function ( $v, $k ) { return sprintf( "%s=\"%s\"", $k, $v ); },
	$parameters,
	array_keys( $parameters ),
) );

echo '<textarea ' . $parameters . '>' . ( $option[ 'default' ] ?? '' ) . '</textarea>';