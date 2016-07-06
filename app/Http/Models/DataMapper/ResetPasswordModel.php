<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:24
 */

namespace App\Http\Models\DataMapper;


use App\Http\Models\BaseModel;
use Doctrine\DBAL\DBALException;
use Illuminate\Support\Facades\Session;

class ResetPasswordModel extends BaseModel
{

    public function unTokenAndReturnArray($token)
    {
        $token = getDecryptUserInfo($token);
        $info = explode('*', $token);
        return $info;
    }

    public function checkIfExpire($tokenDate)
    {
        return $tokenDate == date("m.d.y");
    }

    public function getUserInfo($email)
    {
        $user = $this->param->getTableBy('laravelCMS.laravelCMSUser', 'email', $email);
        \Session::put('userInfo', $user[0]);
        return $user;
    }

    public function updatePassword($email, $newPassword)
    {

        $password = saltPassword($newPassword);
        $result = 'alreadyExist';
        $isUpdatedPassword = null;
        $isExist = $this->param->isParamExist('laravelCMSUser', 'password', $password);


        if (!$isExist) { 

            try {
                $isUpdatedPassword = $this->DBservice->connect->createQueryBuilder()
                    ->update('laravelCMSUser')
                    ->set('password', '?')
                    ->where("email = ?")
                    ->setParameters(array(
                        0 => $password,
                        1 => $email))
                    ->execute();
            } catch (DBALException $e) {
                die('Error : ' . $e->getMessage());
            }

            if ($isUpdatedPassword) {
                $result = 'PasswordChanged';
            }
        }

        return $result;

    }
}