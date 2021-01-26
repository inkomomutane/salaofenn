<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\CreateCategory;
use App\Http\Requests\Category\UpdateCategory;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;

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
        return view('backend.dashboard.category')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Category\CreateCategory $createCategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategory $createCategoryRequest)
    {
        try {
                $created = Category::Create(
                    $createCategoryRequest->all()
                );
                session()->flash('success','Category inserted successful');
          return redirect()->back();//json(['Category'=>$created,'message'=>'Category inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            session()->flash('error','Error inserting category');
            return redirect()->back();//json(['error'=>$th],404);
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

        try {
         $category->update($updateCategoryRequest->all());
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
    public function destroy(Category $category)
    {
        //dd($category->subcategories->count());
        try {
            if($category->subcategories->count() <= 0){
                $category->delete();
                session()->flash('success','Category deleted successful');
                return redirect()->back();  
            }
                session()->flash('error','Error Cannot delete category having subcategories');
                return redirect()->back();
            
             //json(['Category'=>$created,'message'=>'Category inserted successful','status'=>201],201);
              //return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
            //  return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
             session()->flash('error','Error {$th} deleting category'.$th);
            return redirect()->back();//json(['error'=>$th],404);
        }
    }
}