<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 17:51
 */

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

/**
 * @property LoginModel model
 */
class LoginController extends Controller
{
    /**
     * LoginController constructor.
     * @param LoginModel $loginModel
     */
    public function __construct(LoginModel $loginModel)
    {
        $this->model = $loginModel;
    }


    /**
     * LoginController constructor.
     */
    public function index()
    {
        return view('_crm._pages._connection.login.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function login(Request $request)
    {
        /**/
        $isUserExist = null;
        /*enter if there request*/
        if (!empty($request)) {

            $inputs = $request->input('User');
            $isLoginCurrent = $this->model->isValidLogin('laravelCrm.laravelCrmUser', ['email', 'password'], $inputs);

            if ($isLoginCurrent) {

                /*get the user by its email*/
                $user = $this->model->getUserByParameter($inputs['email'], 'laravelCrm.laravelCrmUser');

                /*put the user on the session*/
                Session::put('userInfo', $user);

                /*redirect to the home screen crm*/
                return redirect()->route('crm-dashboard');
            }

            else {

                redirect()->route('login-page');
                Session::flash('feedback','check your details, and try again');
            }
        }

    }

}