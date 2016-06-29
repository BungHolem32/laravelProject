<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 23/06/16
 * Time: 22:59
 */

namespace App\Http\Models\DataMapper;

use App\Http\Models\BaseModel;

class ForgotPasswordModel extends BaseModel
{
    public function isParamExistWrapper($email)
    {
        $isEmailExist = null;
        $isEmailExist = $this->param->isParamExist('laravelCrmUser', 'email', $email);
        return $isEmailExist;
    }

    public function createResetToken($email)
    {
        $isTokenCreated = CreateRandomToken($email);
        return $isTokenCreated;
    }

    public function updateRandomPassword($email, $token)
    {
        $isUpdated = null;
        $isUpdated = $this->DBservice->connect->createQueryBuilder()
            ->update('laravelCrmUser', 'users')
            ->set('tokenPass','?')
            ->where('email= ?')
            ->setParameters(
                array(
                    0=>$token,
                    1=>$email
                )
            )->execute();

        if($isUpdated){

            $this->sendResetPasswordEmailToUser();
        }

        return $isUpdated;
    }

    private function sendResetPasswordEmailToUser()
    {
        
    }

}