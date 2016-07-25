<?php

namespace app\Http\Controllers\Cms;

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

    protected $dbUser = 'laravelCMS.laravelCMSUser';
    protected $db = 'laravelCMS';



    /**
     * RegisterController constructor.
     * @param RegisterModel $registerModel
     * @internal param ParameterService $parameterService
     */
    public function __construct(RegisterModel $registerModel)
    {
        $this->model = $registerModel;
    }


    public function index()
    {
        return view('cms.pages._connection.register.index')->with('class', __CLASS__);
    }

    public function addNewUserToDataBaseAndAutoConnectIt(Request $request, $table = null, $column = null)
    {
        $data = null;
        $isUserAdded = null;

        /*1-CHECK IF THE EMAIL EXIST*/
        $isEmailExist = $this->checkIfParamExist($table, $column, $request->input('user[email]'));

        /*IF EMAIL DOESN'T EXIST*/
        if (!$isEmailExist){

            /*ASSIGN VARIABLE FOR VALIDATION*/
            $user = $request->input('user');
            $user = AddArrayKeysInSpecificPosition($user,array('isLoggedIn'=>1),count($user)-1);

            /*2-CHECK IF THE REQUEST IS VALID*/
            $validInput = $this->model->validateRequest($user);

            /*IF THE INPUTS VALID*/
            if (!empty($validInput)){
                /*3-ADD REQUEST TO THE DATABASE*/
                $isUserAdded = $this->model->addNewUserToDatabase($validInput);


                /*IF USER ADDED*/
                if ($isUserAdded){
                    return redirect()->route('cms-dashboard')->with('feedback');
                }

                /*IF USER DIDN'T ADDED*/
            } else{
                return redirect()->route('register-page')->with('feedback', 'check your details and try again');
            }
            /*IF EMAIL EXIST*/
        } else{
            return redirect()->route('register-page')->with('feedback', 'this email already exist');
        }
    }
    
    /**
     * @param null $table
     * @param null $column
     * @param $value
     * @return bool|null
     */
    private
    function checkIfParamExist($table = null, $column = null, $value)
    {
        $isEmailExist = null;

        
        $table = $table ? $table : $this->dbUser;
        $column = $column ? $column : 'email';

        $table = validateInput($table);
        $column = validateInput($column);

        /*CHECK IF THE EMAIL EXIST*/
        $isEmailExist = $this->model->isParamExist($table, $column, $value);
        return $isEmailExist;
    }
}