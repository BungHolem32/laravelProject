<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 24/06/16
 * Time: 00:30
 */

namespace app\Http\Models\DataMapper;

use App\Http\Models\BaseModel;

/**
 * @property mixed model
 * @property array userInfo
 */
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

        foreach ($userInfo as $key => $val){

            /*input email*/
            if ($key == 'email')
                $validationFilters[$key] = array('filter' => ['FILTER_SANITIZE_EMAIL', 'FILTER_VALIDATE_EMAIL']);

            /*other inputs string*/
            $validationFilters[$key] = 'FILTER_SANITIZE_STRING';
        }

        $isValid = filter_var_array($userInfo, $validationFilters);

        return $isValid;
    }


    public function addNewUserToDatabase($userInfo)
    {
        $isUserAdded = null;


        /*1-CREATE NEW USER WITH THE NEW DATA*/
        $this->userInfo = $this->user->setConfiguration($userInfo);

        /*2-CREATE QUERY*/
        $queryUserStatement = $this->createDynamicQuery();

        /*3-EXECUTE THE QUERY*/
        $isUserAdded = $this->DBservice->connect->query($queryUserStatement);

        /*4-CHECK IF THE QUERY WAS INSERT*/
        if (!empty($isUserAdded)){

            /*set userInfo into the */
            $this->userInfo['isLoggedIn'] = 1;
            \session::put('userInfo', $this->userInfo);
            \session::flash('feedback', 'user registered');

        }
        return $isUserAdded;
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

        if (count($result) > 0){
            $isUserExist = true;
        }
        return $isUserExist;
    }

    private function createDynamicQuery()
    {
        $queryUserStatement = "INSERT INTO laravelCrmUser VALUES ('',";

        foreach ($this->userInfo as $name => $val){
            if ($name == 'uId'){
                continue;
            }
            elseif ($name == 'password'){
                $queryUserStatement .= "'" . $val . "'" . ')';
            } else{
                $queryUserStatement .= "'" . $val . "'" . ',';
            }
        }

    }

}