<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models;

use App\Http\Services\DBLA;

class AdminModel extends BaseModel
{

private $con;
private $con2;


	public function __construct()
	{
		parent::__construct();
		
		$connectionsParams2 = array(
			'dbname' => 'funnel',
			'user' => 'root',
			'password' => '',
			'host' => 'localhost',
			'driver' => 'pdo_mysql',
		);
		$this->con = DBLA::getConnection(null, 0);
		$this->con2 = DBLA::getConnection($connectionsParams2, 1);

	}

	public function check_email($email)
	{
		dd($this->con);
	}
}