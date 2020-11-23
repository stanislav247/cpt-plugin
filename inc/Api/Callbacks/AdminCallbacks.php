<?php 
/**
 * @package  StanislavPlugin
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/admin.php" );
	}

	public function storePage()
	{
		return require_once( "$this->plugin_path/templates/storePage.php" );
	}

	public function massPromo()
	{
		return require_once( "$this->plugin_path/templates/massPromo.php" );
	}


	
}