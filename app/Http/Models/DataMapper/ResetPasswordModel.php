<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:24
 */

namespace App\Http\Models\DataMapper;


use App\Http\Models\BaseModel;

class ResetPasswordModel extends BaseModel
{
    
    public function getUserInfo($token)

    {
        $tok = getDecryptUserInfo(')w„‚èk¥?é;¯Hy Ð,@ü“‚ƒQŽuyoñeÈ @');
        $user = $this->param->getTableBy('laravelCrmUser', 'tokenPass', $token);
        return $user;
    }
}