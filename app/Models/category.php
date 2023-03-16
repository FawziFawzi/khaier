<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function categ_chari(){
        return $this->hasMany(categ_chari::class);
    }

    public function cases(){
        return $this->hasMany(my_case::class);
    }
}
