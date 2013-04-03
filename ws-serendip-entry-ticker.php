<?php
/*
 * Plugin Name: Serendip Entry Ticker
 * Plugin URI: http://www.serendip.ws/
 * Description: This is a plug-in that to display recent entry title ticker.
 * Version: 1.0
 * Author: iNo
 * Author URI: http://www.serendip.ws/
 * License: GPL2
 *
 * file created in 2013/04/02 20:06:33.
 * LastUpdated :2013/04/03 22:15:03.
 * */

// Load required files
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "ws-serendip-entry-ticker.class.php";
require_once dirname( __FILE__ ) . DIRECTORY_SEPARATOR . "functions.php";

// Make Instance
global $ws_serendip_entry_ticker;
$ws_serendip_entry_ticker = new Serendip_Entry_Ticker();

// vim:set noet:fenc=utf8:fdl=0 fdm=marker:ts=4 sw=4 sts=0:
?>
