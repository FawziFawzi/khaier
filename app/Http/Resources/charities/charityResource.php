<?php

namespace App\Http\Resources\charities;

use App\Models\CharityBookmarks;
use App\Models\City;
use App\Models\District;
use Illuminate\Http\Resources\Json\JsonResource;

class charityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $bookmark_id =0;
        $charityBookmarks = CharityBookmarks::where('user_id',auth()->user()->id)
            ->where('charity_id',$this->id)->get();

        if ($charityBookmarks->count()!=0){
            $bookmark_id =$charityBookmarks[0]->id;
        }

        return [
            'user_id'=>\auth()->user()->id,

            'id'=>$this->id,
            'bookmark_id'=>$bookmark_id,
            'name'=>$this->name,
            'excerpt' =>$this->excerpt,
            'address' => City::findOrFail($this->city_id)->name .','.District::findOrFail($this->district_id)->name ,
            'thumbnail' =>$this->thumbnail,
            'phoneNumber'=>$this->phone_number
        ];
    }
}
