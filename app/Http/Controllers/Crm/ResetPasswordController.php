<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:01
 */

namespace app\Http\Controllers\Crm;


use app\Http\Models\DataMapper\ResetPassWordModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * @property ResetPassWordModel model
 */
class ResetPasswordController extends  Controller
{


    /**
     * ResetPasswordController constructor.
     * @param ResetPassWordModel $resetPassWordModel
     */
    public function __construct(ResetPassWordModel $resetPassWordModel)
    {
        $this->model = $resetPassWordModel;
        
    }

    public function index(){
        return view('_crm._pages._connection.reset-pass.index');
    }


    public function reset(Request $request,$token){
        
        $user = $this->model->getUserInfo($token);
        dd($user);
    }
}