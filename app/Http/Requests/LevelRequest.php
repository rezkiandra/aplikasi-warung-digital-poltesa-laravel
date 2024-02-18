<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'level_name' => 'required|unique:levels,level_name|max:20',
		];
	}

	public function messages(): array
	{
		return [
			'level_name.required' => 'Level diperlukan',
			'level_name.unique' => 'Level sudah ada',
			'level_name.max' => 'Level maksimal 20 karakter',
		];
	}

	public function attributes(): array
	{
		return [
			'level_name' => 'Level',
		];
	}
}
