<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\CreateTag;
use App\Http\Requests\Tag\UpdateTag;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tag::with(['products'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.dashboard.tag')->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Tag\CreateTag $createTagRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTag $createTagRequest)
    {
        try {
                $created = Tag::Create(
                    $createTagRequest->all()
                );
                session()->flash('success','Tag inserted successful');
          return redirect()->back();
         // return response()->json(['Tag'=>$created,'message'=>'Tag inserted successful','status'=>201],201);
        } catch (\Throwable $th) {
            //return response()->json(['error'=>$th],404);
            session()->flash('error','Error inserting Tag');
          return redirect()->back();
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //return $tag;
        return $tag->with(['products'])->where('id',$tag->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Tag\UpdateTag $updateTagRequest
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTag $updateTagRequest, Tag $tag)
    {
        try {
            $tag->update($updateTagRequest->all());
            session()->flash('success','Tag updated successful');
          return redirect()->back();
                /// return response()->json(['Tag'=>$tag,'message'=>'Tag updated successful','status'=>201],201);
        } catch (\Throwable $th) {
           // return response()->json(['error'=>'Error on updating data. Please try again.'],404);
              session()->flash('error','Error updating Tag');
          return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
         try {
             $tag->delete();
                session()->flash('success','Tag deleted successful');
          return redirect()->back();
              //return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
               session()->flash('erro','Error deleting Tag');
          return redirect()->back();
              //return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}