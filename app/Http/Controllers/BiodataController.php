<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BiodataRequest;
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

  public function store(BiodataRequest $request)
  {
    Seller::create([
      'uuid' => Str::uuid('id'),
      'user_id' => Auth::user()->id,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'phone_number' => $request->phone_number,
      'gender' => $request->gender,
      'bank_account_id' => $request->bank_account_id,
      'image' => $request->image->store('sellers', 'public'),
      'account_number' => $request->account_number,
    ]);

    Alert::toast('Successfully added biodata', 'success');
    return redirect()->route('seller.biodata');
  }

  public function show(string $slug)
  {
    $seller = Seller::where('slug', $slug)->firstOrFail();
    return view('admin.sellers.detail', compact('seller'));
  }

  public function edit(string $uuid)
  {
    $seller = Seller::where('uuid', $uuid)->firstOrFail();
    return view('seller.biodata.edit', compact('seller'));
  }

  public function update(BiodataRequest $request, string $uuid)
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
        'full_name' => $request->full_name,
        'slug' => Str::slug($request->full_name),
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'gender' => $request->gender,
        'bank_account_id' => $request->bank_account_id,
        'account_number' => $request->account_number,
        'status' => $seller->status,
      ]);
    }

    Alert::toast('Successfully updated seller', 'success');
    return redirect()->route('seller.biodata');
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
