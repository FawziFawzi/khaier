<?php

namespace App\Http\Controllers;

use App\Http\Resources\charities\charityCollection;
use App\Http\Resources\charities\charityResource;
use App\Http\Resources\My_cases\My_casesCollection;
use App\Models\charity;
use App\Http\Requests\StorecharityRequest;
use App\Http\Requests\UpdatecharityRequest;
use App\Models\my_case;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        $attributes= $request->validate([
            'name'=>'required|unique:charities,name',
            'phone_number'=>'required|unique:charities,phone_number|max:11',
            'email'=>'required|email|unique:charities,email',
            'password'=>'required',
            'thumbnail'=>'required|image',
            'excerpt'=>'required',
            'city_id'=>'required|exists:cities,id',
            'district_id'=>'required|exists:districts,id'
        ]);
        $attributes['password'] = bcrypt($request['password']);
        $attributes['email_verified_at'] = now();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails/charity');

        $charity = charity::create($attributes);
        return response([
            'message'=>'charity created',
            'charity'=>new charityResource($charity)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\charity  $charity
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(charity $charity)
    {
       $charitydata =new charityResource($charity);
       if (!request('search')){
           $cases = My_casesCollection::collection(
               $this->getCases($charitydata)
                   ->whereColumn('max_amount','>','collected_amount')
                   ->get());
       }else{
           $cases = My_casesCollection::collection(
               $this->getCases($charitydata)
                   ->whereHas('category',function (Builder $query){
                       $query->where('name',request('search'));
                   })
                   ->whereColumn('max_amount','>','collected_amount')
                   ->get());
       }
       $doneCases = My_casesCollection::collection(
          $this->getCases($charitydata)
               ->whereColumn('max_amount','=','collected_amount')
               ->get()
       );
       $urgentCases = My_casesCollection::collection(
           $this->getCases($charitydata)
               ->where('priority','>','3')
               ->whereColumn('max_amount','>','collected_amount')
                ->orderBy('priority','desc')->get()
       );
        return response()->json([
           "charity"=>$charitydata,
            "cases"=>$cases,
            "urgentCases"=>$urgentCases,
            "doneCases"=>$doneCases
        ]);
    }

    public function getCases($charitydata){
        return my_case::whereHas('charity',function (Builder $query) use ($charitydata) {
            $query->where('id',$charitydata->id);
        });
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
