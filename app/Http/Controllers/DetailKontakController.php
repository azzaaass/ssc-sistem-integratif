<?php

namespace App\Http\Controllers;

use App\Models\DetailKontak;
use App\Http\Requests\StoreDetailKontakRequest;
use App\Http\Requests\UpdateDetailKontakRequest;

class DetailKontakController extends Controller
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
     * @param  \App\Http\Requests\StoreDetailKontakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailKontakRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function show(DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailKontakRequest  $request
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailKontakRequest $request, DetailKontak $detailKontak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailKontak  $detailKontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailKontak $detailKontak)
    {
        //
    }
}
