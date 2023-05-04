<?php

namespace App\Http\Controllers;

use App\Http\Resources\charities\charityCollection;
use App\Models\charity;
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


}
