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
        return [
            'id'=>              $this->id,
            'title'=>           $this->title,
            'excerpt'=>         $this->excerpt,
            'maxAmount'=>       $this->max_amount,
            'collectedAmount'=> $this->collected_amount,
            'priority'=>        $this->priority,
            'category'=>        $this->category,
            'thumbnail'=>       $this->thumbnail,
            'charityName'=>     charity::findOrFail($this->charity_id)->name
        ];
    }
}
