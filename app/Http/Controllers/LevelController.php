<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LevelRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LevelController extends Controller
{
	public function create()
	{
		return view('admin.levels.create');
	}

	public function store(LevelRequest $request)
	{
		Level::create([
			'level_name' => $request->level_name,
			'slug' => Str::slug($request->level_name),
		]);

		Alert::toast('Successfully created new level', 'success');
		return redirect()->route('admin.levels');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $slug)
	{
		$level = Level::where('slug', $slug)->firstOrFail();

		$level_user_count = User::where('id', $level->id)->count();
		return view('admin.levels.detail', compact('level', 'level_user_count'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $slug)
	{
		$level = Level::where('slug', $slug)->firstOrFail();
		return view('admin.levels.edit', compact('level'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(LevelRequest $request, string $slug)
	{
		$level = Level::where('slug', $slug)->firstOrFail();
		$level->update([
			'level_name' => $request->level_name,
			'slug' => Str::slug($request->level_name),
		]);

		Alert::toast('Successfully updated level', 'success');
		return redirect()->route('admin.levels');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $slug)
	{
		$level = Level::where('slug', $slug)->firstOrFail();
		$level->delete();

		Alert::toast('Successfully deleted level', 'success');
		return redirect()->route('admin.levels');

		// Alert::warning('Warning', 'Are you sure you want to delete this level?')
		// 	->showConfirmButton('Yes, Delete it', '#3085d6')
		// 	->showCancelButton('No, Cancel');

		// if (Alert::confirmed()) {
		// 	$level->delete();
		// 	Alert::toast('Successfully deleted level', 'success');
		// } else {
		// 	Alert::toast('Level not deleted', 'info');
		// }

		// return redirect()->route('admin.levels');
	}
}
