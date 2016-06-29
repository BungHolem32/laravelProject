<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:24
 */

namespace app\Http\Models\DataMapper;


use App\Http\Models\BaseModel;

class ResetPassWordModel extends BaseModel
{


    public function getUserInfo($token)
    {
        $user = $this->param->getTableBy('laravelCrmUser','tokenPass',$token);
        return $user;
    }
}