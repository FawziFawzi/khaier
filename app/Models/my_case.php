<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class my_case extends Model
{
    use HasFactory;


//    public function scopeFilter($query)
//    {
//        if (request('search')){
//
//            $query->
//                    whereHas('category', function (Builder $query) {
//                    $query->where('name', 'like', '%'.request('search') .'%');
//            });
//            if ($query->count() != 0){
//                return response([
//                    'cases' =>$query
//                ],Response::HTTP_OK);
//            }else{
//                return response([
//                    'error'=>'لا يوجد حالات مطابقة لبحثك'
//                ],Response::HTTP_NOT_FOUND);
//            }
//
//        }
//    }
//        public function scopeFilter(){
//
//        }


    public function donations(){
        return $this->hasMany(donation::class);
    }

    public function charity(){
        return $this->belongsTo(charity::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
