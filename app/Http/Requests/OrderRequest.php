<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'courier' => 'required',
    ];
  }

  public function messages(): array
  {
    return [
      'courier.required' => 'Pilih kurir terlebih dahulu',
    ];
  }

  public function attributes(): array
  {
    return [
      'courier' => 'Kurir',
    ];
  }
}
