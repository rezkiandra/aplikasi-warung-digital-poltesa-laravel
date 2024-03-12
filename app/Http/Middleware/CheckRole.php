<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, $role)
  {
    $userRole = $request->user()->role->role_name;

    if ($userRole == $role) {
      return $next($request);
    }

    if ($userRole == 'Admin') {
      return redirect()->route('admin.dashboard');
    } elseif ($userRole == 'Seller') {
      return redirect()->route('seller.dashboard');
    } elseif ($userRole == 'Customer') {
      return redirect()->route('customer.dashboard');
    }
  }
}
