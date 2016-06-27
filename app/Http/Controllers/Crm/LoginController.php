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
		if (!empty($request)){

			$inputs = $request->input('User');
			$isLoginCurrent = $this->model->isValidLogin('laravelCrm.laravelCrmUser', ['email', 'password'], $inputs);
			
			if ($isLoginCurrent){
					
				return redirect()->route('crm-dashboard');
			} else{
				session('is-logged', false);
				redirect()->route('login-page');
				echo 'isn\'t logged';
			}
		}

	}

}