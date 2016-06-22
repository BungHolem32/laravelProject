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

/**
 * @property \Doctrine\DBAL\Connection connect
 */
class DBService implements DBInterface
{



	public function __construct($connectionParams = null)
	{
		$config = new Configuration();

		if (is_null($connectionParams)) {
			$connectionParams = array(
				'dbname' => 'CRMLARAVEL',
				'user' => 'root',
				'password' => '',
				'host' => '127.0.0.1',
				'driver' => 'pdo_mysql',
			);
		}
		$this->connect =  DriverManager::getConnection($connectionParams, $config);

	}
}