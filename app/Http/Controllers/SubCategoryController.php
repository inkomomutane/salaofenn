<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategory\CreateSubCategory;
use App\Http\Requests\SubCategory\UpdateSubCategory;
use App\SubCategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubCategory::with(['category','products','services'])->get();
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
     * @param  \App\Http\Requests\SubCategory\CreateSubCategory $createSubcategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubCategory $createSubcategoryRequest)
    {
          try {
                $created = SubCategory::updateOrCreate(
                    $createSubcategoryRequest->all()
                );
          return response()->json(['SubCategory'=>$created,'message'=>'SubCategory inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return $subCategory->with(['category','products','services'])->where('id',$subCategory->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\SubCategory\UpdateSubCategory $updateSubCategoryRequest
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubCategory $updateSubCategoryRequest, SubCategory $subCategory)
    {
        try {
            $subCategory->update($updateSubCategoryRequest->all());
                 return response()->json(['SubCategory'=>$subCategory,'message'=>'SubCategory updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
         try {
             $subCategory->delete();
              return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
              return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}