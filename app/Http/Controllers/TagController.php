<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;

class TagController extends Controller
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
		$tags = Tag::orderBy('id', 'asc')->paginate(5);
		return view('tag.index', ['tags' => $tags]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('tag.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreTagRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreTagRequest $request)
	{
		$tag = Tag::create($request->all());
		return redirect()->route('tag.show', ['tag' => $tag->id])->with('success', 'Tag cadastrada com sucesso');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Tag  $tag
	 * @return \Illuminate\Http\Response
	 */
	public function show(Tag $tag)
	{
		return view('tag.show', ['tag' => $tag]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Tag  $tag
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tag $tag)
	{
		return view('tag.edit', ['tag' => $tag]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateTagRequest  $request
	 * @param  \App\Models\Tag  $tag
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateTagRequest $request, Tag $tag)
	{
		$tag->update($request->all());
		return redirect()->route('tag.show', ['tag' => $tag->id])->with('success', 'Tag atualizada com sucesso');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Tag  $tag
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Tag $tag)
	{
		$tag->delete();
		return redirect()->route('tag.index')->with('success', 'Tag removida com sucesso');
	}
}
