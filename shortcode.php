<?php
/**
 * Implementation of the shortcode functionality.
 *
 * @package Fintel\wordpressorg
 * @version 1.0
 */

namespace fintel\wordpressorg;

if ( ! defined( 'ABSPATH' ) ) {
	die( 403 );
}

/**
 * Implementation of the fintel chart shortcode.
 *
 * @param array $attr Array of attribute strings.
 *
 * return string The HTML for the symbol.
 *
 * @since 1.0.
 */
function fintel_chart( $attr ) {
	if ( ! isset( $attr['symbol'] ) ) {
		return '';
	}

	if ( ! isset( $attr['type'] ) ) {
		// If not given use default.
		$type = 'revenue';
	}

	return get_chart( $attr['symbol'], $attr['type'] );
}

add_shortcode( 'fintel-chart', __NAMESPACE__ . '\fintel_chart' );
