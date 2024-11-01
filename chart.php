<?php
/**
 * Implementation of the chrt relate API wrappers.
 *
 * @package Fintel\wordpressorg
 * @version 1.0
 */

namespace fintel\wordpressorg;

if ( ! defined( 'ABSPATH' ) ) {
	die( 403 );
}

const REMOTE_CHART_URL = 'https://fintel.io/api/chart/us/';

/**
 * Generate HTML containing a chart image for a symbol, based on results from fintel.io.
 *
 * @since 1.0
 *
 * @param string $symbol The symbol of the stock to get the chart for.
 * @param string $key The term for the chart data
 *
 * @return string The relevant HTML or empty string if there was a failure.
 */
function get_chart( $symbol, $type ) {

	$response = wp_safe_remote_get( REMOTE_CHART_URL . $symbol . '/' . $type . '?site=' . site_url() );

	if ( is_wp_error( $response ) || 200 !== $response['response']['code'] ) {
		// an error...
		$ret = '';
	} else {
		$data = json_decode( $response['body'], true );
		if ( ! $data ) {
			$ret = '';
		} else {
			$title   = esc_attr( $data['title'] );
			$caption = $data['attrib'];

			$ret = <<<EOT
<figure class="fintel_chart">
<img width="{$data['width']}" height="{$data['height']}" src="{$data['imageUrl']}" alt="{$title}"  title="{$title}"/>
<figcaption>{$caption}</figcaption>
</figure>
EOT;

		}
	}

	return $ret;
}
