<?php

namespace App\Http\Controllers;

use App\Models\social_links;
use App\Http\Requests\Storesocial_linksRequest;
use App\Http\Requests\Updatesocial_linksRequest;

class SocialLinksController extends Controller
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
     * @param  \App\Http\Requests\Storesocial_linksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storesocial_linksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\social_links  $social_links
     * @return \Illuminate\Http\Response
     */
    public function show(social_links $social_links)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\social_links  $social_links
     * @return \Illuminate\Http\Response
     */
    public function edit(social_links $social_links)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatesocial_linksRequest  $request
     * @param  \App\Models\social_links  $social_links
     * @return \Illuminate\Http\Response
     */
    public function update(Updatesocial_linksRequest $request, social_links $social_links)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\social_links  $social_links
     * @return \Illuminate\Http\Response
     */
    public function destroy(social_links $social_links)
    {
        //
    }
}
