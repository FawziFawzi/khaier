<?php

namespace App\Http\Controllers;
use Stripe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StripePaymentController extends Controller
{
//    public function paymob(Request $request,$id){
//
//    }





    public function pay(Request $request,$id){
        Stripe\Stripe::setApiKey(config('payment.stripe_key'));

       $attributes = $this->validate($request,[
            'name'=>'required',
            'cardNumber'=>'required',
            'ccv'=>'required|digits:3',
            'expireMonth' =>"required|digits:2",
            'expireYear' =>'required|digits:4',
            'amount' =>'required'
        ]);

       $attributes['currency'] = 'EGP';
        $attributes['source'] = config('payment.stripe_key');
        $charge =Stripe\Charge::create($attributes);
        $stripe = new \Stripe\StripeClient(config('payment.stripe_key'));
        $res =$stripe->tokens->create([
            'card' => [
                'number' => $request->cardNumber,
                'exp_month' => $request->expireMonth,
                'exp_year' => $request->expireYear,
                'cvc' => $request->ccv,
            ],
        ]);

        $response = $stripe->charges->create([
            'name'=>$request->name,
            'amount' => $request->amount,
            'currency'=>'EGP',
            'source' => $res->id
        ]);

        if ($charge['status']=='succeeded'){
            return response([
                'message'=>'شكرا لتبرعك , سيصلك مندوبنا في الوقت المحدد'
            ],Response::HTTP_ACCEPTED);
        }else{
            return response([
                'message'=>'لم تتم عملية التبرع, حاول مرة اخرى من فضلك'
            ],Response::HTTP_FORBIDDEN);
        }
    }
}
