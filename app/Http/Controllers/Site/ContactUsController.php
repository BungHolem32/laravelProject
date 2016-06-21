<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

use App\Http\Requests;

class ContactUsController extends BaseController
{
    public function index(){
        return view('_production._pages.contact_us.index');
    }
}
