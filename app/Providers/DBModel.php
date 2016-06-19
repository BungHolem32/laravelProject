<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 20/06/16
 * Time: 00:08
 */

namespace app\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;


Class  DBModel extends ServiceProvider

{
    protected static $host = 'localhost',
        $dbname = 'laravelCRM',
        $user = 'root',
        $pass = '';

    public function __construct($host = null, $dbname = null, $user = null, $pass = null)
    {
        self::__construct();
        $args = func_get_args();

        if (count($args) > 0) {
            foreach ($args as $name => $value) {
                $name = (new \ReflectionParameter(array('DBModel', '__construct'), $name))->getName();
                self::${$name} = $value;
            }
        }
    }

    public function connect()
    {
        $this->dbh = 'mysql:host=localhost;dbname=laravelCRM;charset=utf8;';
        try {
            $this->db = new PDO($this->dbh, self::$user, self::$pass);

        } catch (\PDOException $e) {
            die('Error with the connection to database' . $e->getMessage());
        } finally {

        }
    }

}
