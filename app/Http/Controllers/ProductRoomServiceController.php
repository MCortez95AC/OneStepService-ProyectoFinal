<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\File;
use App\Product;
use App\Area;

class ProductRoomServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $area = Area::find(2);
        $products = $area->products()->where('enable',1)->get();
        return view('managers.generalManager.areaManager.roomService.products.index', compact('products'));
    }

    public function disabledProducts(){
        $area = Area::find(2);
        $products = $area->products()->where('enable',0)->get();

        return view('managers.generalManager.areaManager.roomService.products.disabled', compact('products'));
    }

    public function create()
    {
        return view('managers.generalManager.areaManager.roomService.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $file =$request->file('image');
            $fileName = time().$file->getClientOriginalName(); //le concat la hora a la imagen para crear el nombre
            $file->move(public_path().'/images/',$fileName); //guardamos la imagen el la carpeta images en public

        }else return 'falla';
        $product = new Product();

        $product->area_id = 2; //Default restaurant area ID
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category = 'Clean';
        $product->image = $fileName;
        $product->save();

        return redirect()->route('products.rs.index')->with('info','Product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('managers.generalManager.areaManager.roomService.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->fill($request->except('image'));
        if ($request->hasFile('image')) {
            $file =$request->file('image');
            $name = time().$file->getClientOriginalName(); //le ponemos concat la hora a la imagen para crear el nombre
            $product->image = $name;
            $file->move(public_path().'/images/',$name); //guardamos la imagen el la carpeta images en public
            
        }

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return redirect()->route('products.rs.index')->with('info','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $filePath = public_path().'/images/'.$product->image;
        if (file_exists($filePath)) {
            \File::delete($filePath);
        }
        $product->delete();


        return redirect()->route('products.rs.index')->with('info','Product delete successfully');
    }

    public function disable(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->enable = 1;
        $product->save();
        return redirect()->route('products.rs.index')->with('info','Product disabled successfully');
    }
}
