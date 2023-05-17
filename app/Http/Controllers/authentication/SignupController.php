<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Http\Resources\city\CityResource;
use App\Http\Resources\district\DistrictResource;
use App\Http\Resources\User\UserResource;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class SignupController extends Controller
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

    public function create()
    {
        $cities = CityResource::collection(City::all());
        $districts =DistrictResource::collection(District::all());

        return \response([
            'cities'=>$cities,
            'districts'=>$districts,
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->validate
        (
            $request,[
            'username' => 'required|min:8|max:20|unique:users,username',
            'name'=>'required|max:30',
            'phone_number' => 'required|min:11|max:12|unique:users,phone_number',
            'password' => 'required|confirmed|min:8',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id'
            ],[
                'city_id.exists'=>'هذه المدينة غير مسجله لدينا',
                'city_id.required'=>'حقل المدينة مطلوب',
                'district_id.exists'=>'هذه المنطقة غير مسجله لدينا',
                'district_id.required'=>'حقل المدينة مطلوب',
            ]);
        $attributes['password'] = bcrypt($request->password);
        $user = User::create($attributes);
        $token = $user->createToken('API Token')->accessToken;
        return response([ 'user' => new UserResource($user), 'token' => $token],Response::HTTP_OK);
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
