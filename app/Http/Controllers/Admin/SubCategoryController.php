<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = MainCategory::all();
        $subCategorys = SubCategory::all();
        return view('admin.categories.sub-category.index', compact('subCategorys', 'main_categories'));
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
            'name' =>'required|unique:sub_categories,name',
            'main_category_id' =>'required'
        ]);
        $user = Auth::user();
        $subCategory = new SubCategory();
        $subCategory->main_category_id = $request->main_category_id;
        $subCategory->user_id = $user->id;
        $subCategory->name = $request->name;
        $subCategory->save();
        return back()->with('success', 'A new sub-category is created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $main_categories = MainCategory::all();
        return view('admin.categories.sub-category.edit', compact('subCategory', 'main_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required',
            'main_category_id' =>'required'
        ]);
        $user = Auth::user();
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->main_category_id = $request->main_category_id;
        $subCategory->user_id = $user->id;
        $subCategory->name = $request->name;
        $subCategory->save();
        return redirect()->route('sub_category.index')->with('success', 'A new sub-category is created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return back()->with('success', 'A sub-category is delated successfuly!');
    }
}
