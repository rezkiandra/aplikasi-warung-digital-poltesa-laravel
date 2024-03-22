<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MustActive
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    $seller = auth()->user()->seller;
    $seller_status = $seller->status;

    if ($seller_status === 'pending') {
      return redirect()->route('seller.products');
    } elseif ($seller_status === 'inactive') {
      return redirect()->route('seller.products');
    } else {
      return $next($request);
    }
  }
}
