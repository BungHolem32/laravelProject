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
 * @property Configuration config
 */
class DBService implements DBInterface
{


    public function __construct($connectionParams = null)
    {
        $this->config = new Configuration();

        if (is_null($connectionParams)) {
            $connectionParams = array(
                'dbname' => 'laravelCMS',
                'user' => 'root',
                'password' => 'ilanvac',
                'host' => '127.0.0.1',
                'driver' => 'pdo_mysql',
            );
        } else {
            foreach ($connectionParams as $name => $value) {
                $connectionParams[$name] = $value;
            }
        }
        $this->connect = DriverManager::getConnection($connectionParams, $this->config);

    }

    public function changeConnectionParams($connectionParams)
    {
        foreach ($connectionParams as $name => $value) {
            $connectionParams[$name] = $value;
        }
        $this->connect = DriverManager::getConnection($connectionParams, $this->config);
    }
}