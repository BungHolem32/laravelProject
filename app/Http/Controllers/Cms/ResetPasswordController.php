<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 30/06/16
 * Time: 00:01
 */

namespace app\Http\Controllers\Cms;


use App\Http\Models\DataMapper\ResetPasswordModel;
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
        return view('cms.pages._connection.reset-pass.index');
    }


    public function reset(Request $request,$token){

//        $url = $request->fullUrl();
//        $url = str_replace('rd/','',strstr($url,'rd/'));

        $user = $this->model->getUserInfo($token);
        
    }
}   