<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class my_case extends Model
{
    use HasFactory;

    protected $guarded=[];



        public function scopeSearch($query){
            $query->
            whereHas('category', function ($query) {
                $query->where('name', 'like', '%'.request('search') .'%');
            });
        }
        public function scopeCity($query){
            $query->when(request('city'),function ($query){
                $query->
                whereHas('charity',function (Builder $query){
                    $query
                        ->whereHas('city',function (Builder $query){
                            $query->where('name',\request('city'));
                        });
                });
            });

        }

        public function scopeDistrict($query){
            $query->when(request('district'),function ($query){
                $query->
                whereHas('charity',function (Builder $query){
                    $query
                        ->whereHas('district',function (Builder $query){
                            $query->where('name',\request('district'));
                        });
                });
            });
        }
    public function scopeUserLocation($query)
    {

        $query->
        whereHas('charity', function (Builder $query) {
            $query
                ->where('district_id', auth()->user()->district_id);

        });
    }

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
    public function caseBookmarks(){
            return $this->hasMany(MyCaseBookmarks::class,'my_case_id');
    }
}
