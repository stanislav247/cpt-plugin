<?php 
/**
 * @package  StanislavPlugin
 */
namespace Inc\Pages;

use Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

/**
* 
*/
class Dashboard extends BaseController
{
	public $settings;

	public $callbacks;

	public $callbacks_mngr;

	public $pages = array();

	// public $subpages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallbacks();

		$this->setPages();

		// $this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->withSubPage( 'Settings' )->register();
	}

	public function setPages() 
	{
		$this->pages = array(
			array(
				'page_title' => 'Stanislav Plugin', 
				'menu_title' => 'SP', 
				'capability' => 'manage_options', 
				'menu_slug' => 'stanislav_plugin', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-admin-site-alt2', 
				'position' => 110
			)
		);
	}

	// public function setSubpages()
	// {
	// 	$this->subpages = array(
	// 		array(
	// 			'parent_slug' => 'stanislav_plugin', 
	// 			'page_title' => 'Store Page', 
	// 			'menu_title' => 'Store Page', 
	// 			'capability' => 'manage_options', 
	// 			'menu_slug' => 'stanislav_store', 
	// 			'callback' => array( $this->callbacks, 'storePage' )
	// 		),
	// 		array(
	// 			'parent_slug' => 'stanislav_plugin', 
	// 			'page_title' => 'Mass Promo', 
	// 			'menu_title' => 'Mass Promo', 
	// 			'capability' => 'manage_options', 
	// 			'menu_slug' => 'stanislav_promo', 
	// 			'callback' => array( $this->callbacks, 'massPromo' )
	// 		),
	// 	);
	// }

	public function setSettings()
	{

		$args = array(
			array(
				'option_group' => 'stanislav_plugin_settings',
				'option_name' => 'stanislav_plugin',
				'callback' => array( $this->callbacks_mngr, 'checkboxSanitize' )
			)
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'stanislav_admin_index',
				'title' => 'Settings',
				'callback' => array( $this->callbacks_mngr, 'adminSectionManager' ),
				'page' => 'stanislav_plugin'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{

		$args = array();

		foreach ( $this->managers as $key => $value ) {
			$args[] = array(
				'id' => $key,
				'title' => $value,
				'callback' => array( $this->callbacks_mngr, 'checkboxField' ),
				'page' => 'stanislav_plugin',
				'section' => 'stanislav_admin_index',
				'args' => array(
					'label_for' => $key,
					'class' => 'ui-toggle',
					'option_name' => 'stanislav_plugin'
				)
			);
		}

		

		$this->settings->setFields( $args );
	}
}