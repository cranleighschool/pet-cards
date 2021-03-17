<?php
/*
Plugin Name: Cranleigh Pet Cards
Plugin URI: https://www.cranleigh.org
Description: Cranleigh Pet Cards
Version: 1.0.0
Author: tjbcranleigh
Author URI: https://www.cranleigh.org
License: GPL2
*/

namespace tjbcranleigh\CranleighPetCards;

if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

$plugin = new Plugin();
