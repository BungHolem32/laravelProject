<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 25/06/16
 * Time: 16:11
 */

namespace app\Http\Models\Service;

use App\Http\Models\Interfaces\ParameterInterface;

/**
 * @property DBService Dbservice
 */
class ParameterService  implements ParameterInterface
{
    /**
     * @param DBService $DBService
     * @internal param $table
     * @internal param $column
     * @internal param $value
     */

    public function __construct(DBService $DBService)
    {
        $this->Dbservice = $DBService;
    }


    public function isParamExist($table, $column, $value)
    {
        $isUserExist = null;

        $params = array(
            'dbname' => 'laravelCrm',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        );

//        $this->Dbservice->changeConnectionParams($params);
        $query = $this->Dbservice->connect->createQueryBuilder()
            ->select($column)
            ->from($table)
            ->where("{$column} = ?")
            ->setParameter(0, $value);

        $query = $query->execute();
        $result = $query->fetchAll();


        if (count($result) > 0) {
            $isUserExist = true;
        }
        return $isUserExist;

    }

    /**
     * @param $table
     * @param array $columns
     * @param array $value
     * @return bool|null
     */
    public function isValidLogin($table, array $columns, array $value)
    {
        $isPassValidation = null;
        $query = $this->DBservice->connect->createQueryBuilder()
            ->select("{$columns[0]}, {$columns[1]}")
            ->from($table)
            ->where($columns[0] . ' = ?')
            ->andWhere($columns[1] . ' = ?')
            ->setParameter(0, $value['email'])
            ->setParameter(1, $value['password']);

        $query = $query->execute();
        $result = $query->fetchAll();

        if (count($result) > 0) {
            $isPassValidation = true;
        }


        return $isPassValidation;
    }
}