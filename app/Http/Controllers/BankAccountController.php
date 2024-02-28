<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Support\Str;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankAccountRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BankAccountController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.bank_account.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(BankAccountRequest $request)
	{
		BankAccount::create([
			'bank_name' => $request->bank_name,
			'slug' => Str::slug($request->bank_name),
		]);

		Alert::toast('Successfully created new bank', 'success');
		return redirect()->route('admin.bank_accounts');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $slug)
	{
		$bank = BankAccount::where('slug', $slug)->firstOrFail();
		return view('admin.bank_account.detail', compact('bank'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $slug)
	{
		$bank = BankAccount::where('slug', $slug)->firstOrFail();
		return view('admin.bank_account.edit', compact('bank'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(BankAccountRequest $request, string $slug)
	{
		$bank = BankAccount::where('slug', $slug)->firstOrFail();
		$bank->update([
			'bank_name' => $request->bank_name,
			'slug' => Str::slug($request->bank_name),
		]);

		Alert::toast('Successfully updated bank', 'success');
		return redirect()->route('admin.bank_accounts');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(ProductCategory $productCategory)
	{
		//
	}
}
