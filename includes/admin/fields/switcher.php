<?php
/**
 * @var $option
 */

defined( 'ABSPATH' ) || exit;

$parameters = [
	'type'  => 'checkbox',
	'name'  => esc_attr( $option[ 'id' ] ),
	'id'    => esc_attr( $option[ 'id' ] ),
	'value' => $option[ 'default' ] ?? false,
];

$parameters = implode( ' ', array_map(
	function ( $v, $k ) { return sprintf( "%s=\"%s\"", $k, $v ); },
	$parameters,
	array_keys( $parameters ),
) );

echo '<div class="switcher">';
echo '<input ' . $parameters . '>';
echo '<span></span>';
echo '</div>';