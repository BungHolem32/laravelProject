<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 18:02
 */

namespace App\Http\Models\DataMapper;

use App\Http\Models\BaseModel;

class LoginModel extends BaseModel
{
    public function isValidLogin($table, array $columns, array $value)
    {
        $isPassValidation = null;

        $password = saltPassword($value['password']);
        $query = $this->DBservice->connect->createQueryBuilder()
            ->select("{$columns[0]}, {$columns[1]}")
            ->from($table)
            ->where($columns[0] . ' = ?')
            ->andWhere($columns[1] . ' = ?')
            ->setParameter(0, $value['email'])
            ->setParameter(1, $password);

        $query = $query->execute();
        $result = $query->fetchAll();
        if (count($result) > 0) {
            $isPassValidation = true;
        }

        return $isPassValidation;
    }

    public function validateRequest($userInfo)
    {

    }

    public function getUserByParameter($id, $table)
    {
        $user = null;
        $connection = $this->DBservice->connect->createQueryBuilder()
            ->select('*')
            ->from($table)
            ->where('email = ?')
            ->setParameter(0, $id)
            ->execute();

        $result = $connection->fetchAll();

        if (count($result) > 0){
            foreach($result as $key=>$val){
                $user = $val;
            }
        }
        return $user;

	}

}