<?php

namespace App\Http\Controllers;

use App\Http\Resources\categories\categotiesResource;
use App\Http\Resources\charities\charityCollection;
use App\Http\Resources\My_cases\My_casesCollection;
use App\Models\category;
use App\Models\charity;
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
        $user_address =\auth()->user()->city->name .','. \auth('api')->user()->district->name;

        //        High priority cases
        $cases =  My_casesCollection::collection(
            my_case::orderBy('priority','desc')->get()
        );

//     Search

        if (request('search')){
          return  $this->searchCases();
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

    public function searchCases()
    {
        $cases =
            My_casesCollection::collection(
                        my_case::whereHas('category', function (Builder $query) {
                            $query->where('name', 'like', '%'.request('search') .'%');
                        })->get()
            );

        if ($cases->count() != 0){
            return response([
                'cases' =>$cases
            ],Response::HTTP_OK);
        }else{
            return response([
                'error'=>'لا يوجد حالات مطابقة لبحثك'
            ],Response::HTTP_NOT_FOUND);
        }
    }
}
