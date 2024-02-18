<?php

namespace App\Http\Controllers;

use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;
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
		Level::create(['level_name' => $request->level_name]);

		Alert::toast('Successfully added new level', 'success');
		return redirect()->route('admin.levels');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $id)
	{
		$level = Level::findOrFail($id);
		return view('admin.levels.edit', compact('level'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, string $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $id)
	{
		$level = Level::findOrFail($id);
		$level->delete();

		Alert::toast('Successfully deleted level', 'success');
		return redirect()->route('admin.levels');
	}
}
