<?php
/**
 * Main plugin driver.
 *
 * @package fintel\wordpressorg
 * @version 1.0
 */

/*
Plugin Name: Stock Market Publisher Tools by Fintel
Description: A variety of free tools to help stock market sites increase traffic and engagement.
Version: 1.0
Author: fintel.io
License: GPL2
*/

namespace fintel\wordpressorg;

if ( ! defined( 'ABSPATH' ) ) {
	die( 403 );
}

const VERSION = '1.0';

require_once __DIR__ . '/chart.php';
require_once __DIR__ . '/shortcode.php';
