<?php

namespace App\Http\Controllers;

use App\Models\donation;
use App\Http\Requests\StoredonationRequest;
use App\Http\Requests\UpdatedonationRequest;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            "data"=>"khaier"
        ]);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredonationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredonationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(donation $donation)
    {
        //
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\donation  $donation
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(donation $donation)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedonationRequest  $request
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedonationRequest $request, donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(donation $donation)
    {
        //
    }
}
