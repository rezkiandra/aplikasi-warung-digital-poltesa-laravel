<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|min:6|max:30',
      'email' => 'required_if:email,null|unique:users,id|email',
      'role_id' => 'required_if:role_id,null',
      'password' => 'required_if:password,null|min:6|max:20',
      'new_password' => 'required_if:password,notnull|min:6|max:20',
      'konfirmasi' => 'required_if:konfirmasi,notnull|same:new_password|',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Nama harus diisi',
      'name.min' => 'Nama minimal 6 karakter',
      'name.max' => 'Nama maksimal 30 karakter',

      'email.required_if' => 'Email harus diisi',
      'email.unique' => 'Email sudah terdaftar',
      'email.email' => 'Email tidak valid',

      'role_id.required_if' => 'Role harus diisi',

      'password.required_if' => 'Password harus diisi',
      'password.min' => 'Password minimal 6 karakter',
      'password.max' => 'Password maksimal 20 karakter',

      'new_password.required_if' => 'Password baru harus diisi',
      'new_password.min' => 'Password minimal 6 karakter',
      'new_password.max' => 'Password maksimal 20 karakter',

      'konfirmasi.required_if' => 'Konfirmasi password harus diisi',
      'konfirmasi.same' => 'Konfirmasi password tidak sama',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'Nama',
      'email' => 'Email',
      'role_id' => 'Role',
      'password' => 'Password',
    ];
  }
}
