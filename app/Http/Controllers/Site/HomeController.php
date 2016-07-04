<?php

namespace App\Http\Controllers\Site;

use app\Http\Models\Entities\Scientist;
use app\Http\Models\Entities\Theory;
use Illuminate\Routing\Controller as BaseController;



class HomeController extends BaseController
{

    protected function index()

    {
        return view("_production._pages.home.index");
    }

    protected function Scientist(){
        $s = new Scientist('ilan','vachtel');
        $s->addTheory(new Theory('Theory of relativity'));
    }

    
}


