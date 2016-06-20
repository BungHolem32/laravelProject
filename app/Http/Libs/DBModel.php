<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 20/06/2016
 * Time: 09:22
 */

namespace App\Http\Libs;

class DBModel
{
    protected static $host = 'localhost',
        $dbname = 'laravelCRM',
        $user = 'root',
        $pass = '',
        $instance,
        $connection;

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /*GET INSTANCE OF AN OBJECT*/
    public static function getInstance()
    {
        if (null === static::$instance){
            static::$instance = new static();
        }
        return static::$instance;
    }

    /*LOAD CONFIGURATIONS*/
    public function load_config($host = null, $dbname = null, $user = null, $pass = null){

        $args = func_get_args();

        if (count($args) > 0){
            foreach ($args as $name => $value){
                $name = (new \ReflectionParameter(array('DBModel', 'loadConfig'), $name))->getName();
                self::${$name} = $value;
            }
        }
    }

    /*CONNECT TO DATABASE*/
    public function connect()
    {
        $dbh = 'mysql:host=localhost;dbname=laravelCRM;charset=utf8;';
        try{
            self::$connection = new \PDO($dbh, self::$user, self::$pass);

        } catch (\PDOException $e){
            die('Error with the connection to database' . $e->getMessage());
        }
    }


    public function add(array $param , $table ,){

    }


}
