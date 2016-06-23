<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\LoginModel;
use Symfony\Component\HttpKernel\Tests\Controller;


/**
 * Class LoginController
 * @package App\Http\Controllers\Crm
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
		return $this;
	}


	/**
	 * LoginController index.
	 */
	public function index()
	{
		return view('_crm._pages.login.index');
	}
}