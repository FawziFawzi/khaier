<?php

namespace App\Http\Controllers;

use App\Http\Resources\My_cases\My_casesCollection;
use App\Models\my_case;
use App\Models\MyCaseBookmarks;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CaseBookmarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $caseBookmarks = My_casesCollection::collection(
            my_case::whereHas('caseBookmarks',function (Builder $query){
                $query->where('user_id',auth()->user()->id);
            })->get()
        );

        if ($caseBookmarks->count() !=0) {
            return response([
                'caseBookmarks' => $caseBookmarks
            ], Response::HTTP_OK);
        }else{
            return \response([
                'error' => 'لا يوجد حالات تبرع محفوظه'
            ],Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $attributes = $this->validate($request,[
            'my_case_id'=>'required|exists:my_cases,id'
        ],[
            'my_case_id.exists'=>'هذه الحالة غير مسجله لدينا',
            'my_case_id.required'=>'حقل حاله التبرع مطلوب',
        ]);
        $bookmarked = MyCaseBookmarks::where('user_id',auth()->user()->id)->where('my_case_id',$request['my_case_id'])->first();
        $bookmark_result = $bookmarked !=null ? $bookmarked->id : null;

        if ($bookmark_result == null) {
        $attributes['user_id'] = auth()->user()->id;
        MyCaseBookmarks::firstOrCreate($attributes);
        return \response([
            'message'=>"تم اضافة الحالة الى المحفوظات"
        ],Response::HTTP_ACCEPTED);
        }else{
            MyCaseBookmarks::destroy($bookmark_result);
            return response([
                "message"=>"تم ازالة الحالة من المحفوظات"
            ],Response::HTTP_OK);
        }
    }


}
