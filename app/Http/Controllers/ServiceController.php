<?php

namespace App\Http\Controllers;

use App\Http\Requests\Service\CreateService;
use App\Http\Requests\Service\UpdateService;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Service::with(['subcategory','tags'])->get();
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
     * @param  \App\Http\Requests\Service\CreateService $createServiceRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateService $createServiceRequest)
    {
        try {
                $created = Service::updateOrCreate(
                    $createServiceRequest->all()
                );
          return response()->json(['Service'=>$created,'message'=>'Service inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>$th],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return $service->with(['subcategory','tags'])->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Service\UpdateService $updateServiceRequest
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateService $updateServiceRequest, Service $service)
    {
        try {
            $service->update($updateServiceRequest->all());
                 return response()->json(['Service'=>$service,'message'=>'Service updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        try {
             $service->delete();
              return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
              return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}