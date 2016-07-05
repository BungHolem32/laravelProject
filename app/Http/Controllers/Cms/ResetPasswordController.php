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
class ResetPasswordController extends Controller
{

    /**
     * ResetPasswordController constructor.
     * @param ResetPasswordModel $resetPasswordModel
     */
    public function __construct(ResetPasswordModel $resetPasswordModel)
    {
        $this->model = $resetPasswordModel;

    }

    public function index()
    {
        return view('cms.pages._connection.pass.reset-pass.index');
    }


    public function reset($token)
    {
        /*get the */
        $resetInfo = $this->model->unTokenAndReturnArray($token);

        if (!empty($resetInfo)){

            $date = $resetInfo[1];
            $isValid = $this->model->checkIfExpire($date);

            if ($isValid){
                $email = $resetInfo[0];
                $userInfo = $this->model->getUserInfo($email);
                if ($userInfo){
                    return redirect()->route('change-password');
                }
            }
        }
    }


    public function changePassword()
    {
        return view('cms.pages._connection.pass.change-pass.index');
    }
}   