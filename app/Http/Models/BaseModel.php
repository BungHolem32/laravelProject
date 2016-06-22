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


/**
 * @property DBService DBservice
 */
class BaseModel extends Model
{

	/**
	 * BaseModel constructor.
	 * @param DBService $DBService
	 */
	public function __construct(DBService $DBService)
	{
		parent::__construct();
		$this->DBservice = $DBService;

	}
}