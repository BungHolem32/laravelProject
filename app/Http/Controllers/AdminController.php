<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    protected function index()
    {
        return view('_pages.admin.login.index');
    }
}
