<?php

namespace App\Http\Resources\My_cases;


use App\Models\my_case;
use App\Models\MyCaseBookmarks;
use Illuminate\Database\Eloquent\Builder;
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
        $bookmarked = false;
        $caseBookmarks = MyCaseBookmarks::where('user_id',auth()->user()->id)
            ->Where('my_case_id',$this->id)->get();

        if ($caseBookmarks->count()!=0){
            $bookmarked = true;
        }
        return [
            'user_id'=>\auth()->user()->id,

            'id'=>              $this->id,
            'bookmarked'=>      $bookmarked,
            'title'=>           $this->title,
            'category'=>        $this->category->name,
            'maxAmount'=>       $this->max_amount,
            'collectedAmount'=> $this->collected_amount,
            'percentage'=>round(($this->collected_amount/$this->max_amount)*100),
            'remaining_days'=>  ($this->collected_amount !=$this->max_amount)?  random_int(1,30):0,
            'priority'=>        $this->priority,
            'thumbnail'=>       asset('storage/'.$this->thumbnail),
            'href'=>[
                'fullCard'=>route('my_cases.show',$this->id)]
        ];
    }
}
