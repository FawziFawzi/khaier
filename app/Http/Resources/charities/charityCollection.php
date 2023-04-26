<?php

namespace App\Http\Resources\charities;

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
        return [
            'name'=>$this->name,
            'excerpt' =>$this->excerpt,
            'address' => City::findOrFail($this->city_id)->name .','.District::findOrFail($this->district_id)->name ,
            'thumbnail' =>$this->thumbnail,
            'href'=> route('charities.show',$this->id)
        ];
    }
}
