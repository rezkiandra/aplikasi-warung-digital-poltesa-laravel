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
      'nik_nim' => 'required|unique:customers,nik_nim|min:8|max:20',
      'user_id' => 'required|unique:customers,full_name',
      'full_name' => 'required|unique:customers,id|min:6|max:30',
      'address' => 'required',
      'origin' => 'required',
      'phone_number' => 'required|numeric|regex:/^\d{8,13}$/|unique:customers,phone_number',
      'gender' => 'required',
      'image' => 'required:image,null|mimes:png,jpg,jpeg|max:2048',
      'status' => 'required:status,null|in:active,inactive,pending',
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
      'user_id.unique' => 'User sudah menjadi customer',

      'full_name.required' => 'Nama customer diperlukan',
      'full_name.unique' => 'Nama customer sudah ada',
      'full_name.min' => 'Nama customer minimal 6 karakter',
      'full_name.max' => 'Nama customer maksimal 30 karakter',

      'address.required' => 'Alamat diperlukan',

      'origin.required' => 'Kota diperlukan',

      'phone_number.required' => 'Nomor handphone diperlukan',
      'phone_number.numeric' => 'Nomor handphone dalam bentuk angka',
      'phone_number.regex' => 'Nomor handphone tidak valid',
      'phone_number.unique' => 'Nomor handphone sudah ada',

      'gender.required' => 'Harap pilih gender',

      'image.required' => 'Foto profil diperlukan',
      'image.mimes' => 'Foto profil dalam format jpg, png, jpeg',
      'image.size' => 'Foto profil maksimal 2 MB',

      'status.required' => 'Status diperlukan',
      'status.in' => 'Status tidak valid',
    ];
  }

  public function attributes(): array
  {
    return [
      'full_name' => 'Nama customer',
      'address' => 'Alamat',
      'phone_number' => 'Nomor handphone',
      'gender' => 'Gender',
      'image' => 'Gambar',
      'status' => 'Status',
    ];
  }
}
