<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;


class AdminModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_email($email = null)
    {
        
    }
}