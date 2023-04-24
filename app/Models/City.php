<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function charities(){
        return $this->hasMany(charity::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
