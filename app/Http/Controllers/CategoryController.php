<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\CreateCategory;
use App\Http\Requests\Category\UpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::with('subcategories')->get();
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
     * @param  \App\Http\Requests\Category\CreateCategory $createCategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $createCategoryRequests)
    {
        $rules = [
         'name' => 'required|unique:categories'   
        ];

       $validator = Validator::make($createCategoryRequests->all(),$rules);
       if($validator->fails()){
           return response()->json($validator->errors(),400);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $category->with('subcategories')->where('id',$category->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Category\UpdateCategory $updateCategoryRequest
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategory $updateCategoryRequest, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}