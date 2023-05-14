<?php

namespace App\Http\Resources\Donation;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $delivery =random_int(1,5);
        if ($delivery>1){
            $color = 2;
        }elseif ($delivery = 5){
            $color = 3;
        }else{
            $color = 1;
        }
        return [
          'title'=>$this->description,

          'Color_status' =>  $color,
          'date' => $this->pickup_date,
          'start_time'=>$this->pickup_time_start,
          'end_time'=>$this->pickup_time_end,
          'address'=>$this->pickup_address,
          'delivery_status'=>$delivery,

        ];
    }
}
