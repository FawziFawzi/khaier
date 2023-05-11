<?php

namespace App\Http\Controllers;

use App\Models\donation;
use App\Http\Requests\StoredonationRequest;
use App\Http\Requests\UpdatedonationRequest;
use App\Models\my_case;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(Request $request,my_case $case)
    {
        $attributes = $this->validate($request,[
            'description'=>'required',
            'quantity'=>'required',
            'pickup_date'=>['required'],
            'pickup_time_start'=>['required'],
            'pickup_time_end'=>['required'],
            'pickup_address'=>'required',
            'note'=>'max:50',
            'thumbnail'=>'required|image'
        ]);
        $attributes['status'] = 1;
        $attributes['user_id'] = auth()->user()->id;
        $attributes['my_case_id'] = $case->id;
        $attributes['note'] = ($request['note']==null ?'no notes':$request['note']);
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails/donations');

        donation::create($attributes);
        return response(['message'=>'Donated successfully'],Response::HTTP_OK);
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
