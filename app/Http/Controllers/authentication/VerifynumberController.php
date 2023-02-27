<?php

namespace App\Http\Controllers\authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VerifynumberController extends Controller
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
    public function signup(Request $request)
    {
        $rules =['phone_number' => 'required|min:11|max:12|unique:users,phone_number'];
        $input = $request->only('phone_number');

        $phonemessage ='رقمك مسجل عندنا بالفعل';

       $validator = $this->validation($input,$rules,$phonemessage);

        if ($validator->fails()) {
            return response()->json(['success' => 'denied', 'error' => $validator->messages()]);
        }

        return response()->json([
            'success' => 'accepted'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword(Request $request)
    {
        $rules =['phone_number' => 'required|min:11|max:12|exists:users,phone_number'];
        $input = $request->only('phone_number');
        $phonemessage ='رقمك غير مسجل ';

        $validator = $this->validation($input,$rules,$phonemessage);

        if ($validator->fails()) {
            return response()->json(['success' => 'denied', 'error' => $validator->messages()]);
        }

        return response()->json([
            'success' => 'accepted'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validation($input,$rules,$phonemessage)
    {
        $validator = Validator::make($input,$rules,$messages = [
            'phone_number' => $phonemessage,
            'min' =>'لقد أدخلت اقل من 11 رقم',
            'max' =>'لقد أدخلت اكثر من 12 رقم',
        ]);
        return $validator;
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
