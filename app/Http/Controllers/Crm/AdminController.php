<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\AdminModel;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

	protected $model;

	public function __construct(AdminModel $model)
	{
		$this->model = $model;
	}


	protected function index()

	{
		return view('_cms._pages.login.index');
	}


	protected function login(Request $request)
	{

		$isUserExist = null;

		if (!empty($request)) {
			$inputs = $request->input('User');
			$isUserExist = $this->model->isParamExist('CRMLARAVEL.crmLaravel_users', 'email', $inputs['email']);

			if ($isUserExist) {
				$isLoginCurrent = $this->model->isValidLogin('CRMLARAVEL.crmLaravel_users', ['email', 'password'], $inputs);

				if ($isLoginCurrent) {
					return redirect()->route('crm-dashboard');

				}
			}
		}
	}

	protected function dashboard(Request $request){

		return view('_cms._pages.main.index');

	}
}
