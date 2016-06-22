<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 19/06/16
 * Time: 23:37
 */

namespace App\Http\Models;

use App\Http\Models\Interfaces\ModelInterface;
use App\Http\Services\DBLA;
use Illuminate\Database\Eloquent\Model as Model;



class BaseModel extends Model implements ModelInterface
{
    public function __construct(DBLA $db)
    {
        $this->db = $db;
    }
}

