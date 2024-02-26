<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankAccountRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'bank_name' => 'required|unique:bank_accounts,bank_name|max:20',
		];
	}

	public function messages(): array
	{
		return [
			'bank_name.required' => 'Nama bank diperlukan',
			'bank_name.unique' => 'Nama bank sudah ada',
			'bank_name.max' => 'Nama bank maksimal 20 karakter',
		];
	}

	public function attributes(): array
	{
		return [
			'bank_name' => 'Nama bank',
		];
	}
}
