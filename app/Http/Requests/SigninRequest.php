<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'email' => 'required|email|exists:users,email',
			'password' => 'required',
		];
	}

	public function messages(): array
	{
		return [
			'email.required' => 'Email diperlukan',
			'email.email' => 'Email tidak valid',
			'email.exists' => 'Email tidak terdaftar',

			'password.required' => 'Password diperlukan',
		];
	}

	public function attributes(): array
	{
		return [
			'email' => 'Email Address',
			'password' => 'Password',
		];
	}
}
