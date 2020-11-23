<?php
/**
 * @package  StanislavPlugin
 */
/*
Plugin Name: Stanislav Plugin
Description: This is a task .
Version: 1.0.0
Author: Stanislav Ivanov
License: MIT
*/

/*
This is a SG Task
*/

//secure
if(!defined('ABSPATH')){
	die;
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}



use Inc\Base\Activate;
use Inc\Base\Deactivate;

/**
 * runs during plugin activation
 */
function activate_stanislav_plugin() {
	Activate::activate();
}

register_activation_hook( __FILE__, 'activate_stanislav_plugin' ); // activate

/**
 * runs during plugin deactivation
 */
function deactivate_stanislav__plugin() {
	Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_stanislav__plugin' ); //deactivate

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}