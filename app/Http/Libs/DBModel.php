<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 20/06/2016
 * Time: 09:22
 */

namespace App\Http\Libs;

use PDO;

use Illuminate\Support\Facades\DB;

class DBModel
{
    protected $host = 'localhost',
        $dbname = 'laravelCRM',
        $user = 'root',
        $pass = '',
        $instance;

    /**
     * @var PDO
     */
    protected $connection;

    /**
     * @var DB
     */
    protected $queryBuilder;


    public function __construct()
    {
        return $this;
    }


    /*LOAD CONFIGURATIONS*/
    public function load_config($host = null, $dbname = null, $user = null, $pass = null)
    {
        $args = func_get_args();

        if (count($args) > 0){
            foreach ($args as $name => $value){
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

        try{
            $this->connection = new PDO($dbh, $this->user, $this->pass);
        }
        
        catch (\PDOException $e){
            die('Error with the connection to database ' . $e->getMessage());
        }

        finally{
            if (is_object($this->connection)){
                echo 'connection established';
            }
        }
        return $this;
    }


    public function isExist($table, $column, $value)
    {

        $sql = "SELECT * FROM `laravelCRM_emails` WHERE  = ?";
        $query = $this->connection->prepare($sql);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute(array($value));
        $result = $query->fetchAll();

    }

}

