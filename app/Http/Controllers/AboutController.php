<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;



class AboutController extends BaseController
{
    public function index(){
        return view('_pages.about.index');
    }
}
