<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:01
 */

namespace App\Http\Controllers\Cms;


use app\Http\Models\DataMapper\ResetPasswordModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * @property ResetPassWordModel model
 */
class ResetPasswordController extends  Controller
{


    /**
     * ResetPasswordController constructor.
     * @param ResetPasswordModel $resetPasswordModel
     */
    public function __construct(ResetPasswordModel $resetPasswordModel)
    {
        $this->model = $resetPasswordModel;
        
    }

    public function index(){
        return view('_crm._pages._connection.reset-pass.index');
    }


    public function reset(Request $request,$token){
        
        $user = $this->model->getUserInfo($token);
        dd($user);
    }
}