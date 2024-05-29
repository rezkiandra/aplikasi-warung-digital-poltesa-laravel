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
    if (auth()->user()->seller) {
      $seller = auth()->user()->seller;
      $seller_status = $seller->status;

      if ($seller_status === 'pending' || $seller->status === 'inactive') {
        return redirect()->route('seller.products');
      }
    } elseif (auth()->user()->customer) {
      $customer = auth()->user()->customer;
      $customer_status = $customer->status;

      if ($customer_status === 'pending' || $customer->status === 'inactive') {
        return redirect()->route('customer.biodata');
      }
    }

    return $next($request);
  }
}
