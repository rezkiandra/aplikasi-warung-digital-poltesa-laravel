<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
  public function index()
  {
    return view('wishlist.index');
  }

  public function store(Request $request)
  {
    Wishlist::create([
      'uuid' => Str::uuid('id'),
      'customer_id' => $request->customer_id,
      'product_id' => $request->product_id
    ]);

    Alert::toast('Berhasil tambah wishlist', 'success');
    return redirect()->back();
  }

  public function destroy(string $uuid)
  {
    $wishlist = Wishlist::where('uuid', $uuid)->firstOrFail();
    $wishlist->delete();

    Alert::toast('Berhasil hapus wishlist', 'success');
    return redirect()->back();
  }
}
