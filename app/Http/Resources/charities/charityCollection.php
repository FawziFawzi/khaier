<?php

namespace App\Http\Resources\charities;

use App\Models\CharityBookmarks;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Resources\Json\JsonResource;


class charityCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bookmarked =0;

        $charityBookmarks = CharityBookmarks::where('user_id',auth()->user()->id)
            ->where('charity_id',$this->id)->get();
        if ($charityBookmarks->count()!=0){
            $bookmarked =1;
        }
        return [
            'user_id'=>\auth()->user()->id,

            'id'=>$this->id,
            'bookmarked'=>$bookmarked,
            'name'=>$this->name,
            'excerpt' =>$this->excerpt,
            'address' => City::findOrFail($this->city_id)->name .','.District::findOrFail($this->district_id)->name ,
            'thumbnail' =>$this->thumbnail,
            'href'=> route('charities.show',$this->id)
        ];
    }
}
