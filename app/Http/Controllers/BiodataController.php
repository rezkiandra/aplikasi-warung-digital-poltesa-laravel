<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BiodataController extends Controller
{
  public function index()
  {
    $seller = Seller::where('user_id', Auth::user()->id)->get();
    return view('seller.biodata.index', compact('seller'));
  }

  public function store(SellerRequest $request)
  {
    dd('hello');
  }

  public function show(string $slug)
  {
    $seller = Seller::where('slug', $slug)->firstOrFail();
    return view('admin.sellers.detail', compact('seller'));
  }

  public function edit(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    return view('admin.sellers.edit', compact('seller'));
  }

  public function update(SellerRequest $request, string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $sellerImage = Seller::where('uuid', $uuid)->pluck('image')->first();

    if ($request->hasFile('image')) {
      if ($sellerImage) {
        Storage::delete('public/' . $sellerImage);
      }
      $seller->update([
        'image' => $request->image->store('sellers', 'public'),
      ]);
    } else {
      $seller->update([
        'user_id' => $request->user_id,
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $request->status,
      ]);
    }

    Alert::toast('Successfully updated seller', 'success');
    return redirect()->route('admin.sellers');
  }

  public function destroy(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    $seller->delete();

    if ($seller->image) {
      Storage::delete('public/' . $seller->image);
    }

    Alert::toast('Successfully deleted seller', 'success');
    session()->flash('action', 'delete');
    return redirect()->route('admin.sellers');
  }
}
