<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductCategoryController extends Controller
{
	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.product_category.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(CategoryRequest $request)
	{
		ProductCategory::create([
			'name' => $request->name,
			'slug' => Str::slug($request->name)
		]);

		Alert::toast('Successfully created new category', 'success');
		return redirect()->route('admin.product_category');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(string $slug)
	{
		$category = ProductCategory::where('slug', $slug)->firstOrFail();
		return view('admin.product_category.detail', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(string $slug)
	{
		$category = ProductCategory::where('slug', $slug)->firstOrFail();
		return view('admin.product_category.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(CategoryRequest $request, string $slug)
	{
		$category = ProductCategory::where('slug', $slug)->firstOrFail();
		$category->update([
			'name' => $request->name,
			'slug' => Str::slug($request->name),
		]);

		Alert::toast('Successfully updated category', 'success');
		return redirect()->route('admin.product_category');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(ProductCategory $productCategory)
	{
		//
	}
}
