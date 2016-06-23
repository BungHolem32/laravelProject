<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


/**
 * Class LoginController
 * @property LoginModel model
 * @package App\Http\Controllers\Crm
 */
class RegisterController extends Controller
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
	 * LoginController index.
	 */
	public function index()
	{

		return view('_crm._pages._connection.register.index')->with('class', __CLASS__);
	}

	public function addNewUserToDataBaseAndAutoConnectIt(Request $request)
	{

		$data = null;

		/*assign variable to temp variable*/
		$user = $request->input('user');
		
		$isInputsValid = $this->model->validateRequest($user);
		
		dd($data);
		//check if theres request of the user
		//validate the request
		//send the request
		//return feedback to user
		//redirect the user to the site
	}
}