<?php

namespace App\Http\Requests;

use App\Models\Products;
use Illuminate\Foundation\Http\FormRequest;

class EditProductsRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|unique:products,id|min:5|max:50',
      'description' => 'required|min:100',
      'price' => 'required|numeric|',
      'stock' => 'required|numeric|',
      'category_id' => 'required_if:category_id,null',
      'image' => 'required_if:image,null|mimes:png,jpg,jpeg,webp',
    ];
  }

  public function messages(): array
  {
    return [
      'seller_id.required_if' => 'Seller diperlukan',

      'name.required' => 'Nama produk diperlukan',
      'name.unique' => 'Nama produk sudah ada',
      'name.min' => 'Nama produk minimal 5 karakter',
      'name.max' => 'Nama produk maksimal 50 karakter',

      'description.required' => 'Deskripsi diperlukan',
      'description.min' => 'Deskripsi minimal 100 karakter',

      'price.required' => 'Harga diperlukan',
      'price.numeric' => 'Harga dalam bentuk angka',

      'stock.required' => 'Stok diperlukan',
      'stock.numeric' => 'Stok dalam bentuk angka',

      'category_id.required_if' => 'Kategori produk diperlukan',

      'image.required_if' => 'Gambar produk diperlukan',
      'image.mimes' => 'Gambar produk dalam format jpg, png, jpeg, webp',
      'image.size' => 'Gambar produk maksimal 2 MB',
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
