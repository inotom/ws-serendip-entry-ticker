<?php
/**
 * User functions for Serendip Entry Ticker Plugin
 *
 * @package Serendip Entry Ticker
 * @since 1.0
 *
 * file created in 2013/04/02 20:10:19.
 * LastUpdated :2013/04/03 22:16:25.
 * author iNo
 */

function ws_serendip_the_entry_ticker() {
	global $ws_serendip_entry_ticker;
	$ws_serendip_entry_ticker->view->the_entry_ticker();
}

// vim:set noet:fenc=utf8:fdl=0 fdm=marker:ts=4 sw=4 sts=0:
?>
