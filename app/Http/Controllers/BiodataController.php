<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateBiodataRequest;

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

    Alert::toast('Berhasil menambahkan biodata', 'success');
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

  public function update(UpdateBiodataRequest $request, string $uuid)
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

    Alert::toast('Berhasil mengupdate biodata', 'success');
    return redirect()->route('seller.biodata');
  }
}
