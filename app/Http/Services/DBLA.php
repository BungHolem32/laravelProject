<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 22/06/2016
 * Time: 14:47
 */

namespace App\Http\Services;
use Doctrine\DBAL\DriverManager;


interface DBLAInterface{

}


class DBLA implements DBLAInterface
{
	private $conn;

	public function __construct($connectionParams = null)
	{
		$config = new \Doctrine\DBAL\Configuration();
		if ($connectionParams === null)
			$connectionParams = array(
				'dbname' => 'laravelCRM',
				'user' => 'root',
				'password' => '',
				'host' => 'localhost',
				'driver' => 'pdo_mysql',
			);

		$this->conn = DriverManager::getConnection($connectionParams, $config);
	}
}
