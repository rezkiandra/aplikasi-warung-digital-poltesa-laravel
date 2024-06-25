<?php

namespace App\Http\Requests;

use App\Models\Seller;
use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'nik_nim' => 'required|unique:sellers,nik_nim|min:8|max:20',
      'user_id' => 'required|unique:sellers,id',
      'full_name' => 'required|unique:sellers,id|min:4|max:30',
      'address' => 'required',
      'origin' => 'required',
      'phone_number' => 'required|unique:sellers,phone_number|regex:/^(08)[0-9]{9,12}$/',
      'gender' => 'required',
      'bank_account_id' => 'required',
      'image' => 'required|mimes:png,jpg,jpeg',
      'account_number' => 'required|unique:sellers,account_number|numeric|min:8',
      'status' => 'required|in:active,inactive,pending',
    ];
  }

  public function messages(): array
  {
    return [
      'nik_nim.required' => 'NIK / NIM diperlukan',
      'nik_nim.unique' => 'NIK / NIM sudah ada',
      'nik_nim.min' => 'NIK / NIM minimal 8 karakter',
      'nik_nim.max' => 'NIK / NIM maksimal 20 karakter',

      'user_id.required' => 'Harap pilih user',
      'user_id.unique' => 'User sudah menjadi seller',

      'full_name.required' => 'Nama seller diperlukan',
      'full_name.unique' => 'Nama seller sudah ada',
      'full_name.min' => 'Nama seller minimal 4 karakter',
      'full_name.max' => 'Nama seller maksimal 30 karakter',

      'address.required' => 'Alamat diperlukan',

      'origin.required' => 'Kota diperlukan',

      'phone_number.required' => 'Nomor handphone diperlukan',
      'phone_number.number' => 'Nomor handphone dalam bentuk angka',
      'phone_number.regex' => 'Nomor handphone tidak valid',
      'phone_number.unique' => 'Nomor handphone sudah ada',

      'gender.required' => 'Harap pilih gender',

      'bank_account_id.required' => 'Harap pilih bank',

      'image.required' => 'Foto profil diperlukan',
      'image.mimes' => 'Foto profil dalam format jpg, png, jpeg',
      'image.size' => 'Foto profil maksimal 2 MB',

      'account_number.required' => 'Nomor rekening diperlukan',
      'account_number.unique' => 'Nomor rekening sudah ada',
      'account_number.numeric' => 'Nomor rekening dalam bentuk angka',
      'account_number.min' => 'Nomor rekening minimal 8 karakter',
      'account_number.max' => 'Nomor rekening maksimal 20 karakter',

      'status.required' => 'Status diperlukan',
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
      'image' => 'Foto',
      'account_number' => 'Nomor rekening',
      'status' => 'Status',
    ];
  }
}
