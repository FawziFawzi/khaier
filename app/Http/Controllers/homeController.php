<?php

namespace App\Http\Controllers;

use App\Http\Resources\categories\categotiesResource;
use App\Http\Resources\charities\charityCollection;
use App\Http\Resources\city\CityResource;
use App\Http\Resources\district\DistrictResource;
use App\Http\Resources\My_cases\My_casesCollection;
use App\Models\category;
use App\Models\charity;
use App\Models\City;
use App\Models\District;
use App\Models\my_case;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_name =\auth()->user()->name;
        $user_city =\auth()->user()->city->name;
        $user_district =\auth()->user()->district->name;
        $user_address =$user_city .','. $user_district;

        //        High priority cases
        $cases =  My_casesCollection::collection(
            my_case::orderBy('priority','desc')->get()
        );

//     Search

        if (request('search')){
            if (\request('location')=='user'){
                $cases =My_casesCollection::collection(
                    my_case::search()->userLocation()->get()
                );
                return  $this->searchCount($cases);
            }else{
                $cases =My_casesCollection::collection(
                    my_case::search()->city()->district()->get()
                );
                return  $this->searchCount($cases);
            }

        }


//        categories at the top
        $categories_link = route('categories.index');
        $categities = categotiesResource::collection(category::take(3)->get());


//        Charities nearby
        if (auth()->user()) {
            $charities = charityCollection::collection(
                charity::
//                where('city_id',auth('api')->user()->city_id)
                where('district_id', auth()->user()->district_id)
                    ->get()
            );
        }else{
//            TAKE THE LAST 5 CHARITIES AND SHOW THEM
            $charities = charityCollection::collection(
                charity::latest()->take(5)->get()
            );
        }
//        dd(Auth::user()->id);

        return response([
            "user"=>[
                'name'=>$user_name,
                'address'=>$user_address
            ],
            "categories"=>[
                'All categories link'=>$categories_link,
                'categories' =>$categities
            ] ,
            "cases"=>$cases,
            "charities" =>$charities,
        ],200);
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


    private function searchCount($cases){
        if ($cases->count() != 0){
            $cities = CityResource::collection(City::all());
            $districts =DistrictResource::collection(District::all());
            return response([
                'cases' =>$cases,
                'cities' =>$cities,
                'districts'=>$districts
            ],Response::HTTP_OK);
        }else{
            return response([
                'error'=>'لا يوجد حالات مطابقة لبحثك'
            ],Response::HTTP_NOT_FOUND);
        }
    }
}
