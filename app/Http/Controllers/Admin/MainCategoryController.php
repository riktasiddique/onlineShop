<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainCategorys = MainCategory::all();
        return view('admin.categories.main-category.index', compact('mainCategorys'));
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
            'name' =>'required|unique:main_categories,name',
            'image1' => 'required',
        ]);
        $user = Auth::user();
        $file = $request->file('image1');
        $path_1 = $file? Storage::url($request->file('image1')->store('/public/MainCategory'. $user->id)) : '';
        
        $mainCategory = new MainCategory();
        $mainCategory->user_id = $user->id;
        $mainCategory->image1 = $path_1;
        $mainCategory->name = $request->name;
        $mainCategory->save();
        return back()->with('success', 'A new main category created successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function show(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(MainCategory $mainCategory)
    {
        return view('admin.categories.main-category.edit', compact('mainCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image1' => 'required',
            'name' => 'required',
        ]);
        $user = Auth::user();
        $file = $request->file('image1');
        $path_1 = $file? Storage::url($request->file('image1')->store('/public/MainCategory'. $user->id)) : '';
        
        $mainCategory = MainCategory::findOrFail($id);
        $mainCategory->user_id = $user->id;
        $mainCategory->image1 = $path_1;
        $mainCategory->name = $request->name;
        $mainCategory->save();
        return redirect()->route('main_categories.index')->with('success', 'A new main category created successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainCategory $mainCategory)
    {
        $mainCategory->delete();
        return back()->with('success', 'A main category deleted successfuly');
    }
}
