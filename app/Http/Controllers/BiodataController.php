<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\BiodataRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdateBiodataRequest;

class BiodataController extends Controller
{
  protected $api_key;
  protected $endpoint;

  public function __construct()
  {
    $this->api_key = config('rajaongkir.key');
    $this->endpoint = config('rajaongkir.endpoint');
  }

  public function index()
  {
    $seller = Seller::where('user_id', Auth::user()->id)->get();
    $response = Http::withHeaders(['key' => $this->api_key])->get($this->endpoint . '/city');
    $cities = $response['rajaongkir']['results'];

    $city_id = $seller->pluck('origin')->first();
    $city_name = $this->getCityName($city_id);
    return view('seller.biodata.index', compact('seller', 'cities', 'city_name'));
  }

  public function store(BiodataRequest $request)
  {
    Seller::create([
      'uuid' => Str::uuid('id'),
      'user_id' => Auth::user()->id,
      'full_name' => $request->full_name,
      'slug' => Str::slug($request->full_name),
      'address' => $request->address,
      'origin' => $request->origin,
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
        'origin' => $request->origin,
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

  private function getCityName($city_id)
  {
    $response = Http::get("{$this->endpoint}/city", [
      'key' => $this->api_key,
    ]);

    $data = $response->json();

    if (isset($data['rajaongkir']['results']) && !empty($data['rajaongkir']['results'])) {
      foreach ($data['rajaongkir']['results'] as $result) {
        if ($result['city_id'] == $city_id) {
          return $result['city_name'];
        }
      }
    }

    return null;
  }
}
