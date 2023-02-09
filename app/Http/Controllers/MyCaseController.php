<?php

namespace App\Http\Controllers;

use App\Models\my_case;
use App\Http\Requests\Storemy_caseRequest;
use App\Http\Requests\Updatemy_caseRequest;

class MyCaseController extends Controller
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
     * @param  \App\Http\Requests\Storemy_caseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemy_caseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\my_case  $my_case
     * @return \Illuminate\Http\Response
     */
    public function show(my_case $my_case)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\my_case  $my_case
     * @return \Illuminate\Http\Response
     */
    public function edit(my_case $my_case)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemy_caseRequest  $request
     * @param  \App\Models\my_case  $my_case
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemy_caseRequest $request, my_case $my_case)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\my_case  $my_case
     * @return \Illuminate\Http\Response
     */
    public function destroy(my_case $my_case)
    {
        //
    }
}
