<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Models\ProductsModel;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

class ProductsController extends BaseController
{
    protected $products = null;

    public function __construct()
    {
        $this->model = new ProductsModel();
        return view('_production._pages.products.index');
    }


    public function getProducts()
    {
        $products = $this->model->getProducts();
        return view('_production._pages.products.index')->with('products',$products);
    }

    public function getProduct($id){
        $product  = null;
        $product = $this->model->getProduct($id);
        return view('_production._pages.products.index')->with('product',$product);
    }
}
