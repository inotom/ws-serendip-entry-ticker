<?php
/**
 * Core class for Serendip Entry Ticker Plugin
 *
 * @package Serendip Entry Ticker
 * @since 1.0
 *
 * file created in 2013/04/02 20:08:11.
 * LastUpdated :2013/04/03 09:21:34.
 * author iNo
 */

class Serendip_Entry_Ticker {
	/**
	 * Version of this plugin
	 * @const float
	 */
	const VERSION = 1.0;

	/**
	 * Domain name for i18n
	 * @const string
	 */
	const DOMAIN = 'ws-serendip-entry-ticker';

	/**
	 * Default display numbers of posts
	 * @const int
	 */
	const NUM_POSTS = 3;

	/**
	 * Directory of this plugin
	 * @var string
	 */
	var $dir;

	/**
	 * Implemented already ticker flag
	 */
	public $has_ticker;

	/**
	 * Constructor for PHP4
	 * @return void
	 */
	function Serendip_Entry_Ticker() {
		$this->__construct();
	}

	/**
	 * Constructor for PHP5
	 * @return void
	 */
	public function __construct() {
		// Set directory
		$this->dir = dirname( __FILE__ );
		// Set Text Domain (for i18n)
		load_plugin_textdomain( self::DOMAIN, false, basename( $this->dir ) . DIRECTORY_SEPARATOR . 'languages' );

		$this->has_ticker = false;

		include_once $this->dir . '/ws-serendip-entry-ticker.view.php';
		$this->view = new Serendip_Entry_Ticker_View();

		// ***** Add actions *****
		// Add shortcode
		add_shortcode( 'ws_serendip_entry_ticker', array( $this->view, 'the_entry_ticker' ) );
		// Add widget
		wp_register_sidebar_widget(
			'entry-ticker-sidebar',
			__( 'Entry Ticker', self::DOMAIN ),
			array( $this->view, 'the_entry_ticker' ),
			array( 'description' => __( 'Display recent entry titles by ticker view.', self::DOMAIN ) )
		);
	}

	/**
	 * Get recent posts object array
	 * @return array
	 */
	public function get_recent_posts() {
		$num_posts = self::NUM_POSTS;
		return get_posts( array(
			'numberposts' => $num_posts
			)
		);
	}
}

// vim:set syn=wordpress:noet:fenc=utf8:fdl=0 fdm=marker:ts=4 sw=4 sts=0:
?>
