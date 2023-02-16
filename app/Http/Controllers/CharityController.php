<?php

namespace App\Http\Controllers;

use App\Models\charity;
use App\Http\Requests\StorecharityRequest;
use App\Http\Requests\UpdatecharityRequest;

class CharityController extends Controller
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
     * @param  \App\Http\Requests\StorecharityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecharityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\charity  $charity
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(charity $charity)
    {
        return response()->json([
           $charity //dummy only
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function edit(charity $charity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecharityRequest  $request
     * @param  \App\Models\charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecharityRequest $request, charity $charity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function destroy(charity $charity)
    {
        //
    }
}
