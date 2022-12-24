<?php

namespace App\Http\Middleware;

use Closure;

class EmailVerify
{
   /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return mixed
    */
   public function handle($request, Closure $next)
   {
      $auth_user = auth()->user();
      if (!$auth_user->email_verified_at) {
         return redirect()->route('rider.login');
      }
      return $next($request);
   }
}
