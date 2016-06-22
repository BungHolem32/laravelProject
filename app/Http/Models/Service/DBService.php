<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 22/06/16
 * Time: 19:52
 */

namespace App\Http\Models\Service;


use App\Http\Models\Interfaces\DBInterface;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class DBService implements DBInterface
{

	public function __construct($connectionParams = null)
	{
		$config = new Configuration();

		if (is_null($connectionParams)) {
			$connectionParams = array(
				'dbname' => 'mydb',
				'user' => 'user',
				'password' => 'secret',
				'host' => 'localhost',
				'driver' => 'pdo_mysql',
			);
		}
		$conn = DriverManager::getConnection($connectionParams, $config);
	}
}