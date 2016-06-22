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
    protected $host = 'localhost',
        $dbname = 'TiPiCRM',
        $user = 'root',
        $pass = '',
        $instance,
        $connection;

    public function __construct()
    {
        $this->load_config();
    }


    /*LOAD CONFIGURATIONS*/
    public function load_config($host = null, $dbname = null, $user = null, $pass = null)
    {

        $args = func_get_args();

        if (count($args) > 0) {
            foreach ($args as $name => $value) {
                $name = (new \ReflectionParameter(array('DBModel', 'loadConfig'), $name))->getName();
                $this->$name = $value;
            }
        }
        return $this;
    }

    /*CONNECT TO DATABASE*/
    public function connect()
    {

        $dbh = "mysql:host={$this->host};dbname={$this->dbname}";
        try {
            $this->connection = new \PDO($dbh, $this->user, $this->pass);
        }
        catch (\PDOException $e) {
            die('Error with the connection to database ' . $e->getMessage());
        }
        finally {
            if (is_object($this->connection)) {
                var_dump(get_parent_class($this->connection));

            }
        }
    }
}

