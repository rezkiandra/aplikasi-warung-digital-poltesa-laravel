<?php

namespace App\Http\Requests;

use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class EditCustomerRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'nik_nim' => 'required_if:nik_nim,null|unique:customers,id|min:8|max:20',
      'full_name' => 'required|unique:customers,id|min:6|max:30',
      'address' => 'required_if:address,null',
      'origin' => 'required_if:origin,null',
      'phone_number' => 'required|numeric|regex:/^\d{8,13}$/',
      'gender' => 'required',
      'image' => 'required_if:image,null|mimes:png,jpg,jpeg|max:2048',
      'status' => 'required:status,null|in:active,inactive,pending',
    ];
  }

  public function messages(): array
  {
    return [
      'nik_nim.required_if' => 'NIK/NIM diperlukan',
      'nik_nim.unique' => 'NIK/NIM sudah ada',
      'nik_nim.min' => 'NIK/NIM minimal 8 karakter',
      'nik_nim.max' => 'NIK/NIM maksimal 20 karakter',

      'full_name.required' => 'Nama customer diperlukan',
      'full_name.unique' => 'Nama customer sudah ada',
      'full_name.min' => 'Nama customer minimal 6 karakter',
      'full_name.max' => 'Nama customer maksimal 30 karakter',

      'address.required_if' => 'Alamat diperlukan',

      'origin.required_if' => 'Kota diperlukan',

      'phone_number.required' => 'Nomor handphone diperlukan',
      'phone_number.numeric' => 'Nomor handphone dalam bentuk angka',
      'phone_number.regex' => 'Nomor handphone tidak valid',
      'phone_number.max' => 'Nomor handphone maksimal 20 karakter',

      'gender.required' => 'Harap pilih gender',

      'image.required_if' => 'Foto profil diperlukan',
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
