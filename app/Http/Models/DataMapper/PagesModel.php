<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 07/07/16
 * Time: 23:40
 */

namespace app\Http\Models\DataMapper;


use App\Http\Models\BaseModel;

/**
 * @property array controllerPath
 */
class PagesModel extends BaseModel
{
    public function index()
    {

    }

    public function getControllerPath()
    {
        $this->controllerPath = glob(base_path('/app/Http/Controllers/Cms/Pages/*.php'));
        return $this->controllerPath;
    }

    public function getControllerName()
    {
        $controllerName = [];
        foreach ($this->controllerPath as $controller) {
            array_push($controllerName, str_replace([base_path('/app/Http/Controllers/Cms/Pages/'), '.php'], '', $controller));
        }

        return $controllerName;
    }


}