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
        return Tag::with(['services','products'])->get();
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
     * @param  \App\Http\Requests\Tag\CreateTag $createTagRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTag $createTagRequest)
    {
        //
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
        return $tag->with(['services','products'])->where('id',$tag->id)->first();
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
    }
}