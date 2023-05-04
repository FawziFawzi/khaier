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
            'user_id'=>'required|exists:users,id',
            'my_case_id'=>'required|exists:my_cases,id'
        ],[
            'user_id.exists'=>'هذه المستخدم غير مسجل لدينا',
            'user_id.required'=>'حقل المستخدم مطلوب',
            'my_case_id.exists'=>'هذه الحالة غير مسجله لدينا',
            'my_case_id.required'=>'حقل حاله التبرع مطلوب',
        ]);

        MyCaseBookmarks::create($attributes);
        return \response([
            'message'=>"Case Bookmarked"
        ],Response::HTTP_ACCEPTED);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         $bookmark = MyCaseBookmarks::destroy($id);

         return \response([
             "message"=>"bookmark".$bookmark." deleted"
         ],Response::HTTP_CONTINUE);
    }
}
