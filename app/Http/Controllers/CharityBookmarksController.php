<?php

namespace App\Http\Controllers;

use App\Http\Resources\charities\charityCollection;
use App\Models\charity;
use App\Models\CharityBookmarks;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class CharityBookmarksController extends Controller
{

    public function index(){


        $charityBookmarks = charityCollection::collection(
            charity::whereHas('charityBookmarks',function (Builder $query){
                $query->where('user_id',auth()->user()->id);
            })->get()
        );

        if ($charityBookmarks->count() !=0) {
            return response([
                'charityBookmarks' => $charityBookmarks
            ], Response::HTTP_OK);
        }else{
            return \response([
                'error' => 'لا يوجد جمعيات محفوظه'
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $v = $request['bookmarked'] =='false'? false:"Not working";
//        dd($v);

        $attributes = $this->validate($request,[
            'charity_id'=>'required|exists:charities,id'
        ],[
            'charity_id.exists'=>'هذه الجمعية غير مسجله لدينا',
            'charity_id.required'=>'حقل الجمعية مطلوب',
        ]);
        $bookmarked = CharityBookmarks::where('user_id',auth()->user()->id)->where('charity_id',$request['charity_id'])->first();
        $bookmark_result = $bookmarked !=null ? $bookmarked->id : null;
//        dd($bookmark_result);

        if ($bookmark_result == null){
            $attributes['user_id'] = auth()->user()->id;
            CharityBookmarks::firstOrCreate($attributes);
            return \response([
                'message'=>"تم اضافة الجمعية الى المحفوظات"
            ],Response::HTTP_ACCEPTED);
        }else{
            CharityBookmarks::destroy($bookmark_result);

            return \response([
                "message"=>"تم ازالة الجمعية من المحفوظات"
            ],Response::HTTP_OK);
        }

    }

    public function destroy($id)
    {

         CharityBookmarks::destroy($id);

        return \response([
            "message"=>"تم ازالة الجمعية من المحفوظات"
        ],Response::HTTP_OK);
    }


}
