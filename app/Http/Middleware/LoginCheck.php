<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 23/06/2016
 * Time: 11:37
 */


namespace App\Http\Middleware;

use App\Http\Models\DataMapper\User;
use Closure;


class LoginCheck
{
	public function handle($request, Closure $next)
	{
		$isLogged = session('userInfo.isLoggedIn');
		if($isLogged)
			return $next($request);

		return redirect()->route('login-page');
	}
}