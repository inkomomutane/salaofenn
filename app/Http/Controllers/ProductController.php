<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\CreateProduct;
use App\Http\Requests\Product\UpdateProduct;
use App\Product;
use App\ProductTag;
use App\Tag;
use Illuminate\Http\Request;
use Dotenv\Validator; 

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with(['subcategory','fornecedor','tags'])->get();
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
     * @param  \App\Http\Requests\Product\CreateProduct $createProductRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $createProductRequest)
    {
        try {
                $created = Product::updateOrCreate(
                    $createProductRequest->all()
                );
          return response()->json(['Product'=>$created,'message'=>'Product inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return $product->with(['subcategory','fornecedor','tags'])->first();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function Webshow(Product $product)
    {
        //dd($product);
        return view('frontend.product-detail',['product'=>$product->with(['subcategory','fornecedor','tags'])->where('id',$product->id)->first()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function SearchProduct(Request $request)
    {
        if($request->method() == 'GET' ){
             return view('frontend.search-product')->with('products',Product::paginate(12));
        }else{

            $tags = [];
            if($request->tags!=null){
                $tags= $request->tags;
            }
            $subcategories = [];
            if($request->subcategories!=null){
                $subcategories= $request->subcategories;
            }
            $min=0;
            if($request->minPrice!=null){
                $min= $request->minPrice;
            }
             $max =0;
            if($request->maxPrice!=null){
                $max= $request->maxPrice;
            }     
            
                $products = Product::where([
                    ['price','>',$min],
                    ['price','<',$max],
                ])->orWhereIn(
                    'sub_category_id',$subcategories
                )->orWhereIn(
                    'id',ProductTag::whereIn(
                        'tag_id',$tags
                    )->get('product_id')
                )->paginate(12);
                 return view('frontend.search-product')->with('products',$products);
            
        }
    }
    
    /*->orWhereIn(
                    'id',ProductTag::whereIn(
                        'tag_id',$tags
                    )->get('product_id')
                )*/

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Product\UpdateProduct $updateProductRequest
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $updateProductRequest, Product $product)
    {
        try {
            $product->update($updateProductRequest->all());
                 return response()->json(['Product'=>$product,'message'=>'Product updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
             $product->delete();
              return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
              return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}