<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'name'  => 'required|min:3',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
      'konfirmasi' => 'required|same:password',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'Nama diperlukan',
      'name.min' => 'Nama minimal 3 karakter',

      'email.required' => 'Email diperlukan',
      'email.email' => 'Email tidak valid',
      'email.unique' => 'Email sudah ada',

      'password.required' => 'Password diperlukan',
      'password.min' => 'Password minimal 6 karakter',

      'konfirmasi.required' => 'Konfirmasi password diperlukan',
      'konfirmasi.same' => 'Konfirmasi password tidak sama',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'Name',
      'email' => 'Email Address',
      'password' => 'Password',
      'konfirmasi' => 'Konfirmasi Password',
    ];
  }
}
