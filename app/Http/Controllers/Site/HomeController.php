<?php

namespace App\Http\Controllers\Site;

use app\Http\Models\Entities\Scientist;
use app\Http\Models\Entities\Theory;
use Illuminate\Routing\Controller as BaseController;



class HomeController extends BaseController
{

    protected function index()

    {
        return view("production.pages.home.index");
    }
    
}


