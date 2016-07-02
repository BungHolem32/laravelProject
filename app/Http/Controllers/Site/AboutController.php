<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests;



class AboutController extends BaseController
{
    public function index(){
        return view('production.pages.about.index');
    }
}
