<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models;
use App\Http\Libs\DBModel;


class AdminModel extends BaseModel
{
	

    public function check_email($email = null)
    {
		$sql = "SELECT now();";
		$stmt = $this->connection->query($sql); // Simple, but has several drawbacks

    }
}