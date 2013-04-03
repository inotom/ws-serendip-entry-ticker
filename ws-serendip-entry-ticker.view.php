<?php
/**
 * View class for Serendip Entry Ticker Plugin
 *
 * @package Serendip Entry Ticker
 * @since 1.0
 *
 * file created in 2013/04/02 20:10:44.
 * LastUpdated :2013/04/03 22:16:15.
 * author iNo
 */

class Serendip_Entry_Ticker_View {
	public function the_entry_ticker() {
		global $ws_serendip_entry_ticker;
		if ( !$ws_serendip_entry_ticker->has_ticker ) {
			echo '<div id="ticker"><div>&nbsp;</div></div>';
			echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>';
			echo '<script>';
			$this->the_js_array();
			$this->the_js_code();
			echo '</script>';
			$ws_serendip_entry_ticker->has_ticker = true;
		}
	}

	private function the_js_array() {
		global $ws_serendip_entry_ticker;
		$posts = $ws_serendip_entry_ticker->get_recent_posts();
		echo 'var tickers = [';
		foreach( $posts as $post ) {
			echo '[ "' . $post->post_title . '", "' . get_permalink( $post->ID ) . '" ],';
		}
		echo "[ null , null ]];\n";
	}

	private function the_js_code() {
		echo <<<EOF
var INTERVAL_SPAN = 7000;
var ticker_id = 0;
setInterval("displayTicker()", INTERVAL_SPAN);
var wait = function() {
};
var displayTicker = function() {
	if ((tickers[ticker_id][0] === null) && (tickers[ticker_id][1] === null)) {
		ticker_id = 0;
	}
	$('#ticker div').fadeOut('normal', (function() {
		$('#ticker div').fadeIn('slow',(function() {
		}));
		$(this).html('<a href="' + tickers[ticker_id][1] + '">' + tickers[ticker_id][0] + '</a>');
		ticker_id = ticker_id === tickers.length - 1 ? 0 : ticker_id += 1;
		setInterval("wait()", INTERVAL_SPAN / 2);
	}));
};
$(function() {
	displayTicker()
});

EOF;
	}
}

// vim:set noet:fenc=utf8:fdl=0 fdm=marker:ts=4 sw=4 sts=0:
?>
