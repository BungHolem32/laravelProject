<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 18:07
 */

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\ForgotPasswordModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


/**
 * @property  isEmailExist
 * @property ForgotPasswordModel model
 * @property void isEmailExist
 * @property array|string email
 * @property void isTokenBeenReset
 */
class ForgotPasswordController extends Controller
{

    /**
     * ForgotPasswordController constructor.
     * @param ForgotPasswordModel $forgoPasswordModel
     */
    public function __construct(ForgotPasswordModel $forgoPasswordModel)
    {
        $this->model = $forgoPasswordModel;

    }

    public function index()
    {
        return view('_crm._pages._connection.forgot-pass.index');
    }

    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendPasswordRestNotificationToEmail(Request $request)
    {
        $this->email = $request->input('email');

        /*check if the user exist*/
        $isEmailExist = $this->model->CheckIfThere($this->email);

        /*return to the page with error*/
        if (empty($isEmailExist)){
            return redirect()->route('forgot-password')->with('feedback', 'the email address didn\'t found');
        }

        /*create new Token*/
        $isTokenBeenReset = $this->model->createResetToken($this->email);

        /*if token created update the user table with the new tempPass*/
        if (!empty($isTokenBeenReset)){
            $isRandomUpdated = $this->model->updateRandomPassword($this->email, $isTokenBeenReset);

            if (!empty($isRandomUpdated)){
                
            }
        }
    }

}