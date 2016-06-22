<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 18/06/16
 * Time: 22:57
 */

namespace App\Http\Models;

class AdminModel extends BaseModel
{

	/**
	 * @param $table
	 * @param $column
	 * @param $value
	 * @return bool|null
	 */
	public function isParamExist($table, $column, $value)
	{
		$isUserExist = null;

		$query = $this->DBservice->connect->createQueryBuilder()
			->select($column)
			->from($table)
			->where("{$column} = ?")
			->setParameter(0, $value);

		$query = $query->execute();
		$result = $query->fetchAll();


		if (count($result) > 0) {
			$isUserExist = true;

		}
		return $isUserExist;

	}

	/**
	 * @param $table
	 * @param array $columns
	 * @param array $value
	 * @return bool|null
	 */
	public function isValidLogin($table, array $columns, array $value)
	{

		$isPassValidation = null;
		$query = $this->DBservice->connect->createQueryBuilder()
			->select("{$columns[0]}, {$columns[1]}")
			->from($table)
			->where($columns[0] . ' = ?')
			->andWhere($columns[1] . ' = ?')
			->setParameter(0, $value['email'])
			->setParameter(1, $value['password']);


		$query = $query->execute();
		$result = $query->fetchAll();

		if (count($result) > 0) {
			$isPassValidation = true;
		}
		return $isPassValidation;
	}


}