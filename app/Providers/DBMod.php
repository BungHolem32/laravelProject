<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DBMod extends ServiceProvider
{

    /**
     * @var string
     */
    protected static $host = 'localhost',
        $dbname = 'laravelCRM',
        $user = 'root',
        $pass = '';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * DB constructor.
     * @param null $host
     * @param null $dbname
     * @param null $user
     * @param null $pass
     */
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

    /**
     *
     */

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
