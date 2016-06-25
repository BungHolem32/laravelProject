<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\DataMapper\ParameterModel;
use App\Http\Models\DataMapper\RegisterModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


/**
 * @property RegisterModel model
 * @property ParameterModel param
 */
class RegisterController extends Controller
{


    /**
     * RegisterController constructor.
     * @param RegisterModel $registerModel
     * @param ParameterModel $parameterModel
     * @internal param ParameterService $parameterService
     */
    public function __construct(RegisterModel $registerModel)
    {
        $this->model = $registerModel;
    }


    /**
     * LoginController index.
     */
    public function index()
    {

        return view('_crm._pages._connection.register.index')->with('class', __CLASS__);
    }


    /**
     * @param Request $request
     * @param null $table
     * @param null $column
     */
    public function addNewUserToDataBaseAndAutoConnectIt(Request $request, $table = null, $column = null) {
        $data = null;
        $isUserAdded = null;

        /*1-CHECK IF THE EMAIL EXIST*/
        $isEmailExist = $this->checkIfParamExist($table, $column, $request->input('user[email]'));


        /*IF EMAIL DOESN'T EXIST*/
        if (!$isEmailExist) {

            /*ASSIGN VARIABLE FOR VALIDATION*/
            $user = $request->input('user');

            /*2-CHECK IF THE REQUEST IS VALID*/
            $validInput = $this->model->validateRequest($user);

            /*IF THE INPUTS VALID*/
            if (!empty($validInput)) {

                /*3-ADD REQUEST TO THE DATABASE*/
                $isUserAdded = $this->model->addNewUserToDatabase($validInput);
                dd($isUserAdded);
            }
        } else {
            redirect()->route('register-page');
        }

        //todo check if theres request of the user
        //todo  validate the request
        //todo send the request
        //todo return feedback to user
        //todo redirect the user to the site
    }

    /**
     * @param null $table
     * @param null $column
     * @param $value
     * @return bool|null
     */
    private function checkIfParamExist($table = null, $column = null, $value)
    {
        $isEmailExist = null;

        $table = $table ? $table : 'laravelCrm_users';
        $column = $column ? $column : 'email';

        $table = $this->model->validateInput($table);
        $column = $this->model->validateInput($column);

        /*CHECK IF THE EMAIL EXIST*/
        $isEmailExist = $this->model->isParamExist($table, $column, $value);

        return $isEmailExist;
    }
}