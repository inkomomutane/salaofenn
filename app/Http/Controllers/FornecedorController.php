<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Http\Requests\Fornecedor\CreateFornecedor;
use App\Http\Requests\Fornecedor\UpdateFornecedor;


class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Fornecedor::with('products')->get();
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
     * @param  \App\Http\Requests\Fornecedor\CreateFornecedor  $createFornecedorRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateFornecedor $createFornecedorRequest)
    {
         try {
                $created = Fornecedor::updateOrCreate(
                    $createFornecedorRequest->all()
                );
          return response()->json(['Fornecedor'=>$created,'message'=>'Fornecedor inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function show(Fornecedor $fornecedor)
    {
        return  $fornecedor->with('products')->where('id',$fornecedor->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Fornecedor $fornecedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Fornecedor\UpdateFornecedor  $updateFornecedorRequest
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFornecedor $updateFornecedorRequest, Fornecedor $fornecedor)
    {
         try {
            $fornecedor->update($updateFornecedorRequest->all());
                 return response()->json(['Fornecedor'=>$fornecedor,'message'=>'Fornecedor updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fornecedor  $fornecedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fornecedor $fornecedor)
    {
        try {
             $fornecedor->delete();
              return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
              return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}