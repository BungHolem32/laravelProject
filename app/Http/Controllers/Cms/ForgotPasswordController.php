<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 18:07
 */

namespace app\Http\Controllers\Cms;

use App\Http\Models\DataMapper\ForgotPasswordModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


/**
 * @property void isEmailExist
 * @property array|string email
 * @property void isTokenBeenReset
 * @property ForgotPasswordModel model
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
        if (empty($isEmailExist)) {
            return redirect()->route('forgot-password')->with('feedback', 'the email address didn\'t found');
        }

        /*create new Token*/
        $resetToken = $this->model->createResetToken();

        /*if token created update the user table with the new tempPass*/
        if (!empty($resetToken)) {
            $isRandomUpdated = $this->model->updateRandomPassword($this->email, $resetToken);

            if (!empty($isRandomUpdated)) {
                return redirect()->route('crm-dashboard')->with('feedback','password been reset check your mail for more info');
            }
        }
    }
}