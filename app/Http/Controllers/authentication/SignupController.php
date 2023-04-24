<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => 'required|min:8|max:20|unique:users,username',
            'name'=>'required|max:30',
            'phone_number' => 'required|min:11|max:12|unique:users,phone_number',
            'password' => 'required|confirmed|min:8',
            'address' => 'required|max:200',
        ]);
        $attributes['password'] = bcrypt($request->password);
        $user = User::create($attributes);
        $token = $user->createToken('API Token')->accessToken;
        return response([ 'user' => $user, 'token' => $token],Response::HTTP_OK);


//        $rules =[
//            'username' => 'required|min:8|max:20|unique:users,username',
//            'name'=>'required|max:30',
//            'phone_number' => 'required',//to access here I already checked the phone number
//            'password' => 'required|min:8',
//            'address' => 'required',
//            'thumbnail'=> 'image'
//        ];
//        $input = $request->only(
//            'username','name','phone_number','password','address','thumbnail');
//
//        $validator = Validator::make($input,$rules,$messages = [
//            'username.unique' => 'يوجد شخص آخر يستخدم هذا الاسم',
//            'username.required'=>'اسم المستخدم مطلوب',
//            'username.min' =>'يجب الا يقل اسم المستخدم عن 8 حروف',
//            'username.max' =>'يجب الا يزيد اسم المستخدم عن 20 حروف',
//
//            'name.max' =>'يجب الا يزيد اسمك بالكامل عن 30 حرف',
//            'name.required'=>'الاسم مطلوب',
//
//            'password' =>'يجب الا تقل كلمة السر عن 8 حروف',
//            'password.required' =>'كلمة السر مطلوبة',
//
//            'address'=>'العنوان مطلوب',
//
//            'thumbnail'=> 'يجب صور فقط في هذا الحقل'
//        ]);
//        if ($validator->fails()) {
//            return response()->json(['success' => false, 'error' => $validator->messages()]);
//        }
//
//
//        $attributes = $validator->validated();
//
//
//        $attributes['password'] = bcrypt($attributes['password']);
//
//        //still needs work to be added
//        $attributes['phone_number_verified_at'] = date("H:i:s");
//
////    Remember token needs to be done.
//        User::create($attributes);
//
//        return response()->json([
//            'success' => 'signedup'
//        ]);
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
