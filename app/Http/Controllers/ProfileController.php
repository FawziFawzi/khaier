<?php

namespace App\Http\Controllers;

use App\Http\Resources\city\CityResource;
use App\Http\Resources\district\DistrictResource;
use App\Http\Resources\User\UserResource;
use App\Models\City;
use App\Models\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new UserResource(auth()->user());
        return response([
            "user"=>$user
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

    public function edit()
    {
        $authCity = City::where('id',auth()->user()->city_id)->firstOrFail();
        $authDistrict = District::where('id',auth()->user()->district_id)->firstOrFail();


        $user = new UserResource(auth()->user());
        $userAddress = ['city'=>$authCity->name,'district'=>$authDistrict->name];

        $cities = CityResource::collection(City::all());
        $districts =DistrictResource::collection(District::all());


        return \response([
            'user'=>$user,
            'address'=>$userAddress,
            'cities'=>$cities,
            'districts'=>$districts,
        ],Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        $attributes = $this->validate($request,[

            'name'=>'required|max:30',
            'thumbnail'=>'image',
            'city_id' => 'required|exists:cities,id',
            'district_id' => 'required|exists:districts,id'
        ],[
            'thumbnail.image'=>'يجب ادخال صورة',
            'city_id.exists'=>'هذه المدينة غير مسجله لدينا',
            'city_id.required'=>'حقل المدينة مطلوب',
            'district_id.exists'=>'هذه المنطقة غير مسجله لدينا',
            'district_id.required'=>'حقل المدينة مطلوب',
        ]);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails/user');
        }

        $user->update($attributes);

        return \response([
            'message'=>"تم تعديل بياناتك بنجاح",
            "user"=>new UserResource($user)
        ]);

    }
    public function updatePassword(Request $request,User $user){
        $attributes = $this->validate($request,[
            'old_password'=>'required|current_password:api',
            'password'=>'required|confirmed|min:8'
        ]);
        $attributes['password'] =bcrypt($request->password);
        $user->update($attributes);

        return \response([
            'message'=>"تم تعديل كلمة المرور بنجاح",
            'user'=>new UserResource($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->delete();
        return \response([
            'message'=>'تم حذف الحساب'
        ]);

    }
}
