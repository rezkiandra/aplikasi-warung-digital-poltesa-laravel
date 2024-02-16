<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class AdminShowController extends Controller
{
	public function show_level(string $id)
	{
		$level = Level::findOrFail($id);
		return view('admin.levels');
	}
}
