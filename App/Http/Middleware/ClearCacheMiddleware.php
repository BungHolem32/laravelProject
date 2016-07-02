<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 28/06/2016
 * Time: 17:50
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Artisan;

class ClearCacheMiddleware
{
    public function handle($request, Closure $next)

    {
        Artisan::call('view:clear');
        return $next($request);
    }
}