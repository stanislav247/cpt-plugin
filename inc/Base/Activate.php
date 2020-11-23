<?php
/**
 * @package  StanislavPlugin
 */
namespace Inc\Base;

class Activate
{
	public static function activate() {
		flush_rewrite_rules();

		$default = array();

		if ( ! get_option( 'stanislav_plugin' ) ) {
			update_option( 'stanislav_plugin', $default );
		}

		if ( ! get_option( 'stanislav_plugin_cpt' ) ) {
			update_option( 'stanislav_plugin_cpt', $default );
		}
	}
}