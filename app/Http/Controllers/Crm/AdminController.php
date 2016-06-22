<?php

namespace App\Http\Controllers\Crm;

use App\Http\Models\AdminModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;

class AdminController extends BaseController
{

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

//        if (!empty($request)) {
//            $email = $request->input('email');
//            $isUserExist = $this->db->check_email($email);
//        }
    }
}
