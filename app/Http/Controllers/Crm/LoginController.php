<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 17:51
 */

namespace App\Http\Controllers\Crm;
use app\Http\Models\DataMapper\LoginModel;
use Illuminate\Routing\Controller;

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
		$isUserExist = null;

		if (!empty($request)){
			$inputs = $request->input('User');

			$isLoginCurrent = $this->model->isValidLogin('laravelCrm.laravelCrm_users', ['email', 'password'], $inputs);

			if ($isLoginCurrent){
				session('is-logged', true);
				return redirect()->route('crm-dashboard');
			} else{
				session('is-logged', false);
				redirect()->route('login-page');
			}
		}

	}
	
}