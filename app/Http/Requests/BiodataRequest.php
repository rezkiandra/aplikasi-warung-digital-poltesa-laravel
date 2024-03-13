<?php

namespace App\Http\Requests;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class BiodataRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'full_name' => 'required|unique:sellers,id|max:30',
      'address' => 'required',
      'phone_number' => 'required|numeric|regex:/^\d{8,13}$/|min:8',
      'gender' => 'required',
      'bank_account_id' => 'required',
      'image' => 'required_if:image,null|mimes:png,jpg,jpeg',
      'account_number' => 'required|unique:sellers,id|numeric|min:8',
      'status' => 'required_if:status,null|in:active,inactive,pending',
    ];
  }

  public function messages(): array
  {
    return [
      'full_name.required' => 'Nama seller diperlukan',
      'full_name.unique' => 'Nama seller sudah ada',
      'full_name.max' => 'Nama seller maksimal 30 karakter',

      'address.required' => 'Alamat diperlukan',

      'phone_number.required' => 'Nomor handphone diperlukan',
      'phone_number.numeric' => 'Nomor handphone dalam bentuk angka',
      'phone_number.regex' => 'Nomor handphone tidak valid',
      'phone_number.max' => 'Nomor handphone maksimal 20 karakter',

      'gender.required' => 'Harap pilih gender',

      'bank_account_id.required' => 'Harap pilih bank',

      'image.required_if' => 'Gambar diperlukan',
      'image.mimes' => 'Gambar dalam format jpg, png, jpeg',
      // 'image.size' => 'Gambar maksimal 2 MB',

      'account_number.required' => 'Nomor rekening diperlukan',
      'account_number.unique' => 'Nomor rekening sudah ada',
      'account_number.numeric' => 'Nomor rekening dalam bentuk angka',
      'account_number.min' => 'Nomor rekening minimal 8 karakter',

      'status.required_if' => 'Status diperlukan',
      'status.in' => 'Status tidak valid',
    ];
  }

  public function attributes(): array
  {
    return [
      'full_name' => 'Nama seller',
      'address' => 'Alamat',
      'phone_number' => 'Nomor handphone',
      'gender' => 'Gender',
      'bank_account_id' => 'Bank',
      'image' => 'Gambar',
      'account_number' => 'Nomor rekening',
      'status' => 'Status',
    ];
  }
}
