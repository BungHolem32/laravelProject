<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 18:07
 */

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\ForgotPassword;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


/**
 * @property ForgotPassword model
 */
class ForgotPasswordController extends Controller
{

	public function __construct(ForgotPassword $forgotPassword)
	{

		$this->model = $forgotPassword;

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