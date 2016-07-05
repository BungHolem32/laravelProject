<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:24
 */

namespace App\Http\Models\DataMapper;


use App\Http\Models\BaseModel;
use Illuminate\Support\Facades\Session;

class ResetPasswordModel extends BaseModel
{

    public function unTokenAndReturnArray($token)
    {
        $token = getDecryptUserInfo($token);
        $info = explode(' ', $token);
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
}