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
use Illuminate\Database\Eloquent\Model as Model;


/**
 * @property DBService DBservice
 */
class BaseModel extends Model
{

	/**
	 * BaseModel constructor.
	 * @param DBService $DBService
	 * @param User $user
	 */
	public function __construct(DBService $DBService, User $user)
	{
		parent::__construct();
		$this->DBservice = $DBService;
		$this->user = $user;


	}
}