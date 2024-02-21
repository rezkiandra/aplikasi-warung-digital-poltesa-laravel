<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
	public function create()
	{
		return view('admin.roles.create');
	}

	public function store(RoleRequest $request)
	{
		Role::create([
			'role_name' => $request->role_name,
			'slug' => Str::slug($request->role_name),
		]);

		Alert::toast('Successfully created new role', 'success');
		return redirect()->route('admin.roles');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $slug)
	{
		$role = Role::where('slug', $slug)->firstOrFail();
		return view('admin.roles.detail', compact('role'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $slug)
	{
		$role = Role::where('slug', $slug)->firstOrFail();
		return view('admin.roles.edit', compact('role'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(RoleRequest $request, string $slug)
	{
		$role = Role::where('slug', $slug)->firstOrFail();
		$role->update([
			'role_name' => $request->role_name,
			'slug' => Str::slug($request->role_name),
		]);

		Alert::toast('Successfully updated role', 'success');
		return redirect()->route('admin.roles');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(string $slug)
	{
		$role = Role::where('slug', $slug)->firstOrFail();
		$role->delete();

		Alert::toast('Successfully deleted role', 'success');
		return redirect()->route('admin.roles');

		// Alert::warning('Warning', 'Are you sure you want to delete this level?')
		// 	->showConfirmButton('Yes, Delete it', '#3085d6')
		// 	->showCancelButton('No, Cancel');

		// if (Alert::confirmed()) {
		// 	$role->delete();
		// 	Alert::toast('Successfully deleted level', 'success');
		// } else {
		// 	Alert::toast('Level not deleted', 'info');
		// }

		// return redirect()->route('admin.roles');
	}
}
