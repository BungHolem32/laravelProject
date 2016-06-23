<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller ;

class AdminController extends Controller
{
	protected $model;

	public function __construct(AdminModel $model)
	{
		$this->model = $model;
	}

	/**
	 * @param Request $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function dashboard(Request $request)
	{
		return view('_crm._pages.main.index');
	}
	
}
