<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class charity extends Model
{
    use HasFactory;

    public function my_cases(){
        return $this->hasMany(my_case::class);
    }

    public function social_links(){
        return $this->hasMany(social_links::class);
    }

    public function categ_chari(){
        return $this->hasMany(categ_chari::class);
    }
}
