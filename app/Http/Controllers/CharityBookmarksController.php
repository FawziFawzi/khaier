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
        $attributes = $this->validate($request,[
            'user_id'=>'required|exists:users,id',
            'charity_id'=>'required|exists:charities,id'
        ],[
            'user_id.exists'=>'هذه المستخدم غير مسجل لدينا',
            'user_id.required'=>'حقل المستخدم مطلوب',
            'charity_id.exists'=>'هذه الجمعية غير مسجله لدينا',
            'charity_id.required'=>'حقل الجمعية مطلوب',
        ]);
        CharityBookmarks::firstOrCreate($attributes);
        return \response([
            'message'=>"Charity Bookmarked"
        ],Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {

         CharityBookmarks::destroy($id);

        return \response([
            "message"=>"charity bookmark deleted"
        ],Response::HTTP_OK);
    }


}
