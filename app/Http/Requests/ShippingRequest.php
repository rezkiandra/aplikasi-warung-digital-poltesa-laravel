<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'shipping_status' => 'required_if:shipping_status,null|in:diproses,dikirim,diterima',
      'resi' => 'required_if:shipping_status,dikirim',
    ];
  }

  public function messages(): array
  {
    return [
      'shipping_status.required_if' => 'Pilih shipping_status pengiriman',
      'resi.required_if' => 'Masukkan nomor resi',
    ];
  }

  public function attributes(): array
  {
    return [
      'shipping_status' => 'Status Pengiriman',
      'resi' => 'Nomor Resi',
    ];
  }
}
