<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social_links extends Model
{
    use HasFactory;

    public function charity(){
        return $this->belongsTo(charity::class);
    }
}
