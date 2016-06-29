<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 19/06/16
 * Time: 23:37
 */

namespace app\Http\Models;


use App\Http\Models\DataMapper\User;
use App\Http\Models\Service\DBService;
use App\Http\Models\Service\ParameterService;
use Illuminate\Database\Eloquent\Model as Model;


/**
 * @property DBService DBservice
 * @property User user
 * @property ParameterService param
 */
class BaseModel extends Model
{

    /**
     * BaseModel constructor.
     * @param DBService $DBService
     * @param User $user
     * @param ParameterService $parameterService
     */
    public function __construct(DBService $DBService, User $user, ParameterService $parameterService)
    {
        parent::__construct();
        $this->DBservice = $DBService;
        $this->user = $user;
        $this->param = $parameterService;


    }
}