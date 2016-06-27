<?php

namespace App\Http\Controllers\Crm;


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class LogOutController extends Controller
{
    public function index()
    {
        Session::flush();
        return redirect()->route('login-page');
    }
}