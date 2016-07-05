<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 28/06/16
 * Time: 23:48
 */

namespace App\Http\Models\Service;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use App\Http\Models\Interfaces\DBInterface;

class DbORMService implements DBInterface
{
    protected $entityManager;


    public function __construct()
    {

        // database configuration parameters
        $conn = array(
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'laravelCMS',
        );

        $isDevMode = true;
        $paths = array("/app/Http/Models/Entities");

        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        // obtaining the entity manager
        $entityManager = EntityManager::create($conn, $config);
        return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
    }
}