<?php

namespace App\Http\Controllers;

use App\Models\CategoryRu;
use App\Models\CategoryUz;
use Illuminate\Http\Request;


use App\Http\Requests;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductRu;
use App\Models\User;
use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Support\Facades\Http;
use Telegram\Bot\Laravel\Facades\Telegram;
// use File;
use Symfony\Component\HttpFoundation\File;


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
    public function create(Request $request)
    {

     if ($request->method() == 'POST')
     {

         // $request->validate([
         //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         // ]);
         $filename = time() . '.'. $request->fotos->extension();
         $path=public_path('uploads/fotos/');
         // dd($path.$filename);
         $request->fotos->move($path, $filename);
         // dd($filename);


        $product=CategoryRu::create([
           'name'=>$request->name_ru,
           'foto'=>$filename,
        ]);
        $product=CategoryUz::create([
            'name'=>$request->name_uz,
            'foto'=>$filename,
         ]);
     //    dd($product);
     return redirect()->route("categories.list");
     }
         return view('admin.forms.category_create');

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
    public function edit($id)
    {
        //   public function edit($id)
   {


    $category_ru=CategoryRu::where('id',$id)->first();
    $category_uz=CategoryUz::where('id',$id)->first();

    //    dd($id);
    //    return 'came';
    return view('admin.forms.category_edit',compact('category_ru','category_uz'));
   }
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

        // dd($request->all());

        $filename = time() . '.'. $request->fotos->extension();
        $path=public_path('uploads/fotos/');
        // dd($path.$filename);
        $request->fotos->move($path, $filename);

        $category_ru=CategoryRu::where('id',$request->category_id)->first();
        $category_uz=CategoryUz::where('id',$request->category_id)->first();

        $category_ru->name=$request->name_ru;
        $category_ru->foto=$filename;
        $category_uz->name=$request->name_uz;
        $category_uz->foto=$filename;
        $category_ru->save();
        $category_uz->save();
        return redirect()->route("categories.list");
        // dd($user);
        // if ($user->save()) {
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryRu  $categoryRu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer_ru = CategoryRu::find($id);
        $customer_uz = CategoryUz::find($id);
        $customer_ru->delete();
        $customer_uz->delete();
        // echo 'user delite';
        return redirect()->route('categories.list');
    }
}
