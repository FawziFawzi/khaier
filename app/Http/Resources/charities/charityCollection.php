<?php

namespace App\Http\Resources\charities;

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
            'address' => $this->address,
            'thimbnail' =>$this->thumbnail,
            'href'=> route('charities.show',$this->id)
        ];
    }
}
