<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\Tag;
use Exception;

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
		$products = Product::paginate(5);
		return view('product.index', ['products' => $products]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$tags = Tag::orderBy('name', 'asc')->get();
		return view('product.create', ['tags' => $tags]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreProductRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreProductRequest $request)
	{
		try
		{
			$product = Product::create($request->all());

			if(isset($request->tags) && !empty($request->tags))
			{
				foreach($request->tags as $tag)
				{
					$productTag = ProductTag::create([
						'product_id' => $product->id,
						'tag_id' => $tag
					]);
				}
			}

			return redirect()->route('product.show', ['product' => $product->id])->with('success', 'Produto cadastrado com sucesso');
		}
		catch(Exception $e)
		{
			return back()->withInput()->with('danger', 'Ocorreu um erro ao cadastrar o produto');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Product $product)
	{
		$product = Product::with('tags')->find($product->id);
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
		$product = Product::with('tags')->find($product->id);
		$tags = Tag::orderBy('name', 'asc')->get();

		return view('product.edit', ['product' => $product, 'tags' => $tags]);
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
		try
		{
			$product->update($request->all());
			$delete = ProductTag::where('product_id', $product->id)->delete();

			if(isset($request->tags) && !empty($request->tags))
			{
				foreach($request->tags as $tag)
				{
					$productTag = ProductTag::create([
						'product_id' => $product->id,
						'tag_id' => $tag
					]);
				}
			}

			return redirect()->route('product.show', ['product' => $product->id])->with('success', 'Produto atualizado com sucesso');
		}
		catch(Exception $e)
		{
			return back()->withInput()->with('danger', 'Ocorreu um erro ao atualizar o produto');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Product $product)
	{
		try
		{
			$delete = ProductTag::where('product_id', $product->id)->delete();
			$product->delete();

			return redirect()->route('product.index')->with('success', 'Produto removido com sucesso');
		}
		catch(Exception $e)
		{
			return back()->withInput()->with('danger', 'Ocorreu um erro ao remover o produto');
		}
	}
}
