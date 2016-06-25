<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models\DataMapper;

use Illuminate\Support\Facades\DB;


class ProductsModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts()
    {
        $products = null;
        $products = DB::select('select * from `TiPiCRM-Products`');

        if ($products){
            return $products;
        } else{
            return 'theres no products';
        }
    }

    public function getOneProduct($id)
    {
        $product = null;
        $product = DB::select('SELECT * FROM `TiPiCRM-Products` WHERE id= ?',[$id]);
        return $product[0];
    }
}