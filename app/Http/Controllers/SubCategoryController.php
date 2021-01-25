<?php

namespace App\Http\Controllers;
use App\Http\Requests\SubCategory\CreateSubCategory;
use App\Http\Requests\SubCategory\UpdateSubCategory;
use App\SubCategory;

//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubCategory::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.subCategory')->with('subCategories',SubCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\CreateCategory $createCategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubCategory  $createCategoryRequest)
    {
        try {
                $created = SubCategory::Create(
                    $createCategoryRequest->all()
                );
                session()->flash('success','Sub - category inserted successful');
          return redirect()->back();//json(['Category'=>$created,'message'=>'Category inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            session()->flash('error','Error inserting sub - category');
            return redirect()->back();//json(['error'=>$th],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        return $subcategory->with('category')->where('id',$subcategory->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
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
    public function update(UpdateSubCategory $updateCategoryRequest, SubCategory $subcategory)
    {
        
        try {
          //  dd($updateCategoryRequest->all());
        $subcategory->update($updateCategoryRequest->all());
             session()->flash('success','Category Updated successful');
          return redirect()->back();
           // return response()->json(['Category'=>$category,'message'=>'Category updated successful','status'=>201],201);
 
        } catch (\Throwable $th) {
              session()->flash('error','Error Updating category');
          return redirect()->back();
                    //  return response()->json(['error'=>'Error on updating data. Please try again.'],404);
 
            //throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        try {
             $subcategory->delete();
              session()->flash('success','Category deleted successful');
          return redirect()->back();//json(['Category'=>$created,'message'=>'Category inserted successful','status'=>201],201);
              //return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
            //  return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
             session()->flash('error','Error deleting category');
            return redirect()->back();//json(['error'=>$th],404);
        }
    }
}