<?php

namespace App\Http\Requests;

use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
	public function authorize(): bool
	{
		return true;
	}

	public function rules(): array
	{
		return [
			'role_name' => 'required|unique:roles,id|max:20',
		];
	}

	public function messages(): array
	{
		return [
			'role_name.required' => 'Role diperlukan',
			'role_name.unique' => 'Role sudah ada',
			'role_name.max' => 'Role maksimal 20 karakter',
		];
	}

	public function attributes(): array
	{
		return [
			'role_name' => 'Role',
		];
	}
}
