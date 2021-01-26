<?php

namespace App\Http\Controllers;

use App\Http\Requests\Status\CreateStatus;
use App\Http\Requests\Status\UpdateStatus;
use App\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Status::with('orders')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('backend.dashboard.status')->with('statuses',Status::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Status\CreateStatus $createStatusRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStatus $createStatusRequest)
    {
         try {
                $created = Status::Create(
                    $createStatusRequest->all()
                );
                
                session()->flash('success','Status inserted successful');
          return redirect()->back();
          //return response()->json(['Status'=>$created,'message'=>'Status inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
           // return response()->json(['error'=>$th],404);
            session()->flash('error','Error inserting status');
          return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return $status->with('orders')->where('id',$status->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Status\UpdateStatus $updateStatusRequest
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatus $updateStatusRequest, Status $status)
    {
        try {
            $status->update($updateStatusRequest->all());
             session()->flash('success','Status updated successful');
          return redirect()->back();
               //  return response()->json(['Status'=>$status,'message'=>'Status updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            
                session()->flash('error','Error updating status');
          return redirect()->back();
            //return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        try {
            if($status->orders->count() <=0 && $status->carts->count()<=0){
                $status->delete();
                session()->flash('success','Status deleted successful');
                return redirect()->back();
            }else{
                session()->flash('error','Error cannot delete status becouse is used in other process.');
          return redirect()->back();
            }
             
            // return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
            
            session()->flash('error','Error deleting status');
          return redirect()->back();
              //return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}