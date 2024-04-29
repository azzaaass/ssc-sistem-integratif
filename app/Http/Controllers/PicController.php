<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use App\Http\Requests\StorePicRequest;
use App\Http\Requests\UpdatePicRequest;

class PicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePicRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePicRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function show(Pic $pic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function edit(Pic $pic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePicRequest  $request
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePicRequest $request, Pic $pic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        //
    }
}
