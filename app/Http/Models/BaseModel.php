<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 19/06/16
 * Time: 23:37
 */

namespace app\Http\Models;


use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\DB;


class BaseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->db = new DB();
    }
}