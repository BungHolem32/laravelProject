<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 18:07
 */

namespace App\Http\Controllers\Crm;

use app\Http\Models\DataMapper\ForgotPasswordModel;
use App\Http\Requests\Request;
use Illuminate\Routing\Controller;

class ForgotPasswordController extends Controller
{

	/**
	 * ForgotPasswordController constructor.
	 * @param ForgotPasswordModel $forgotPasswordModel
	 */
	public function __construct(ForgotPasswordModel $forgotPasswordModel)
	{
		$this->model = $forgotPasswordModel;

	}

	public function index()
	{
		return view('_crm._pages._connection.forgot-pass.index');
	}

	public function sendPasswordRestNotificationToEmail(Request $request)
	{
		
		// check if user exit 
		//create reset token in the database
		//create link from token
		//send link to user email
	}

}