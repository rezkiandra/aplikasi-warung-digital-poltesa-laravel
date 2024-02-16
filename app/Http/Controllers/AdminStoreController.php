<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminStoreController extends Controller
{
	public function store_level(Request $request)
	{
		$validated = $request->validate([
			'level_name' => 'required|unique:levels,level_name',
		]);

		Level::create($validated);

		Alert::toast('Success added new level', 'success');
		return redirect()->route('admin.levels');
	}
}
