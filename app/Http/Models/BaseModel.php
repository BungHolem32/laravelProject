<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 19/06/16
 * Time: 23:37
 */

namespace app\Http\Models;


use App\Http\Models\Service\DBService;
use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Support\Facades\DB;


class BaseModel extends Model
{
	public function __construct(DBService $connection)
	{
		parent::__construct();
		$this->connection = $connection;
	}
}