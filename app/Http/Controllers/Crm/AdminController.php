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
		return view('_crm._pages.login.index');
	}


	protected function login(Request $request)
	{

		$data = null;

		if (!empty($request)) {

			$inputs = $request->input('User');
			$isUserExist = $this->model->check_email($inputs['email']);
		}
	}
}
