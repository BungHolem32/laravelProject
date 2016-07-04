<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 24/06/16
 * Time: 00:30
 */

namespace app\Http\Models\DataMapper;

use App\Http\Models\BaseModel;
use Illuminate\Support\Facades\Session;

/**
 * @property mixed model
 * @property array userInfo
 */
class RegisterModel extends BaseModel
{

    protected $userInfo;

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
        $queryUserStatement = createDynamicQuery(null,$userInfo);

        /*3-EXECUTE THE QUERY*/
        $isUserAdded = $this->DBservice->connect->query($queryUserStatement);

        /*4-CHECK IF THE QUERY WAS INSERT*/
        if (!empty($isUserAdded)){

            /*SET USER-INFO INTO THE */
            $this->userInfo['isLoggedIn'] = 1;

            /*ADD USER TO THE SESSION*/
            Session::put('userInfo', $this->userInfo);
            Session::flash('feedback', 'user registered');
        }
        return $isUserAdded;
    }



    /*IS PARAM EXIST*/
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
}