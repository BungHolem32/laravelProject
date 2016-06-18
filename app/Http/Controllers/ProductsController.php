<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Models\ProductsModel;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class ProductsController extends BaseController
{
    protected $products = null;

    public function index()
    {
        $this->model = new ProductModel();
        return view('_pages.products');
    }


    public function getProducts()
    {
        $this->products = new ProductsModel();
        print_r(DB::select('select * from ilanbase_products'));
        

        return view('_pages.products');
    }
}
