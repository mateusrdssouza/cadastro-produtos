<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$products = Product::orderBy('id', 'asc')->paginate(5);
		return view('product.index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('product.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreProductRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreProductRequest $request)
	{
		$product = Product::create($request->all());
		return redirect()->route('product.show', ['product' => $product->id])->with('success', 'Produto cadastrado com sucesso');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		return view('product.show', ['product' => $product]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Product $product)
	{
		return view('product.edit', ['product' => $product]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateProductRequest  $request
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateProductRequest $request, Product $product)
	{
		$product->update($request->all());
		return redirect()->route('product.show', ['product' => $product->id])->with('success', 'Produto atualizado com sucesso');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		$product->delete();
		return redirect()->route('product.index')->with('success', 'Produto removido com sucesso');
	}
}
