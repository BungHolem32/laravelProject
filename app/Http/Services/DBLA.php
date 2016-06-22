<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 22/06/2016
 * Time: 14:47
 */

namespace App\Http\Services;

use Doctrine\DBAL\DriverManager;


class DBLA
{
	private $conn;
	private static $connections;

	private function __construct()
	{}


	public static function  getConnection($connectionParams = null,$connectionKey = null)
	{
		if (is_array(self::$connections) &&  array_key_exists($connectionKey,self::$connections) ){
			return self::$connections[$connectionKey];
		} else{
			$connection =  self::setupConnection($connectionParams,$connectionKey);
			return $connection;
		}
	}

	private static function setupConnection(Array $connectionsParams=null,$connectionKey){
		$config = new \Doctrine\DBAL\Configuration();

		if ($connectionsParams === null)
			$connectionsParams= array(
				'dbname' => 'laravelCRM',
				'user' => 'root',
				'password' => '',
				'host' => 'localhost',
				'driver' => 'pdo_mysql',
			);

		self::$connections[$connectionKey] = DriverManager::getConnection($connectionsParams, $config);
		return self::$connections[$connectionKey];
	}


}