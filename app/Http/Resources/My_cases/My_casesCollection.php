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
        $bookmark_id =0;

        $caseBookmarks = MyCaseBookmarks::where('user_id',auth()->user()->id)
            ->Where('my_case_id',$this->id)->get();

        if ($caseBookmarks->count()!=0){
            $bookmark_id =$caseBookmarks[0]->id;
        }
        return [
            'user_id'=>\auth()->user()->id,

            'id'=>              $this->id,
            'bookmark_id'=>     $bookmark_id,
            'title'=>           $this->title,
            'category'=>        $this->category->name,
            'maxAmount'=>       $this->max_amount,
            'collectedAmount'=> $this->collected_amount,
            'percentage'=>round(($this->collected_amount/$this->max_amount)*100),
            'remaining_days'=>  ($this->collected_amount !=$this->max_amount)?  random_int(1,30):0,
            'priority'=>        $this->priority,
            'thumbnail'=>       asset('storge/'.$this->thumbnail),
            'href'=>[
                'fullCard'=>route('my_cases.show',$this->id)]
        ];
    }
}
