<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'name' => 'required|unique:product_categories,id|max:20',
		];
	}

	public function messages(): array
	{
		return [
			'name.required' => 'Kategori diperlukan',
			'name.unique' => 'Kategori sudah ada',
			'name.max' => 'Kategori maksimal 20 karakter',
		];
	}

	public function attributes(): array
	{
		return [
			'name' => 'Kategori',
		];
	}
}
