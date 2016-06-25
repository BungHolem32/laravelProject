<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 12:27
 */

namespace App\Http\Models\DataMapper;
use Illuminate\Support\Facades\Session;



class User
{
	protected $uid;
	protected $userName;
	protected $fName;
	protected $lName;
	protected $country;
	protected $city;
	protected $address;
	protected $password;
	protected $email;
	protected $theme;
	protected $signature;
	protected $created;
	protected $access;
	protected $is_login = false;

	public function setConfiguration(array $userConfiguration = null)
	{
		if (is_array($userConfiguration) && in_array(!null, $userConfiguration)){

			foreach ($userConfiguration as $name => $userInfo){

                if($name=='password'){
                    $this->password = $this->saltPassword($userInfo);
                }

                $this->$name = $userInfo;
                Session::push('user.'.$name,$userInfo);
            }
		}

		Session::flash('message','thanks for your registration ,you\'le be redirect to the site');
		return $this;
	}

    private function saltPassword($password)
    {
        $password = sha1(md5($password.'createSaltHash'));
        return $password;
    }

}
