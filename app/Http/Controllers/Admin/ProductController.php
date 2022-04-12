<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategories = MainCategory::all();
        $subCategories = SubCategory::all();
        $products = Product::all();
        return view('admin.all-product.index', compact('products', 'mainCategories', 'subCategories'));
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
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'unique:products,sub_category_id',
            'price' => 'required',
            'quantity' => 'required',
            'image1' => 'required',

        ]);

        $user = Auth::user();
        // Image Processing
        $file = $request->file('image1');
        $path_1 = $file? Storage::url($request->file('image1')->store('/public/products'. $user->id)) : '';
        $product = new Product();
        $product->user_id = $user->id;
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->image1 = $path_1;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return back()->with('success', 'A new product created successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.all-product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $mainCategories = MainCategory::all();
        $subCategories = SubCategory::all();
        // $products = Product::all();
        return view('admin.all-product.edit', compact('product', 'mainCategories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'main_category_id' => 'required',
            'sub_category_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image1' => 'required',

        ]);

        $user = Auth::user();
        // Image Processing
        $file = $request->file('image1');
        $path_1 = $file? Storage::url($request->file('image1')->store('/public/products'. $user->id)) : '';
        $product = Product::findOrFail($id);
        $product->user_id = $user->id;
        $product->main_category_id = $request->main_category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->image1 = $path_1;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();
        return redirect()->route('products.index')->with('success', 'A new product created successfuly!');
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
        return back()->with('success', 'A product deleted successfuly!');
    }
}
