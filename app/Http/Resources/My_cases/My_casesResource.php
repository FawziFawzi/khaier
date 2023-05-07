<?php

namespace App\Http\Resources\My_cases;

use App\Models\charity;
use Illuminate\Http\Resources\Json\JsonResource;

class My_casesResource extends JsonResource
{



    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $charity =charity::findOrFail($this->charity_id);
        return [
            'title'=>           $this->title,
            'excerpt'=>         $this->excerpt,
            'maxAmount'=>       $this->max_amount,
            'collectedAmount'=> $this->collected_amount,
            'percentage'=>round(($this->collected_amount/$this->max_amount)*100),
            'remaining_days'=>  ($this->collected_amount !=$this->max_amount)?  random_int(1,30):0,
            'category'=>        $this->category->name,
            'thumbnail'=>       $this->thumbnail,
            'charityName'=>     $charity->name,
            'charityThumbnail'=>$charity->thumbnail,
            'charityPhoneNumber'=>$charity->phone_number,
            'href'=>            [
                'charity'=>route('charities.show',$this->charity_id)
            ]
        ];
    }
}
