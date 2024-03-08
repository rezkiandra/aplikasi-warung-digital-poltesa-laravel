<?php

namespace App\Http\Requests;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'seller_id' => 'required_if:seller_id,null',
      'name' => 'required|unique:products,id|max:30',
      'description' => 'required|',
      'price' => 'required|numeric|',
      'stock' => 'required|numeric|',
      'category_id' => 'required',
      'image' => 'required_if:image,null|mimes:png,jpg,jpeg',
    ];
  }

  public function messages(): array
  {
    return [
      'seller_id.required_if' => 'Seller diperlukan',

      'name.required' => 'Nama produk diperlukan',
      'name.unique' => 'Nama produk sudah ada',
      'name.max' => 'Nama produk maksimal 30 karakter',

      'description.required' => 'Deskripsi diperlukan',

      'price.required' => 'Harga diperlukan',
      'price.numeric' => 'Harga dalam bentuk angka',

      'stock.required' => 'Stok diperlukan',
      'stock.numeric' => 'Stok dalam bentuk angka',

      'category_id.required' => 'Kategori diperlukan',

      'image.required_if' => 'Gambar diperlukan',
      'image.mimes' => 'Gambar dalam format jpg, png, jpeg',
      // 'image.size' => 'Gambar maksimal 2 MB',
    ];
  }

  public function attributes(): array
  {
    return [
      'seller_id' => 'Seller',
      'name' => 'Nama Produk',
      'description' => 'Deskripsi',
      'price' => 'Harga',
      'stock' => 'Stok',
      'image' => 'Gambar',
    ];
  }
}
