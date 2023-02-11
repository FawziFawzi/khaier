<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categ_chari extends Model
{
    use HasFactory;
    public function category(){
        return $this->belongsTo(category::class);
    }

    public function charity(){
        return $this->belongsTo(charity::class);
    }
}
