<?php

namespace App\Http\Controllers;

use App\Http\Resources\categories\categotiesResource;
use App\Http\Resources\charities\charityCollection;
use App\Http\Resources\My_cases\My_casesCollection;
use App\Http\Resources\My_cases\My_casesResource;
use App\Models\category;
use App\Models\charity;
use App\Models\my_case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //TODO
//        categories at the top
        $categities = categotiesResource::collection(category::all());


//        High priority cases
        $cases =  My_casesCollection::collection(
            my_case::all()->sortByDesc('priority')
        );

//        Charities nearby
        $useraddress = auth()->user()->address;

        $charity = DB::table('charities')
            ->where('address',$useraddress)
            ->get();

        $charities = charityCollection::collection($charity);

        return response([
            "categories"=>$categities ,
            "cases"=>$cases,
            "charities" =>$charities,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
