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





//    public function pay(Request $request,$id){
////        Stripe\Stripe::setApiKey(env('stripe_secret'));
////
////       $attributes = $this->validate($request,[
////            'name'=>'required',
////            'cardNumber'=>'required',
////            'ccv'=>'required|digits:3',
////            'expireMonth' =>"required|digits:2",
////            'expireYear' =>'required|digits:4',
////            'amount' =>'required'
////        ]);
////
////       $attributes['currency'] = 'EGP';
////        $attributes['source'] = 'sk_test_51NGlYQJYyShnk1PtNgbIUbE9mV12AmTZ70zs8Q2d3pjXGFdtYP7pkf7exBrvrvYAEvoKaOx0KBZmAmh6SHyXlNWg00NSNKf4YG';
////        $charge =Stripe\Charge::create($attributes);
////        $stripe = new \Stripe\StripeClient('sk_test_51NGlYQJYyShnk1PtNgbIUbE9mV12AmTZ70zs8Q2d3pjXGFdtYP7pkf7exBrvrvYAEvoKaOx0KBZmAmh6SHyXlNWg00NSNKf4YG');
//        $stripe = new \Stripe\StripeClient(env('stripe_secret'));
//        $res =$stripe->tokens->create([
//            'card' => [
//                'number' => $request->cardNumber,
//                'exp_month' => $request->expireMonth,
//                'exp_year' => $request->expireYear,
//                'cvc' => $request->ccv,
//            ],
//        ]);
//        dd($res);
////        $responce = $stripe->charges->create([
////            'name'=>$request->name,
////            'amount' => $request->amount,
////            'currency'=>'EGP',
////            'source' => $res->id
////        ]);
////        dd($responce);
////
////        if ($charge['status']=='succeeded'){
////            return response([
////                'message'=>'شكرا لتبرعك , سيصلك مندوبنا في الوقت المحدد'
////            ],Response::HTTP_ACCEPTED);
////        }else{
////            return response([
////                'message'=>'لم تتم عملية التبرع, حاول مرة اخرى من فضلك'
////            ],Response::HTTP_FORBIDDEN);
////        }
//    }
}
