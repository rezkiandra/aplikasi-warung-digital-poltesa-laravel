<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'full_name' => 'required|unique:customers,full_name|max:30',
			'address' => 'required',
			'phone_number' => 'required|numeric|max:13',
			'gender' => 'required',
			'bank_account_id' => 'required',
			'image' => 'required|mimes:png,jpg,jpeg',
		];
	}

	public function messages(): array
	{
		return [
			'full_name.required' => 'Nama customer diperlukan',
			'full_name.unique' => 'Nama customer sudah ada',
			'full_name.max' => 'Nama customer maksimal 30 karakter',

			'address.required' => 'Alamat diperlukan',

			'phone_number.required' => 'Nomor handphone diperlukan',
			'phone_number.numeric' => 'Nomor handphone dalam bentuk angka',

			'gender.required' => 'Harap pilih gender',

			'bank_account_id.required' => 'Harap pilih bank',

			'image.required' => 'Gambar diperlukan',
			'image.mimes' => 'Gambar dalam format jpg, png, jpeg',
			// 'image.size' => 'Gambar maksimal 2 MB',
		];
	}

	public function attributes(): array
	{
		return [
			'full_name' => 'Nama customer',
			'address' => 'Alamat',
			'phone_number' => 'Nomor handphone',
			'gender' => 'Gender',
			'bank_account_id' => 'Bank',
			'image' => 'Gambar',
		];
	}
}
