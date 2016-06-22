<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\AdminModel;
use App\Http\Models\Interfaces\ModelInterface;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    protected $db;

    public function __construct(AdminModel $model)
    {
        $this->model = $model;
    }


    protected function index()
    {
        return view('_crm._pages.login.index');
    }


    protected function login(Request $request )
    {
        $data = null;

        dd($this->model);

//        if (!empty($request)) {
//            $email = $request->input('email');
//            $isUserExist = $this->db->check_email($email);
//        }
    }
}
