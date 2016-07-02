<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 17:51
 */

namespace app\Http\Controllers\Cms;

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
        return view('_cms._pages._connection.login.index');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function login(Request $request)
    {
        $isUserExist = null;

        /*ENTER IF THERE REQUEST*/
        if (!empty($request)) {

            $inputs = $request->input('User');
            $isLoginCurrent = $this->model->isValidLogin('laravelCrm.laravelCrmUser', ['email', 'password'], $inputs);

            if ($isLoginCurrent) {

                /*GET THE USER BY ITS EMAIL*/
                $user = $this->model->getUserByParameter($inputs['email'], 'laravelCrm.laravelCrmUser');

                /*PUT THE USER ON THE SESSION*/
                Session::put('userInfo', $user);

                /*REDIRECT TO THE HOME SCREEN CRM*/
                return redirect()->route('crm-dashboard');
            }

            else {

                Session::flash('feedback','check your details, and try again');
                return redirect()->route('cms-login');
            }
        }

    }

}