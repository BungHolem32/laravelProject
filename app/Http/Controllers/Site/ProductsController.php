<?php

namespace app\Http\Controllers\Site;

use App\Http\Models\DataMapper\ProductsModel;
use App\Http\Requests;
use Illuminate\Routing\Controller;

/**
 * @property ProductsModel model
 */
class ProductsController extends Controller
{
    protected $products = null;

    public function __construct(ProductsModel $productsModel)
    {
        $this->model = $productsModel;
        return view('_production._pages.products.index');
    }


    public function getAllProducts()
    {
        $products = $this->model->getAllProducts();
        dd($products);
        return view('_production._pages.products.index')->with('products', $products);
    }

    public function getOneProduct($id)
    {
        $product = null;
        $product = $this->model->getOneProduct($id);
        return view('_production._pages.products.index')->with('product', $product);
    }


}
