<?php

namespace App\Http\Resources\My_cases;


use Illuminate\Http\Resources\Json\JsonResource;

class My_casesCollection extends JsonResource
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
            'id'=>              $this->id,
            'title'=>           $this->title,
            'category'=>        $this->category->name,
            'maxAmount'=>       $this->max_amount,
            'collectedAmount'=> $this->collected_amount,
            'percentage'=>round(($this->collected_amount/$this->max_amount)*100),
            'remaining_days'=> random_int(1,30),
            'priority'=>        $this->priority,
            'thumbnail'=>       $this->thumbnail,
            'href'=>[
                'fullCard'=>route('my_cases.show',$this->id)]
        ];
    }
}
