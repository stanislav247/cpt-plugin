<?php
/**
 * @package  AlecadddPlugin
 */
namespace Inc;

final class Init
{
	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function get_services() 
	{
		return [
			Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CustomPostTypeController::class
			
		];
	}

	/**
	 * Loop through the classes
	 * 
	 */
	public static function register_services() 
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * 
	 */
	private static function instantiate( $class )
	{
		$service = new $class();

		return $service;
	}
}