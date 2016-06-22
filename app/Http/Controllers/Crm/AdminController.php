<?php

namespace App\Http\Controllers\Crm;

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
        return view('_crm._pages.login.index');
    }


    protected function login(Request $request )
    {
        $data = null;

        if (!empty($request)) {
            $email = $request->input('email');
            $isUserExist = $this->model->check_email($email);
        }
    }
}
