<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $this->userValidate($request);

        if (!auth()->attempt($attributes)){
            return response(['error' => 'يوجد خطأ في رقم الهاتف أو كلمة المرور']);
        }
        $token = auth()->user()->createToken('API Token')->accessToken;

        return response([
            'user'=>\auth()->user(),
            'token'=>$token
        ]);


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
    public function update(Request $request)
    {


        $exists ='exists:users,phone_number';
        $min = 'min:8';
        $this->userValidate($request,$exists,$min);

        $user = User::firstWhere('phone_number',$request->phone_number);



        $user->Fill([
            'password' =>bcrypt($request->password)
        ]);
        $user->save();

       return response([
           'message'=>'password updated successfully',
           'link'=>env('APP_URL').'/api/login'
       ]);
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


    public function userValidate($request,$exists =null,$min=null){
        $attributes=$request->validate([
            'phone_number'=>'required|'.$exists,
            'password'=>'required|'.$min,
        ]);

        return $attributes;
    }
}
