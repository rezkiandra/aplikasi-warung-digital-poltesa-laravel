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
      'resi' => 'required_if:shipping_status,dikirim|required_if:courier,jne',
    ];
  }

  public function messages(): array
  {
    return [
      'shipping_status.required_if' => 'Pilih shipping_status pengiriman',
      'shipping_status.in' => 'Pilih shipping_status yang tersedia',
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
