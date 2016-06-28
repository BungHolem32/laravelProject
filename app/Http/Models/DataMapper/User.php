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
    protected $userInfo = [
        'uId' => null,
        'userName' => null,
        'fName' => null,
        'lName' => null,
        'country' => null,
        'city' => null,
        'address' => null,
        'email' => null,
        'createdAt' => null,
        'isMember' => false,
        'isLoggedIn' => false,
        'password' => null,

    ];

    protected $isLoggedIn = null;


    public function setConfiguration(array $userConfiguration = null)
    {
        if (is_array($userConfiguration) && in_array(!null, $userConfiguration)) {

            foreach ($userConfiguration as $name => $userInfo) {

                if ($name == 'createdAt') $this->userInfo[$name] = date("Y-m-d H:i:s");
                elseif ($name == 'isMember') $this->userInfo[$name] = 1;
                elseif ($name == 'isLoggedIn') $this->userInfo[$name] = 0;
                elseif ($name == 'password') $this->userInfo[$name] = $this->saltPassword($userInfo);
                else {
                    $this->userInfo[$name] = $userInfo;
                }
            }
        }
        return $this->userInfo;
    }

    public function saltPassword($password)
    {
        $password = sha1(md5($password . 'createSaltHash'));
        return $password;
    }


}
