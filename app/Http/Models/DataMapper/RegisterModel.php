<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 24/06/16
 * Time: 00:30
 */

namespace app\Http\Models\DataMapper;


use App\Http\Models\BaseModel;


class RegisterModel extends BaseModel
{


    /**
     * @param $userInfo
     * @return mixed|null
     */
    public function validateRequest($userInfo)
    {
        $isValid = null;
        $validationFilters = null;

        foreach ($userInfo as $key => $val) {

            /*input email*/
            if ($key == 'email')
                $validationFilters[$key] = array('filter' => ['FILTER_SANITIZE_EMAIL', 'FILTER_VALIDATE_EMAIL']);

            /*other inputs string*/
            $validationFilters[$key] = 'FILTER_SANITIZE_STRING';
        }

        $isValid = filter_var_array($userInfo, $validationFilters);

        return $isValid;
    }


    /**
     * @param $userInfo
     */
    public function addNewUserToDatabase($userInfo)
    {

        $isUserAdded = null;
        $this->user->setConfiguration($userInfo);

    }


    /**
     * @param $input
     * @return mixed|null
     */
    public function validateInput($input)
    {
        $cleanInput = null;
        $cleanInput = filter_var($input, FILTER_SANITIZE_STRING);

        return $cleanInput;
    }

    /**
     * @param $table
     * @param $column
     * @param $value
     * @return bool|null
     */
    public function isParamExist($table, $column, $value)
    {
        $isUserExist = null;

        $query = $this->DBservice->connect->createQueryBuilder()
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
}