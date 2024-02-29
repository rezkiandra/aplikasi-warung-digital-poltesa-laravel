<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductsRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('admin.products.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(ProductsRequest $request)
	{
		Products::create([
			'name' => $request->name,
			'slug' => Str::slug($request->slug),
			'description' => $request->description,
			'price' => $request->price,
			'stock' => $request->stock,
			'category_id' => $request->category_id,
			'image' => $request->image,
		]);

		Alert::toast('Successfully created new product', 'success');
		return redirect()->route('admin.products');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Products $products)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Products $products)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Products $products)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Products $products)
	{
		//
	}
}
