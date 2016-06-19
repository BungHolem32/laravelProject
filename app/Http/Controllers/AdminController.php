<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Models\AdminModel as AdminModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    protected $model;

    public function __construct()
    {
        $this->model = new AdminModel();
    }


    protected function index()

    {
        return view('_pages.admin.login.index');
    }


    protected function login(Request $request)
    {
        $data = null;
        
        if (!empty($request)) {
            $inputs = $request->input('User');

            $isUserExist = $this->model->check_email($inputs['email']);


        }


    }

}
