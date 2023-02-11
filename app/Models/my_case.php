<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class my_case extends Model
{
    use HasFactory;
    public function donations(){
        return $this->hasMany(donation::class);
    }

    public function charity(){
        return $this->belongsTo(charity::class);
    }
}
