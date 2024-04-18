<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckCustomer
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
    $customer = auth()->user()->customer;

    if ($customer && $this->hasRequiredInfoCustomer($customer)) {
      return $next($request);
    } else {
      return redirect()->route('customer.biodata')->with('error', 'Lengkapi biodata terlebih dahulu jika ingin menambahkan produk');
    }
  }

  private function hasRequiredInfoCustomer($customer)
  {
    return !empty($customer->full_name) && !empty($customer->address) && !empty($customer->phone_number) && !empty($customer->gender) && !empty($customer->bank_account_id) && !empty($customer->account_number) && !empty($customer->status);
  }
}
