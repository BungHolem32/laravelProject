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
use Illuminate\Support\Facades\Session;

/**
 * @property ResetPassWordModel model
 * @property  email
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

        $token = getDecryptUserInfo($token);

        if (!empty($resetInfo)) {

            $date = $resetInfo[1];
            $isValid = $this->model->checkIfExpire($date);

            if ($isValid) {
                $this->email = $resetInfo[0];
                $userInfo = $this->model->getUserInfo($this->email);

                if ($userInfo) {
                    return view('cms.pages._connection.pass.change-pass.index')->with('userInfo', $userInfo[0]);
                }
            }
        }
    }

    public function changeToNewPass(Request $request)
    {

        $newPassword = $request->input('password');
        $email = $request->input('email');

        $isUpdate = $this->model->updatePassword($email, $newPassword);

        echo $isUpdate;
//
//        if ($isUpdate == 'PasswordChanged') {
//            echo 'your password been update successfully';
//            echo $isUpdate;
//        }
//        if ($isUpdate == 'alreadyExist') {
//            echo 'your password already used before , please create new one!';
//            echo $isUpdate;
//        } else {
//            echo 'something went wrong , please contact with your admin';
//        }
    }

    public function changePassword()

    {
        return view('cms.pages._connection.pass.change-pass.index')->with('userInfo', Session::get('userInfo'));
    }
}   