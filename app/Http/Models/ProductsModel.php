<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models;


use Illuminate\Support\Facades\DB;


class ProductsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProducts()
    {
        $products = null;
        $products = DB::select('select * from ilanbase_products');

        if ($products){
            return $products;
        } else{
            return 'theres no products';
        }
    }

    public function getProduct($id)
    {
        $product = null;
        $product = DB::select('SELECT * FROM ilanbase_products WHERE id= ?',[$id]);
        return $product[0];
    }
}