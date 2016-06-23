<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 12:27
 */

namespace App\Http\Models\DataMapper;


class User
{
	protected $uid;
	protected $name;
	protected $pass;
	protected $mail;
	protected $theme;
	protected $signature;
	protected $created;
	protected $access;
	protected $is_login = false;

	public function setConfiguration(array $userConfiguration = null)
	{
		if (is_array($userConfiguration) && in_array(!null, $userConfiguration)){
			foreach ($userConfiguration as $name => $userInfo){
				$this->$name = $userInfo;
				session([$name]);
			}
		}
	}

	public function login(){

	}
}
