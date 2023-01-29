<?php

namespace App\Http\Controllers;

use App\Models\CategoryRu;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
             $categories=CategoryRu::get();
             return view('admin.tables.category', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryRu  $categoryRu
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryRu $categoryRu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryRu  $categoryRu
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryRu $categoryRu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryRu  $categoryRu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryRu $categoryRu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryRu  $categoryRu
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryRu $categoryRu)
    {
        //
    }
}
