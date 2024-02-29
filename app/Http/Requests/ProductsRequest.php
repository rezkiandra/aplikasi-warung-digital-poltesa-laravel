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
			'name' => 'required|unique:products,name|max:50',
			'description' => 'required|',
			'price' => 'required|numeric|',
			'stock' => 'required|numeric|',
			'category_id' => 'required',
			'image' => 'required|mimes:png,jpg,jpeg',
		];
	}

	public function messages(): array
	{
		return [
			'name.required' => 'Nama produk diperlukan',
			'name.unique' => 'Nama produk sudah ada',
			'name.max' => 'Nama produk maksimal 20 karakter',

			'description.required' => 'Deskripsi diperlukan',

			'price.required' => 'Harga diperlukan',
			'price.numeric' => 'Harga dalam bentuk angka',

			'stock.required' => 'Stok diperlukan',
			'stock.numeric' => 'Stok dalam bentuk angka',

			'category_id.required' => 'Kategori diperlukan',

			'image.required' => 'Gambar diperlukan',
			'image.mimes' => 'Gambar dalam format jpg, png, jpeg',
			// 'image.size' => 'Gambar maksimal 2 MB',
		];
	}

	public function attributes(): array
	{
		return [
			'name' => 'Nama Produk',
			'description' => 'Deskripsi',
			'price' => 'Harga',
			'stock' => 'Stok',
			'image' => 'Gambar',
		];
	}
}
