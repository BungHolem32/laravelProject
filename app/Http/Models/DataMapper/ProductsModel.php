<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace app\Http\Models\DataMapper;

use App\Http\Models\BaseModel;

class ProductsModel extends BaseModel
{

    /*GET ALL PRODUCTS*/
    public function getAllProducts()
    {
        $query = null;
        $products = null;
        $query = $this->DBservice->connect->createQueryBuilder()
            ->select('*')
            ->from('laravelCrmProducts')->execute();
        $products = $query->fetchAll();

        if (!$products) {
            abort(403, 'products didn\'t found');
        }
        return $products;

    }

    /*GET ONE PRODUCT*/
    public function getOneProduct($id)
    {
        $product = null;
        $query = $this->DBservice->connect->createQueryBuilder()
            ->select('*')
            ->from('laravelCrmProducts')
            ->where('id = ?')
            ->setParameter(0, $id)
            ->execute();
        $products = $query->fetchAll();

        if (!$products) {
            abort(403, 'product didn\'t found');
        }
        return $product;
    }

}