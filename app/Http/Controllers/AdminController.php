<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{

    public  function __construct()
    {
        $this->model = new __CLASS__ ;
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

            $validate = $this->model()->check_email($inputs['email']);
        }


    }

}
