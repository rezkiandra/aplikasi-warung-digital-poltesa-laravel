<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckBiodata
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

    if ($seller && $this->hasRequiredInfo($seller)) {
      return $next($request);
    } else {
      return redirect()->route('seller.biodata')->with('error', 'Lengkapi biodata terlebih dahulu jika ingin menambahkan produk');
    }
  }

  private function hasRequiredInfo($seller)
  {
    return !empty($seller->full_name) && !empty($seller->address) && !empty($seller->phone_number) && !empty($seller->gender) && !empty($seller->bank_account_id) && !empty($seller->account_number) && !empty($seller->status);
  }
}
